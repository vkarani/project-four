<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

  /**
   * Run the migrations.
   * Categories table lists the kind of places i.e. hotel, park, e.t.c.
   * @return void
   */
  public function up()
  {
  Schema::create('categories', function($table)
    {
      #AI, PK
      $table->increments('id');
          
      #Created at, updated at
      $table->timestamps();
          
      $table->string('name', 64);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('categories');
  }

}
