<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "article";

    public function subject(){
      return $this->belongsTo('App\Subject');
    }

    public function getState(){
      return $this->hasOne('App\ArticleState');
    }

    public function user(){
      return $this->belongsTo('App\User');
    }

    public function tags(){
      return $this->hasMany('App\ArticleTag');
    }

    public function comments(){
      return $this->hasMany("App\Comment")->orderBy('created_at','asc');
    }
}
