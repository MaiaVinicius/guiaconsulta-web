<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProceduresTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'procedures', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->string( 'name', 155 );
			$table->tinyInteger( 'active' )->default( 0 );
//            $table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'procedures' );
	}
}
