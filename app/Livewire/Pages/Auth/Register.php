<?php

namespace App\Livewire\Pages\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Register extends Component
{
    
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $phone = '';
    public string $address = '';
     public $selectedRoles = '';
    public $roles = [];

  
    public function rule()
    {
        return [
            'name' => 'required|min:2|max:60',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:8|confirmed',
            'phone' => ['required', 'regex:/^(09|\+639)\d{9}$/', 'max:13', 'unique:users'],
            'address' => 'required|nullable|string|max:255',
            'selectedRoles' => 'required|min:1',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'name.min' => 'Name must be at least 2 characters',
            'name.max' => 'Name must be at most 60 characters',

            'email.required' => 'Email is required',
            'email.email' => 'Email is invalid',
            'email.unique' => 'Email already exists',

            'password.required' => 'Password is required',
            'password.confirmed' => 'Password does not match',
            'password.min' => 'Password must be at least 8 characters',

            'phone.required' => 'Phone number is required',
            'phone.regex' => 'Phone number must be a valid format (09XXXXXXXXX or +639XXXXXXXXX)',
            'phone.max' => 'Phone number must be at most 13 characters',
            'phone.unique' => 'Phone number already exists',
            

            'address.required' => 'Address is required',
            'address.string' => 'Address must be a string',
            'address.max' => 'Address must be at most 255 characters',

            'selectedRoles.required' => 'Please select at least one role',
            'selectedRoles.min' => 'Please select at least one role',

        ];
    }
     public function mount()
{
    $roles = Role::select('id', 'name')
        ->whereIn('name', ['admin', 'customer'])
        ->get();

    $this->roles = $roles;
}

    public function register()
    {        
        $this->validate($this->rule(), $this->messages());
        
        $this->password = bcrypt($this->password);
        $this->name = ucwords($this->name);
        $this->email = strtolower($this->email);
        $this->phone = strtolower($this->phone);
        $this->address = strtolower($this->address);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'phone' => $this->phone,
            'address' => $this->address,
        ]);
        
        $user->save();

        $user->syncRoles($this->selectedRoles);


        return redirect()->route('login.page');
    }


    public function render()
    {
        return view('livewire.pages.auth.register');
    }
}
