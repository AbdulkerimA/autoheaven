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
            'address'  => 'required|min:4',
        ]);


        // dd($validated,$user->id);

        $updated = $user->update([
            'name'      => $validated['fullName'],
            'username'  => $validated['userName'],
            'email'     => $validated['email'],
            'phone'     => $validated['tel'],
            'address'   => $validated['address'],
        ]);

        if ($updated) {
            return redirect()->route('profile.edit')->with('success', 'Profile updated successfully!');
        } else {
            return back()->with('info', 'No changes were detected.');
        }
    }
}
