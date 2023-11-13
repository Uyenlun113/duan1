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
      @include "library.php";
    ?>

  </head>

  <body>
    <?php 
      @include "page/layout/header.php"
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
        <div class="hs-item set-bg" data-setbg="assets/img/hero/hero-1.jpg"></div>
        <div class="hs-item set-bg" data-setbg="assets/img/hero/hero-2.jpg"></div>
        <div class="hs-item set-bg" data-setbg="assets/img/hero/hero-3.jpg"></div>
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
                 du lịch mỗi ngày. Chúng tôi truyền cảm hứng và tiếp cận hàng triệu khách du lịch trên 90 trang web địa phương bằng 41 ngôn ngữ. </p>
              <p class="s-para">Vì vậy, khi cần đặt phòng khách sạn, nhà nghỉ cho thuê, khu nghỉ dưỡng, căn hộ, nhà khách hoặc nhà trên cây hoàn hảo, chúng tôi sẽ hỗ trợ bạn</p>
              <a href="#" class="primary-btn about-btn">Xem thêm</a>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="about-pic">
              <div class="row">
                <div class="col-sm-6">
                  <img src="assets/img/about/about-1.jpg" alt="">
                </div>
                <div class="col-sm-6">
                  <img src="assets/img/about/about-2.jpg" alt="">
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
            <div class="col-lg-3 col-md-6">
              <div class="hp-room-item set-bg" data-setbg="assets/img/room/room-b1.jpg">
                <div class="hr-text">
                  <h3>Family Rooms</h3>
                  <h2>199$<span>/Pernight</span></h2>
                  <table>
                    <tbody>
                      <tr>
                        <td class="r-o">Size:</td>
                        <td>30 ft</td>
                      </tr>
                      <tr>
                        <td class="r-o">Capacity:</td>
                        <td>Max persion 5</td>
                      </tr>
                      <tr>
                        <td class="r-o">Bed:</td>
                        <td>King Beds</td>
                      </tr>
                      <tr>
                        <td class="r-o">Services:</td>
                        <td>Wifi, Television, Bathroom,...</td>
                      </tr>
                    </tbody>
                  </table>
                  <a href="#" class="primary-btn">Chi tiết</a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="hp-room-item set-bg" data-setbg="assets/img/room/room-b2.jpg">
                <div class="hr-text">
                  <h3> Non-Smoking Rooms</h3>
                  <h2>159$<span>/Pernight</span></h2>
                  <table>
                    <tbody>
                      <tr>
                        <td class="r-o">Kích thước:</td>
                        <td>30 ft</td>
                      </tr>
                      <tr>
                        <td class="r-o">Sức chứa:</td>
                        <td>Max persion 5</td>
                      </tr>
                      <tr>
                        <td class="r-o">Giường:</td>
                        <td>King Beds</td>
                      </tr>
                      <tr>
                        <td class="r-o">Dịch vụ:</td>
                        <td>Wifi, Television, Bathroom,...</td>
                      </tr>
                    </tbody>
                  </table>
                  <a href="#" class="primary-btn">Chi tiết</a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="hp-room-item set-bg" data-setbg="assets/img/room/room-b3.jpg">
                <div class="hr-text">
                  <h3>Soundproof Rooms</h3>
                  <h2>198$<span>/Pernight</span></h2>
                  <table>
                    <tbody>
                      <tr>
                        <td class="r-o">Size:</td>
                        <td>30 ft</td>
                      </tr>
                      <tr>
                        <td class="r-o">Capacity:</td>
                        <td>Max persion 5</td>
                      </tr>
                      <tr>
                        <td class="r-o">Bed:</td>
                        <td>King Beds</td>
                      </tr>
                      <tr>
                        <td class="r-o">Services:</td>
                        <td>Wifi, Television, Bathroom,...</td>
                      </tr>
                    </tbody>
                  </table>
                  <a href="#" class="primary-btn">Chi tiết</a>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="hp-room-item set-bg" data-setbg="assets/img/room/room-b4.jpg">
                <div class="hr-text">
                  <h3>Disabled Facilities/Rooms</h3>
                  <h2>299$<span>/Pernight</span></h2>
                  <table>
                    <tbody>
                      <tr>
                        <td class="r-o">Size:</td>
                        <td>30 ft</td>
                      </tr>
                      <tr>
                        <td class="r-o">Capacity:</td>
                        <td>Max persion 5</td>
                      </tr>
                      <tr>
                        <td class="r-o">Bed:</td>
                        <td>King Beds</td>
                      </tr>
                      <tr>
                        <td class="r-o">Services:</td>
                        <td>Wifi, Television, Bathroom,...</td>
                      </tr>
                    </tbody>
                  </table>
                  <a href="#" class="primary-btn">Chi tiết</a>
                </div>
              </div>
            </div>
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
                <p>After a construction project took longer than expected, my husband, my daughter and I
                  needed a place to stay for a few nights. As a Chicago resident, we know a lot about our
                  city, neighborhood and the types of housing options available and absolutely love our
                  vacation at Sona Hotel.</p>
                <div class="ti-author">
                  <div class="rating">
                    <i class="icon_star"></i>
                    <i class="icon_star"></i>
                    <i class="icon_star"></i>
                    <i class="icon_star"></i>
                    <i class="icon_star-half_alt"></i>
                  </div>
                  <h5> - Alexander Vasquez</h5>
                </div>
                <img src="assets/img/testimonial-logo.png" alt="">
              </div>
              <div class="ts-item">
                <p>After a construction project took longer than expected, my husband, my daughter and I
                  needed a place to stay for a few nights. As a Chicago resident, we know a lot about our
                  city, neighborhood and the types of housing options available and absolutely love our
                  vacation at Sona Hotel.</p>
                <div class="ti-author">
                  <div class="rating">
                    <i class="icon_star"></i>
                    <i class="icon_star"></i>
                    <i class="icon_star"></i>
                    <i class="icon_star"></i>
                    <i class="icon_star-half_alt"></i>
                  </div>
                  <h5> - Alexander Vasquez</h5>
                </div>
                <img src="assets/img/testimonial-logo.png" alt="">
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
              <h2>Our Blog & Event</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="blog-item set-bg" data-setbg="assets/img/blog/blog-1.jpg">
              <div class="bi-text">
                <span class="b-tag">Travel Trip</span>
                <h4><a href="#">Tremblant In Canada</a></h4>
                <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="blog-item set-bg" data-setbg="assets/img/blog/blog-2.jpg">
              <div class="bi-text">
                <span class="b-tag">Camping</span>
                <h4><a href="#">Choosing A Static Caravan</a></h4>
                <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="blog-item set-bg" data-setbg="assets/img/blog/blog-3.jpg">
              <div class="bi-text">
                <span class="b-tag">Event</span>
                <h4><a href="#">Copper Canyon</a></h4>
                <div class="b-time"><i class="icon_clock_alt"></i> 21th April, 2019</div>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="blog-item small-size set-bg" data-setbg="assets/img/blog/blog-wide.jpg">
              <div class="bi-text">
                <span class="b-tag">Event</span>
                <h4><a href="#">Trip To Iqaluit In Nunavut A Canadian Arctic City</a></h4>
                <div class="b-time"><i class="icon_clock_alt"></i> 08th April, 2019</div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="blog-item small-size set-bg" data-setbg="assets/img/blog/blog-10.jpg">
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
      @include "page/layout/footer.php"
    ?>

    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/jquery.slicknav.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/main.js"></script>
  </body>

</html>