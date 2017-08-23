<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionalsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'professionals', function ( Blueprint $table ) {
			$table->engine = 'InnoDB';

			$table->increments( 'id' );
//			$table->string( "name", 155 );
//			$table->tinyInteger( "gender_id" )->nullable();
//			$table->date( "birthdate" )->nullable();
			$table->integer( "user_id" )->nullable();
			$table->tinyInteger( "active" )->default( 0 );
			$table->timestamps();
			$table->softDeletes();
		} );

		Schema::table( 'professionals', function ( Blueprint $table ) {
//			$table->foreign( 'user_id' )->references( 'id' )->on( 'users' );
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'professionals' );
	}
}
