<?php
/**
 * Created by PhpStorm.
 * User: MaiaVinicius
 * Date: 23/09/2018
 * Time: 12:53
 */

namespace App;


use Illuminate\Support\Facades\Validator;

class BaseModel {

	public static $validateParams;

	/**
	 * @param array $data
	 */
	public static function validate( $data ) {
		return;
	}

	protected static function _validate( $data, $params ) {

		$validator = Validator::make( $data, $params );

		if ( $validator->fails() ) {
			return $validator->messages();
		}

		return true;
	}
}