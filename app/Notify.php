<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    protected $table = "notify";

    public function user(){
      return $this->belongsTo('App\User');
    }
}
