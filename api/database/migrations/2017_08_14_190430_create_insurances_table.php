<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsurancesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'insurances', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->string( 'company_name', 255 )->nullable();
			$table->string( 'fantasy_name', 155 )->nullable();
			$table->integer( 'ans_register' )->nullable();
			$table->string( 'cnpj', 20 )->nullable();
			$table->string( 'public_place', 155 )->nullable();
			$table->string( 'number', 20 )->nullable();
			$table->string( 'complement', 155 )->nullable();
			$table->string( 'neighborhood', 155 )->nullable();
			$table->string( 'city', 155 )->nullable();
			$table->string( 'state', 2 )->nullable();
			$table->integer( 'zip_code' )->nullable();
			$table->string( 'ddd', 2 )->nullable();
			$table->string( 'phone', 15 )->nullable();
			$table->string( 'fax', 15 )->nullable();
			$table->string( 'email' )->nullable();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'insurances' );
	}
}
