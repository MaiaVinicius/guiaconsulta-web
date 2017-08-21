<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller {
	//
	public function register() {
		$data = request()->only( 'email', 'name', 'password' );

		try {
			$data['password'] = bcrypt( $data['password'] );
			$user             = User::create( $data );

			$token = auth()->guard()->fromUser( $user );

			if ( $token ) {

				return response()->json( [ 'token' => $token, 'user' => auth()->guard()->user() ], 200 );
			}
		} catch ( QueryException $e ) {
			return response()->json( [ 'error' => 'something went wrong', 'message' => $e->getMessage() ], 500 );
		}
	}
}
