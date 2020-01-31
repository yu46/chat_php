@extends('layouts.base')
@section('main')
<div id="accoutn-page" class="account-page">
  <div class="account-page__inner">
    <div class="account-page__inner--left account-page__header">
      <h2>Log in</h2>
      <h5>登録しているユーザーでログイン</h5>
      <a href="" class="btn">Sign up</a>
    </div>
    <div class="account-page__inner--right user-form">
      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="field">
          <div class="field-label">
            <label for="email">Email</label>
          </div>
          <div class="field-input">
            <input type="text" name="email" id="email" value="{{ old('email')}}" autofocus>
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
            <input type="password" id="password" name="password">
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