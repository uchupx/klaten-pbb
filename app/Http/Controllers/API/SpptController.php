<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Imports\KetetapansImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;

class SpptController extends Controller
{
 //
 public function index(Request $request)
 {
  return;
 }

 public function import(Request $request)
 {
  return;
 }

 public function importKetetapan(Request $request)
 {
  $this->validate($request, [
   'file' => 'required',
  ]);

  $file = $request->file('file');

  $nama_file = rand() . $file->getClientOriginalName();

  $file->move('ketetapan', $nama_file);

  Excel::import(new KetetapansImport, public_path('/ketetapan/' . $nama_file));

  return Response::json([
   "redirect" => "/web/ketetapan/list",
  ], 201);
 }
}
