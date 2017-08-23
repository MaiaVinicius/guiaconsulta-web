<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller {
	//

	protected function sendLoginResponse( Request $request, $token ) {

		return $this->authenticated( JWTAuth::user(), $token );
	}

	public function login( Request $request ) {
		$credentials = $request->only( 'email', 'password' );

		try {
			$token = JWTAuth::attempt( $credentials );

			User::logLoginAttempt( $token ? 1 : 0, $request->email, $request->password, JWTAuth::user()["id"] );

			if ( $token ) {
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

	protected function authenticated( $user, $token ) {
		return response()->json( [
			'success' => true,
			'token'   => $token,
			'user'    => $user
		], 200 );
	}
}

