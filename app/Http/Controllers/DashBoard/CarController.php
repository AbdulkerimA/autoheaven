<?php

namespace App\Http\Controllers\DashBoard;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarMedia;
use Illuminate\Contracts\Auth\Access\Authorizable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        // dump($car);
        
        return view('owner.cars.edit',['car'=>$car]);
    }
    /**
     * handle the updat a car request
     */
    public function update(Request $request,Car $car){
        // dd($request->all());

        $this->authorize('update', $car);

        // Validate form inputs
        $validated = $request->validate([
            'carName'              => 'required|string|max:255',
            'availability_status'  => 'required|in:booked,available,maintenance',
            'brand'                => 'required|string|max:100',
            'category'             => 'required|string|max:100',
            'pricePerDay'          => 'required|numeric|min:1',
            'fuelType'             => 'required|string|max:50',
            'transmission'         => 'required|string|max:50',
            'seats'                => 'required|integer|min:1',
            'year'          => 'required|integer|min:1900|max:' . date('Y'),
            'mileage'       => 'required|numeric|min:0',
            'licensePlate'  => 'required|string|max:50',
            'description'   => 'required|string',
            'images'        => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120', // optional
        ]);

        // Update car data
        $car->update([
            'name'                      => $validated['carName'],
            'brand'                     => $validated['brand'],
            'availability_status'       => $validated['availability_status'],
            'category'          => $validated['category'],
            'price_per_day'     => $validated['pricePerDay'],
            'fuel_type'         => $validated['fuelType'],
            'transmission'      => $validated['transmission'],
            'seat'              => $validated['seats'],
            'year'              => $validated['year'],
            'mileage'           => $validated['mileage'],
            'license_plate'     => $validated['licensePlate'],
            'description'       => $validated['description'],
        ]);

        // Handle optional image upload
        if ($request->hasFile('images')) {
            $image = $request->file('images');

            // Delete old images if needed (optional)
            foreach ($car->media as $media) {
                if (Storage::exists($media->file_path)) {
                    Storage::delete($media->file_path);
                }
                $media->delete();
            }

            // Store new image
            $path = $image->store('cars', 'public');
            CarMedia::create([
                'car_id'    => $car->id,
                'file_path' => $path,
            ]);
        }

        return redirect('/owner')->with('success', 'Car updated successfully!');
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
