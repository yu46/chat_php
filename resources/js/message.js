$(function() {
  function buildHTML(data) {
    const image = data.message.image ? data.message.image : "";
    const body = data.message.body ? data.message.body : "";
    const html = `<div class="message" data-message-id="${data.message.id}">
          <div class="message__upper">
            <p class="message__upper__user">
              ${data.user.name}
            </p>
            <p class="message__upper__date">
              ${data.message.created_at}
            </p>
          </div>
          <div class="message__bottom">
            <p class="message__bottom__text">
              ${body}
            </p>
            <img src="/storage/images/${image}" >
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
        const html = buildHTML(data);
        const messagesClass = $(".messages");
        messagesClass.append(html);
        $("form")[0].reset();
        console.log(data.message, data.message.image);
        const position = $(".messages")[0].scrollHeight;
        $(".messages").animate({ scrollTop: position }, "slow", "swing");
      })
      .fail(function() {
        alert("error");
      })
      .always(function() {
        $(".submit__btn").attr("disabled", false);
      });
    // e.supperPropagation();
  });

  // let reloadMessages = function() {
  //   let last_message_id = $(".message")[0]
  //     ? $(".message:last").data("message-id")
  //     : 0;
  //   $.ajax({
  //     url: "api/messages",
  //     type: "get",
  //     dataType: "json",
  //     data: { id: last_message_id }
  //   })
  //     .done(function(messages) {
  //       let insertHTML = "";
  //       messages.forEach(function(message) {
  //         insertHTML = buildHTML(message);
  //         $(".chat__messages").append(insertHTML);
  //         $(".chat__messages").animate(
  //           { scrollupper: $(".chat__messages")[0].scrollHeight },
  //           "slow",
  //           "swing"
  //         );
  //       });
  //     })
  //     .fail(function() {
  //       alert("更新に失敗しました。");
  //     });
  // };
  // if (window.location.href.match(/\groups\/[0-9]+\/messages/)) {
  //   setInterval(reloadMessages, 3000);
  // };
});
