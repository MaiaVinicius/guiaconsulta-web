<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoginAttemptsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'login_attempts_log', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->tinyInteger( 'success' );
			$table->integer( 'user_id' )->nullable();
			$table->string( 'email', 255 );
			$table->string( 'password', 255 );
			$table->string( 'ip', 20 );
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'login_attempts' );
	}
}
