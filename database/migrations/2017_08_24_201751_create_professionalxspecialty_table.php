<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionalxspecialtyTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'professionalxspecialty', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->integer( 'specialty_id' );
			$table->integer( 'professional_id' );
			$table->integer( 'registration' )->nullable();
			$table->integer( 'conseal_id' )->nullable();
			$table->string( 'emissor_state' )->nullable();
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'professionalxspecialty' );
	}
}
