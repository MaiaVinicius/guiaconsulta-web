<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller {
	//
	function index() {

		return response()->json( "NO" );
	}

	protected function sendLoginResponse( Request $request, $token ) {

		return $this->authenticated( $request, JWTAuth::user(), $token );
	}

	public function login( Request $request ) {
		$credentials = $request->only( 'email', 'password' );

		try {
			if ( $token = JWTAuth::attempt( $credentials )
			) {
				return $this->sendLoginResponse( $request, $token );
			} else {
				return $this->sendInvalidResponse();
			}
		} catch ( JWTException $e ) {
			return response()->json( [
					'success' => false,
					'error'   => 'something went wrong'
				]
			);
		}
	}

	protected function sendInvalidResponse() {
		return response()->json( [ 'error' => 'invalid credentials' ], 401 );
	}

	protected function authenticated( Request $request, $user, $token ) {
		return response()->json( [
			'success' => true,
			'token'   => $token,
			'user'    => $user
		], 200 );
	}
}

