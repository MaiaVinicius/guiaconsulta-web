<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Insurance extends Model {
	//
	protected $table = 'insurances';

	public static function all( $columns = [ '*' ] ) {
		return DB::table( 'insurances' )->orderBy( 'fantasy_name' )->get();
	}

}
