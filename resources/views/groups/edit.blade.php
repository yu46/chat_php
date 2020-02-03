@extends('layouts.base')
@section('main')
<div class="chat-group-form">
  <h1>チャットグループ編集</h1>
  @component('components.group_form', [
  'url' => $url,
  'users' => $users,
  'group' => $group,
  'groupUsersIds' => $groupUsersIds
  ])
  @slot('method')
  @method('PATCH')
  @endslot
  @endcomponent
</div>
@endsection