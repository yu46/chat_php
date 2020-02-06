<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Group;
use App\User;
use Validator;

class GroupsController extends Controller
{
    public function index()
    {
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
      $req->validate([
        'name' => 'required|unique:groups,name'
      ]);
      $group = new Group();
      $group->fill($req->except('_token'))
      ->save();
      $group->users()->attach($req->user_ids);
      return redirect('groups')
      ->with('notice', 'グループを作成しました');
    }

    public function edit($id)
    { 
      $group = Group::find($id);
      $groupUsersIds = $group->users()->pluck('users.id')->toArray();
      return view('groups.edit', [
        'url' => url('groups/'.$group->id.'edit'),
        'users' => User::whereNotIn('id', [Auth::id()])->get(),
        'group' => $group,
        'groupUsersIds' => $groupUsersIds
      ]);
    }

    public function update(Request $req, $id)
    {
      
      $validator = Validator::make($req->all(), [
        'name' => 'required|max:6'
      ]);
      if ($validator->fails()){
        return back()
        ->withErrors($validator)
        ->withInput();
      }

      $group = Group::find($id);
      $group->fill($req->except('_token', '_method'));
      $group->save();
      $group->users()->sync($req->user_ids);
      return redirect()->action('MessagesController@index', ['group_id' => $group->id])->with('notice', 'グループを編集しました');
    }

}
