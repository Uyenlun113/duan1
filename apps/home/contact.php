<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Liên hệ | Khách sạn Hoexr</title>
    <?php include "./layouts/link.php" ?>
  </head>

  <body>
    <?php @include "./controllers/contact-controller.php" ?>
    <div class="page-wrapper">
      <div class="preloader"></div>
      <?php @include "./layouts/header2.php" ?>
      <section class="page-title" style="background-image: url(images/background/page-title-bg.png);">
        <div class="auto-container">
          <div class="title-outer text-center">
            <h1 class="title">Liên hệ</h1>
            <ul class="page-breadcrumb">
              <li><a href="index.html">Trang chủ</a></li>
              <li>Liên hệ</li>
            </ul>
          </div>
        </div>
      </section>
      <section class="contact-details">
        <div class="container " style="padding-bottom: 0px;">
          <div class="row">
            <div class="col-xl-7 col-lg-6">
              <div class="sec-title">
                <span class="sub-title before-none">Gửi email cho chúng tôi</span>
              </div>
              <form id="contact_form" name="contact_form" class="" method="post">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="mb-3">
                      <input name="form_name" class="form-control" type="text" placeholder="Họ và tên">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="mb-3">
                      <input name="form_email" class="form-control required email" type="email" placeholder="Email">
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-12 ">
                    <input name="form_subject" class="form-control required" type="text" placeholder="Số điện thoại">
                  </div>
                </div>
                <div class="mb-3">
                  <textarea name="form_message" class="form-control required" rows="7"
                    placeholder="Nhập nội dung"></textarea>
                </div>
                <div class="mb-5">
                  <input name="form_botcheck" class="form-control" type="hidden" value="" />
                  <button type="submit" class="theme-btn btn-style-one" data-loading-text="Please wait..."><span
                      class="btn-title">Gửi ngay</span></button>
                </div>
              </form>
            </div>
            <div class="col-xl-5 col-lg-6">
              <div class="contact-details__right">
                <div class="sec-title">
                  <span class="sub-title before-none">Bạn cần giúp gì nào?</span>
                  <h3>Hãy liên hệ với chúng tôi</h3>
                </div>
                <ul class="list-unstyled contact-details__info">
                  <li>
                    <div class="icon bg-theme-color2">
                      <span class="lnr-icon-phone-plus"></span>
                    </div>
                    <div class="text">
                      <h6>Bạn có câu hỏi</h6>
                      <a href="tel:02363658555"><span>Free</span> (+84) 236 3658 555</a>
                    </div>
                  </li>
                  <li>
                    <div class="icon">
                      <span class="lnr-icon-envelope1"></span>
                    </div>
                    <div class="text">
                      <h6>Viết email</h6>
                      <a href="mailto:needhelp@company.com">info@saladn.com</a>
                    </div>
                  </li>
                  <li>
                    <div class="icon">
                      <span class="lnr-icon-location"></span>
                    </div>
                    <div class="text">
                      <h6>Ghé thăm chúng tôi</h6>
                      <span> 36 – 38 Lâm Hoành, phường Phước Mỹ, quận Sơn Trà, Đà Nẵng</span>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="map-section">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.062922243125!2d108.24260647473!3d16.062224284616253!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31421778a1a1ec31%3A0x22e751e30a3a2ba8!2sSala%20Danang%20Beach%20Hotel!5e0!3m2!1svi!2s!4v1702097790265!5m2!1svi!2s"
          style="width:100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </section>
      <?php include "./layouts/footer.php" ?>
    </div>
    <?php @include "./layouts/script.php" ?>
  </body>

</html>