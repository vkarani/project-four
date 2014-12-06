<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDestinationVisitdateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	  Schema::create('destination_visitdate', function($table) {
      # AI, PK
      # none needed
      # General data...
      $table->integer('destination_id')->unsigned();
      $table->integer('visitdate_id')->unsigned();
			
      # Define foreign keys...
      $table->foreign('destination_id')->references('id')->on('destinations');
      $table->foreign('visitdate_id')->references('id')->on('visitdates');
			
    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('destination_visitdate');
	}

}
