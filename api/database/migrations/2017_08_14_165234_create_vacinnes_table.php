<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacinnesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'vacinnes', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->string( 'name', 155 );
			$table->tinyInteger( 'active' )->default( 0 );
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'vacinnes' );
	}
}
