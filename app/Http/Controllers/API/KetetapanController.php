<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ketetapan;
use App\Models\Nop;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class KetetapanController extends Controller
{
 //
 public function index(Request $request)
 {
  $data = Ketetapan::with('nop')->paginate();

  return Response::json($data, 200);
 }

 public function post(Request $request)
 {
  $this->validate($request, [
   'nop'           => 'required',
   'njop_bumi'     => 'required',
   'njop_bangunan' => 'required',
   'njop_sppt'     => 'required',
   'total'         => 'required',
  ]);

  $nop = Nop::where('nop', $request->get('nop'))->first();

  if (!$nop) {
    return Response::json("data no tidak di temukan", 400);
  }

  $data                   = new Ketetapan();
  $data->nop              = $request->get("nop");
  $data->tahun_pajak      = $request->get("tahun_pajak");
  $data->njop_bumi        = $request->get("njop_bumi");
  $data->njop_bangunan    = $request->get("njop_bangunan");
  $data->njop_sppt        = $request->get("njop_sppt");
  $data->jumlah_ketetapan = $request->get("total");
  $data->created_at       = Carbon::now();
  $data->saveOrFail();

  return Response::json("OK", 200);
 }

 public function put(Request $request, string $id)
 {
  $data = Ketetapan::where('id', $id)->first();

  $data->nop              = $request->get("nop");
  $data->tahun_pajak      = $request->get("tahun_pajak");
  $data->njop_bumi        = $request->get("njop_bumi");
  $data->njop_bangunan    = $request->get("njop_bangunan");
  $data->njop_sppt        = $request->get("njop_sppt");
  $data->jumlah_ketetapan = $request->get("total");
  $data->updated_at       = Carbon::now();
  $data->saveOrFail();

  return Response::json("OK", 200);
 }

 public function delete(Request $request, string $id)
 {
  $data = Ketetapan::where('id', $id)->first();
  $data->delete();

  return Response::json("OK", 200);
 }

 public function findByid(string $id)
 {
  $data = Ketetapan::where('nop', $id)->first();
  return Response::json($data, 200);
 }
}
