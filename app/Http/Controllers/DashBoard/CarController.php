<?php

namespace App\Http\Controllers\DashBoard;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarMedia;
use Illuminate\Contracts\Auth\Access\Authorizable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Filament\authorize;

class CarController extends Controller
{
    use AuthorizesRequests;

    public function index(){
        $cars = Car::with('media')->where('owner_id',Auth::id())->paginate(9);
        return view('owner.cars.index',['cars'=>$cars]);
    }

    public function create(){
        // $cars = Car::where('owner_id',Auth::id())->paginate(10);
        return view('owner.cars.create');
    }

    // store the car data
    public function store(Request $request){
        // dd($request->post());
         // Validate input
        $validated = $request->validate([
            'carName' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'fuelType' => 'required|string|max:255',
            'seats' => 'required|numeric|min:2',
            'transmission' => 'required|string|max:255',
            'licensePlate' => 'required|string|max:255',
            'pricePerDay' => 'required|numeric|min:0',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'description' => 'required|string',
            'images.*' => 'sometimes|image|max:5120', // Max 5MB per image
        ]);

        // dd($validated);

        // Create the car
        $car = Car::create([
            'owner_id' => Auth::id(),
            'name' => $validated['carName'],
            'brand' => $validated['brand'],
            'category' => $validated['category'],
            'seats' => $validated['seats'],
            'fuel_type' => $validated['fuelType'],
            'transmission' => $validated['transmission'],
            'price_per_day' => $validated['pricePerDay'],
            'license_plate' => $validated['licensePlate'],
            'year' => $validated['year'],
            'description' => $validated['description'],
            'availability_status' => 'available',
        ]);

        // Handle uploaded images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('cars/','public');

                CarMedia::create([
                    'car_id' => $car->id,
                    'file_path' => $path,
                ]);
            }
        }

        // Redirect back with success message
        return redirect('/owner')->with('success', 'Car listed successfully!');
    }

    /**
     * display the page to edit a car
     */
    public function edit(Request $request, Car $car){
        dump($car);
        return view('owner.cars.edit',['car'=>$car]);
    }
    /**
     * handle the updat a car request
     */
    public function update(Request $request){
        dd($request->all());
    }

    /**
     * delete a car
     */
    public function destroy(Request $request, Car $car){
        
        // dd($request->all(),$car);
        
        $this->authorize('delete',$car);

        $car->delete();
        return redirect()->back()->with('success','car deleted successfuly');
    }
}
