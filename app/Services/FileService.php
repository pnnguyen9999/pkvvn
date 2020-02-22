<?php
namespace App\Http\Services;

use App\Image;
use URL;

class FileService{

  public static function upload_image($file){
    $imageName = $file->getClientOriginalName();
    $imagePath = URL::asset('sources/images/private/'.$imageName);
    $file->move('sources/images/private/',$imageName);

    $image = new Image;
    $image->image_path = $imagePath;
    $image->save();

    return $image;
  }

  public static function upload_file($file){

  }
}
