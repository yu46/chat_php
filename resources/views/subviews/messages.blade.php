<div class="message">
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

    @if ($message->image)
    <img src="{{ asset('storage/images/' . $message->image) }}" />
    @endif
  </div>

</div>