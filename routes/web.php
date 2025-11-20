<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ProfileController;
use App\Models\Car;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $cars = Car::orderBy('year')->limit(4)->get();

    // dd($cars);
    return view('home.index',[
        'cars' => $cars,
    ]);
});

Route::get('/dashboard', function () {
    $cars = Car::orderBy('year')->limit(4)->get();
    return view('home.index',['cars'=>$cars]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(CarController::class)->group(function (){
    Route::get('/cars','index');
});

require __DIR__.'/auth.php';
