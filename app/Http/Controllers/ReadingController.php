<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Comment;
use DateTime;
use App\Http\Services\NotifyService;
use App\Article;

class ReadingController extends Controller
{
    public function reading($article_id){
      $article = Article::find($article_id);
      //return view('reading')->with('article',$article);

      $articles = Article::with(['getState' => function($query){
        $query->where('state','uploaded');
      }])->orderBy('created_at','desc')->get();

      return view('reading',['article'=> $article,'articles'=>$articles]);
    }

    public function create_reply_block($comment_id){
      if(Auth::check()){
        return view('component.reply-block')->with("comment_id",$comment_id);
      }

      return "false";
    }

    public function create_comment(Request $request){
      if(Auth::check()){
        $comment_content = $request->comment_content;
        $article_id = $request->article_id;

        $comment = new Comment;
        $comment->user_id = Auth::user()->id;
        $comment->article_id = $article_id;
        $comment->content = $comment_content;
        $comment->save();

        $data = array(
          'user_avatar' => $comment->user->avatar_path,
          'from_user_name' => $comment->user->name,
          'to_user_id' => $comment->article->user->id,
          'title' => $comment->user->name.' commented on your article. Check out !',
          'message' => $comment->content
        );

        $json_data = json_encode($data);

        NotifyService::sendNotify($json_data);

        return view('component.comment-block')->with("comment",$comment);
      }

      return "false";
    }

    public function create_reply(Request $request){
      if(Auth::check()){
        $reply_content = $request->reply_content;
        $article_id = $request->article_id;
        $parent_id = $request->parent_id;
        $user_id = Auth::user()->id;

        $reply = new Comment;
        $reply->user_id = $user_id;
        $reply->article_id = $article_id;
        $reply->parent_id = $parent_id;
        $reply->content = $reply_content;
        $reply->save();

        return view("component.replied-block")->with("reply",$reply);
      }

      return "false";
    }
}
