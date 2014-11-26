<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDestinationCategoryTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('destination_category', function($table) {
      # AI, PK
      # none needed
      # General data...
      $table->integer('destination_id')->unsigned();
      $table->integer('category_id')->unsigned();
			
      # Define foreign keys...
      $table->foreign('destination_id')->references('id')->on('destinations');
      $table->foreign('category_id')->references('id')->on('categories');
			
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('destination_category');
  }

}
