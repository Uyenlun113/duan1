<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Hoexr | Hotel HTML Template Template</title>
    <?php @include "./layouts/link.php" ?>
    <style>
    .text em {
      background-color: transparent !important;
    }
    </style>
  </head>

  <body>
    <div class="page-wrapper">
      <div class="preloader"></div>
      <?php @include "./controllers/category-list.php" ?>
      <?php @include "./layouts/header2.php" ?>
      <section class="page-title" style="background-image: url(images/background/page-title-bg.png);">
        <div class="auto-container" style="z-index:100">
          <div class="title-outer text-center">
            <h1 class="title">Danh sách loại phòng</h1>
            <ul class="page-breadcrumb">
              <li><a href="index.html">Trang chủ</a></li>
              <li>Loại phòng</li>
            </ul>
          </div>
          <form action="category-list.php" method="POST" id="contact_form" enctype="multipart/form-data" novalidate>
            <div class="checkout-form-section wow slideInUp">
              <div class="auto-container">
                <div class="checkout-form">
                  <div class="checkout-field">
                    <h6>Check in</h6>
                    <input type="text"
                      value="<?php echo isset($_GET['search_category']) ? htmlspecialchars($_GET['search_category']) : ''; ?>"
                      name="search_category">
                    <div class="chk-field">
                      <input class="date-pick" name="check_in_category" type="text" placeholder="dd-mm-yyyy"
                        value="<?php echo isset($_GET['check_in_category']) ? htmlspecialchars($_GET['check_in_category']) : ''; ?>"
                        id="check_in_category" />
                      <i class="fa fa-calendar"></i>

                    </div>
                  </div>
                  <div class="checkout-field">
                    <h6>Check out</h6>
                    <div class="chk-field">
                      <input class="date-pick" name="check_out_category" type="text" placeholder="dd-mm-yyyy"
                        value="<?php echo isset($_GET['check_out_category']) ? htmlspecialchars($_GET['check_out_category']) : ''; ?>"
                        id="check_out_category" />
                      <i class="fa fa-calendar"></i>
                    </div>
                  </div>
                  <div class="checkout-field br-0">
                    <h6>Số người</h6>
                    <div class="chk-field">
                      <i class="fa-light fa-arrow-up-9-1"></i>
                      <input type="text" placeholder="Nhập số người" name="category_adult"
                        value="<?php echo isset($_GET['category_adult']) ? htmlspecialchars($_GET['category_adult']) : ''; ?>"
                        id="category_adult_category" />
                    </div>
                  </div>
                  <button href="#" type="submit" name="filter_category" class="theme-btn btn-style-one"><span
                      class="btn-title">Tìm kiếm ngay</span>
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>

      </section>

      <section class="news-section">
        <div class="auto-container">
          <div class="row">
            <?php
            if (isset($list_category) && is_array($list_category)) {
              $count = count($list_category);
              for ($index = 0; $index < $count; $index += 2) {
                $category1 = $list_category[$index];
                $category2 = ($index + 1 < $count) ? $list_category[$index + 1] : null;
                ?>
            <div class="row feature-row g-0 wow slideInUp" data-wow-delay="<?php echo (($index / 2 + 1) * 100) ?>ms">
              <div class="image-column col-lg-4 col-md-12 col-sm-12">
                <div class="inner-column">
                  <div class="image-box">
                    <figure class="image overlay-anim">
                      <img src="../upload/<?php echo ($category1["category_image"]) ?>" alt="">
                    </figure>
                  </div>
                </div>
              </div>
              <div class="content-column col-lg-8 col-md-12 col-sm-12">
                <div class="inner-column">
                  <div class="content-box">
                    <div class="sec-title">
                      <span class="sub-title">Sala Hotel</span>
                      <h3>
                        <?php echo ($category1["category_name"]) ?>
                      </h3>
                      <h6>
                        <?php echo (formatMoney($category1["category_price"])) ?>
                      </h6>
                      <div class="text">
                        <?php echo ($category1["category_description"]) ?>
                      </div>
                    </div>
                    <a href="category-details.php?action=detail&category-details=<?= $category1['id'] ?>"
                      class="theme-btn btn-style-one read-more">Xem chi tiết</a>
                    <figure class="image-2"><img src="images/resource/icon.png" alt=""></figure>
                  </div>
                </div>
              </div>
            </div>

            <?php if ($category2 != null): ?>
            <div class="row feature-row g-0 wow slideInUp" data-wow-delay="200ms">
              <div class="content-column col-lg-8 col-md-12 col-sm-12">
                <div class="inner-column">
                  <div class="content-box">
                    <div class="sec-title">
                      <span class="sub-title">Sala Hotel</span>
                      <h3>
                        <?php echo ($category2["category_name"]) ?>
                      </h3>
                      <h6>
                        <?php echo (formatMoney($category2["category_price"])) ?>
                      </h6>
                      <div class="text">
                        <?php echo ($category2["category_description"]) ?>
                      </div>
                    </div>
                    <a href="category-details.php?action=detail&category-details=<?= $category2['id'] ?>"
                      class="theme-btn btn-style-one read-more">Xem chi tiết</a>
                    <figure class="image-2">
                      <img src="images/resource/icon-2.png" alt="" />
                    </figure>
                  </div>
                </div>
              </div>
              <div class="image-column col-lg-4 col-md-12 col-sm-12">
                <div class="inner-column">
                  <div class="image-box">
                    <figure class="image overlay-anim">
                      <img src="../upload/<?php echo ($category2["category_image"]) ?>" alt="">
                    </figure>
                  </div>
                </div>
              </div>
            </div>
            <?php endif; ?>
            <?php
              }
            }
            ?>
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
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/jquery.form.min.js"></script>
    <?php @include "./layouts/script.php" ?>
    <script>
    (function($) {
      $("#contact_form").validate({});
    })(jQuery);

    function searchCategory() {
      var searchValue = document.getElementById('search_category')?.value || '';
      checkInCategory = document.getElementById('check_in_category')?.value || '';
      checkOutCategory = document.getElementById('check_out_category')?.value || '';
      categoryAdultCategory = document.getElementById('category_adult_category')?.value || '';
      window.location.href =
        "?check_in_category=" + encodeURIComponent(checkInCategory) +
        "&check_out_category=" + encodeURIComponent(checkOutCategory) +
        "&category_adult=" + encodeURIComponent(categoryAdultCategory) +
        "&search_category=" + encodeURIComponent(searchValue);
    }
    </script>

  </body>

</html>