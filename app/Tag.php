<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class Tag extends Model
{
    protected $table = "tags";

    use Eloquence;

    protected $searchableColumns = ['name'];

    protected $fillable = ['name'];
    const UPDATED_AT = null;

    public function articles(){
    	return $this->hasMany('App\Article');
    }
}
