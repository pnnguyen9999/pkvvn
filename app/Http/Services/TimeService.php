<?php
namespace App\Http\Services;
use DateTime;

class TimeService{
  public static function timeAsString($time){
    $now = new DateTime('now');
    $created_at = new DateTime($time);
    $diff = $created_at->diff($now);

    $timeleft = "";

    $h = $diff->format('%h');
    $m = $diff->format('%i');

    if($h){
      $timeleft = $timeleft.sprintf(ngettext('%d hour', '%d hours', $h), $h) . ' ';
    }else{
      if($m){
        $timeleft = $timeleft.sprintf(ngettext('%d minute', '%d minutes', $m), $m) . ' ';
      }
    }

    if($timeleft == ""){
      $timeleft = "1 minute";
    }

    $timeleft = $timeleft." ago";

    return $timeleft;
  }
}
