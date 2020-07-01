<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\User;

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

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password']
        ]);

        $this->registered = true;

//        return redirect('/login');
    }

    public function render()
    {
        return view('livewire.register');
    }
}
