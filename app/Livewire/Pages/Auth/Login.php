<?php

namespace App\Livewire\Pages\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public string $email = '';
    public string $password = '';
    public bool $remember = false;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8',
        
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {

            session()->regenerate();

            $user = Auth::user();

            return match (true) {
                $user->hasRole('super-admin') =>redirect()->intended(route('super-admin.dashboard')),

                $user->hasAnyRole(['admin']) =>redirect()->intended(route('admin.dashboard')),

                $user->hasRole('customer') =>redirect()->intended(route('index.page')),

                default =>redirect()->intended(route('login.page')),
            };
}
         $this->password = '';
         $this->addError('email', 'The provided credentials do not match our records.');
         $this->addError('password', 'The provided credentials do not match our records.');
    }
    public function render()
    {
        return view('livewire.pages.auth.login');
    }
}
