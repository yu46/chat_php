<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Group;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class MessagesController extends Controller
{

  public function index($groupId)
  {
    $last = Message::latest()->first();
    $group = Group::with('messages')->find($groupId);
    $data = [
      'messages' => $group->messages,
      'users' => $group->users()->whereNotIn('users.id', [Auth::id()])->get(),
      'group' => $group
    ];
    return view('messages.index', $data);
  }

  public function store(Request $req, $groupId)
  {
    $validator = Validator::make($req->all(), [
      'image' => 'file|image|mimes:jpeg,png|required_without:body'
    ]);
    
    if ($validator->fails()){
      return back()
      ->with('alert', 'メッセージ送信に失敗しました。');
    }
    
      $user = Auth::user();
      $message = new Message();

      $message->fill([
        'body' => $req->body,
        'user_id' => Auth::id(),
        'group_id' => $groupId,
        ]);
      if ($req->file('image')){
        //画像のアップロード通常
        // $file = $req->file('image');
        // $filename = $file->hashName();
        // $image = Image::make($file)
        // ->resize(null, 200, function($constraint){
        //   $constraint->aspectRatio();
        // })
        // ->save(public_path().'/storage/images/'.$filename);
        // $message->image = $filename;
        

        //base64エンコード herokuでの画像保存対策
        $file = $req->file('image');
        $image = Image::make($file)
        ->resize(null, 200, function($constraint){
          $constraint->aspectRatio();
        })->stream('jpg',90);
        
        $image_base64 = base64_encode($image);
        $message->image = $image_base64;

      }
    
      $message->save();
      $json = [
        'message' => $message,
        'user' => Auth::user()
      ];
      return response()->json($json);
  }

}
