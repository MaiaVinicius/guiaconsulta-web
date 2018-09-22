<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalPlacesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'medical_places', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->string( 'name' );
			$table->string( 'address', 155 )->nullable();
			$table->string( 'number', 10 )->nullable();
			$table->string( 'complement', 50 )->nullable();
			$table->string( 'neighborhood', 155 )->nullable();
			$table->string( 'city', 30 )->nullable();
			$table->string( 'state', 30 )->nullable();
			$table->float( 'lat' )->nullable();
			$table->float( 'lng' )->nullable();
			$table->tinyInteger( 'place_type' )->default( 1 );
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'medical_places' );
	}
}
