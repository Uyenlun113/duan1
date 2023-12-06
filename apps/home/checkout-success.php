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
      <?php @include "./momo_payment/handle_payment_momo.php" ?>
      <?php include "./layouts/header2.php" ?>
      <section class="page-title" style="background-image: url(images/background/page-title-bg.png);">
        <div class="auto-container">
          <div class="title-outer text-center">
            <h1 class="title">Checkout</h1>
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
            <div class="row mt-30">
              <div class="col-md-12 mt-60">
                <div class="col-12 col-lg-8 mx-auto text-center mb-3">
                  <h1><i class="icon fa-solid fa-box-check fa-2xl" style="color: #11ff00;"></i></h1>
                  <h4 class="mt-2">Thank You! 😇</h4>
                  <br />
                  <p>Your order <a href="javascript:void(0)">#1536548131</a> has been placed!</p>
                  <p>We sent an email to <a href="mailto:john.doe@example.com">john.doe@example.com</a> with your order
                    confirmation and receipt. If the email hasn't arrived within two minutes, please check your spam
                    folder to see if the email was routed there.</p>
                  <p><span class="fw-medium"><i class="bx bx-time-five me-1"></i> Time placed:&nbsp;</span> 25/05/2020
                    13:35pm</p>
                  <a href="index.php"><span>Tiếp tục mua hàng</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php include "./layouts/footer.php" ?>
    </div><!-- End Page Wrapper -->


    <!-- Scroll To Top -->
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
  </body>

</html>