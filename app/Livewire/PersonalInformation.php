<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PersonalInformation extends Component
{
    public $showModal = false;

    public $fullName;
    public $userName;
    public $email;
    public $tel;
    public $address;

    public function mount()
    {
        $user = Auth::user();

        $this->fullName = $user->name;
        $this->userName = $user->username;
        $this->email = $user->email;
        $this->tel = $user->phone;
        $this->address = $user->address;

        if (session()->has('errors') && session('errors')->hasBag('personalInfoUpdate')) {
            $this->showModal = true;
        }
    }

    public function openModal()
    {
        $this->showModal = true;
    }

    // opens the modal after error
    // public function hydrate()
    // {
    //     if ($this->getErrorBag()->isNotEmpty()) {
    //         $this->showModal = true;
    //     }
    // }



    public function render()
    {
        return view('livewire.personal-information');
    }
}

