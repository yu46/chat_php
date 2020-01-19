<div class="message">
  <div class="message__upper">
    <p class="message__upper__user">
      {{$message->user->name}}
    </p>
    <p class="message__upper__date">
      {{$message->created_at}}
    </p>
  </div>
  <p class="message__text">
    {{$message->body}}
  </p>
</div>