<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
  <script src="{{ asset('js/app.js') }}" defer></script>
  <title>chat_php</title>
</head>

<body>

  <div class="notification">
    @if (session('notice'))
    <div class="notification__notice">
      {{session('notice')}}
    </div>
    @elseif (session('alert'))
    <div class="notification__alert">
      {{session('alert')}}
    </div>
    @endif
  </div>

  @section('main')
  @show
</body>

</html>