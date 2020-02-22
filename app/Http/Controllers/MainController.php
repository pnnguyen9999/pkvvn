<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class MainController extends Controller
{
    public function search(Request $request){
      $q = $request->get('query');
      $articles = Article::with(['getState' => function($query){
        $query->where('state','uploaded');
      }])->where('title','like','%'.$q.'%')->orderBy('created_at','desc')->simplePaginate(6);

      return view('searching_found')->with('articles',$articles)->with('query',$q);
    }
}
