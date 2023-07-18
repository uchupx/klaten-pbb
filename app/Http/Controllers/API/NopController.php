<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Nop;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class NopController extends Controller
{
 public function index(Request $request)
 {
  $data = Nop::paginate();

  return Response::json($data, 200);
 }

 public function post(Request $request)
 {
  $this->validate($request, [
   'nop'           => 'required',
   'nama_wp'       => 'required',
   'alamat_wp'     => 'required',
   'luas_bumi'     => 'required',
   'luas_bangunan' => 'required',
  ]);

  $data                = new Nop();
  $data->nop           = $request->get("nop");
  $data->nama_wp       = $request->get("nama_wp");
  $data->alamat_wp     = $request->get("alamat_wp");
  $data->luas_bumi     = $request->get("luas_bumi");
  $data->luas_bangunan = $request->get("luas_bangunan");
  $data->rt_rw         = $request->get("rt_rw") ?: null;
  $data->blok          = $request->get("blok") ?: null;

  $data->created_at = Carbon::now();
  $data->saveOrFail();

  return Response::json("OK", 201);
 }

 public function put(Request $request, string $id)
 {
  $data = Nop::where('id', $id)->first();

  $data->nop           = $request->get("nop");
  $data->nama_wp       = $request->get("nama_wp");
  $data->alamat_wp     = $request->get("alamat_wp");
  $data->luas_bumi     = $request->get("luas_bumi");
  $data->luas_bangunan = $request->get("luas_bangunan");
  $data->rt_rw         = $request->get("rt_rw") ?: null;
  $data->blok          = $request->get("blok") ?: null;
  $data->created_at    = Carbon::now();
  $data->saveOrFail();

  return Response::json("OK", 200);
 }

 public function delete(Request $request, string $id)
 {
  $data = Nop::where('id', $id)->first();
  $data->delete();

  return Response::json("OK", 200);
 }

 public function findByid(string $id)
 {
  $data = Nop::where('nop', $id)->first();
  return Response::json($data, 200);
 }
}
