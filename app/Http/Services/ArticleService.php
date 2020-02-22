<?php
namespace App\Http\Services;

use App\Article;
use App\ArticleState;
use App\ArticleTag;
use App\DeletedArticle;
use Auth;
use App\Http\Services\TagService;

class ArticleService{

    public static function create($request){
      try{
        $article = new Article;
        $article->title = $request->title;
        $article->cover_url = $request->cover;
        $article->subject_id = $request->subject;
        $article->content = $request->content;
        $article->user_id = Auth::user()->id;
        $article->save();

        $article_state = new ArticleState;
        $article_state->article_id = $article->id;
        $article_state->state = $request->submit;
        $article_state->save();

        $tagIDs = TagService::addIfNotExist($request->tag);

        foreach($tagIDs as $tagid){
          TagService::add_article_tag($tagid,$article->id);
        }
      }catch(Exception $e){
        return -1;
      }

      return 0;
    }

    public static function update($request){
      $article = Article::find($request->article_id);

      if(!$article){
        return -1;
      }

      $article->title = $request->title;
      $article->cover_url = $request->cover;
      $article->subject_id = $request->subject;
      $article->content = $request->content;
      $article->user_id = Auth::user()->id;
      $article->save();

      $article->getState()->update([
        'state' => $request->submit
      ]);

      $tagIDs = TagService::addIfNotExist($request->tag);
      TagService::update_article_tag($tagIDs,$article->id);

    }

    public static function getAllArticleOfUser(){
      return Article::where('user_id',Auth::user()->id)->get();
    }

    public static function deleteByID($article_id){
      $article_state = ArticleState::where('article_id',$article_id)->first();
      if($article_state) $article_state->delete();

      $article_tags = ArticleTag::where('article_id',$article_id)->get();
      foreach($article_tags as $article_tag){
        $article_tag->delete();
      }

      $article = Article::find($article_id);
      if($article) $article->delete();
    }

    public static function getAdminDeletedInfo($article_id){
      $article = DeletedArticle::where('article_id',$article_id)->first();
      return $article->reason;
    }

    public static function approveArticleByID($article_id){
      $article_state = ArticleState::where('article_id',$article_id)->first();
      if($article_state){
        $article_state->state = "uploaded";
        $article_state->save();
      }
    }

    public static function getArticleByID($article_id){
      $article = Article::find($article_id);
      $subject_name = $article->subject->name;
      $article->subject = $subject_name;
      return $article;
    }

    public static function adminDeleteArticleByID($article_id,$reason){
      $article_state = ArticleState::where('article_id',$article_id)->first();

      if($article_state){
        $article_state->state = "delete";
        $article_state->save();
      }

      $delete_article = new DeletedArticle;
      $delete_article->article_id = $article_id;
      $delete_article->reason = $reason;
      $delete_article->save();

      return 0;
    }
}
