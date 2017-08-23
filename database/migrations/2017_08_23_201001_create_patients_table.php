<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'patients', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->integer( 'user_id' )->nullable();
			$table->integer( 'blood_type_id' )->nullable()->default( - 1 );
			$table->tinyInteger( 'allergies' )->default( - 1 );
			$table->tinyInteger( 'current_medications' )->default( - 1 );
			$table->tinyInteger( 'last_medications' )->default( - 1 );
			$table->tinyInteger( 'chronic_diseases' )->default( - 1 );
			$table->tinyInteger( 'injuries' )->default( - 1 );
			$table->tinyInteger( 'surgeries' )->default( - 1 );

			$table->tinyInteger( 'height' )->nullable()->default( - 1 );
			$table->tinyInteger( 'weight' )->nullable()->default( - 1 );
			$table->tinyInteger( 'smoking_habits_id' )->nullable()->default( - 1 );
			$table->tinyInteger( 'alcohol_consumption_id' )->nullable()->default( - 1 );
			$table->tinyInteger( 'activity_level_id' )->nullable()->default( - 1 );
			$table->tinyInteger( 'food_preference_id' )->nullable()->default( - 1 );
			$table->tinyInteger( 'occupation_id' )->nullable()->default( - 1 );
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'patients' );
	}
}
