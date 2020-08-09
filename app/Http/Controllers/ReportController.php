<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
  public function show($component, $build_id)
  {
    $files = preg_grep('/^([^.])/', scandir("../storage/app/data/$component/$build_id/"));

    return view('report.list', ["files" => $files]);
  }

  public function get($component, $build_id, $file)
  {
    return Storage::get("data/$component/$build_id/$file", "local");
  } 


}
