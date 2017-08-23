<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject {
	use Notifiable;


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'email',
		'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	public function getJWTIdentifier() {
		return $this->getKey();
	}

	public function getJWTCustomClaims() {
		return [];
	}

	public static function logLoginAttempt( $success, $email, $password, $userId = 0 ) {
		DB::table( 'login_attempts_log' )
		  ->insert(
			  [
				  'success'  => $success,
				  'user_id'  => $userId,
				  'email'    => $email,
				  'password' => $password,
				  'ip'       => request()->ip(),
			  ]
		  );
	}
}
