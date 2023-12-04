<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProfileUser;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function showProfile()
    {
        $profile = ProfileUser::first();
        return view('profile.profile', ['profile' => $profile]);
    }
}
