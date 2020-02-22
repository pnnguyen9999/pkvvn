<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ArticleService;
//use App\Http\Services\PermissionService;
use App\Http\Requests\ArticleRequest;
use App\Article;

class ArticleController extends Controller
{
    public function articles(){
      $articles = Article::with(['getState' => function($query){
        $query->where('state','uploaded');
      }])->orderBy('created_at','desc')->simplePaginate(6);
      return view('article')->with('articles',$articles);
    }

    public function getArticleList(){
      $articles = ArticleService::getAllArticleOfUser();
      return view('userpage.user_created_article')->with('articles',$articles);
    }

    public function create(ArticleRequest $request){
      $err = ArticleService::create($request);

      if($err == -1){
        return view('userpage.user_blank')->with('error','Cannot create article. Something gone wrong !');
      }

      return view('userpage.user_blank')->with('success','Create Article succeed !');
    }

    public function delete(Request $request){
      $article_id = $request->article_id;
      ArticleService::deleteByID($article_id);
      return 0;
    }

    public function getAdminDeletedInfo($article_id){
      $reason = ArticleService::getAdminDeletedInfo($article_id);
      return $reason;
    }

    public function approveArticleByID($article_id){
      ArticleService::approveArticleByID($article_id);
      return 0;
    }

    public function getArticleByID($article_id){
      $article = ArticleService::getArticleByID($article_id);
      return $article;
    }

    public function deleteArticleByID(Request $request){
      $article_id = $request->article_id;
      $reason = $request->reason;
      ArticleService::adminDeleteArticleByID($article_id,$reason);
      return 0;
    }

    public function update(ArticleRequest $request){
      $err = ArticleService::update($request);
      if($err == -1){
        return view('userpage.user_blank')->with('error','This article has been deleted !');
      }
      return view('userpage.user_blank')->with('success','Update Article succeed !');
    }
}
