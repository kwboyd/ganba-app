<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitialVocabsTable extends Migration
{
  public function up()
    {
      // creates table
        Schema::create('vocabs', function(Blueprint $table) {
          $table->increments('id');
          $table->string('word')->default('')->nullable();
          $table->string('pronunciation')->default('')->nullable();
          $table->string('meaning')->default('')->nullable();
          $table->string('sentence')->default('')->nullable();
          $table->timestamps();
        });
    }

 public function down()
    {
      // removes table if it exists
        Schema::dropIfExists('vocabs');
    }
}
