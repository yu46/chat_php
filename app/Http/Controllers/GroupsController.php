<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Group;
use App\User;

class GroupsController extends Controller
{
    public function index(){
      // $user = Auth::user();
      // $group = $user->groups()->first();
        return view('groups.index',[
          'user' => Auth::user()
        ]);
    }

    public function create()
    {  
      return view('groups.create', [
        'url' => url('groups'),
        'users' => User::whereNotIn('id', [Auth::id()])->get()
        ]);
    }

    public function store(Request $req)
    {
      $id = Auth::id();
      $group = new Group();
      $group->fill($req->except('_token'))->save();
      $group->users()->attach($req->user_ids);
      return redirect('groups');
    }

    public function edit($id)
    { 
      $group = Group::find($id);
      return view('groups.edit', [
        'url' => url('groups/'.$group->id.'edit'),
        'users' => User::all(),
        'group' => $group
      ]);
    }

    public function update(Request $req, $id)
    {
      $group = Group::find($id);
      $group->fill($req->except('_token', '_method'));
      $group->save();
      return redirect()->action('MessagesController@index', ['group_id' => 1]);
    }


}
