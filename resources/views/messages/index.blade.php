{{-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
<title>Document</title>
</head>

<body>
  <div class="chat-main">
    <div class="chat-header">
      <h2 class="chat-header__title">{{$group->name}}aaa</h2>
      <ul class="chat-header__member">
        Members:
        <li>taro</li>
      </ul>
    </div>
    <div class="messages">
      <div class="message">
        <div class="message__upper">
          <p class="message__upper__user">
            Mr.taro
          </p>
          <p class="message__upper__date">2020/1/10</p>
        </div>
        <p class="message__text">hello!</p>
      </div>
      <div class="message">
        <div class="message__upper">
          <p class="message__upper__user">
            taro
          </p>
          <p class="message__upper__date">2020/1/10</p>
        </div>
        <p class="message__text">hello!</p>
      </div>
      @section('main')
      @show
    </div>

    <div class="form">
      <form action="messages" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-box">
          <input class="input-box__text" type="text" name="body">
          <label class="input-box__image" for="message-image">
            <i class="fa fa-image"></i>
            <input class="input-box__image__file" type="file" id="message-image" name="image">
          </label>
        </div>
        <input class="submit-btn" type="submit" value="Send">
      </form>
    </div>
  </div>
</body>

</html> --}}