<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitdatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('visitdates', function($table)
    {
      #AI, PK
      $table->increments('id');
      #Created at, updated at
      $table->timestamps();
      #Tour Date OR Checkin Date (mandatory)
      $table->dateTime('checkin_date');
      #Checkout date (optional)
      $table->dateTime('checkout_date');
      #FK for user_id 
      $table->integer('user_id')->unsigned(); # Important! FK
      
      # Define foreign keys...
			$table->foreign('user_id')->references('id')->on('users');
      
    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('visitdates');
	}

}
