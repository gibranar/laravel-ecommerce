<?php

namespace App\Http\Controllers;

use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDetailController extends Controller
{
    public function index()
    {
        $users = UserDetail::all();

        return view('profile.profile', ['users' => $users]);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'full_name' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:users_detail,email,' . $user->userDetail->id,
            'phone' => 'nullable|string|max:255|unique:users_detail,phone,' . $user->userDetail->id,
            'profession' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);

        $user->userDetail->update($validatedData);

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully');
    }
}
