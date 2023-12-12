<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Hoexr | Hotel HTML Template | Home Page 01</title>
    <?php @include "./layouts/link.php" ?>
  </head>

  <body>
    <?php @include "./controllers/index-controller.php" ?>
    <div class="page-wrapper">
      <?php @include "./layouts/header.php" ?>
      <?php @include "./layouts/banner.php" ?>
      <!-- About Section -->
      <section class="about-section">
        <div class="auto-container">
          <div class="row">
            <!-- Content Column -->
            <div class="content-column col-xl-6 col-lg-6 order-lg-2 wow fadeInRight" data-wow-delay="600ms">
              <div class="inner-column">
                <div class="sec-title">
                  <span class="sub-title">SONA hottel</span>
                  <h2>Khách sạn hàng đầu<br>tại Việt Nam</h2>
                  <div class="text"></div>
                </div>
                <div class="outer-box">
                  <div class="info-block">
                    <div class="inner">

                    </div>
                  </div>
                  <div class="info-block">
                    <div class="inner">

                    </div>
                  </div>
                </div>
                <div class="btn-box">
                  <a href="category-list.php" class="theme-btn btn-style-one"><span class="btn-title">Trải nghiệm
                      ngay</span></a>
                  <div class="contact-info">
                    <div class="icon-box"><i class="flaticon-customer-service"></i></div>
                    <span>Gọi ngay</span>
                    <h4 class="title">03465326</h4>
                  </div>
                </div>
              </div>
            </div>

            <!-- Image Column -->
            <div class="image-column col-xl-6 col-lg-6">
              <div class="inner-column wow fadeInLeft">
                <figure class="image-1 overlay-anim wow fadeInUp"><img src="images/resource/about1-1.jpg" alt="">
                </figure>
                <figure class="image-2 overlay-anim wow fadeInLeft"><img src="images/resource/about1-2.jpg" alt="">
                </figure>
                <div class="btn-box">
                  <a class="play-now-two" data-caption="">
                    <i class="icon fa fa-play" aria-hidden="true"></i>
                    <span class="ripple"></span>
                  </a>
                </div>
                <div class="exp-box bounce-y">
                  <figure class=" overlay-anim wow fadeInLeft"><img src="images/resource/exp-icon.png" alt=""></figure>
                  <h4 class="title">Sona hotel</h4>
                  <div class="text">Giúp bạn có kì nghỉ <br>thật vui vẻ <br>Và sảng khoái.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="rooms-section pb-100">
        <div class="auto-container">
          <div class="sec-title text-center wow fadeInUp">
            <span class="sub-title">Sona Hotel</span>
            <h3>Phòng nghỉ nổi bật</h3>
          </div>
          <div class="row">
            <?php
            if (isset($list_category_popular) && is_array($list_category_popular)) {
              foreach ($list_category_popular as $index => $category): ?>
            <div class="room-block col-lg-6 col-md-6 col-sm-12">
              <div class="inner-box wow fadeIn">
                <div class="image-box">
                  <figure class="image-2 overlay-anim" style="height: 350px;border-radius:16px;"><img
                      src="../upload/<?php echo ($category["category_image"]) ?>" alt="">
                  </figure>
                </div>
                <div class="content-box">
                  <h6 class="title">
                    <?php echo ($category["category_name"]) ?>
                  </h6>
                  <span class="price">
                    <?php echo (formatMoney($category["category_price"])) ?> / Đêm
                  </span>
                </div>
                <div class="box-caption">
                  <a href="category-details.php?action=detail&category-details=<?= $category['id'] ?>" title=""
                    class="book-btn mt-2">Xem chi tiết</a>
                  <ul class="bx-links">
                    <?php
                        $listServiceByCategory = getServiceByCategory($category["id"]);
                        if (isset($listServiceByCategory) && is_array($listServiceByCategory)) {
                          foreach ($listServiceByCategory as $index => $service): ?>
                    <li><a href="#" title="">
                        <?php echo($service['service_icon']) ?></a></li>
                    <?php endforeach;
                        } ?>
                  </ul>
                </div>
              </div>
            </div>
            <?php endforeach;
            } ?>
          </div>
        </div>
      </section>
      <section class="service-section">
        <div class="auto-container">
          <div class="sec-title text-center wow slideInUp">
            <span class="sub-title">Dịch vụ</span>
          </div>
          <div class="row">
            <div class="service-block col-lg-4 col-md-6 col-sm-12">
              <div class="inner-box wow fadeIn" data-wow-delay="100ms">
                <div class="icon-box wow fadeInUp"><i class="flaticon-bed-2"></i></div>
                <div class="content-box">
                  <h4 class="title"><a href="page-service-details.html">Dịch vụ phòng</a></h4>

                </div>
              </div>
            </div>
            <div class="service-block col-lg-4 col-md-6 col-sm-12">
              <div class="inner-box wow fadeIn" data-wow-delay="200ms">
                <div class="icon-box wow fadeInUp"><i class="flaticon-travel"></i></div>
                <div class="content-box">
                  <h4 class="title"><a href="page-service-details.html">Đón và trả khách</a></h4>

                </div>
              </div>
            </div>
            <div class="service-block col-lg-4 col-md-6 col-sm-12">
              <div class="inner-box wow fadeIn" data-wow-delay="300ms">
                <div class="icon-box wow fadeInUp"><i class="flaticon-wifi"></i></div>
                <div class="content-box">
                  <h4 class="title"><a href="page-service-details.html">Wifi free</a></h4>
                </div>
              </div>
            </div>
            <div class="service-block col-lg-4 col-md-6 col-sm-12">
              <div class="inner-box wow fadeIn" data-wow-delay="400ms">
                <div class="icon-box wow fadeInUp"><i class="flaticon-breakfast"></i></div>
                <div class="content-box">
                  <h4 class="title"><a href="page-service-details.html">Phục vụ ăn uống</a></h4>
                </div>
              </div>
            </div>
            <div class="service-block col-lg-4 col-md-6 col-sm-12">
              <div class="inner-box wow fadeIn" data-wow-delay="500ms">
                <div class="icon-box wow fadeInUp"><i class="flaticon-swimming-pool"></i></div>
                <div class="content-box">
                  <h4 class="title"><a href="page-service-details.html">Hồ bơi</a></h4>

                </div>
              </div>
            </div>
            <div class="service-block col-lg-4 col-md-6 col-sm-12">
              <div class="inner-box wow fadeIn" data-wow-delay="600ms">
                <div class="icon-box wow fadeInUp"><i class="flaticon-car"></i></div>
                <div class="content-box">
                  <h4 class="title"><a href="page-service-details.html">Chỗ đậu xe</a></h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php
      @include "./layouts/footer.php"
        ?>
    </div>
    <?php @include "./layouts/script.php" ?>
  </body>

</html>