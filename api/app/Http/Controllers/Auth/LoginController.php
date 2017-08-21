<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;

class LoginController extends Controller {
	//
	function index() {
		$insurances = \App\Insurance::all();

		return response()->json( $insurances );
	}

	protected function sendLoginResponse( Request $request, $token ) {

		return $this->authenticated( $request, auth()->guard()->user(), $token );
	}

	public function login( Request $request ) {
		$credentials = $request->only( 'email', 'password' );

		try {
			if ( $token = auth()->guard()->attempt( $credentials )
			) {
				return $this->sendLoginResponse( $request, $token );
			} else {
				return $this->sendInvalidResponse();
			}
		} catch ( JWTException $e ) {
			return response()->json( [ 'error' => 'something went wrong' ] );
		}
	}

	protected function sendInvalidResponse() {
		return response()->json( [ 'error' => 'invalid credentials' ], 401 );
	}

	protected function authenticated( Request $request, $user, $token ) {
		return response()->json( [
			'token' => $token,
			'user'  => $user
		], 200 );
	}
}

