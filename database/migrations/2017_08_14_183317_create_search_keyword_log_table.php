<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSearchKeywordLogTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'search_keyword_log', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->string( 'keyword', 100 )->nullable();
			$table->integer( 'result_count' )->default( 0 );
			$table->string( 'ip', 20 )->nullable();
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'search_keyword_log' );
	}
}
