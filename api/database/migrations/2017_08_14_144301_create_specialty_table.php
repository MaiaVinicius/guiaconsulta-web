<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialtyTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'specialty', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->string( 'name', 155 );
			$table->string( 'full_specialist', 155 )->nullable();
			$table->string( 'specialist', 155 )->nullable();
			$table->integer( 'code' );
			$table->tinyInteger( 'active' );
			$table->tinyInteger( 'type' );
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'specialty' );
	}
}
