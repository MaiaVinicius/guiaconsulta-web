<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientDependentsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'patient_dependents', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->integer( 'patient_id' );
			$table->string( 'name' );
			$table->date( 'birthdate' )->nullable();
			$table->string( 'phone' )->nullable();
			$table->tinyInteger( 'gender_id' )->nullable();
			$table->tinyInteger( 'relationship_id' )->nullable();
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
		Schema::dropIfExists( 'patient_dependents' );
	}
}
