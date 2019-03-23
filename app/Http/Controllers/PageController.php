<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use App\Project;


// public function __construct()
// {
//     $this->middleware('auth');
// }

class PageController extends Controller
{
    public function index()  {
      $user = Auth::user();
      return view('pages/home', compact('user'));
    }

    public function results(Request $request)  {

      $search = $request->search;
      return redirect('search/'. urlencode($search));

    }


    public function search(Request $request, $keyword)  {

      $client = new Client();

      $search = $keyword;

      $res = $client->request('GET', "https://api.behance.net/v2/projects", [
        "query" => [
        "q"=>$search,
        "client_id"=>  env("BEHANCE_KEY"),
        "field"=> "Web Design"
        ]
      ]);

      $data = $res->getbody();
      $data = json_decode($data);

      $filteredData = $data->projects;

      $inspirationsArray = Project::where('user_id',Auth::id())->where('active', 1)->first();

      $inspirationsArray = $inspirationsArray->inspirations;
      $arrayInfo = [];

      foreach ($inspirationsArray as $image) {
        array_push($arrayInfo, $image->image_info);
      }


      $user = Auth::user();
      return view('pages/results', compact('user', 'filteredData','search','arrayInfo'));
    }
}
