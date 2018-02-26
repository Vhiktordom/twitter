<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    function profile($username)
    {
    	//$user = User::whereUsername($username);

    	$user = User::where('username', $username)->first();
    	return view('user.profile', compact('user'));
    }
}
