<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use App\User;
use Auth;

class Register extends Component
{

    public $email = '';
    public $name = '';
    public $password = '';
    public $registered = false;

    public function mount()
    {
        $this->name = 'Beautiful?';
    }

//    public function updatedName()
//    {
//        $this->validate(['name' => 'unique:users']);
//    }

    public function updatedEmail()
    {
        $this->validate(['email' => 'unique:users']);
    }


    public function register()
    {
        $data = $this->validate([
            'name' => 'required|max:255|different:Beautiful?',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $this->registered = true;

        Auth::login($user);

        return redirect('/home');
    }

    public function render()
    {
        return view('livewire.register');
    }
}
