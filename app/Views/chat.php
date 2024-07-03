<?= $this->extend("user/layout/index"); ?>

<?= $this->section("content"); ?>
<?php
// var_dump($chatlist);
// $users = [1, 2, 4]
?>
<script>
  $('#kt_header').remove()
  $('#kt_content').addClass('py-0')
</script>
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<style>
  html,
  body,
  div,
  span,
  applet,
  object,
  iframe,
  h1,
  h2,
  h3,
  h4,
  h5,
  h6,
  p,
  blockquote,
  pre,
  a,
  abbr,
  acronym,
  address,
  big,
  cite,
  code,
  del,
  dfn,
  em,
  img,
  ins,
  kbd,
  q,
  s,
  samp,
  small,
  strike,
  strong,
  sub,
  sup,
  tt,
  var,
  b,
  u,
  i,
  center,
  dl,
  dt,
  dd,
  ol,
  ul,
  li,
  fieldset,
  form,
  label,
  legend,
  table,
  caption,
  tbody,
  tfoot,
  thead,
  tr,
  th,
  td,
  article,
  aside,
  canvas,
  details,
  embed,
  figure,
  figcaption,
  footer,
  header,
  hgroup,
  menu,
  nav,
  output,
  ruby,
  section,
  summary,
  time,
  mark,
  audio,
  video {
    margin: 0;
    padding: 0;
    border: 0;
    font-size: 100%;
    font: inherit;
    vertical-align: baseline;
  }


  /* HTML5 display-role reset for older browsers */

  article,
  aside,
  details,
  figcaption,
  figure,
  footer,
  header,
  hgroup,
  menu,
  nav,
  section {
    display: block;
  }

  body {
    line-height: 1.5;
  }

  ol,
  ul {
    list-style: none;
  }

  blockquote,
  q {
    quotes: none;
  }

  blockquote:before,
  blockquote:after,
  q:before,
  q:after {
    content: '';
    content: none;
  }

  table {
    border-collapse: collapse;
    border-spacing: 0;
  }


  /********************************
 Typography Style
******************************** */

  body {
    margin: 0;
    font-family: 'Open Sans', sans-serif;
    line-height: 1.5;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }

  html {
    min-height: 100%;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }

  h1 {
    font-size: 36px;
  }

  h2 {
    font-size: 30px;
  }

  h3 {
    font-size: 26px;
  }

  h4 {
    font-size: 22px;
  }

  h5 {
    font-size: 18px;
  }

  h6 {
    font-size: 16px;
  }

  p {
    font-size: 15px;
  }

  a {
    text-decoration: none;
    font-size: 15px;
  }

  * {
    margin-bottom: 0;
  }


  /* *******************************
message-area
******************************** */

  .message-area {
    height: 100vh;
    overflow: hidden;
    padding: 30px 0;
    background: #f5f5f5;
  }

  .chat-area {
    position: relative;
    width: 100%;
    background-color: #fff;
    border-radius: 0.3rem;
    height: 90vh;
    overflow: hidden;
    min-height: calc(100% - 1rem);
  }

  .chatlist {
    outline: 0;
    height: 100%;
    overflow: hidden;
    width: 300px;
    float: left;
    padding: 15px;
  }

  .chat-area .modal-content {
    border: none;
    border-radius: 0;
    outline: 0;
    height: 100%;
  }

  .chat-area .modal-dialog-scrollable {
    height: 100% !important;
  }

  .chatbox {
    width: auto;
    overflow: hidden;
    height: 100%;
    border-left: 1px solid #ccc;
  }

  .chatbox .modal-dialog,
  .chatlist .modal-dialog {
    max-width: 100%;
    margin: 0;
  }

  .msg-search {
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .chat-area .form-control {
    display: block;
    width: 80%;
    padding: 0.375rem 0.75rem;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.5;
    color: #222;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ccc;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
  }

  .chat-area .form-control:focus {
    outline: 0;
    box-shadow: inherit;
  }

  a.add img {
    height: 36px;
  }

  .chat-area .nav-tabs {
    border-bottom: 1px solid #dee2e6;
    align-items: center;
    justify-content: space-between;
    flex-wrap: inherit;
  }

  .chat-area .nav-tabs .nav-item {
    width: 100%;
  }

  .chat-area .nav-tabs .nav-link {
    width: 100%;
    color: #180660;
    font-size: 14px;
    font-weight: 500;
    line-height: 1.5;
    text-transform: capitalize;
    margin-top: 5px;
    margin-bottom: -1px;
    background: 0 0;
    border: 1px solid transparent;
    border-top-left-radius: 0.25rem;
    border-top-right-radius: 0.25rem;
  }

  .chat-area .nav-tabs .nav-item.show .nav-link,
  .chat-area .nav-tabs .nav-link.active {
    color: #222;
    background-color: #fff;
    border-color: transparent transparent #000;
  }

  .chat-area .nav-tabs .nav-link:focus,
  .chat-area .nav-tabs .nav-link:hover {
    border-color: transparent transparent #000;
    isolation: isolate;
  }

  .chat-list h3 {
    color: #222;
    font-size: 16px;
    font-weight: 500;
    line-height: 1.5;
    text-transform: capitalize;
    margin-bottom: 0;
  }

  .chat-list p {
    color: #343434;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.5;
    text-transform: capitalize;
    margin-bottom: 0;
  }

  .chat-list a.d-flex {
    margin-bottom: 15px;
    position: relative;
    text-decoration: none;
  }

  .chat-list .active {
    display: block;
    content: '';
    clear: both;
    position: absolute;
    bottom: 3px;
    left: 34px;
    height: 12px;
    width: 12px;
    background: #00DB75;
    border-radius: 50%;
    border: 2px solid #fff;
  }

  .msg-head h3 {
    color: #222;
    font-size: 18px;
    font-weight: 600;
    line-height: 1.5;
    margin-bottom: 0;
  }

  .msg-head p {
    color: #343434;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.5;
    text-transform: capitalize;
    margin-bottom: 0;
  }

  .msg-head {
    padding: 15px;
    border-bottom: 1px solid #ccc;
  }

  .moreoption {
    display: flex;
    align-items: center;
    justify-content: end;
  }

  .moreoption .navbar {
    padding: 0;
  }

  .moreoption li .nav-link {
    color: #222;
    font-size: 16px;
  }

  .moreoption .dropdown-toggle::after {
    display: none;
  }

  .moreoption .dropdown-menu[data-bs-popper] {
    top: 100%;
    left: auto;
    right: 0;
    margin-top: 0.125rem;
  }

  .msg-body ul {
    overflow: hidden;
  }

  .msg-body ul li {
    list-style: none;
    margin: 15px 0;
  }

  .msg-body ul li.sender {
    display: block;
    width: 100%;
    position: relative;
  }

  .msg-body ul li.sender:before {
    display: block;
    clear: both;
    content: '';
    position: absolute;
    top: -6px;
    left: -7px;
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 12px 15px 12px;
    border-color: transparent transparent #f5f5f5 transparent;
    -webkit-transform: rotate(-37deg);
    -ms-transform: rotate(-37deg);
    transform: rotate(-37deg);
  }

  .msg-body ul li.sender p {
    color: #000;
    font-size: 14px;
    line-height: 1.5;
    font-weight: 400;
    padding: 15px;
    background: #f5f5f5;
    display: inline-block;
    border-bottom-left-radius: 10px;
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
    margin-bottom: 0;
  }

  .msg-body ul li.sender p b {
    display: block;
    color: #180660;
    font-size: 14px;
    line-height: 1.5;
    font-weight: 500;
  }

  .msg-body ul li.receiver {
    display: block;
    width: 100%;
    text-align: right;
    position: relative;
  }

  .msg-body ul li.receiver:before {
    display: block;
    clear: both;
    content: '';
    position: absolute;
    bottom: 15px;
    right: -7px;
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 12px 15px 12px;
    border-color: transparent transparent #4b7bec transparent;
    -webkit-transform: rotate(37deg);
    -ms-transform: rotate(37deg);
    transform: rotate(37deg);
  }

  .msg-body ul li.receiver p {
    color: #fff;
    font-size: 14px;
    line-height: 1.5;
    font-weight: 400;
    padding: 15px;
    background: #4b7bec;
    display: inline-block;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    border-bottom-left-radius: 10px;
    margin-bottom: 0;
  }

  .msg-body ul li.receiver p b {
    display: block;
    color: #061061;
    font-size: 14px;
    line-height: 1.5;
    font-weight: 500;
  }

  .msg-body ul li.receiver:after {
    display: block;
    content: '';
    clear: both;
  }

  .time {
    display: block;
    color: #000;
    font-size: 12px;
    line-height: 1.5;
    font-weight: 400;
  }

  li.receiver .time {
    margin-right: 20px;
  }

  .divider {
    position: relative;
    z-index: 1;
    text-align: center;
  }

  .msg-body h6 {
    text-align: center;
    font-weight: normal;
    font-size: 14px;
    line-height: 1.5;
    color: #222;
    background: #fff;
    display: inline-block;
    padding: 0 5px;
    margin-bottom: 0;
  }

  .divider:after {
    display: block;
    content: '';
    clear: both;
    position: absolute;
    top: 12px;
    left: 0;
    border-top: 1px solid #EBEBEB;
    width: 100%;
    height: 100%;
    z-index: -1;
  }

  .send-box {
    padding: 15px;
    border-top: 1px solid #ccc;
  }

  .send-box form {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 15px;
  }

  .send-box .form-control {
    display: block;
    width: 85%;
    padding: 0.375rem 0.75rem;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.5;
    color: #222;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ccc;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
  }

  .send-box button {
    border: none;
    background: #3867d6;
    padding: 0.375rem 5px;
    color: #fff;
    border-radius: 0.25rem;
    font-size: 14px;
    font-weight: 400;
    width: 24%;
    margin-left: 1%;
  }

  .send-box button i {
    margin-right: 5px;
  }

  .send-btns .button-wrapper {
    position: relative;
    width: 125px;
    height: auto;
    text-align: left;
    margin: 0 auto;
    display: block;
    background: #F6F7FA;
    border-radius: 3px;
    padding: 5px 15px;
    float: left;
    margin-right: 5px;
    margin-bottom: 5px;
    overflow: hidden;
  }

  .send-btns .button-wrapper span.label {
    position: relative;
    z-index: 1;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    width: 100%;
    cursor: pointer;
    color: #343945;
    font-weight: 400;
    text-transform: capitalize;
    font-size: 13px;
  }

  #upload {
    display: inline-block;
    position: absolute;
    z-index: 1;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    opacity: 0;
    cursor: pointer;
  }

  .send-btns .attach .form-control {
    display: inline-block;
    width: 120px;
    height: auto;
    padding: 5px 8px;
    font-size: 13px;
    font-weight: 400;
    line-height: 1.5;
    color: #343945;
    background-color: #F6F7FA;
    background-clip: padding-box;
    border: 1px solid #F6F7FA;
    border-radius: 3px;
    margin-bottom: 5px;
  }

  .send-btns .button-wrapper span.label img {
    margin-right: 5px;
  }

  .button-wrapper {
    position: relative;
    width: 100px;
    height: 100px;
    text-align: center;
    margin: 0 auto;
  }

  button:focus {
    outline: 0;
  }

  .add-apoint {
    display: inline-block;
    margin-left: 5px;
  }

  .add-apoint a {
    text-decoration: none;
    background: #F6F7FA;
    border-radius: 8px;
    padding: 8px 8px;
    font-size: 13px;
    font-weight: 400;
    line-height: 1.2;
    color: #343945;
  }

  .add-apoint a svg {
    margin-right: 5px;
  }

  .chat-icon {
    display: none;
  }

  .closess i {
    display: none;
  }



  @media (max-width: 767px) {
    .chat-icon {
      display: block;
      margin-right: 5px;
    }

    .chatlist {
      width: 100%;
    }

    .chatbox {
      width: 100%;
      position: absolute;
      left: 1000px;
      right: 0;
      background: #fff;
      transition: all 0.5s ease;
      border-left: none;
    }

    .showbox {
      left: 0 !important;
      transition: all 0.5s ease;
    }

    .msg-head h3 {
      font-size: 14px;
    }

    .msg-head p {
      font-size: 12px;
    }

    .msg-head .flex-shrink-0 img {
      height: 30px;
    }

    .send-box button {
      width: 28%;
    }

    .send-box .form-control {
      width: 70%;
    }

    .chat-list h3 {
      font-size: 14px;
    }

    .chat-list p {
      font-size: 12px;
    }

    .msg-body ul li.sender p {
      font-size: 13px;
      padding: 8px;
      border-bottom-left-radius: 6px;
      border-top-right-radius: 6px;
      border-bottom-right-radius: 6px;
    }

    .msg-body ul li.receiver p {
      font-size: 13px;
      padding: 8px;
      border-top-left-radius: 6px;
      border-top-right-radius: 6px;
      border-bottom-left-radius: 6px;
    }
  }
