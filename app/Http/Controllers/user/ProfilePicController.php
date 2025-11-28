<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfilePicController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'profile_pic' => 'required|image|max:5120',
        ]);

        $user = Auth::user();

        // Store image
        $path = $request->file('profile_pic')->store('profile_photos', 'public');
        
        // return response()->json(['path',$path]);

        // Delete old image if needed
        if ($user->profile_pic && Storage::disk('public')->exists($user->profile_pic)) {
            Storage::disk('public')->delete($user->profile_pic);
        }

        // Update user
        $user->update([
            'profile_picture' => $path,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Profile photo updated successfully',
            'path'    => asset('storage/' . $path)
        ]);
    }

}
