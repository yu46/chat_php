<form action="{{$url}}" method="POST" class="new-group">
  @csrf
  {{$method}}
  @if ($errors->has('name'))
  <div class="chat-group-form__errors">
    <ul>
      @foreach ($errors->get('name') as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <div class="chat-group-form__field">
    <div class="chat-group-form__field--left">
      <label for="group-name" class="chat-group-form__label">グループ名</label>
    </div>
    <div class="chat-group-form__field--right">
      <input name="name" type="text" id="group-name" class="chat-group-form__input" placeholder="グループ名を入力してください"
        value="{{old('name', isset($group) ? $group->name : '')}}">
    </div>
  </div>
  <div class="chat-group-form__field">
    <div class="chat-group-form__field--left">
      <label for="group-member" class="chat-group-form__label">チャットメンバーを追加</label>
    </div>
    <div class="chat-group-form__field--right">
      @if (isset($users))
      @foreach ($users as $user)
      @if (isset($groupUsersIds))
      {{ Form::checkbox('user_ids[]', $user->id, in_array($user->id, $groupUsersIds), ['id' => 'users_name']) }}
      {{ Form::label('users_name', $user->name)}}
      @else
      {{ Form::checkbox('user_ids[]', $user->id, false, ['id' => 'users_name']) }}
      {{ Form::label('users_name', $user->name)}}
      @endif
      @endforeach
      @endif
    </div>
  </div>
  <div class="chat-group-form__field">
    <div class="chat-group-form__field--left">
      <label for="group-member" class="chat-group-form__label">チャットメンバー</label>
    </div>
    <div class="chat-group-form__field--right">
      <div class="chat-group-users">
        <div class="chat-group-user">
          <input name="user_ids[]" type="hidden" value="{{ Auth::id()}}">
          <p class="chat-group-user__name">
            {{Auth::user()->name}}
          </p>
        </div>
        @if (isset($group->users))
        @foreach ($group->users as $user)
        <div class="chat-group-user">
          <p class="chat-group-user__name">
            {{$user->name}}
          </p>
        </div>
        @endforeach
        @endif
      </div>
    </div>
  </div>
  <div class="chat-group-form__field">
    <div class="chat-group-form__field--left">
    </div>
    <div class="chat-group-form__field--right">
      <input type="submit" class="chat-group-form__action-btn" value="登録する">
    </div>
  </div>
</form>