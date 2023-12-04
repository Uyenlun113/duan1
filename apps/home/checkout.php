<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Hoexr | Hotel HTML Template Template</title>
    <?php include "./layouts/link.php" ?>
  </head>

  <body>

    <div class="page-wrapper">
      <div class="preloader"></div>
      <?php @include "./controllers/checkout.php" ?>
      <?php include "./layouts/header2.php" ?>
      <section class="page-title" style="background-image: url(images/background/page-title-bg.png);">
        <div class="auto-container">
          <div class="title-outer text-center">
            <h1 class="title">Thanh toán</h1>
            <ul class="page-breadcrumb">
              <li><a href="index.html">Home</a></li>
              <li>Shop</li>
            </ul>
          </div>
        </div>
      </section>
      <!-- end main-content -->

      <!--checkout Start-->
      <section>
        <div class="container pt-70">
          <div class="section-content">
            <div class="row mt-10">
              <div class="col-md-12 mt-60">
                <div class="payment-method">
                  <h3>Chọn phương thức thanh toán</h3>
                  <ul class="accordion-box">
                    <li class="accordion block" data-name="Thanh toán bằng QR">
                      <div class="acc-btn">
                        <div class="icon-outer"><i class="lnr-icon-chevron-down"></i></div>
                        Thanh toán bằng QR
                      </div>
                      <div class="acc-content">
                        <div class="row clearfix">
                          <div>
                            <img src="../upload/payment/qr-code.png" alt="" width="100">
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="accordion block " data-name="Thanh toán bằng momo">
                      <div class="acc-btn ">
                        <div class="icon-outer"><i class="lnr-icon-chevron-down"></i></div>
                        Thanh toán bằng MOMO
                      </div>
                      <div class="acc-content ">
                        <div class="payment-info">
                          <div class="row clearfix">
                            <form method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                              action="checkout.php">
                              <button type="submit" name="momo">Thanh toán qua Momo</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="accordion block" data-name="Thanh toán bằng vnpay">
                      <div class="acc-btn">
                        <div class="icon-outer"><i class="lnr-icon-chevron-down"></i></div>
                        Thanh toán bằng VNPAY
                      </div>
                      <div class="acc-content">
                        <div class="payment-info">
                          <div class="row clearfix">
                            <form method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                              action="checkout.php">
                              <button type="submit" name="vnpay">Thanh toán qua vnpay</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-12 mt-2">
                Sau khi giao dịch thành công hay click thanh toán và chờ nhân viên xác thực trong thời gian sớm nhất!
              </div>
              <form method="POST" action="checkout.php" enctype="multipart/form-data">
                <div class="col-md-12 mt-60">
                  <button type="submit" name="checkout" class="theme-btn btn-style-one">
                    <span class="btn-title">Thanh toán</span>
                  </button>
                  <input type="text" id="orders_payment_method" name="orders_payment_method" hidden>
                </div>
              </form>

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
    <script src="js/bxslider.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/appear.js"></script>
    <script src="js/owl.js"></script>
    <script src="js/script.js"></script>
    <script>
    $(document).ready(function() {
      $(".accordion-box .accordion").on("click", function() {
        var newAccordion = $(this);
        var dataName = newAccordion.data("name");
        $("#orders_payment_method").val(dataName);
      });
    });
    </script>
  </body>

</html>