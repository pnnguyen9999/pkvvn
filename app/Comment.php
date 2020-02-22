<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Comment extends Model
{
    protected $table = "comment";

    public function user(){
      return $this->belongsTo(User::class,"user_id");
    }

    public function parent(){
      return $this->belongsTo("App\Comment","parent_id");
    }

    public function article(){
      return $this->belongsTo("App\Article");
    }
}
