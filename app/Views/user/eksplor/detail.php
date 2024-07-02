<?= $this->extend("user/layout/index"); ?>

<?= $this->section("content"); ?>

<?php

use Midtrans\Config;

$serverKey = 'Mid-server-YJ3ZneEwcJAYpFyug77Kj9vB';
$isProduction = true;
$isSanitized = true;
$is3ds = true;

Config::$serverKey = $serverKey;
Config::$isProduction = $isProduction;
Config::$isSanitized = $isSanitized;
Config::$is3ds = $is3ds;

$params = array(
  'transaction_details' => array(
    'order_id' => 'KD-' . time(),
    'gross_amount' => $data['harga'],
  )
);

try {
  $snapToken = \Midtrans\Snap::getSnapToken($params);
} catch (\Exception $e) {
  return "Terjadi kesalahan saat mengambil token pembayaran: " . $e->getMessage();
}

?>

<style>
  .cropimg {
    width: 100%;
    /* width of container */
    height: 350px;
    /* height of container */
    object-fit: cover;
  }

  .imessage {
    background-color: #fff;
    border: 1px solid #e5e5ea;
    border-radius: 0.25rem;
    display: flex;
    flex-direction: column;
    font-family: "SanFrancisco";
    font-size: 1.25rem;
    margin: 0 auto 1rem;
    max-width: 600px;
    padding: 0.5rem 1.5rem;
  }

  .imessage p {
    border-radius: 1.15rem;
    line-height: 1.25;
    max-width: 75%;
    padding: 0.5rem .875rem;
    position: relative;
    word-wrap: break-word;
  }

  .imessage p::before,
  .imessage p::after {
    bottom: -0.1rem;
    content: "";
    height: 1rem;
    position: absolute;
  }

  p.from-me {
    align-self: flex-end;
    background-color: #248bf5;
    color: #fff;
  }

  p.from-me::before {
    border-bottom-left-radius: 0.8rem 0.7rem;
    border-right: 1rem solid #248bf5;
    right: -0.35rem;
    transform: translate(0, -0.1rem);
  }

  p.from-me::after {
    background-color: #fff;
    border-bottom-left-radius: 0.5rem;
    right: -40px;
    transform: translate(-30px, -2px);
    width: 10px;
  }

  p[class^="from-"] {
    margin: 0.5rem 0;
    width: fit-content;
  }

  p.from-me~p.from-me {
    margin: 0.25rem 0 0;
  }

  p.from-me~p.from-me:not(:last-child) {
    margin: 0.25rem 0 0;
  }

  p.from-me~p.from-me:last-child {
    margin-bottom: 0.5rem;
  }

  p.from-them {
    align-items: flex-start;
    background-color: #e5e5ea;
    color: #000;
  }

  p.from-them:before {
    border-bottom-right-radius: 0.8rem 0.7rem;
    border-left: 1rem solid #e5e5ea;
    left: -0.35rem;
    transform: translate(0, -0.1rem);
  }

  p.from-them::after {
    background-color: #fff;
    border-bottom-right-radius: 0.5rem;
    left: 20px;
    transform: translate(-30px, -2px);
    width: 10px;
  }

  p[class^="from-"].emoji {
    background: none;
    font-size: 2.5rem;
  }

  p[class^="from-"].emoji::before {
    content: none;
  }

  .no-tail::before {
    display: none;
  }

  .margin-b_none {
    margin-bottom: 0 !important;
  }

  .margin-b_one {
    margin-bottom: 1rem !important;
  }

  .margin-t_one {
    margin-top: 1rem !important;
  }


  .comment {
    color: #222;
    font-size: 1.25rem;
    line-height: 1.5;
    margin-bottom: 1.25rem;
    max-width: 100%;
    padding: 0;
  }

  @media screen and (max-width: 800px) {
    body {
      margin: 0 0.5rem;
    }

    .container {
      padding: 0.5rem;
    }

    .imessage {
      font-size: 1.05rem;
      margin: 0 auto 1rem;
      max-width: 600px;
      padding: 0.25rem 0.875rem;
    }

    .imessage p {
      margin: 0.5rem 0;
    }
  }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js" integrity="sha512-hUhvpC5f8cgc04OZb55j0KNGh4eh7dLxd/dPSJ5VyzqDWxsayYbojWyl5Tkcgrmb/RVKCRJI1jNlRbVP4WWC4w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container-fluid" id="kt_content_container">
  <!--begin::Row-->
  <div class="row">
    <!--begin::Col-->
    <div class="col-12">
      <!--begin::Engage Widget 1-->
      <div class="card card-xxl-stretch">
        <!--begin::Card body-->
        <div class="card-body d-flex flex-column justify-content-between h-100">
          <div class="d-flex">
            <a href="<?= base_url() ?>/Eksplor" class="btn btn-icon btn-sm btn-primary rounded-circle me-4"><i class="bi bi-arrow-left fs-4"></i></a>
            <h4 class="mt-3 mb-5 text-muted">Detail <?= $title ?></h4>
          </div>
          <div class="row g-5">
            <div class="col-12 col-lg-8">
              <img class="cropimg rounded" src="<?= base_url() . '/' . '/public/uploads/' . $data['id'] . '/' . $foto[0]['foto'] ?>" alt="Kost">
              <div class="row g-5 mt-5">
                <?php
                // Ensure there are at least 5 elements in the $foto array
                while (count($foto) < 5) {
                  $foto[] = ['foto' => 'default.jpg']; // Replace 'default.jpg' with your default image
                }

                foreach ($foto as $key) : ?>
                  <div class="col-4 col-md-2">
                    <a class="d-block overlay " data-fslightbox="lightbox-basic" href="<?= base_url() . '/' . '/public/uploads/' . $data['id'] . '/' . $key['foto'] ?>">
                      <!--begin::Image-->
                      <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-100px" style="background-image:url('<?= base_url() . '/' . '/public/uploads/' . $data['id'] . '/' . $key['foto'] ?>')">
                      </div>
                      <!--end::Image-->

                      <!--begin::Action-->
                      <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                        <i class="bi bi-fullscreen text-white fs-2x"></i>
                      </div>
                      <!--end::Action-->
                    </a>
                  </div>
                <?php endforeach; ?>
              </div>


            </div>

            <div class="col-12 col-lg-4">
              <div class="mb-5 border-gray-300 border-dashed rounded p-3">
                <h4 class="text-black mb-7"><?= $title ?></h4>
                <div class="d-flex flex-stack fw-bold fs-5 text-muted mb-2">
                  <a href="#" class="text-muted text-hover-primary pe-2">Katogory</a>
                  <div class="m-0 badge badge-light-warning"><?= $data['jenis'] ?></div>
                </div>
                <div class="d-flex flex-stack fw-bold fs-5 text-muted mb-2">
                  <a href="#" class="text-muted text-hover-primary pe-2">Sisa</a>
                  <div class="m-0 text-primary">
                    <?= ((float) $data['jumlah_kamar']) - ((float) $data['terisi']) ?> Kamar
                  </div>
                </div>
                <div class="d-flex fw-bold fs-5 text-muted ">
                  <a href="#" class="text-muted text-hover-primary pe-2">Fasilitas</a>
                </div>
                <div class="mx-3 text-muted lh-1 mb-4">
                  <p style="white-space: pre;"><?= $data['fasilitas'] ?></p>
                </div>

                <div class="d-flex flex-stack fw-bold fs-5 text-muted ">
                  <!-- <a href="https://www.google.com/maps/place/" class="text-muted text-hover-primary pe-2">Alamat</a>-->
                  <a href="<?= base_url(); ?>/Map/<?= $data['kordinat'] ?>" class="text-muted text-hover-primary pe-2">Alamat</a>
                </div>
                <div class="mx-3 lh-1 text-muted mb-4">
                  <p> <i class="bi bi-geo-alt-fill"></i> <?= $data['alamat'] ?></p>
                </div>
                <div class="d-flex flex-stack fw-bold fs-5 text-muted mb-4">
                  <a href="#" class="text-muted text-hover-primary pe-2">Harga</a>
                  <div class="m-0 fs-2 text-success"><?= rupiah($data['harga']) ?> <small>/bulan</small></div>
                </div>
                <div class="d-flex  fw-bold fs-5 mt-10 justify-content-center">
                  <a href="https://wa.me/+62<?= $pemilik['telepon'] ?>?text=Hallo, Saya ingin Bertanya Tentang Kost <?= $title ?>" target="blank" class="btn btn-success me-3"><i class="bi bi-whatsapp fs-4 me-2"></i>Whatsapp</a>
                  <a href="mailto:<?= $pemilik['email'] ?>" class="btn btn-secondary" target="blank"><i class="bi bi-envelope fs-4 me-2"></i>Email</a>
                  &nbsp;&nbsp;
                  <button class=" btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#data-modal" data-user_id="<?= session()->get('id') ?>" data-kost_id="<?= $data['id'] ?>"><i class="bi bi-cart-plus"></i><span>Booking</span></button>
                  <button onclick="openChat(<?= $data['id'] ?>)" class=" btn btn-warning" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" data-user_id="<?= session()->get('id') ?>" data-kost_id="<?= $data['id'] ?>"><i class="bi bi-messenger"></i><span>Chat</span></button>
                  &nbsp;&nbsp;
                </div>
              </div>
            </div>

          </div>
        </div>
        <!--end::Card body-->
      </div>
      <!--end::Engage Widget 1-->
    </div>
    <!--end::Col-->
  </div>
  <!--end::Row-->
  <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasScrollingLabel" style="width: 35%;">
    <div class="offcanvas-header">
      <h3 class="offcanvas-title" id="offcanvasScrollingLabel">Ibu Kos</h3>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-2 imessage mb-2">
    </div>
    <div class="align-self-end w-100 mb-3">
      <div class="input-group mb-3 px-2">
        <input id="chat_message" type="text" class="form-control" placeholder="Ketik pesan..." aria-label="Ketik pesan..." aria-describedby="button-addon2">
        <input type="hidden" name="chat_kost_id" id="chat_kost_id">
        <button id="chat_send" class="btn btn-primary" type="button" onclick="sendMessage($(this))">Kirim <i class="bi bi-paper-plane"></i></button>
      </div>
    </div>
  </div>

  <div id="data-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md">
      <div class="modal-content">
        <div class="text-center bg-info p-3" id="model-header">
          <h4 class="modal-title text-white" id="info-header-modalLabel"> Booking Kost</h4>
        </div>
        <div class="modal-body">
          <form id="data-form" class="pl-3 pr-3">
            <?= csrf_field() ?>
            <div class="row">
              <input type="hidden" id="id" name="id" class="form-control" placeholder="Id" required>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group mb-3">
                  <input type="hidden" id="user_id" name="user_id" class="form-control" placeholder="User id" minlength="0" required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group mb-3">
                  <input type="hidden" id="kost_id" name="kost_id" class="form-control" placeholder="Kost id" minlength="0" required>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group mb-3">
                  <label for="bulan" class="col-form-label"> Bulan: <span class="text-danger">*</span> </label>
                  <select name="bulan" id="bulan" class="form-control" required>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="form-group text-center">
              <div class="btn-group">
                <button type="button" class="btn btn-info me-5" id="pay-button"> Bayar Online Sekarang</button>

                <button type="button" id="pay-button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
              </div>
            </div>
          </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
