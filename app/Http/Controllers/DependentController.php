<?php

namespace App\Http\Controllers;

use App\BaseController;
use App\Dependent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DependentController extends BaseController {
	//
	public function listAll() {
		$dependent = new Dependent();
		$res       = $dependent->listDependents( 1 );

		return response()->json( $res );
	}

	public function create( Request $request ) {
		$data = $request->all();

		$validate = Dependent::validate( $data );
		if ( $validate !== true ) {
			return $validate;
		}

		$dependent = new Dependent();
		$res       = $dependent->create( 1, $data );

		return $this->response( $res );
	}
}
