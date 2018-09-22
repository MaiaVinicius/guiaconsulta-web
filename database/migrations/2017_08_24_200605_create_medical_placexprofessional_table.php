<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalPlacexprofessionalTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'medical_placexprofessional', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->integer( 'professional_id' );
			$table->integer( 'location_id' );
			$table->tinyInteger( 'active' )->default( 1 );
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'medical_placexprofessional' );
	}
}
