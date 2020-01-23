<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Group;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{

  public function index($groupId)
  {
    $last = Message::latest()->first();
    // dd($last);
    $group = Group::with('messages')->find($groupId);
    $data = [
      'messages' => $group->messages,
      'users' => $group->users()->whereNotIn('users.id', [Auth::id()])->get(),
      'group' => $group
    ];
    return view('view.chat', $data);
  }

  // public function create()
  // {
  //   return view('messages.create');
  // }

  public function store(Request $req, $groupId){
    $user = Auth::user();
    $message = new Message();

    // $message = Message::create([
    //   'body' => $req->body,
    //   'image' => $req->image,
    //   'user_id' => 1
    //   ]);

    // $req->image->storeAs('public/images', Auth::id().'.jpg');
    if ($req->file('image')){
      $filename = $req->file('image')->store('public/images');
    
    $message->image = basename($filename);
    }
    // $filename = $req->file('image')->getClientOriginalName();
    
    $message->body = $req->body;
    
    $message->user_id = $user->id;
    $message->group_id = $groupId;
    $message->save();
    // $message->fill($req->except('_token'))->save();
    return back();
    // return redirect('messages');
  }
}
