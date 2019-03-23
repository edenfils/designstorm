<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inspiration;

class InspirationController extends Controller
{
  public function create(Request $request, $image_info) {
    $saveData = [
      "img_info" => $image_info,
      "image_url" => $request->image_url,
      "project_id" => 1
    ];

    $inspiration = Inspiration::create($saveData);

    return back();
  }

  public function destroy($image_info) {
    $inspiration = Inspiration::where('img_info', $image_info)->delete();

    return back();
  }
}
