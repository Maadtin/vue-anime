<?php

namespace App\Http\Controllers;

use App\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthController extends Controller
{


	public function login(Request $request)
	{

		$client = new Client([
			 'base_uri' => 'http://localhost:80',
			 'defaults' => [
				  'exceptions' => false
			 ]
		]);
		try {

			$response = $client->post('/oauth/token', [
				 'form_params' => [
					  'grant_type' => 'password',
					  'client_id' => 2,
					  'client_secret' => 'ItxbpYkCFk7AXWaTIcWow1IRSgwoXtu1XSqV7aBt',
					  'username' => $request->email,
					  'password' => $request->password
				 ]
			]);

			return $response->getBody();

		} catch (BadResponseException $e) {
			switch ($e->getCode()) {
				case 400:
					return response()->json(['message' => 'Petición inválida, Por favor introduce el email y la contraseña']);
				case 401:
					return response()->json(['message' => 'Contraseña o email inválido']);
			}
			return response()->json(['message' => 'Ocurrio un error fatal en el servidor']);
		}

	}

	public function register(Request $request)
	{

		$validation = [
			 'email' => 'required|email',
			 'password' => 'required|alpha_num|min:8',
			 'confirmPassword' => 'required|alpha_num|min:8|same:password',
			 'avatar' => 'image|mimes:jpeg,jpg,png,bmp,gif,svg',
			 'username' => 'required|min:5'
		];

		$validationMessages = [
			 'password.required' => 'El campo contraseña es requerido',
			 'confirmPassword.required' => 'El campo confirmar contraseña es requerido',
			 'username.required' => 'El campo nombre de usuario contraseña es requerido',
			 'avatar.uploaded' => 'La imagen no se pudo subir'
		];

		$request->validate($validation, $validationMessages);

		$user = new User();
		$user->username = $request->username;
		$user->password = bcrypt($request->password);
		$user->email = $request->email;

		if ($request->hasFile('avatar')) {
			$file = $request->file('avatar');
			$fileExtension = $file->getClientOriginalExtension();
			$newFileName = Str::slug($user->username) . "." . $fileExtension;
			$uploadPath = $file->storeAs("public/avatars", $newFileName);
			$user->avatar = $uploadPath;
		}

		if ($user->save()) {
			return response()->json(['message' => 'Te has registrado correctamente.'], 201);
		}
		return response()->json(['error' => 'Ocurrio un error durante el registro, por favor inténtalo más tarde.'], 201);
	}


}
