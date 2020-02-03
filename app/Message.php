<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function group()
    {
      return $this->belongsTo('App\Group');
    }

    protected $fillable = [
      'body',
      'image',
      'group_id',
      'user_id'
    ];
}
