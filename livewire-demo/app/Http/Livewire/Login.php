<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{

    public $email = '';
    public $password = '';

    public function emailUpdated()
    {
        $this->validate([
            'email' => 'email|unique:users',
        ]);
    }

    public function check()
    {
        $data = $this->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:6|max:255',
        ]);

        $auth = Auth::attempt([
            'email' => $this->email,
            'password' => $this->password,
        ]);

        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.login');
    }
}
