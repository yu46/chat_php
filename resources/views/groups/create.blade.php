@extends('layouts.base')
@section('main')
<div class="chat-group-form">
  <h1>新規チャットグループ</h1>
  @component('components.group_form', [
  'url' => $url,
  'users' => $users
  ])
  @slot('method')
  @endslot
  @endcomponent
</div>
@endsection