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
      <?php @include "./controllers/category-list.php" ?>
      <?php @include "./layouts/header2.php" ?>
      <section class="page-title" style="background-image: url(images/background/page-title-bg.png);">
        <div class="auto-container">
          <div class="title-outer text-center">
            <h1 class="title">News Grid</h1>
            <ul class="page-breadcrumb">
              <li><a href="index.html">Home</a></li>
              <li>News</li>
            </ul>
          </div>
        </div>
      </section>
      <!-- end main-content -->

      <!-- news-section -->
      <section class="news-section">
        <div class="auto-container">
          <div class="row">
            <?php
                  if (isset($list_category) && is_array($list_category)) {
                    foreach ($list_category as $index => $category): ?>
            <div class="news-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
              <div class="inner-box wow fadeInLeft">
                <div class="image-box">
                  <figure class="image overlay-anim"><a href="news-details.html"><img src="images/resource/news-1.jpg"
                        alt=""></a></figure>
                  <span class="date">DEC<br><small>20</small></span>
                </div>
                <div class="content-box">
                  <ul class="post-info">
                    <li><i class="fa fa-user"></i>Admin</li>
                    <li><i class="fa fa-comments"></i>October 19, 2022</li>
                  </ul>
                  <h4 class="title"><a href="news-details.html">Retore Lighting Design <br>in The Hotel</a></h4>
                  <a href="news-details.html" class="read-more">Read More<i class="fa-solid fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
            <?php endforeach;
                          } ?>
            <!-- News Block -->

            <!-- News Block -->
            <div class="news-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="100ms">
              <div class="inner-box wow fadeInLeft" data-wow-delay="200ms">
                <div class="image-box">
                  <figure class="image overlay-anim"><a href="news-details.html"><img src="images/resource/news-2.jpg"
                        alt=""></a></figure>
                  <span class="date">DEC<br><small>20</small></span>
                </div>
                <div class="content-box">
                  <ul class="post-info">
                    <li><i class="fa-solid fa-user"></i>Admin</li>
                    <li><i class="fa-solid fa-comments"></i>0 comments</li>
                  </ul>
                  <h4 class="title"><a href="news-details.html">Swiming Benefits is <br>Good For Your Health</a></h4>
                  <a href="news-details.html" class="read-more">Read More<i class="fa-solid fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
            <!-- News Block -->
            <div class="news-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="200ms">
              <div class="inner-box wow fadeInLeft" data-wow-delay="300ms">
                <div class="image-box">
                  <figure class="image overlay-anim"><a href="news-details.html"><img src="images/resource/news-3.jpg"
                        alt=""></a></figure>
                  <span class="date">DEC<br><small>20</small></span>
                </div>
                <div class="content-box">
                  <ul class="post-info">
                    <li><i class="fa-solid fa-user"></i>Category</li>
                    <li><i class="fa-solid fa-comments"></i>October 19, 2022</li>
                  </ul>
                  <h4 class="title"><a href="news-details.html">Avalible Now Health <br>Club For Your Fitness </a></h4>
                  <a href="news-details.html" class="read-more">Read More<i class="fa-solid fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
            <!-- News Block -->
            <div class="news-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="300ms">
              <div class="inner-box wow fadeInLeft">
                <div class="image-box">
                  <figure class="image overlay-anim"><a href="news-details.html"><img src="images/resource/news-1.jpg"
                        alt=""></a></figure>
                  <span class="date">DEC<br><small>20</small></span>
                </div>
                <div class="content-box">
                  <ul class="post-info">
                    <li><i class="fa fa-user"></i>Admin</li>
                    <li><i class="fa fa-comments"></i>October 19, 2022</li>
                  </ul>
                  <h4 class="title"><a href="news-details.html">Retore Lighting Design <br>in The Hotel</a></h4>
                  <a href="news-details.html" class="read-more">Read More<i class="fa-solid fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
            <!-- News Block -->
            <div class="news-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
              <div class="inner-box wow fadeInLeft" data-wow-delay="200ms">
                <div class="image-box">
                  <figure class="image overlay-anim"><a href="news-details.html"><img src="images/resource/news-2.jpg"
                        alt=""></a></figure>
                  <span class="date">DEC<br><small>20</small></span>
                </div>
                <div class="content-box">
                  <ul class="post-info">
                    <li><i class="fa-solid fa-user"></i>Admin</li>
                    <li><i class="fa-solid fa-comments"></i>0 comments</li>
                  </ul>
                  <h4 class="title"><a href="news-details.html">Swiming Benefits is <br>Good For Your Health</a></h4>
                  <a href="news-details.html" class="read-more">Read More<i class="fa-solid fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
            <!-- News Block -->
            <div class="news-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="500ms">
              <div class="inner-box wow fadeInLeft" data-wow-delay="300ms">
                <div class="image-box">
                  <figure class="image overlay-anim"><a href="news-details.html"><img src="images/resource/news-3.jpg"
                        alt=""></a></figure>
                  <span class="date">DEC<br><small>20</small></span>
                </div>
                <div class="content-box">
                  <ul class="post-info">
                    <li><i class="fa-solid fa-user"></i>Category</li>
                    <li><i class="fa-solid fa-comments"></i>October 19, 2022</li>
                  </ul>
                  <h4 class="title"><a href="news-details.html">Avalible Now Health <br>Club For Your Fitness </a></h4>
                  <a href="news-details.html" class="read-more">Read More<i class="fa-solid fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php @include "./layouts/footer.php" ?>
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
  </body>

</html>