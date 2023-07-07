<?php

namespace App\Imports;

use App\Models\Ketetapan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KetetapansImport implements ToModel, WithHeadingRow
{
 /**
  * @param array $row
  *
  * @return \Illuminate\Database\Eloquent\Model|null
  */
 public function model(array $row)
 {

  $nop              = isset($row['nop']) ? $row['nop'] : '';
  $tahun_pajak      = isset($row['tahun_pajak']) ? $row['tahun_pajak'] : '';
  $nama_wp          = isset($row['nama_wp']) ? $row['nama_wp'] : '';
  $alamat_wp        = isset($row['alamat_wp']) ? $row['alamat_wp'] : '';
  $alamat_op        = isset($row['alamat_op']) ? $row['alamat_op'] : '';
  $luas_bumi        = isset($row['luas_bumi']) ? $row['luas_bumi'] : '';
  $luas_bangunan    = isset($row['luas_bangunan']) ? $row['luas_bangunan'] : '';
  $njop_bumi        = isset($row['njop_bumi']) ? $row['njop_bumi'] : '';
  $njop_bangunan    = isset($row['njop_bangunan']) ? $row['njop_bangunan'] : '';
  $njop_sppt        = isset($row['njop_sppt']) ? $row['njop_sppt'] : '';
  $jumlah_ketetapan = isset($row['total_pajak']) ? $row['total_pajak'] : '';
  $tanggal_bayar    = isset($row['tanggal_bayar']) ? $row['tanggal_bayar'] : null;

  return new Ketetapan([
   // "nop" => $row['nop'],
   // "nama" => $row['nama'],
   // "alamat_objek" => $row['alamat_objek'],
   // "alamat" => $row['alamat'],
   // "total" => $row['total'],
   // "tanggal_bayar" => $row['tanggal_bayar'],

   "nop"              => $nop,
   "tahun_pajak"      => $tahun_pajak,
   "nama_wp"          => $nama_wp,
   "alamat_wp"        => $alamat_wp,
   "alamat_op"        => $alamat_op,
   "luas_bumi"        => $luas_bumi,
   "luas_bangunan"    => $luas_bangunan,
   "njop_bumi"        => $njop_bumi,
   "njop_bangunan"    => $njop_bangunan,
   "njop_sppt"        => $njop_sppt,
   "jumlah_ketetapan" => $jumlah_ketetapan,
   "tanggal_bayar"    => $tanggal_bayar,
   // 'name' => $row['name'],
   // 'email'=>$row['email'],
   // 'password'=>Hash::make($row['password']),
  ]);
 }

 public function headingRow(): int
 {
  return 10;
 }
}
