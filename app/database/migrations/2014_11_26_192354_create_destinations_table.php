<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDestinationsTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('destinations', function($table)
      {
        #AI, PK
        $table->increments('id');
          
        #Created at, updated at
        $table->timestamps();
          
        $table->string('name', 128);
        $table->string('description');
        $table->string('map', 128);
        $table->string('link');
      });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('destinations');
  }

}
