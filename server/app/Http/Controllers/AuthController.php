<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{


	public function login(Request $request)
	{

	}

	public function register(Request $request)
	{

		$validatedData = $request->validate([
			 'email' => 'required|email',
			 'password' => 'required|alpha_num|min:8',
			 'confirmPassword' => 'required|alpha_num|min:8|same:password',
			 'picture' => '',
			 'username' => 'required|min:8'
		]);

		return response()->json($validatedData);
	}


}
