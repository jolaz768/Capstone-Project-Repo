<?php

namespace App\Livewire\Pages\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;

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

        if (Auth::attempt([
            'email' => $this->email,
            'password' => $this->password
        ], $this->remember)) {

            session()->regenerate();

            $user = Auth::user();

            if ($user->hasRole('admin')) {
                return redirect()->route('super-admin.dashboard');
            }

            if ($user->hasRole('owner')) {
                return redirect()->route('admin.dashboard');
            }

            if ($user->hasRole('customer')) {
                return redirect()->route('index.page');
            }

            return redirect()->route('login.page');
        }

        $this->password = '';

        $this->addError('email', 'The provided credentials do not match our records.');
    }

    #[Layout('components.layouts.app')]

    public function render()
    {
        return view('livewire.pages.auth.login');
    }
}