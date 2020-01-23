<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
  <title>Document</title>
</head>

<body>
  <div class="groups">
    <div class="groups__header">
      <div class="groups__header--left">
        {{$user->name}}
      </div>
      <div class="groups__header--right">
        <a href="{{url('groups/create')}}">
          <i class="fas fa-edit"></i>
        </a>
        <a href="{{ url('user/'.$user->id.'/edit')}}">
          <i class="fas fa-cog"></i>
        </a>
      </div>
    </div>
    <div class="groups__main">
      @if ($user->groups)

      @each ('subviews.groups', $user->groups, 'group')

      @endif
    </div>
  </div>
</body>

</html>