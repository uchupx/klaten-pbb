<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Imports\KetetapansImport;
use App\Models\Nop;
use App\Models\Sppt;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;

class SpptController extends Controller
{
 //
 public function index(Request $request)
 {
  $data = Sppt::with('nop')->paginate();

  return Response::json($data, 200);
 }

 public function import(Request $request)
 {
  return;
 }

 public function importKetetapan(Request $request)
 {
  $this->validate($request, [
   'file' => 'required',
  ]); //123123123

  $file = $request->file('file');

  $nama_file = rand() . $file->getClientOriginalName();

  $file->move('ketetapan', $nama_file);

  Excel::import(new KetetapansImport, public_path('/ketetapan/' . $nama_file));

  return Response::json([
   "redirect" => "/web/ketetapan/list",
  ], 201);
 }

 public function post(Request $request)
 {
  $this->validate($request, [
   'nop'            => 'required',
   'jenis_op'       => 'required',
   'tahun'          => 'required',
   'jumlah_dibayar' => 'required',
   'kode_bayar'     => 'required',
   'kode_wilayah'   => 'required',
   'denda'          => 'required',
  ]);

  $nop = Nop::where('nop', $request->get('nop'))->first();

  if (!$nop) {
    return Response::json("data no tidak di temukan", 400);
  }

  $data      = new Sppt();
  $data->nop = $request->get('nop');
  // $data->no_urut        = $request->get('no_urut');
  $data->jenis_op       = $request->get('jenis_op');
  $data->tahun          = $request->get('tahun');
  $data->jumlah_dibayar = $request->get('jumlah_dibayar');
  $data->jumlah_bayar   = $request->get('jumlah_bayar');
  $data->kode_bayar     = $request->get('kode_bayar');
  $data->kode_wilayah   = $request->get('kode_wilayah');
  $data->denda          = $request->get('denda');
  $data->created_at     = Carbon::now();
  $data->saveOrFail();

  return Response::json("OK", 200);
 }

 public function put(Request $request, string $id)
 {
  $data = Sppt::where('id', $id)->first();

  $data->nop            = $request->get('nop');
  $data->no_urut        = $request->get('no_urut');
  $data->jenis_op       = $request->get('jenis_op');
  $data->tahun          = $request->get('tahun');
  $data->jumlah_dibayar = $request->get('jumlah_dibayar');
  $data->jumlah_bayar   = $request->get('jumlah_bayar');
  $data->kode_bayar     = $request->get('kode_bayar');
  $data->kode_wilayah   = $request->get('kode_wilayah');
  $data->denda          = $request->get('denda');

  $data->updated_at = Carbon::now();
  $data->saveOrFail();

  return Response::json("OK", 200);
 }

 public function delete(Request $request, string $id)
 {
  $data = Sppt::where('id', $id)->first();
  $data->delete();

  return Response::json("OK", 200);
 }

 public function findByid(string $id)
 {
  $data = Sppt::where('nop', $id)->first();
  return Response::json($data, 200);
 }
}
