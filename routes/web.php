<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DashBoard\CarController as DashBoardCarController;
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

// profile
Route::middleware('auth')->group(function () {
    Route::get('/profile/create',[ProfileController::class,'create'])->name('profile.create');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile', [PersonalInformationController::class, 'update'])->name('personalinfo.edit');
    Route::post('/profile/pic/update',[ProfilePicController::class,'update']);
    Route::post('/profile/create',[ProfileController::class,'store'])->name('profile.store');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// car
Route::middleware('auth')->group(function () {
    Route::post('/rent',[BookingController::class,'store']);
});
// car for owners
Route::middleware(['auth'])->group(function () {
    Route::get('/owner',[DashBoardCarController::class,'index'])
    ->middleware('can:viewAny,App\Models\Car')->name('owner.index');

    Route::get('/car/add',[DashBoardCarController::class,'create'])
    ->middleware('can:create,App\Models\Car');

    Route::get('/car/edit/{car}',[DashBoardCarController::class,'edit'])
    ->middleware('can:create,App\Models\Car');

    Route::post('/car/add',[DashBoardCarController::class,'store'])
    ->middleware('can:create,App\Models\Car');

    Route::put('/car/edit/{car}',[DashBoardCarController::class,'update']);
    Route::delete('/car/delete/{car}',[DashBoardCarController::class,'destroy']);
});

Route::controller(CarController::class)->group(function (){
    Route::get('/cars','index');
});

// booking 
Route::middleware(['auth'])->group(function () {
    Route::get('/bookings',[BookingController::class,'index'])->name('booking.index');
});

require __DIR__.'/auth.php';
