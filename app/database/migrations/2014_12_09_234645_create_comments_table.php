<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
	  Schema::create('comments', function($table)
    {
      #AI, PK
      $table->increments('id');
      #Created at, updated at
      $table->timestamps();
      #Comment
      $table->text('comment');//Large amounts of text.
      #FK to Destination
      $table->integer('destination_id')->unsigned();
      $table->integer('user_id')->unsigned();
      
      #Define Foreign Keys
      $table->foreign('destination_id')->references('id')->on('destinations');
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
    Schema::drop('comments');
	}

}
