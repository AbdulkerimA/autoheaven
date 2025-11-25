<?php

namespace App\Http\Controllers;

use App\Models\Car;

abstract class Controller
{
    public function index(){
        return view('cars.index');
    }
}
