<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientChronicDiseaseTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'patient_chronic_disease', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->integer( 'patient_id' );
			$table->integer( 'chronic_disease_id' );
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'patient_chronic_disease' );
	}
}
