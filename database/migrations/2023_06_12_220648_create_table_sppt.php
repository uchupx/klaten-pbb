<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSppt extends Migration
{
 /**
  * Run the migrations.
  *
  * @return void
  */
 public function up()
 {
  Schema::create('sppts', function (Blueprint $table) {
   $table->id();
   // $table->text("nop");
   // $table->text("nama");
   // $table->text("alamat_objek");
   // $table->text("alamat");
   // $table->unsignedInteger("total");
   // $table->dateTime("tanggal_bayar");
   $table->string("nop")->nullable();
   $table->string("nama_pemilik")->nullable();
   $table->string("kode_wilayah")->nullable();
   $table->string("blok")->nullable();
   $table->string("no_urut")->nullable();
   $table->string("jenis_op")->nullable();
   $table->string("tahun")->nullable();
   $table->string("ketetapan")->nullable();
   $table->string("denda")->nullable();
   $table->string("jumlah_dibayar")->nullable();
   $table->string("jumlah_bayar")->nullable();
   $table->string("kode_bayar")->nullable();
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
  Schema::dropIfExists('sppts');
 }
}
