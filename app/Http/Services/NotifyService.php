<?php

namespace App\Http\Services;
use Pusher\Pusher;
use App\Notify;
use App\Http\Services\TimeService;

class NotifyService{
  public static function sendNotify($json_data){
    $notify = new Notify;
    $notify->content_as_json = $json_data;
    $notify->status = "unread";
    $notify->type = "user";
    $notify->user_id = json_decode($json_data,true)["to_user_id"];
    $notify->save();

    $timeleft = "1 minute ago";

    $options = array(
      'cluster' => 'ap1',
      'encrypted' => true
      );

    $edited = json_decode($json_data,true);
    $edited["timeleft"] = $timeleft;

    $edited_json = json_encode($edited);

    $data['json'] = $edited_json;

    $pusher = new Pusher(
      '2deeb67ef6870802b90d',
      '867da51efa47ba62172c',
      '809934',
      $options
    );

    $pusher->trigger('Notify','send-noti',$data);

    return true;
  }
}
