<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Hoexr | Hotel HTML Template Template</title>
    <?php @include "./layouts/link.php" ?>
  </head>

  <body>
    <div class="page-wrapper">
      <div class="preloader"></div>
      <?php @include "./controllers/category-details.php" ?>
      <?php @include "./layouts/header2.php" ?>
      <section class="page-title" style="background-image: url(images/background/page-title-bg.png);">
        <div class="auto-container">
          <div class="title-outer text-center">
            <h1 class="title"><?php echo($categoryDetail["category_name"]) ?></h1>
            <ul class="page-breadcrumb">
              <li><a href="index.html">Home</a></li>
              <li>Room Details</li>
            </ul>
          </div>
        </div>
      </section>
      <!-- end main-content -->

      <!--Blog Details Start-->
      <section class="blog-details">
        <div class="container">
          <div class="row">
            <div class="col-xl-8 col-lg-7 product-details rd-page">
              <div class="bxslider">
                <div class="slider-content">
                  <img src="../upload/<?php echo($categoryDetail["category_image"]) ?>" height="200"
                    style="width:100%;height:400px;border-radius:16px;" alt="">
                </div>
              </div>
              <div class="room-details__left">
                <div class="wrapper">
                  <h3>Description of Room</h3>
                  <p class="text"><?php echo($categoryDetail["category_description"]) ?></p>
                  <div class="row justify-content-center">
                    <div class="col-xl-12">
                      <div class="room-details__content-right mb-40 mt-20">
                        <div class="room-details__details-box">
                          <div class="row">
                            <div class="col-6 col-md-3">
                              <p class="text mb-0">Room Size</p>
                              <h6>600Sq</h6>
                            </div>
                            <div class="col-6 col-md-3">
                              <p class="text mb-0">Rooms Bed</p>
                              <h6>2 Single Bed</h6>
                            </div>
                            <div class="col-6 col-md-3">
                              <p class="text mb-0">Occupancy</p>
                              <h6>Three Persons</h6>
                            </div>
                            <div class="col-6 col-md-3">
                              <p class="text mb-0">View</p>
                              <h6>Sea View</h6>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="mt-40">
                  <h4>Room Facilities</h4>
                  <div class="row room-facility-list mb-40">
                    <div class="col-sm-6 col-xl-4">
                      <div class="list-one d-flex align-items-center me-sm-4 mb-3">
                        <div class="icon text-theme-color1 mr-10 flex-shrink-0"><i class="far fa-air-conditioner"></i>
                        </div>
                        <h6 class="title m-0">Air Conditionar</h6>
                      </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                      <div class="list-one d-flex align-items-center me-sm-4 mb-3">
                        <div class="icon text-theme-color1 mr-10 flex-shrink-0"><i class="far fa-swimming-pool"></i>
                        </div>
                        <h6 class="title m-0">Swiming Pool</h6>
                      </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                      <div class="list-one d-flex align-items-center me-sm-4 mb-3">
                        <div class="icon text-theme-color1 mr-10 flex-shrink-0"><i class="far fa-dumbbell"></i></div>
                        <h6 class="title m-0">Gymnasium</h6>
                      </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                      <div class="list-one d-flex align-items-center me-sm-4 mb-3">
                        <div class="icon text-theme-color1 mr-10 flex-shrink-0"><i class="fas fa-parking-circle"></i>
                        </div>
                        <h6 class="title m-0">Parking</h6>
                      </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                      <div class="list-one d-flex align-items-center me-sm-4 mb-3">
                        <div class="icon text-theme-color1 mr-10 flex-shrink-0"><i class="far fa-shield-check"></i>
                        </div>
                        <h6 class="title m-0">Security</h6>
                      </div>
                    </div>
                    <div class="col-sm-6 col-xl-4">
                      <div class="list-one d-flex align-items-center me-sm-4">
                        <div class="icon text-theme-color1 mr-10 flex-shrink-0"><i class="far fa-child"></i></div>
                        <h6 class="title m-0">Playground</h6>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-sm-flex align-items-sm-center justify-content-sm-between pt-40 pb-40 border-top">
                  <h6 class="my-sm-0">Share Details</h6>
                  <div class="blog-details__social-list"> <a href="news-details.html"><i class="fab fa-twitter"></i></a>
                    <a href="news-details.html"><i class="fab fa-facebook"></i></a> <a href="news-details.html"><i
                        class="fab fa-pinterest-p"></i></a> <a href="news-details.html"><i
                        class="fab fa-instagram"></i></a>
                  </div>
                </div>
                <div class="p-4 p-lg-5 bg-light">
                  <h4 class="mt-0">Send Us Your Question</h4>
                  <form id="contact_form" name="contact_form" class=""
                    action="https://kodesolution.com/html/2023/hoexr-html/includes/sendmail.php" method="post">
                    <div class="row">
                      <div class="col-sm-6 col-xl-4">
                        <div class="mb-3">
                          <input name="form_name" class="form-control bg-white" type="text" placeholder="Enter Name">
                        </div>
                      </div>
                      <div class="col-sm-6 col-xl-4">
                        <div class="mb-3">
                          <input name="form_email" class="form-control bg-white required email" type="email"
                            placeholder="Enter Email">
                        </div>
                      </div>
                      <div class="col-xl-4">
                        <div class="mb-3">
                          <input name="form_phone" class="form-control bg-white required phone" type="number"
                            placeholder="Enter Phone">
                        </div>
                      </div>
                    </div>
                    <div class="mb-3">
                      <textarea name="form_message" class="form-control bg-white required" rows="5"
                        placeholder="Enter Message"></textarea>
                    </div>
                    <div class="mb-0">
                      <input name="form_botcheck" class="form-control" type="hidden" value="">
                      <button type="submit" class="theme-btn btn-style-one" data-loading-text="Please wait..."><span
                          class="btn-title">Submit Comment</span></button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-5">
              <div class="sidebar">
                <div class="sidebar__post mb-30">
                  <div>
                    <div class="mb-3">
                      <a href="booking.php?action=booking&booking=<?= $categoryDetail['id'] ?>">
                        <button type="submit" class="theme-btn btn-style-one w-100">
                          <span class="btn-title">Đặt ngay</span>
                        </button>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="sidebar__single sidebar__post">
                  <h3 class="sidebar__title">Phòng liên quan</h3>
                  <ul class="sidebar__post-list list-unstyled">
                    <li>
                      <div class="sidebar__post-image"> <img src="images/resource/news-info-1.jpg" alt=""> </div>
                      <div class="sidebar__post-content">
                        <h3> <span class="sidebar__post-content-meta"><i class="far fa-door-open"></i>Economy
                            Room</span> <a href="#">$175/Night</a>
                        </h3>
                      </div>
                    </li>
                    <li>
                      <div class="sidebar__post-image"> <img src="images/resource/news-info-2.jpg" alt=""> </div>
                      <div class="sidebar__post-content">
                        <h3> <span class="sidebar__post-content-meta"><i class="far fa-door-open"></i>Deluxe Room</span>
                          <a href="#">$250</a>
                        </h3>
                      </div>
                    </li>
                    <li>
                      <div class="sidebar__post-image"> <img src="images/resource/news-info-1.jpg" alt=""> </div>
                      <div class="sidebar__post-content">
                        <h3> <span class="sidebar__post-content-meta"><i class="far fa-door-open"></i>Super Deluxe
                            Room</span> <a href="#">$320</a> </h3>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--Blog Details End-->
      <?php @include "./layouts/footer.php" ?>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.fancybox.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/appear.js"></script>
    <script src="js/bxslider.js"></script>
    <script src="js/owl.js"></script>
    <script src="js/script.js"></script>
    <!-- form submit -->
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/jquery.form.min.js"></script>
  </body>

</html>