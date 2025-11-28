<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\UserProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }
    public function create(Request $request): View
    {
        return view('profile.create',[
            'user' => $request->user(),
        ]);
    }

    /**
     * store customer detail information
     */
    public function store(Request $request)
    {
        // dd($request->post(),$request->file());

        // Validate the form
        $validated = $request->validate([
            'role'            => 'required|in:owner,customer',
            'phone'           => 'required|string|min:10|max:15',
            'dateOfBirth'     => 'required|date',
            'gender'          => 'required|string|in:male,female',
            'street'          => 'required|string|min:3',
            'city'            => 'required|string|min:2',
            'region'          => 'required|string|min:2',
            'licenseNumber'   => 'required|string',
            'emergencyName'   => 'required|string|min:3',
            'emergencyPhone'  => 'required|string|min:10|max:15',

            // Files
            'profilePhoto'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'licensePhoto'    => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $user = Auth::user();

        // -------------------------
        // Upload Profile Photo
        // -------------------------
        if ($request->hasFile('profilePhoto')) {

            $path = $request->file('profilePhoto')->store('profile_photos','public');
            $validated['profile_photo_path'] = $path;
        }

        // -------------------------
        // Upload License Photo
        // -------------------------
        if ($request->hasFile('licensePhoto')) {

            $licensePath = $request->file('licensePhoto')->store('license_photos');
            $validated['license_photo_path'] = $licensePath;
        }


        // dd($licensePath , $validated['gender']);
        // -------------------------
        // Save User Information
        // -------------------------
        // dd($validated,$validated['profile_photo_path']);

        UserProfile::create([
            'user_id'           =>$user->id,
            'phone'             => $validated['phone'],
            'role'              => $validated['role'],
            'date_of_birth'     => $validated['dateOfBirth'],
            'gender'            => $validated['gender'],
            'street'            => $validated['street'],
            'city'              => $validated['city'],
            'region'            => $validated['region'],
            'license_number'    => $validated['licenseNumber'],
            'emergency_name'    => $validated['emergencyName'],
            'emergency_phone'   => $validated['emergencyPhone'],
            'profile_picture'   => $validated['profile_photo_path'],
            'license_photo'     => $validated['license_photo_path'],
        ]);

        $user->update(['has_profile'=>true]);

        if($validated['role'] == 'customer')
            return redirect('/cars')->with('success', 'Profile created successfully!');
        return redirect('/owners')->with('success', 'Profile created successfully!');
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
