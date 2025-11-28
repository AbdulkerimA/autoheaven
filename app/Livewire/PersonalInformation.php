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
    public $street;
    public $city;
    public $region;
    public $dob;
    public $gender;
    public $license_number;
    public $emergency_name;
    public $emergency_phone;


    public function mount()
    {
        $user = Auth::user();

        $this->fullName = $user->name;
        $this->userName = $user->username;
        $this->email = $user->email;
        $this->tel = $user->profile->phone;
        $this->street = $user->profile->street;
        $this->city = $user->profile->city;
        $this->region = $user->profile->region;
        $this->dob = $user->profile->date_of_birth;
        $this->license_number = $user->profile->license_number;
        $this->emergency_name = $user->profile->emergency_name;
        $this->emergency_phone = $user->profile->emergency_phone;
        $this->gender = $user->profile->gender;

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

