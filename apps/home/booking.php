<!DOCTYPE html>
<html lang="en">

  <head>
    <title>Hoexr | Hotel HTML Template Template</title>
    <?php include "./layouts/link.php" ?>
    <style>
    .error {
      color: #d51515;
      font-size: 13px;
    }

    .money {
      font-size: 18px;
      color: #aa8453;
    }

    .text em {
      background-color: transparent !important;

    }
    </style>
  </head>

  <body>

    <div class="page-wrapper">
      <div class="preloader"></div>
      <?php @include "./controllers/booking-controller.php" ?>
      <?php @include "./layouts/header2.php" ?>
      <section class="page-title" style="background-image: url(images/background/page-title-bg.png);">
        <div class="auto-container">
          <div class="title-outer text-center">
            <h1 class="title">Đặt phòng</h1>
            <ul class="page-breadcrumb">
              <li><a href="index.php">Trang chủ</a></li>
              <li>Đặt phòng</li>
            </ul>
          </div>
        </div>
      </section>
      <section class="contact-details">
        <div class="container ">
          <div class="row">
            <div class="col-xl-7 col-lg-6">
              <div class="sec-title">
                <span class="sub-title before-none">Đặt phòng ngay</span>
                <h4>Thông tin đặt phòng</h4>
              </div>
              <form action="booking.php" method="POST" id="contact_form" enctype="multipart/form-data" novalidate>
                <input name="category_id" hidden class="form-control" type="text"
                  value="<?php echo ($detail_category["id"]) ?>">
                <input name="category_price" hidden class="form-control" type="text"
                  value="<?php echo ($detail_category["category_price"]) ?>">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="mb-3">
                      <label for="cart_item_checkin">Ngày checkin:</label>
                      <input name="cart_item_checkin" class="form-control required" type="date"
                        min="<?php echo date('Y-m-d'); ?>" id="cart_item_checkin" onchange="chooseCheckin()"
                        value="<?php echo isset($_GET['cart_item_checkin']) ? htmlspecialchars($_GET['cart_item_checkin']) : ''; ?>">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="mb-3">
                      <label for="cart_item_checkout">Ngày checkout:</label>
                      <input name="cart_item_checkout" class="form-control required" type="date"
                        min="<?php echo isset($cart_item_checkin) ? date('Y-m-d', strtotime($cart_item_checkin)):""; ?>"
                        id="cart_item_checkout" onchange="chooseCheckout()"
                        value="<?php echo isset($_GET['cart_item_checkout']) ? htmlspecialchars($_GET['cart_item_checkout']) : ''; ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="mb-3">
                      <label for="cart_item_count_people">Số người:</label>
                      <input name="cart_item_count_people" class="form-control required" type="number"
                        placeholder="Nhập số người" max="<?php echo ($detail_category["category_adult"]) ?>" min="1">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="mb-3">
                      <label for="cart_item_quantity">Số lượng phòng:</label>
                      <input name="cart_item_quantity" class="form-control required" type="number"
                        placeholder="Nhập số lượng phòng" min="1" max="<?php echo ($totalRoomsBlank) ?>">
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="cart_item_description">Ghi chú cho nhân viên:</label>
                  <textarea name="cart_item_description" class="form-control" rows="3"
                    placeholder="Nhập ghi chú"></textarea>
                </div>
                <div class="mb-5">
                  <input name="form_botcheck" class="form-control" type="hidden" value="" />
                  <button type="submit" class="theme-btn btn-style-one" name="add_to_cart">
                    <span class="btn-title">Thêm vào giỏ hàng</span>
                  </button>
                </div>
              </form>
            </div>
            <div class="col-xl-5 col-lg-6">
              <div class="contact-details__right">
                <div class="sec-title">
                  <img src="../upload/<?php echo ($detail_category["category_image"]) ?>" height="200"
                    style="width:100%;height:300px;border-radius:12px;" alt="">
                  <h4>
                    <?php echo ($detail_category["category_name"]) ?>
                  </h4>

                  <span class="money">
                    <?php echo (formatMoney($detail_category["category_price"])) ?>
                  </span>
                  <br />
                  <span>Số người tối đa:
                    <?php echo ($detail_category["category_adult"]) ?> người
                  </span>
                  <br />
                  <span>
                    Số phòng còn trống:
                    <?php echo $totalRoomsBlank < 0 ? "Mời bạn chọn thời gian đặt phòng" : $totalRoomsBlank; ?>
                    phòng
                  </span>
                  <div class="text">
                    <?php echo ($detail_category["category_description"]) ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php include "./layouts/footer.php" ?>
    </div>
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
    <script src="js/jquery.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.fancybox.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/appear.js"></script>
    <script src="js/owl.js"></script>
    <script src="js/script.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/jquery.form.min.js"></script>
    <script>
    (function($) {
      $("#contact_form").validate({});
    })(jQuery);
    </script>
    <script>
    function updateEndDateMin() {
      var startDate = document.getElementById('start_date').value;
      document.getElementsByName('end_date')[0].min = startDate + 'T00:00';
    }
    var searchValueCheckin = '';
    var searchValueCheckout = '';

    function chooseCheckin() {
      searchValueCheckin = document.getElementById('cart_item_checkin').value
      window.location.href = '?action=booking&booking=<?php echo($detail_category['id']) ?>&cart_item_checkin=' +
        encodeURIComponent(searchValueCheckin);
    }

    function chooseCheckout() {
      searchValueCheckin = document.getElementById('cart_item_checkin').value
      searchValueCheckout = document.getElementById('cart_item_checkout').value
      window.location.href = '?action=booking&booking=<?php echo($detail_category['id']) ?>&cart_item_checkin=' +
        encodeURIComponent(searchValueCheckin) +
        '&cart_item_checkout=' + encodeURIComponent(searchValueCheckout);
    }

    function saveScrollPosition() {
      sessionStorage.setItem('scrollPosition', window.scrollY.toString());
    }
    window.addEventListener('beforeunload', saveScrollPosition);

    function restoreScrollPosition() {
      var scrollPosition = sessionStorage.getItem('scrollPosition');
      if (scrollPosition !== null) {
        window.scrollTo(0, parseInt(scrollPosition));
        sessionStorage.removeItem('scrollPosition');
      }
    }
    window.addEventListener('load', restoreScrollPosition);
    </script>
  </body>

</html>