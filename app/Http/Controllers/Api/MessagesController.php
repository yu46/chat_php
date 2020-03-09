<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Group;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
  public function index(Request $req, $groupId)
  { 
    $group = Group::with('messages')->find($groupId);
    $lastMessageId = $req->id;
    $messages = $group->messages()->where('id', '>' , $lastMessageId)->get();
    foreach ($messages as $message){
      $message['user_name'] = $message->user->name;
    }
    $json = [
      'messages' => $messages
    ];
    return response()->json($json);
  }
}
