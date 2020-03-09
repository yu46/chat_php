@extends('layouts.base')
@section('main')
<div class="chat-main">
  <div class="chat-header">
    <div class="chat-header__left-box">
      <h2 class="chat-header__left-box__title">{{$group->name}}</h2>
      <ul class="chat-header__left-box__member">
        Members:
        <li>{{Auth::user()->name}}</li>
        @foreach ($users as $user)
        <li>{{$user->name}}</li>
        @endforeach
      </ul>
    </div>
    <div class="chat-header__right-box">
      <div class="chat-header__right-box__back-btn">
        <a href="{{url('groups')}}">
          <i class="fas fa-arrow-left"></i>
        </a>
      </div>
      <div class="chat-header__right-box__edit-btn">
        <a href="{{url('groups/'.$group->id.'/edit')}}">Edit</a>
      </div>
    </div>
  </div>
  <div class="messages">
    @each ('subviews.messages', $messages, 'message')
  </div>

  <div class="form">
    <form action="messages" method="POST" enctype="multipart/form-data" id="new_message">
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