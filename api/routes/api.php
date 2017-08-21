<?php

use Illuminate\Http\Request;

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

Route::middleware( 'auth:api' )->get( '/user', function ( Request $request ) {
//	return $request->user();
	return [ "name" => "rodolfo" ];
} );


Route::post( 'login', 'Auth\LoginController@login' );

Route::post( 'register', 'Auth\RegisterController@login' );

Route::get( '/login', function ( Request $request ) {
	return [ "hey" ];
} );

Route::get( '/posts', 'PostsController@index' );

Route::get( '/specialties', 'SpecialtiesController@index' );

Route::get( '/search/{keyword}', 'SearchController@index' );

Route::get( '/insurances', 'InsurancesController@index' );
