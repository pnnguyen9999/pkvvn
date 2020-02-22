<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Article;
use App\ArticleState;
use Auth;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
      return view('userpage.user_dashboard');
    }

    public function show_creating_article(){
      return view('userpage.user_creating_article');
    }

    public function show_editing_article($article_id){
      $article = Article::find($article_id);
      if(!$article){
        return view('userpage.page_404');
      }

      return view('userpage.user_updating_article')->with('article',$article);
    }

}
