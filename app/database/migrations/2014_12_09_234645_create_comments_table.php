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
      $table->text('comment');
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
