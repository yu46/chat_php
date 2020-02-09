<div class="message" data-message-id="{{$message->id}}">
  <div class="message__upper">
    <p class="message__upper__user">
      {{$message->user->name}}
    </p>
    <p class="message__upper__date">
      {{$message->created_at}}
    </p>
  </div>
  <div class="message__bottom">
    @if ($message->body)
    <p class="message__bottom__text">
      {{$message->body}}
    </p>
    @endif

    @if (isset($message->image))
    {{-- 通常用 --}}
    {{-- <img src="{{ asset('storage/images/' . $message->image) }}" /> --}}
    {{-- 64エンコード用 --}}
    <img src="data:image/png;base64,{{ $message->image }}">
    @endif
  </div>

</div>