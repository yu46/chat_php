@extends('layouts.base')
@section('main')
<div class="account-page">
  <div class="account-page__inner">
    <div class="account-page__inner--left account-page__header">
      <h2>Edit Account</h2>
      <h5>アカウントの編集</h5>
      <a class="btn" href="{{route('logout')}}">ログアウト</a>
      <a href="{{url('groups')}}" class="btn">トップページに戻る</a>
    </div>
    <div class="account-page__inner--right">
      <form action="{{url('user/'.$user->id)}}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="field">
          <div class="field-label">
            <label for="user-name"></label>
          </div>
          <div class="field-input">
            <input type="text" name="name" id="user-name" value="{{$user->name}}">
          </div>
        </div>
        <div class="field">
          <div class="field-label">
            <label for="user-mail"></label>
          </div>
          <div class="field-input">
            <input type="email" naem="email" id="user-email" value="{{$user->email}}">
          </div>
        </div>
        <div class="actions">
          <input class="btn" type="submit" value="Update">
        </div>
      </form>
    </div>
  </div>
</div>
@endsection