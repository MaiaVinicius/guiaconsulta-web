<?php

namespace App\Http\Controllers;

use App\Search;
use App\Specialty;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Mockery\Exception;

class SearchController extends Controller {
	//
	function searchTerm( $keyword ) {
		$result = Search::findKeyword( $keyword );

		return response()->json( $result );
	}


	function search( $keyword = false, $location = false, $payment = false ) {
		$s = Specialty::where( 'specialist', 'like', '%' . $keyword . '%' )->get();


		$latlng = $this->addressToLatLng( $location );




		return response()->json( [ 'oooo', 's' => $s, 'location' => $latlng ] );
	}


	function addressToLatLng( $address ) {
		$url = "https://maps.googleapis.com/maps/api/geocode/json";

		$client = new Client();
		$res    = $client->request( 'GET', $url,
			[
				'query' => [
					'address' => $address,
					'key'     => 'AIzaSyA2RpD2PmtzXTJe9gTC_KBgtHxCx53hwWU',
				]
			]
		)->getBody()->getContents();

		$res    = \GuzzleHttp\json_decode( $res, true );
		$latlng = $res["results"][0]["geometry"]["location"];

		return $latlng;
	}
}
