<?php

namespace App\Http\Controllers;

use App\Search;
use App\Specialty;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Mockery\Exception;

class ResourceController extends Controller {
	//

	public function create( Request $request, $resource ) {
		$data     = $request->all();
		$Resource = new \App\Resource( $resource );

		$res = $Resource->create( $data );

		return response()->json( $res );
	}

	public function remove( $resource, $id ) {
		$Resource = new \App\Resource( $resource );

		$res = $Resource->deleteById( $id );

		return response()->json( $res );
	}

	public function getForm( $resource ) {
		$Resource = new \App\Resource( $resource );

		$res = $Resource->getForm();

		return response()->json( $res );
	}

	public function update( Request $request, $resource, $id ) {
		$data = $request->all();

		$Resource = new \App\Resource( $resource );

		$res = $Resource->updateById( $data, $id );

		return response()->json( $res );
	}

	public function get( $resource, $id ) {
		$Resource = new \App\Resource( $resource );

		$data = $Resource->getById( $id );

		return response()->json( $data );
	}

	public function search( $resource, $keyword = false ) {

		$Resource = new \App\Resource( $resource );

		$data = $Resource->search( $keyword );

		return response()->json( $data );
	}

	public function getLogs( $resource, $id ) {
		$Resource = new \App\Resource( $resource );

		//todo tratr userId
		$data = $Resource->getLogs( $id, 0 );

		return response()->json( $data );
	}
}
