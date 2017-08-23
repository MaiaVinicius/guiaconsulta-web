<?php

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group( [ 'middleware' => 'auth:api' ], function () {
	Route::get( '/user', function ( Request $request ) {
//	return $request->user();
		$token = JWTAuth::getToken();
		$user  = JWTAuth::toUser( $token );

		return $user;
	} );


	Route::prefix( 'wizard' )->group( function () {
		Route::get( '/', 'PatientWizardController@index' );
	} );
} );


Route::post( 'login', [
	'uses' => 'Auth\LoginController@login'
] );

Route::post( 'register', [
	'uses' => 'Auth\RegisterController@register'
] );

Route::get( 'search/{keyword?}/{location?}/{payment?}',
	[ 'as' => 'login', 'uses' => 'SearchController@search' ] );


Route::get( '/posts', 'PostsController@index' );

Route::get( '/specialties', 'SpecialtiesController@index' );

Route::get( '/search-term/{keyword}', 'SearchController@searchTerm' );

Route::get( '/insurances', 'InsurancesController@index' );
