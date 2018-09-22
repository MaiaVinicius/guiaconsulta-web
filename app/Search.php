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

		$procedures = DB::table( 'services' )
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
		         ->first();
	}


	static public function search( $specialty_id, $latlng, $filters = [ 'max_distance' => 45, 'gender' => false ] ) {
		$where = '';
		if ( $filters['gender'] ) {
			$where .= " AND users.gender_id = {$filters['gender']}";
		}

		return DB::select( "
				SELECT 
				professionalxspecialty . specialty_id,
	        	professionalxspecialty . registration,
           		professionalxspecialty . emissor_state,
		      	professionals . id,
		        users . name,
		        medical_places.name,
				( 6371 * acos( cos( radians({$latlng['lat']}) ) * cos( radians( medical_places.lat ) ) * 
				cos( radians( medical_places.lng ) - radians({$latlng['lng']}) ) + sin( radians({$latlng['lat']}) ) * 
				sin( radians( medical_places.lat ) ) ) ) AS distance 
				FROM professionals
					INNER JOIN professionalxspecialty ON professionalxspecialty.professional_id = professionals.id 
					INNER JOIN users ON users.id = professionals.user_id
					INNER JOIN medical_placexprofessional ON medical_placexprofessional.professional_id = professionals.id
					INNER JOIN medical_places ON medical_placexprofessional.location_id = medical_places.id
				WHERE professionalxspecialty.specialty_id = {$specialty_id}
				{$where} 
				GROUP BY medical_places.id,professionals.id, professionalxspecialty.id, medical_placexprofessional.id
				HAVING distance < {$filters['max_distance']} 
				ORDER BY distance;
		" );
//GROUP BY professionals.id,professionalxspecialty.id,medical_placexprofessional.id
	}
}
