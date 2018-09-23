<?php
/**
 * Created by PhpStorm.
 * User: MaiaVinicius
 * Date: 23/09/2018
 * Time: 12:42
 */

namespace App;


use App\Http\Controllers\Controller;

class BaseController extends Controller {
	protected function response( $response, $success = true ) {
		return response()->json( [
			"success"  => $success,
			"datetime" => date( "Y-m-d H:i:s" ),
			"content"  => $response
		] );
	}
}