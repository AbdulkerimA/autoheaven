<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    public function index(){

        $cars = Car::with('owner','media')->paginate(10);

        if(Auth::user()->profile->role == "owner")
            return view('owner.cars.index');
        return view('cars.index',[
            'cars' => $cars,
        ]);
    }
}
