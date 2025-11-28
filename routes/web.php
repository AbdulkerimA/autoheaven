<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\user\PersonalInformationController;
use App\Http\Controllers\user\ProfilePicController;
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
    Route::patch('/profile', [PersonalInformationController::class, 'update'])->name('personalinfo.edit');
    Route::post('/profile/pic/update',[ProfilePicController::class,'update']);
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// posts
Route::middleware('auth')->group(function () {
    Route::post('/rent',[BookingController::class,'store']);
});

Route::controller(CarController::class)->group(function (){
    Route::get('/cars','index');
});

require __DIR__.'/auth.php';
