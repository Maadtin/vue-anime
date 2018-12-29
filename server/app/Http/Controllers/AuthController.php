<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{


	public function login(Request $request)
	{

	}

	public function register(Request $request)
	{


		$validation = [
			 'email' => 'required|email',
			 'password' => 'required|alpha_num|min:8',
			 'confirmPassword' => 'required|alpha_num|min:8|same:password',
			 'picture' => '',
			 'username' => 'required|min:5'
		];

		$validationMessages = [
			 'password.required' => 'El campo contraseña es requerido',
			 'confirmPassword.required' => 'El campo confirmar contraseña es requerido',
			 'username.required' => 'El campo nombre de usuario contraseña es requerido',
		];

		$validatedData = $request->validate($validation, $validationMessages);

		$user = new User();
		$user->username = $request->username;
		$user->password = $request->password;
		$user->email = $request->email;
//		$user->username = $request->username;

		if ($user->save()) {
			return response()->json(['message' => 'Te has registrado correctamente.'], 201);
		}
		return response()->json(['error' => 'Ocurrio un error durante el registro, por favor inténtalo más tarde.'], 201);
	}


}
