<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function getTagsBySearching(Request $request){
      $term = trim($request->q);
      $term = strtolower($term);

      if(empty($term)){
        return response()->json([]);
      }

      $tags = Tag::search($term)->limit(5)->get();

      $formatted_tags = [];

      foreach($tags as $tag){
        $formatted_tags[] = ['id' => $tag->id,'text' => $tag->name];
      }

      return response()->json($formatted_tags);
    }
}
