<?php

namespace App\Livewire\Pages\SuperAdmin\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class EditUser extends Component
{
    public $userId;
    public $name;
    public $email;
    public $password = '';
    public $password_confirmation = '';
    public $selectedRole = [];
    public $roles = [];

    public function mount($id)
    {
        $this->userId = $id;
        $this->loadUserData();
    }

    public function loadUserData()
    {
        $user = User::with('roles')->findOrFail($this->userId);
        $this->name = $user->name;
        $this->email = $user->email;
        // Do NOT pre-fill password fields with the hash
        $this->password = '';
        $this->password_confirmation = '';
        $this->selectedRole = $user->roles->pluck('name')->toArray();
        $this->roles = Role::select('id', 'name')->get();
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email,' . $this->userId,
            'password' => 'nullable|string|min:6',               // optional
            'password_confirmation' => 'nullable|string|min:6|same:password',
            'selectedRole' => 'required|array|min:1',
            'selectedRole.*' => 'exists:roles,name',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name is required.',
            'email.required' => 'The email is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'password.min' => 'The password must be at least 6 characters.',
            'password_confirmation.same' => 'The password confirmation must match the password.',
            'selectedRole.required' => 'Please select at least one role.',
            'selectedRole.min' => 'Please select at least one role.',
            'selectedRole.*.exists' => 'One of the selected roles is invalid.',
        ];
    }

    public function update()
    {
        $this->validate();

        $user = User::findOrFail($this->userId);

        $data = [
            'name' => Str::of($this->name)->trim()->title(),
            'email' => Str::of($this->email)->trim()->lower(),
        ];

        // Only update password if a new one was provided
        if (!empty($this->password)) {
            $data['password'] = Hash::make($this->password);
        }

        $user->update($data);
        $user->syncRoles($this->selectedRole);

        session()->flash('success', 'User updated successfully.');
        return redirect()->route('super-admin.user.view');
    }

    #[Layout('components.layouts.superadmin')]
    public function render()
    {
        return view('livewire.pages.super-admin.user.edit-user');
    }
}