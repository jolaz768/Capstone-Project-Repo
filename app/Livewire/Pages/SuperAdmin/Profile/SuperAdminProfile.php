<?php

namespace App\Livewire\Pages\SuperAdmin\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class SuperAdminProfile extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $phone;
    public $address;
    public $gender;
    public $bio;

    public $profile_image;

    // Password fields
    public $current_password;
    public $new_password;
    public $new_password_confirmation;

    public function mount()
    {
        $user = Auth::user();

        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->address = $user->address;
        $this->gender = $user->gender ?? 'male';
        $this->bio = $user->bio;
    }

    public function save()
    {
        $user = Auth::user();

        $rules = [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'gender' => 'nullable|in:male,female,other',
            'bio' => 'nullable|string|max:1000',
            'profile_image' => 'nullable|image|max:2048', // 2MB
        ];

        // If password fields are filled, add password rules
        if ($this->current_password || $this->new_password || $this->new_password_confirmation) {
            $rules['current_password'] = 'required|current_password';
            $rules['new_password'] = 'required|string|min:8|confirmed';
        }

        $this->validate($rules);

        // Handle profile image upload
        if ($this->profile_image) {
            $path = $this->profile_image->store('profile-images', 'public');
            $user->profile_image = $path;
        }

        // Update basic fields
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'gender' => $this->gender,
            'bio' => $this->bio,
        ]);

        // Update password if provided
        if ($this->new_password) {
            $user->update([
                'password' => Hash::make($this->new_password),
            ]);
        }

        // Clear password fields after save
        $this->reset(['current_password', 'new_password', 'new_password_confirmation', 'profile_image']);

        session()->flash('message', 'Profile updated successfully.');
    }

    // Helper to remove uploaded file (optional, for reset)
    public function removePhoto()
    {
        $this->reset('profile_image');
    }
    
    #[Layout('components.layouts.superadmin')]
    public function render()
    {
        return view('livewire.pages.super-admin.profile.super-admin-profile');
    }
}
