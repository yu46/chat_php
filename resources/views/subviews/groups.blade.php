<div class="group">
  <a href="{{url('groups/'.$group->id.'/messages')}}">
    <div class="group__title">{{$group->name}}</div>
    <div class="group__message">
      @if ($group->messages()->exists())
      {{$group->messages()->latest()->first()->body}}
      @else
      まだメッセージはありません。
      @endif
    </div>
  </a>
</div>