<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Eastwest\Json\Exceptions\EncodeDecode;
use Illuminate\Support\Facades\Storage;
use App\LogReport;

class ApiController extends Controller
{
  public function new(Request $request)
  {
    $request->header('Content Type: application/json');

    if (! $request->input('metadata')) {
      return "Missing metadata";
    }


    $metadata = json_decode($request->input('metadata'));

    if (! isset($metadata->build_id) || $metadata->build_id == null) {
      return "Missing metadata: build_id";
    }

    if (! isset($metadata->component) || $metadata->component == null) {
      return "Missing metadata: component";
    }


    if (! $request->hasFile('bundle')) {
      return "No bundle attached";
    }

    if (! $request->file('bundle')->isValid()) {
      return "Invalid bundle";
    }

    if ($request->file('bundle')->extension() != "gz") {
      return "Invalid file type";
    }

    $logReport = new LogReport();
    $logReport->setMetadata($metadata);
    $logReport->setBundle($request->file('bundle'));

    $filePath = sprintf('data/%s/%s/', $logReport->getMetadata()->component, $logReport->getMetadata()->build_id);
    
    shell_exec("rm -rf ../storage/app/$filePath/"); // Delete anything if it's there already.

    $path = $logReport->getBundle()->store(
      $filePath, 
      'local'
    );
    
    return shell_exec("tar -xvzf ../storage/app/" . $path . " -C ../storage/app/$filePath");
  } 
}
