$(function() {
  function buildHTML(message, user) {
    //64エンコード用
    const imageBase64 = message.image
      ? `data:image/png;base64, ${message.image}`
      : "";

    //通常用
    // const image = data.message.image
    //   ? `/storage/images/${data.message.image}`
    //   : "";
    const body = message.body ? message.body : "";
    const html = `<div class="message" data-message-id="${message.id}">
          <div class="message__upper">
            <p class="message__upper__user">
              ${message.user_name}
            </p>
            <p class="message__upper__date">
              ${message.created_at}
            </p>
          </div>
          <div class="message__bottom">
            <p class="message__bottom__text">
              ${body}
            </p>
            <img src="${imageBase64}" >
          </div>
        </div>`;
    return html;
  }
  //formの送信ボタンのクリックで発火する
  //メッセージのスクロール機能
  $("#new_message").on("submit", function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    const url = $(this).attr("action");
    $.ajax({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      },
      url: url,
      type: "POST",
      data: formData,
      dataType: "json",
      processData: false,
      contentType: false
    })
      .done(function(data) {
        const html = buildHTML(data.message, data.user);
        const messagesClass = $(".messages");
        messagesClass.append(html);
        $("form")[0].reset();
        const position = $(".messages")[0].scrollHeight;
        $(".messages").animate({ scrollTop: position }, "slow", "swing");
      })
      .fail(function() {
        alert("error");
      })
      .always(function() {
        $(".submit__btn").attr("disabled", false);
      });
  });

  //メッセージの自動更新機能の定義
  const reloadMessages = function() {
    const last_message_id = $(".message")[0]
      ? $(".message:last").data("message-id")
      : 0;
    $.ajax({
      url: "api/messages",
      type: "get",
      dataType: "json",
      data: { id: last_message_id }
    })
      .done(function(data) {
        let insertHTML = "";
        data.messages.forEach(function(message) {
          insertHTML = buildHTML(message, data.user);
          $(".messages").append(insertHTML);
          $(".messages").animate(
            { scrollTop: $(".messages")[0].scrollHeight },
            "slow",
            "swing"
          );
        });
      })
      .fail(function() {
        alert("更新に失敗しました。");
      });
  };
  if (window.location.href.match(/\groups\/[0-9]+\/messages/)) {
    setInterval(reloadMessages, 5000);
  }
});
