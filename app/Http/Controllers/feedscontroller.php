<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class feedscontroller extends Controller
{
    public function index(){
      $lastest_article = Article::with(['getState' => function($query){
        $query->where('state','uploaded');
      }])->orderBy('created_at','desc')->first();

      $articles = Article::with(['getState' => function($query){
        $query->where('state','uploaded');
      }])->orderBy('created_at','desc')->take(6)->limit(3)->get();

      return view('feeds')->with('lastest_article',$lastest_article)->with('articles',$articles);
    }
}