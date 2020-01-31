@extends('layouts.base')

@section('main')
<div id="account-page" class="account-page">
  <div class="account-page__inner">
    <div class="account-page__inner--left account-page__header">
      <h2>Create Account</h2>
      <h5>新規アカウントの作成</h5>
      <a href="" class="btn">Log in</a>
    </div>
    <div class="account-page__inner--right user-form">
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="field">
          <div class="field-label">
            <label for="name">Name</label>
          </div>
          <div class="field-input">
            <input type="text" name="name" id="name" value="{{ old('name')}}" autofocus>
          </div>
        </div>
        <div class="field">
          <div class="field-label">
            <label for="email">Email</label>
          </div>
          <div class="field-input">
            <input type="text" name="email" id="email">
          </div>
        </div>
        <div class="field">
          <div class="field-label">
            <label for="password">
              Password
              <i>(英数字８文字以上)</i>
            </label>
          </div>
          <div class="field-input">
            <input type="password" id="password" name="password" autocomplete="off">
          </div>
        </div>
        <div class="field">
          <div class="field-label">
            <label for="password_confirmation">
              Password comfirmation
            </label>
          </div>
          <div class="field-input">
            <input type="password" id="password_confirmation" name="password_confirmation" autocomplete="off">
          </div>
        </div>
        <div class="actions">
          <input type="submit" value="Log in" class="btn">
        </div>
      </form>
    </div>
  </div>
</div>
@endsection