<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="description" content="Sona Template">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sona | Template</title>
    <?php
      @include "../library.php";
    ?>

  </head>

  <body>
    <?php
      @include "../layout/header.php";
      @include "../../controllers/index.php";

    ?>
    <!-- Hero Section Begin -->
    <section class="hero-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="hero-text">
              <h1>Sona A Luxury Hotel</h1>
              <p>Dưới đây là các trang web đặt phòng khách sạn tốt nhất và tìm phòng khách sạn giá rẻ.</p>
              <a href="#" class="primary-btn">Khám phá ngay</a>
            </div>
          </div>
          <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
            <div class="booking-form">
              <h3>Booking Your Hotel</h3>
              <form action="#">
                <div class="check-date">
                  <label for="date-in">Check In:</label>
                  <input type="text" class="date-input" id="date-in">
                  <i class="icon_calendar"></i>
                </div>
                <div class="check-date">
                  <label for="date-out">Check Out:</label>
                  <input type="text" class="date-input" id="date-out">
                  <i class="icon_calendar"></i>
                </div>
                <div class="select-option">
                  <label for="guest">Guests:</label>
                  <select id="guest">
                    <option value="">2 Adults</option>
                    <option value="">3 Adults</option>
                  </select>
                </div>
                <div class="select-option">
                  <label for="room">Room:</label>
                  <select id="room">
                    <option value="">1 Room</option>
                    <option value="">2 Room</option>
                  </select>
                </div>
                <button type="submit">Check Availability</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="hero-slider owl-carousel">
        <div class="hs-item set-bg" data-setbg="../../assets/img/hero/hero-1.jpg"></div>
        <div class="hs-item set-bg" data-setbg="../../assets/img/hero/hero-2.jpg"></div>
        <div class="hs-item set-bg" data-setbg="../../assets/img/hero/hero-3.jpg"></div>
      </div>
    </section>
    <!-- Hero Section End -->

    <!-- About Us Section Begin -->
    <section class="aboutus-section spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="about-text">
              <div class="section-title">
                <span>About Us</span>
                <h2>Intercontinental LA <br />Westlake Hotel</h2>
              </div>
              <p class="f-para">Sona.com là trang web cung cấp chỗ ở trực tuyến hàng đầu. Chúng tôi đam mê
                du lịch mỗi ngày. Chúng tôi truyền cảm hứng và tiếp cận hàng triệu khách du lịch trên 90 trang web địa
                phương bằng 41 ngôn ngữ. </p>
              <p class="s-para">Vì vậy, khi cần đặt phòng khách sạn, nhà nghỉ cho thuê, khu nghỉ dưỡng, căn hộ, nhà
                khách hoặc nhà trên cây hoàn hảo, chúng tôi sẽ hỗ trợ bạn</p>
              <a href="#" class="primary-btn about-btn">Xem thêm</a>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="about-pic">
              <div class="row">
                <div class="col-sm-6">
                  <img src="../../assets/img/about/about-1.jpg" alt="">
                </div>
                <div class="col-sm-6">
                  <img src="../../assets/img/about/about-2.jpg" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- About Us Section End -->

    <!-- Services Section End -->
    <section class="services-section spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title">
              <span>Những dịch vụ</span>
              <h2>Sona cung cấp</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-sm-6">
            <div class="service-item">
              <i class="flaticon-036-parking"></i>
              <h4>Travel Plan</h4>

            </div>
          </div>
          <div class="col-lg-4 col-sm-6">
            <div class="service-item">
              <i class="flaticon-033-dinner"></i>
              <h4>Catering Service</h4>

            </div>
          </div>
          <div class="col-lg-4 col-sm-6">
            <div class="service-item">
              <i class="flaticon-026-bed"></i>
              <h4>Babysitting</h4>

            </div>
          </div>
          <div class="col-lg-4 col-sm-6">
            <div class="service-item">
              <i class="flaticon-024-towel"></i>
              <h4>Laundry</h4>

            </div>
          </div>
          <div class="col-lg-4 col-sm-6">
            <div class="service-item">
              <i class="flaticon-044-clock-1"></i>
              <h4>Hire Driver</h4>

            </div>
          </div>
          <div class="col-lg-4 col-sm-6">
            <div class="service-item">
              <i class="flaticon-012-cocktail"></i>
              <h4>Bar & Drink</h4>

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Services Section End -->

    <!-- Home Room Section Begin -->
    <section class="hp-room-section">
      <div class="container-fluid">
        <div class="hp-room-items">
          <div class="row">
            <?php
                  if (isset($list_rooms_popular_top_4) && is_array($list_rooms_popular_top_4)) {
                    foreach ($list_rooms_popular_top_4 as $index => $rooms_popular_top_4): ?>
            <div class="col-lg-3 col-md-6">
              <div class="hp-room-item set-bg" data-setbg="../../../upload/<?= $rooms_popular_top_4['img'] ?>">
                <div class="hr-text">
                  <h3><?php echo $rooms_popular_top_4["name"] ?></h3>
                  <h2>$<?php echo $rooms_popular_top_4["price"] ?><span>/Night</span></h2>
                  <table>
                    <tbody>
                      <tr>
                        <td class="r-o">Kích thước:</td>
                        <td>43 sqm</td>
                      </tr>
                      <tr>
                        <td class="r-o">Sức chứa::</td>
                        <td>Max persion 3</td>
                      </tr>
                      <tr>
                        <td class="r-o">Giường:</td>
                        <td>1 King Bed</td>
                      </tr>
                      <tr>
                        <td class="r-o">Dịch vụ:</td>
                        <td>Balcony, TV, Air Conditioning, WiFi...</td>
                      </tr>
                    </tbody>
                  </table>
                  <a href="#" class="primary-btn">Chi tiết</a>
                </div>
              </div>
            </div>
            <?php endforeach;
                  } ?>
          </div>
        </div>
      </div>
    </section>
    <!-- Home Room Section End -->

    <!-- Testimonial Section Begin -->
    <section class="testimonial-section spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title">
              <span>Testimonials</span>
              <h2>What Customers Say?</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8 offset-lg-2">
            <div class="testimonial-slider owl-carousel">
              <div class="ts-item">
                <p>Sau khi trải qua một trận động đất, gia đình tôi đã phải tìm kiếm một nơi ở tạm thời trong khi nhà
                  chúng tôi được sửa chữa.
                  Với sự thoải mái và chất lượng dịch vụ đã được chứng minh từ trước ở Sona Hotel, chúng tôi không ngần
                  ngại chọn nơi này một lần nữa.</p>
                <div class="ti-author">
                  <div class="rating">
                    <i class="icon_star"></i>
                    <i class="icon_star"></i>
                    <i class="icon_star"></i>
                    <i class="icon_star"></i>
                    <i class="icon_star-half_alt"></i>
                  </div>
                  <h5> - Nguyễn Hải Nam</h5>
                </div>
                <img src="../../assets/img/testimonial-logo.png" alt="">
              </div>
              <div class="ts-item">
                <p>Sau khi dự án xây dựng kéo dài hơn dự kiến, chồng tôi, con gái và tôi cần một nơi ở trong vài đêm.
                  Là cư dân của Hà Nội, chúng tôi biết rất nhiều về thành phố, khu vực lân cận và các lựa chọn nhà ở có
                  sẵn
                  và thực sự thích thú với kỳ nghỉ của mình tại Sona Hotel. Sona Hotel đã biến một tình huống có thể làm
                  căng
                  thẳng thành một trải nghiệm thú vị không ngờ. Chúng tôi rất khuyến khích nó cho cả du khách xa xôi và
                  người
                  dân địa phương tìm kiếm một nơi nghỉ thoải mái và đẹp trong thành phố.</p>
                <div class="ti-author">
                  <div class="rating">
                    <i class="icon_star"></i>
                    <i class="icon_star"></i>
                    <i class="icon_star"></i>
                    <i class="icon_star"></i>
                    <i class="icon_star-half_alt"></i>
                  </div>
                  <h5> - David Beckham</h5>
                </div>
                <img src="../../assets/img/testimonial-logo.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Testimonial Section End -->

    <!-- Blog Section Begin -->
    <section class="blog-section spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title">
              <span>Hotel News</span>
              <h2>Ưu đãi đặc biệt</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="blog-item set-bg" data-setbg="../../assets/img/blog/blog-1.jpg">
              <div class="bi-text">
                <span class="b-tag">Lễ tạ ơn</span>
                <h4><a href="#">Thanksgiving Buffet</a></h4>
                <div class="b-time"><i class="icon_clock_alt"></i> Friday, November 24, 2023</div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="blog-item set-bg" data-setbg="../../assets/img/blog/blog-2.jpg">
              <div class="bi-text">
                <span class="b-tag">Mua 1 tặng 1 </span>
                <h4><a href="#">Happy Hour</a></h4>
                <div class="b-time"><i class="icon_clock_alt"></i>Every day in November 2023</div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="blog-item set-bg" data-setbg="../../assets/img/blog/blog-3.jpg">
              <div class="bi-text">
                <span class="b-tag">Tiệc trà chiều trên Hồ Tây</span>
                <h4><a href="#">Hi - Tea</a></h4>
                <div class="b-time"><i class="icon_clock_alt"></i>Every day in November 2023</div>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="blog-item small-size set-bg" data-setbg="../../assets/img/blog/blog-wide.jpg">
              <div class="bi-text">
                <span class="b-tag">Event</span>
                <h4><a href="#">Trip To Iqaluit In Nunavut A Canadian Arctic City</a></h4>
                <div class="b-time"><i class="icon_clock_alt"></i> 08th April, 2019</div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="blog-item small-size set-bg" data-setbg="../../assets/img/blog/blog-10.jpg">
              <div class="bi-text">
                <span class="b-tag">Travel</span>
                <h4><a href="#">Traveling To Barcelona</a></h4>
                <div class="b-time"><i class="icon_clock_alt"></i> 12th April, 2019</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Blog Section End -->

    <?php 
      @include "../layout/footer.php"
    ?>

    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/jquery.magnific-popup.min.js"></script>
    <script src="../../assets/js/jquery-3.3.1.min.js"></script>
    <script src="../../assets/js/jquery.nice-select.min.js"></script>
    <script src="../../assets/js/jquery-ui.min.js"></script>
    <script src="../../assets/js/jquery.slicknav.js"></script>
    <script src="../../assets/js/owl.carousel.min.js"></script>
    <script src="../../assets/js/main.js"></script>
  </body>

</html>