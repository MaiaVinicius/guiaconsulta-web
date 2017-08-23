<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientMedicationRemindersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'patient_medication_reminders', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->integer( 'patient_id' );
			$table->date( 'start_treatment' );
			$table->tinyInteger( 'duration' );
			$table->string( 'medication_id', 100 );
			$table->string( 'indication', 45 )->nullable();
			$table->float( 'dosage' )->nullable();
			$table->tinyInteger( 'unit_id' )->nullable();
			$table->tinyInteger( 'finished' )->default( 0 );
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'patient_medication_reminders' );
	}
}
