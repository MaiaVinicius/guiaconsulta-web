<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSearchLogTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'search_log', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->string( 'keyword', 200 );
			$table->string( 'location', 155 );
			$table->float( 'lat' );
			$table->float( 'lng' );
			$table->string( 'ip', 25 );
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'search_log' );
	}
}
