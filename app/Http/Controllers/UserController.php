<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function edit($id){
      return view('user.edit',[
        'user' => User::find($id)
      ] );
    }

    public function update(Request $req, $id){
      $user = User::find($id);
      $user->fill($req->except('_token', '_method'))->save();
      return redirect('groups');
    }
}
