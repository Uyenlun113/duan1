<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Thanh toán thành công | </title>
    <?php include "./layouts/link.php" ?>
    <style>
    .button-buy {
      width: 250px;
      height: 50px;
      background-color: #aa8453;
      color: #fff;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 600;
    }
    </style>
  </head>

  <body>
    <div class="page-wrapper">
      <div class="preloader"></div>
      <?php @include "./momo_payment/handle_payment_momo.php" ?>
      <section>
        <div class="container pt-70">
          <div class="section-content">
            <div class="row mt-20">
              <div class="col-md-12 mt-60">
                <div class="col-12 col-lg-8 mx-auto text-center mb-3">
                  <h1><i class="icon fa-solid fa-box-check" style="color: #aa8453;font-size:100px;"></i></h1>
                  <h4 class="mt-2">Chân thành cảm ơn! 😇</h4>
                  <p>Đơn đặt phòng của bạn đã được được xác nhận</p>
                  <p>Chúng tôi sẽ liên lạc với bạn trong thời gian sớm nhất để xác nhận và thông báo về quá trình đặt
                    phòng. Nếu bạn có bất kỳ câu hỏi hoặc cần hỗ trợ, đừng ngần ngại liên hệ với chúng tôi qua
                    info@salahotelgroup.com hoặc số điện thoại hotline: 0868582227 / 0868582229.</p>
                  <p>Một lần nữa, chúng tôi chân thành cảm ơn sự tin tưởng của bạn.</p>
                  <a href="index.php" class="book-btn mt-2"><button class="button-buy">Tiếp tục mua hàng</button>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.fancybox.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bxslider.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/appear.js"></script>
    <script src="js/owl.js"></script>
    <script src="js/script.js"></script>
  </body>

</html>