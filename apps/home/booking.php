<!DOCTYPE html>
<html lang="en">

  <head>
    <title>Hoexr | Hotel HTML Template Template</title>
    <?php include "./layouts/link.php" ?>
  </head>

  <body>

    <div class="page-wrapper">
      <div class="preloader"></div>
      <?php @include "./controllers/booking.php" ?>
      <?php @include "./layouts/header2.php" ?>
      <section class="page-title" style="background-image: url(images/background/page-title-bg.png);">
        <div class="auto-container">
          <div class="title-outer text-center">
            <h1 class="title">Contact Us</h1>
            <ul class="page-breadcrumb">
              <li><a href="index.html">Home</a></li>
              <li>Contact</li>
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
              <form action="booking.php" method="POST" enctype="multipart/form-data" novalidate>
                <input name="category_id" hidden class="form-control" type="text"
                  value="<?php echo($detail_category["id"]) ?>">
                <input name="category_price" hidden class="form-control" type="text"
                  value="<?php echo($detail_category["category_price"]) ?>">

                <div class="row">
                  <div class="col-sm-6">
                    <div class="mb-3">
                      <label for="cart_item_checkin">Ngày checkin:</label>
                      <input name="cart_item_checkin" class="form-control" type="date"
                        min="<?php echo date('Y-m-d'); ?>">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="mb-3">
                      <label for="cart_item_checkout">Ngày checkout:</label>
                      <input name="cart_item_checkout" class="form-control" type="date"
                        min="<?php echo date('Y-m-d'); ?>" required>

                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="mb-3">
                      <label for="cart_item_count_people">Số người:</label>
                      <input name="cart_item_count_people" class="form-control required" type="number"
                        placeholder="Nhập số người lớn">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="mb-3">
                      <label for="cart_item_quantity">Số lượng phòng:</label>
                      <input name="cart_item_quantity" class="form-control required" type="number"
                        placeholder="Nhập số lượng phòng">
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="cart_item_description">Ghi chú cho nhân viên:</label>
                  <textarea name="cart_item_description" class="form-control required" rows="7"
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
                  <img src="../upload/<?php echo($categoryDetail["category_image"]) ?>" height="200"
                    style="width:100%;height:300px;border-radius:12px;" alt="">
                  <div class="text">Lorem ipsum is simply free text available dolor sit amet consectetur notted
                    adipisicing elit sed do eiusmod tempor incididunt simply dolore magna.</div>
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
      $("#contact_form").validate({
        submitHandler: function(form) {
          var form_btn = $(form).find('button[type="submit"]');
          var form_result_div = '#form-result';
          $(form_result_div).remove();
          form_btn.before(
            '<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
          var form_btn_old_msg = form_btn.html();
          form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
          $(form).ajaxSubmit({
            dataType: 'json',
            success: function(data) {
              if (data.status == 'true') {
                $(form).find('.form-control').val('');
              }
              form_btn.prop('disabled', false).html(form_btn_old_msg);
              $(form_result_div).html(data.message).fadeIn('slow');
              setTimeout(function() {
                $(form_result_div).fadeOut('slow')
              }, 6000);
            }
          });
        }
      });
    })(jQuery);
    </script>
    <script>
    function updateEndDateMin() {
      var startDate = document.getElementById('start_date').value;
      document.getElementsByName('end_date')[0].min = startDate + 'T00:00';
    }
    </script>
  </body>

</html>