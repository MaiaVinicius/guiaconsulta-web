<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'users', function ( Blueprint $table ) {
			$table->engine = 'InnoDB';

			$table->increments( 'id' );
			$table->string( 'name', 155 );
			$table->string( 'cpf', 20 )->nullable();
			$table->tinyInteger( "gender_id" )->nullable();
			$table->date( "birthdate" )->nullable();
			$table->tinyInteger( "active" )->default( 1 );
			$table->string( 'email' )->unique();
			$table->string( 'password' );
			$table->rememberToken();
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'users' );
	}
}
