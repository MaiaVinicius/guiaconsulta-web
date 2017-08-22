<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Search extends Model {

	static public function findKeyword( $keyword ) {
		$professionals = DB::table( 'professionals' )
		                   ->select( DB::raw( 'professionals.id, users.name, "2"result_type' ) )
		                   ->join( 'users', 'professionals.user_id', '=', 'users.id' )
		                   ->where( [
			                   [ 'users.name', 'like', '%' . $keyword . '%' ],
			                   [ 'professionals.active', 1 ]
		                   ] );

		$procedures = DB::table( 'procedures' )
		                ->select( DB::raw( 'id, name, "4"result_type' ) )
		                ->where( [
			                [ 'name', 'like', '%' . $keyword . '%' ],
			                [ 'active', 1 ]
		                ] );

		$vacinnes = DB::table( 'vacinnes' )
		              ->select( DB::raw( 'id, name, "5"result_type' ) )
		              ->where( [
			              [ 'name', 'like', '%' . $keyword . '%' ],
			              [ 'active', 1 ]
		              ] );

		$specialties = DB::table( 'specialty' )
		                 ->select( DB::raw( 'id, name, "1"result_type' ) )
		                 ->where( [
			                 [ 'name', 'like', '%' . $keyword . '%' ],
			                 [ 'active', 1 ]
		                 ] )
		                 ->unionAll( $procedures )
		                 ->unionAll( $professionals )
		                 ->unionAll( $vacinnes )
		                 ->get();

		self::saveLogKeyword( $keyword, count( $specialties ) );

		return $specialties;
	}

	static private function saveLogKeyword( $keyword, $result_count ) {
		DB::table( 'search_keyword_log' )
		  ->insert(
			  [
				  'keyword'      => $keyword,
				  'ip'           => request()->ip(),
				  'result_count' => $result_count
			  ]
		  );
	}

	static public function saveLog( $keyword, $latlng, $location, $result_count ) {
		DB::table( 'search_log' )
		  ->insert(
			  [
				  'keyword'      => $keyword,
				  'ip'           => request()->ip(),
				  'location'     => $location,
				  'lat'          => $latlng["lat"],
				  'lng'          => $latlng["lng"],
				  'result_count' => $result_count
			  ]
		  );
	}

	static public function getLatLngCache( $location ) {
		return DB::table( 'search_log' )
		         ->select( DB::raw( 'lat,lng' ) )
		         ->where( [
			         [ 'location', $location ],
		         ] )
		         ->get()->first();
	}
}
