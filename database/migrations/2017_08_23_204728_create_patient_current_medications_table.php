<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientCurrentMedicationsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'patient_current_medications', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->integer( 'patient_id' );
			$table->string( 'medication_id', 100 );
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
		Schema::dropIfExists( 'patient_current_medications' );
	}
}