</style>

<section class="message-area py-1 h-100 mt-3">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div style="height: 95dvh;" class="chat-area">
          <div class="chatlist p-0">
            <div class="modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-body">
                  <div class="chat-lists">
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="Open" role="tabpanel" aria-labelledby="Open-tab">
                        <div class="chat-list">
                          <?php foreach ($users as $key => $user) : ?>
                            <a data-id="<?= $key ?>" data-kost="<?= $user['id_kost'] ?>" data-sender="<?= $user['receiver'] ?>" data-receiver="<?= $user['sender'] ?>" onclick="switchChat($(this))" role="button" class="align-items-center border d-flex mb-1 p-1 rounded chats">
                              <div class="flex-shrink-0">
                                <img class="img-fluid" style="border-radius: 50%;width: 50px;height: 50px" src="<?= base_url('public/user/assets/media/avatars/default.png') ?>" alt="user img">
                                <span class="active"></span>
                              </div>
                              <div class="flex-grow-1 ms-3 user">
                                <h3><?= $user['nama'] ?></h3>
                                <p><?= $user['email'] ?></p>
                              </div>
                            </a>
                          <?php endforeach; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <audio id="notif" class="d-none" src="<?= base_url() ?>/public/assets/media/audio/notif.mp3"></audio>

          <div class="chatbox">
            <div class="modal-dialog-scrollable">
              <div class="modal-content">
                <div class="msg-head">
                  <div class="row">
                    <div class="col-8">
                      <div class="d-flex align-items-center userd">
                        <div class="flex-shrink-0">
                          <img class="img-fluid" style="border-radius: 50%;width: 50px;height: 50px" src="<?= base_url('public/user/assets/media/avatars/150-25.jpg') ?>" alt="user img">
                        </div>
                        <div class="flex-grow-1 ms-3 user">
                          <h3></h3>
                          <p></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-body">
                  <div class="msg-body">
                    <ul id="chatcontent">
                    </ul>
                  </div>
                </div>
                <div class="send-box">
                  <form action="">
                    <input type="text" class="form-control" aria-label="message…" placeholder="Ketik pesan...">
                    <button onclick="sendMessage($(this))" type="button"><i class="fa fa-paper-plane text-light" aria-hidden="true"></i> Kirim</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  var id_kost = null
  var receiver = 9

  function switchChat(elem) {
    id_kost = elem.attr('data-kost')
    receiver = elem.attr('data-receiver')
    let uid = receiver + "_" + id_kost
    console.log(uid);
    $('#chatcontent').attr('data-id', uid)

    let userDetail = elem.html()
    $('.msg-head .userd').html(userDetail)
    $.ajax({
        type: "GET",
        url: "<?= base_url('Chat/getChat') ?>",
        dataType: "html",
        data: {
          'id_kost': elem.attr('data-kost'),
          'sender': elem.attr('data-sender'),
          'receiver': elem.attr('data-receiver'),
        },
      }).done((res) => {
        $('.msg-body #chatcontent').html(res)
      })
      .fail((err) => {
        console.log(err)
      })
    openChat('<?= session()->get('id') ?>')
  };

  var wso = null
  var sender = "<?= session()->get('id') ?>"

  function openChat(id) {
    wso = new WebSocket('ws://localhost:8888');
    wso.onopen = function(e) {
      console.log("Connection established!");
      wso.send('[{"command":"handshake","address":"' + sender + '"}]')
    };
    wso.onmessage = function(e) {
      console.log(e.data);
      let data = JSON.parse(e.data)[0]
      try {
        let message = data.message || ''
        let date = data.timestamp
        let receiver = data.receiver
        let sender = data.sender
        let id_kost = data.id_kost
        let uid = sender + "_" + id_kost
        if ($('#chatcontent[data-id="' + uid + '"]').length < 0) {
          $('#chatcontent[data-id="' + uid + '"]').append(
            `
                <li class="sender animate__animated animate__lightSpeedInLeft">
                        <p>${message}</p>
                        <span class="time">${date}</span>
        </li>
        `
          )
          $('.modal-body').scrollTop($('.modal-body ul')[0].scrollHeight);
          console.log(message);
          $('#notif').trigger('play')
        }
      } catch (error) {
        console.log(error);
      }
    }
  };

  function sendMessage(el) {
    let msg = el.parent().find('input').val();
    if (msg == '') {
      return
    }
    let timestamp = new moment().format('YYYY-MM-DD HH:mm:ss')
    let data = JSON.stringify([{
      'message': msg,
      'timestamp': timestamp,
      'sender': sender,
      'receiver': receiver,
      'id_kost': id_kost,
    }])
    wso.send(data);
    let date = new moment().format('DD/MM/YYYY HH.mm')
    $('.modal-body .msg-body ul').append(`
    <li class="receiver animate__animated animate__lightSpeedInRight">
                        <p>${msg}</p>
                        <span class="time">${timestamp}</span>
                      </li>`)
    el.parent().find('input').val('');
    $('.modal-body').scrollTop($('.modal-body ul')[0].scrollHeight);
  }

  $(function() {
    scrollMsgBottom()

    $(".chat-list a").click(function() {
      $(".chatbox").addClass('showbox');
      return false;
    });

    $(".chat-icon").click(function() {
      $(".chatbox").removeClass('showbox');
    });
  })

  function scrollMsgBottom() {
    var d = $('.message-holder');
    d.scrollTop(d.prop("scrollHeight"));
  }

  function getImages() {
    const imgs = {
      'Mary': 'mary.jpg',
      'Jon': 'jon.jpg',
      'Alex': 'alex.jpg',
    }

    return imgs
  }


  function newMessage(msg) {
    const imgs = getImages()

    html = `<div class="col-8 msg-item left-msg">
                    <div class="msg-img">
                      <img class="img-thumbnail rounded-circle" src="/assets/img/` + imgs[msg.author] + `">
                    </div>
                    <div class="msg-text">
                      <span class="author">` + msg.author + `</span> <span class="time">` + msg.time + `</span><br>
                      <p>` + msg.message + `</p>
                    </div>
                  </div>`
    $('#messages').append(html)
    scrollMsgBottom()

  }

  function myMessage(msg) {
    var name = '<?= session()->get('firstname') ?>'
    const imgs = getImages()
    var date = new Date;
    var minutes = date.getMinutes();
    var hour = date.getHours();
    var time = hour + ':' + minutes
    html = `<div class="col-8 msg-item right-msg offset-4">
                    <div class="msg-img">
                      <img class="img-thumbnail rounded-circle" src="/assets/img/` + imgs[name] + `">
                    </div>
                    <div class="msg-text">
                      <span class="author">Me</span> <span class="time">` + time + `</span><br>
                      <p>` + msg + `</p>
                    </div>
                  </div>`
    $('#messages').append(html)
    scrollMsgBottom()
  }

  function updateUsers(users) {
    var html = ''
    var myId = '<?= session()->get('id') ?>';


    for (let index = 0; index < users.length; index++) {
      if (myId != users[index].c_user_id)
        html += '<li class="list-group-item">' + users[index].c_name + '</li>'
    }

    if (html == '') {
      html = '<p>The Chat Room is Empty</p>'
    }


    $('#user-list').html(html)


  }
  window.addEventListener('load', function() {
    $('.chats:first').trigger('click')
    $('#kt_footer').remove()
    console.log(1);
  });
</script>
<?= $this->endSection(); ?>