<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKetetapan extends Migration
{
 /**
  * Run the migrations.
  *
  * @return void
  */
 public function up()
 {
  Schema::create('ketetapans', function (Blueprint $table) {
   $table->id();
   //  $table->string("nop");
   //  $table->string("tahun_pajak")->nullable();
   //  $table->string("nama_wp")->nullable();
   //  $table->string("alamat_wp")->nullable();
   //  $table->string("alamat_op")->nullable();
   //  $table->string("luas_bumi")->nullable();
   //  $table->string("luas_bangunan")->nullable();
   //  $table->string("njop_bumi")->nullable();
   //  $table->string("njop_bangunan")->nullable();
   //  $table->string("njop_sppt")->nullable();
   //  $table->string("jumlah_ketetapan")->nullable();
   //  $table->string("tanggal_bayar")->nullable();
   $table->string("nop")->nullable();
   $table->string("tahun_pajak")->nullable();
   $table->string("njop_bumi")->nullable();
   $table->string("njop_bangunan")->nullable();
   $table->string("njop_sppt")->nullable();
   $table->string("jumlah_ketetapan")->nullable();
   $table->string("tanggal_bayar")->nullable();
   $table->string("rt_rw")->nullable();
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
  Schema::dropIfExists('ketetapans');
 }
}
