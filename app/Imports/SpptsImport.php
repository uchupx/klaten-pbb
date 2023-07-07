<?php

namespace App\Imports;

use App\Models\Sppt;
use Maatwebsite\Excel\Concerns\ToModel;

class SpptsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
      return new Sppt([
        "nop" => $row['nop'],
        "nama" => $row['nama'],
        "alamat_objek" => $row['alamat_objek'],
        "alamat" => $row['alamat'],
        "total" => $row['total'],
        "tanggal_bayar" => $row['tanggal_bayar'],
        // 'name' => $row['name'],
        // 'email'=>$row['email'],
        // 'password'=>Hash::make($row['password']),
      ]);
    }
}
