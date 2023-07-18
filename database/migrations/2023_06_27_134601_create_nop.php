<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNop extends Migration
{
 /**
  * Run the migrations.
  *
  * @return void
  */
 public function up()
 {
  Schema::create('nops', function (Blueprint $table) {
   $table->id();
   $table->string("nop")->nullable();
   $table->string("nama_wp")->nullable();
   $table->string("alamat_wp")->nullable();
   $table->string("rt_rw")->nullable();
   $table->string("blok")->nullable();
   $table->string("luas_bumi")->nullable();
   $table->string("luas_bangunan")->nullable();
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
  Schema::dropIfExists('nops');
 }
}
