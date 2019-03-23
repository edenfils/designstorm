<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inspiration;
use App\Project;
use Auth;

class InspirationController extends Controller
{
  public function create(Request $request, $image_info){
    $project = Project::where('user_id', Auth::id())->where('active', 1)->first();

    if($project == null){
      return redirect('account/project/create');
    } else {
      $saveData = [
        "img_info" => $image_info,
        "image_url" => $request->image_url,
        "project_id" => $project->id
      ];
      $inspiration = Inspiration::create($saveData);

      return back();
    }

  }

  public function destroy($image_info) {
    $inspiration = Inspiration::where('img_info', $image_info)->delete();

    return back();
  }
}
