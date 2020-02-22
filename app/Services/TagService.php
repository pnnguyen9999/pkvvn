<?php
namespace App\Http\Services;

use App\Tag;
use App\ArticleTag;

class TagService{

    public static function addIfNotExist($tags){
      //this function will update any tag which not exist in tag table
      $tagIDs = array();

      $tags = array_unique($tags);
      foreach($tags as $tag){
        if(!is_numeric($tag)){
          //tag is invalid
          //means this tag is not exist in tag database
          //add it !
          $mytag = new Tag;
          $mytag->name = $tag;
          $mytag->save();
          array_push($tagIDs,$mytag->id);
          continue;
        }
        array_push($tagIDs,$tag);
      }

      return $tagIDs;
    }

    public static function update_article_tag($tagIDs,$article_id){
      foreach($tagIDs as $tagid){
        if(ArticleTag::where('article_id',$article_id)->where('tag_id',$tagid)->count() == 0){
          $article_tag = new ArticleTag;
          $article_tag->article_id = $article_id;
          $article_tag->tag_id = $tagid;
          $article_tag->save();
        }
      }

      $avaiable_tag = ArticleTag::where('article_id',$article_id)->get();

      if(count($avaiable_tag) > 0){
        foreach($avaiable_tag as $article_tag){
          if(in_array($article_tag->tag_id,$tagIDs) == false){
            ArticleTag::destroy($article_tag->id);
          }
        }
      }
    }

    public static function add_article_tag($tag_id,$article_id){
      if(ArticleTag::where('article_id',$article_id)->where('tag_id',$tag_id)->count() == 0){
        $article_tag = new ArticleTag;
        $article_tag->article_id = $article_id;
        $article_tag->tag_id = $tag_id;
        $article_tag->save();
      }
    }
}
