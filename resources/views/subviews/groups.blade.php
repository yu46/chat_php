<div class="group">
  <a href="{{url('groups/'.$group->id.'/messages')}}">
    <div class="group__title">{{$group->name}}</div>
    <div class="group__message">
      {{$group->showLastMessage()}}
    </div>
  </a>
</div>