<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class PersonalInformationController extends Controller
{
    public function update(Request $request){
        // dd($request->post());

        $user = Auth::user();

        $validated = $request->validateWithBag('personalInfoUpdate', [
            'fullName' => 'required|min:3',
            'userName' => ['required','min:2',Rule::unique('users','username')->ignore($user->id),],
             'tel' => [
                'required',
                'max:13',
                'min:10',
                Rule::unique('users', 'phone')->ignore($user->id),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'street'           => ['required', 'string', 'max:255'],
            'city'             => ['required', 'string', 'max:255'],
            'region'           => ['required', 'string', 'max:255'],
            'dob'              => ['required', 'date'],
            'license_number'   => [
                'required', 
                'string', 
                'max:255',
                Rule::unique('user_profiles', 'license_number')->ignore($user->profile->id),
            ],
            'emergency_name'   => ['required', 'string', 'max:255'],
            'emergency_phone'  => ['required', 'string', 'max:20'],
        ]);


        // dd($validated,$user->id);

        $updated = $user->update([
            'name'      => $validated['fullName'],
            'username'  => $validated['userName'],
            'email'     => $validated['email'],
        ]);

        $user->profile->update([
            'phone'           => $validated['tel'],
            'street'          => $validated['street'],
            'city'            => $validated['city'],
            'region'          => $validated['region'],
            'dob'             => $validated['dob'],
            'license_number'  => $validated['license_number'],
            'emergency_name'  => $validated['emergency_name'],
            'emergency_phone' => $validated['emergency_phone'],
        ]);

        if ($updated) {
            return redirect()->route('profile.edit')->with('success', 'Profile updated successfully!');
        } else {
            return back()->with('info', 'No changes were detected.');
        }
    }
}
