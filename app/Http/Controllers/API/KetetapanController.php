<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ketetapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class KetetapanController extends Controller
{
 //
 public function index(Request $request)
 {
  $data = Ketetapan::paginate();

  return Response::json($data, 200);
 }
}
