{{-- @extends('messages.index')
@section('main')
@each ('subviews.message', $messages, 'message', 'subviews.empty')
@endsection --}}
@extends('layouts.base')
@section('main')
<div class="chat-main">
  <div class="chat-header">
    <h2 class="chat-header__title">グループ名 ヘッダータイトル</h2>
    <ul class="chat-header__member">
      Members:
      <li>{{$user->name}}</li>
    </ul>
  </div>
  <div class="messages">
    <div class="message">
      <div class="message__upper">
        <p class="message__upper__user">
          taro
        </p>
        <p class="message__upper__date">2020/1/10</p>
      </div>
      <p class="message__text">hello!</p>
    </div>
    <div class="message">
      <div class="message__upper">
        <p class="message__upper__user">
          taro
        </p>
        <p class="message__upper__date">2020/1/10</p>
      </div>
      <p class="message__text">hello!</p>
    </div>
    @each ('subviews.message', $messages, 'message', 'subviews.empty')
  </div>

  <div class="form">
    <form action="messages" method="POST">
      @csrf
      <div class="input-box">
        <input class="input-box__text" type="text" name="body">
        <label class="input-box__image" for="message-image">
          <i class="fa fa-image"></i>
          <input class="input-box__image__file" type="file" id="message-image" name="image">
        </label>
      </div>
      <input class="submit-btn" type="submit" value="Send">
    </form>
  </div>
</div>
@endsection