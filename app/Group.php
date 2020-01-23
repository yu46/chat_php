<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function messages()
    {
      return $this->hasMany('App\Message');
    }

    public function users()
    {
      return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function showLastMessage()
    {
      $lastMessage = $this->messages()->latest()->first();
      if (isset($lastMessage)){
        return isset($lastMessage->body) ? $lastMessage->body : '画像が投稿されています';
      }else {
        return 'まだメッセージはありません';
      }
      return $lastMessage;
    }

    protected $fillable = [
      'name'
    ];
}
