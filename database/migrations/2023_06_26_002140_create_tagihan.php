<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagihan extends Migration
{
 /**
  * Run the migrations.
  *
  * @return void
  */
 public function up()
 {
  Schema::create('tagihans', function (Blueprint $table) {
   $table->id();
   $table->string("nop")->nullable();
   $table->string("pokok")->nullable();
   $table->string("denda")->nullable();
   $table->string("jumlah_bayar")->nullable();
   $table->string("tanggal_bayar")->nullable();
   $table->string("tanggal_tempo")->nullable();
   $table->string("status")->nullable();
   $table->timestamps();
  });
 }

 /**
  * Reverse the migrations.
  *
  * @return void
  */
 public function down()
 {
  Schema::dropIfExists('tagihans');
 }
}