</div>
<audio id="notif" class="d-none" src="<?= base_url() ?>/public/assets/media/audio/notif.mp3"></audio>
<?= $this->endSection(); ?>
<?= $this->section("script"); ?>
<script src="<?= base_url() ?>/public/user/assets/plugins/custom/fslightbox/fslightbox.bundle.js"></script>
<script src="https://app.midtrans.com/snap/snap.js" data-client-key="Mid-client-VrbWjF_6z2-1y2Lm"></script>
<script>
  var wso = null
  var sender = "<?= session()->get('id') ?>"
  var receiver = "x";

  function openChat(id) {
    wso = new WebSocket('ws://localhost:8888');
    $('#chat_kost_id').val(id)
    wso.onopen = function(e) {
      console.log("Connection established!");
      wso.send('x-addr:' + sender)
      wso.send(sender + '|connect|' + receiver)
    };
    wso.onmessage = function(e) {
      let date = new moment().format('HH.mm')
      if (e.data == "connect_ok") return
      $('.imessage').append(`
      <div class="mb-2  animate__animated animate__fadeInLeft row pe-2">
      <p class="from-them">${e.data}</p>
      <span class="text-secondary">${date}</span>
      </div>
      `)
      $('#notif').trigger('play')
      $('.imessage').scrollTop($('.imessage')[0].scrollHeight);
    }
  };

  function sendMessage(el) {
    let msg = el.parent().find('input').val();
    if (msg == '') {
      return
    }
    let timestamp = new moment().format('YYYY-MM-DD HH:mm:ss')
    msg = JSON.stringify({
      'message': msg,
      'timestamp': timestamp,
      'sender': sender,
      'receiver': receiver,
      'kost_id': $('#chat_kost_id').val(),
    })
    wso.send(msg);
    let date = new moment().format('HH.mm')
    $('.imessage').append(`
     <div class="mb-2  animate__animated animate__fadeInRight d-flex justify-content-end flex-column">
      <p class="from-me">${msg}</p>
       <span class="text-secondary text-end">${date}</span>
       </div>
      `)
    el.parent().find('input').val('');
    $('.imessage').scrollTop($('.imessage')[0].scrollHeight);
  }

  document.getElementById('pay-button').onclick = function() {
    // SnapToken acquired from previous step
    snap.pay('<?= $snapToken ?>', {
      onSuccess: function(result) {
        //  ajax ke halaman bayar.php untuk mengubah status pembayaran
        // $.ajax({
        //    url: 'http://localhost/monifa_laundry/detail_order/detail_ck/bayar_ol.php',
        //    type: 'POST',
        //    data: {
        //       status: 'paid'
        //    },
        //    success: function(response) {
        //       console.log('Payment status updated: ', response);
        //    },
        //    error: function(xhr, status, error) {
        //       console.error('Payment status update failed: ', error);
        //    }
        // });
      },
      onPending: function(result) {
        console.log('pending');
        console.log(result);
      },
      onError: function(result) {
        console.log('error');
        console.log(result);
      },
      onClose: function() {
        console.log('customer closed the popup without finishing the payment');
      }
    })
  };
</script>


<?= $this->endSection(); ?>