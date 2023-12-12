<section class="banner-section">
  <div class="banner-slider">
    <div class="banner-slide">
      <figure class="image"><img src="images/banner/banner-1.jpg" alt=""></figure>
      <div class="content-box">
        <span class="sub-title" data-animation-in="fadeInUp" data-delay-in="0.1">Sona
          hotel</span>
        <h1 data-animation-in="fadeInUp" data-delay-in="0.3">Đặt phòng và tận hưởng ngay</h1>

      </div>
    </div>
    <div class="banner-slide">
      <figure class="image wow fadeInUp"><img src="images/banner/banner-1.jpg" alt=""></figure>
      <div class="content-box">
        <span class="sub-title" data-animation-in="fadeInUp" data-delay-in="0.1">sona
          hotel</span>
        <h1 data-animation-in="fadeInUp" data-delay-in="0.3">Mang đến cho các bạn <br> một kì nghỉ tuyệt vời</h1>
        <a href="page-about.html" class="btn" data-animation-in="fadeInUp" data-delay-in="0.5">rooms & suites</a>
      </div>
    </div>
    <div class="banner-slide">
      <figure class="image wow fadeInUp"><img src="images/banner/banner-1.jpg" alt=""></figure>
      <div class="content-box">
        <span class="sub-title" data-animation-in="fadeInUp" data-delay-in="0.1">sona
          hotel</span>
        <h1 data-animation-in="fadeInUp" data-delay-in="0.3">Chúc bạn có một kỳ nghỉ tuyệt vời</h1>
        <a href="page-about.html" class="btn" data-animation-in="fadeInUp" data-delay-in="0.5">rooms & suites</a>
      </div>
    </div>
  </div>
  <form action="category-list.php" method="POST" id="contact_form" enctype="multipart/form-data" novalidate>
    <div class="checkout-form-section wow slideInUp">
      <div class="auto-container">
        <div class="checkout-form">
          <div class="checkout-field">
            <h6>Check in</h6>
            <div class="chk-field">
              <input class="date-pick" name="check_in_category" type="text" placeholder="dd-mm-yyyy"
                value="<?php echo isset($_GET['check_in_category']) ? htmlspecialchars($_GET['check_in_category']) : ''; ?>" />
              <i class="fa fa-calendar"></i>
            </div>
          </div>
          <div class="checkout-field">
            <h6>Check out</h6>
            <div class="chk-field">
              <input class="date-pick" name="check_out_category" type="text" placeholder="dd-mm-yyyy"
                value="<?php echo isset($_GET['check_out_category']) ? htmlspecialchars($_GET['check_out_category']) : ''; ?>" />
              <i class="fa fa-calendar"></i>
            </div>
          </div>
          <div class="checkout-field br-0">
            <h6>Số người</h6>
            <div class="chk-field">
              <i class="fa-light fa-arrow-up-9-1"></i>
              <input type="text" placeholder="Nhập số người" name="category_adult"
                value="<?php echo isset($_GET['category_adult']) ? htmlspecialchars($_GET['category_adult']) : ''; ?>">
            </div>
          </div>
          <button href="#" type="submit" name="filter_category" class="theme-btn btn-style-one"><span
              class="btn-title">Tìm kiếm ngay</span>
          </button>
        </div>
      </div>
    </div>
  </form>
</section>