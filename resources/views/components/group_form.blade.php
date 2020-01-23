<form action="{{$url}}" method="POST" class="new-group">
  @csrf
  {{$method}}
  {{-- @if (url()->current() != 'http://localhost:8000/groups/create')
  @method('PATCH')
  @endif --}}
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
      <input type="checkbox" id="group-member" name="user_ids[]" value="{{Auth::id()}}"
        checked="checked">{{Auth::user()->name}}
      @foreach ($users as $user)
      <input type="checkbox" name="user_ids[]" value="{{ $user->id }}"
        {{ old("user_ids") === "1"? 'checked="checked"' : '' }}>{{ $user->name }}
      @endforeach
    </div>
  </div>
  <div class="chat-group-form__field">
    <div class="chat-group-form__field--left">
      <label for="group-member" class="chat-group-form__label">チャットメンバー</label>
    </div>
    <div class="chat-group-form__field--right">

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