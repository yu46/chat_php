<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
  public function index(){
    $data = [
      'messages' => Message::all(),
      'user' => Auth::user()
    ];
    return view('view.chat', $data);
  }

  public function create(){
    return view('messages.create');
  }

  public function store(Request $req){
    $user = Auth::user();
    $message = new Message();

    // $message = Message::create([
    //   'body' => $req->body,
    //   'image' => $req->image,
    //   'user_id' => 1
    //   ]);

    
    $message->body = $req->body;
    $message->image = $req->image;
    $message->user_id = $user->id;
    $message->group_id = 1;
    $message->save();
    // $message->fill($req->except('_token'))->save();
    return redirect('messages');
  }
}
