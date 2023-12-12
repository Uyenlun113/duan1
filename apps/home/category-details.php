<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Hoexr | Hotel HTML Template Template</title>
    <?php @include "./layouts/link.php" ?>
    <style>
    .ratings {
      list-style-type: none;
      margin: 0;
      padding: 0;
      width: 100%;
      direction: rtl;
      text-align: left;
    }

    .star {
      position: relative;
      line-height: 20px;
      display: inline-block;
      transition: color 0.2s ease;
      color: #ebebeb;
    }

    .star:before {
      content: '\2605';
      width: 20px;
      height: 20px;
      font-size: 20px;
    }

    .star:hover,
    .star.selected,
    .star:hover~.star,
    .star.selected~.star {
      transition: color 0.8s ease;
      color: orange;
    }

    .wrapper em {
      background-color: transparent !important;
    }

    .room-facility-list .icon {
      border: 1px solid var(--theme-color1);
      border-radius: 50%;
      display: block;
      font-size: 15px;
      height: 35px;
      line-height: 35px;
      text-align: center;
      width: 35px;
      -webkit-transition: all 0.3s ease;
      transition: all 0.3s ease;
    }

    .comment-one .comment-one__single {
      display: block !important;
      padding-bottom: 20px;
      margin-bottom: 40px;
    }

    .sidebar__post .sidebar__post-list li {
      padding: 10px;
    }

    .sidebar__post {
      padding: 20px;

    }
    </style>
  </head>

  <body>
    <div class="page-wrapper">
      <!-- <div class="preloader"></div> -->
      <?php @include "./controllers/category-details.php" ?>
      <?php @include "./layouts/header2.php" ?>
      <section class="page-title" style="background-image: url(images/background/page-title-bg.png);">
        <div class="auto-container">
          <div class="title-outer text-center">
            <h4 class="title" style="font-size:50px">
              <?php echo ($categoryDetail["category_name"]) ?>
            </h4>
            <ul class="page-breadcrumb">
              <li><a href="index.php">Trang chủ</a></li>
              <li>
                <?php echo ($categoryDetail["category_name"]) ?>
              </li>
            </ul>
          </div>
        </div>
      </section>
      <section class="blog-details">
        <div class="container">
          <div class="row">
            <div class="col-xl-8 col-lg-7 product-details rd-page">
              <div class="bxslider">
                <div class="slider-content">
                  <img src="../upload/<?php echo ($categoryDetail["category_image"]) ?>" height="200"
                    style="width:100%;height:400px;border-radius:16px;" alt="">
                </div>
              </div>
              <div class="room-details__left">
                <div class="wrapper">
                  <h4>Mô tả chi tiết</h4>
                  <p class="text">
                    <?php echo ($categoryDetail["category_description"]) ?>
                  </p>
                  <div class="row justify-content-center">
                    <div class="col-xl-12">
                      <div class="room-details__content-right mb-40 mt-20">
                        <div class="room-details__details-box">
                          <div class="">
                            <h6>Dịch vụ phòng</h6>
                            <div class="row room-facility-list">
                              <?php
                              if (isset($listCategoryService) && is_array($listCategoryService)) {
                                foreach ($listCategoryService as $index => $categoryService):
                                  ?>
                              <div class="col-sm-6 col-xl-3">
                                <div class="list-one d-flex align-items-center me-sm-4 mb-3">
                                  <div class="icon text-theme-color1 mr-10 flex-shrink-0 icon_service">
                                    <?php echo ($categoryService['service_icon']) ?>
                                  </div>
                                  <span class="title m-0">
                                    <?php echo ($categoryService['service_name']) ?>
                                  </span>
                                </div>
                              </div>
                              <?php endforeach;
                              } ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="comment-one">
                  <h4 class="comment-one__title">Đánh giá</h4>
                  <?php
                  if (isset($list_comments) && is_array($list_comments)) {
                    foreach ($list_comments as $index => $comment): ?>
                  <div class="comment-one__single">
                    <div style="display:flex;width:100%;">
                      <div class="comment-one__image">
                        <img src="../upload/<?php echo ($comment["users_avatar"]) ?>" alt="" width="80px">
                      </div>
                      <div class="comment-one__content" style="margin-left:10px;">
                        <span style="font-size: 22px;">
                          <?php echo $comment['users_name']; ?>
                          <br />
                        </span>
                        <div>
                          Ngày đánh giá:
                          <?php echo (new DateTime($comment['create_date']))->format('d \T\h\á\n\g m - Y') ?>
                          |
                          <?php
                              for ($i = 0; $i < $comment['comment_vote']; $i++) {
                                echo '<i class="fa-solid fa-star" style="color: orange; font-size: 13px;"></i>';
                              }
                              for ($i = 0; $i < 5 - $comment['comment_vote']; $i++) {
                                echo '<i class="fa-regular fa-star" style="color: orange; font-size: 13px;"></i>';
                              }
                              ?>
                        </div>
                        <p>
                          <?php echo $comment['comment_content']; ?>
                        </p>
                      </div>
                    </div>
                    <br />
                    <?php
                        $listCommentChild = getCommentChild($comment['comments_id']);
                        if (isset($listCommentChild) && is_array($listCommentChild)) {
                          foreach ($listCommentChild as $index => $commentChild): ?>
                    <div style="display:flex;width:100%;padding-left:120px;">
                      <div class="comment-one__image">
                        <img src="../upload/<?php echo ($commentChild["users_avatar"]) ?>"
                          style="width:60px;height:60px;">
                      </div>
                      <div class="comment-one__content" style="margin-left:-10px;">
                        <span style="font-size: 18px;">
                          <?php echo $commentChild['users_name']; ?>
                          <br />
                        </span>
                        <div>
                          <span style="font-size: 14px;">
                            Ngày đánh giá:
                            <?php echo (new DateTime($commentChild['create_date']))->format('d \T\h\á\n\g m - Y') ?>
                          </span>
                        </div>
                        <p>
                          <?php echo $commentChild['comment_content']; ?>
                        </p>
                      </div>
                    </div>
                    <?php endforeach;
                        } ?>
                  </div>

                  <?php endforeach;
                  } ?>
                  <div class="comment-form">
                    <h4 class="comment-form__title">Viết đánh giá</h4>
                    <form method="POST" enctype="application/x-www-form-urlencoded" action="category-details.php">
                      <ul class="ratings">
                        <li class="star"></li>
                        <li class="star"></li>
                        <li class="star"></li>
                        <li class="star"></li>
                        <li class="star"></li>
                      </ul>
                      <input type="text" id="comment_vote" name="comment_vote" hidden>
                      <input type="text" id="category_id" name="category_id"
                        value="<?php echo ($categoryDetail["id"]) ?>" hidden>

                      <div class="mb-3">
                        <textarea name="comment_content" class="form-control required" rows="3"
                          placeholder="Mời bạn viết đánh giá ..."></textarea>
                      </div>
                      <div class="mb-3">
                        <input name="form_botcheck" class="form-control" type="hidden" value="" />
                        <button type="submit" name="comment" class="theme-btn btn-style-one">
                          <span class="btn-title">
                            Đánh giá ngay
                          </span>
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-5">
              <div class="sidebar">
                <div class="sidebar__post mb-30">
                  <div>
                    <div class="mb-3">
                      <span style="font-size:30px">
                        <?php echo ($categoryDetail["category_name"]) ?>
                      </span>
                      <br />
                      <div style="font-size:18px;color:#aa8453;margin-bottom:20px;display:flex;align-items:center;">
                        <?php echo (formatMoney($categoryDetail["category_price"])) ?>
                        &nbsp; | &nbsp;
                        <?php
                        for ($i = 0; $i < $totalVotes; $i++) {
                          echo '<i class="fa-solid fa-star" style="color: orange; font-size: 11px;"></i>';
                        }
                        for ($i = 0; $i < 5 - $totalVotes; $i++) {
                          echo '<i class="fa-regular fa-star" style="color: orange; font-size: 11px;"></i>';
                        }
                        ?>
                      </div>
                      <span style="font-size:16px">
                        Số người tối đa:
                        <?php echo ($categoryDetail["category_adult"]) ?> người/phòng

                      </span>
                      <br />
                      <br />
                      <a href="booking.php?action=booking&booking=<?= $categoryDetail['id'] ?>">
                        <button type="submit" class="theme-btn btn-style-one w-100">
                          <span class="btn-title">Đặt phòng ngay</span>
                        </button>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="sidebar__single sidebar__post">
                  <h3 class="sidebar__title">Phòng tương tự</h3>
                  <ul class="sidebar__post-list list-unstyled">
                    <?php
                    if (isset($listCategorySimilar) && is_array($listCategorySimilar)) {
                      foreach ($listCategorySimilar as $index => $category_similar): ?>
                    <li>
                      <a href="category-details.php?action=detail&category-details=<?= $category_similar['id'] ?>">
                        <div class="sidebar__post-image">
                          <img src="../upload/<?php echo ($category_similar["category_image"]) ?>" height="200"
                            style="width:90px;height:60px;border-radius:8px;" alt="">
                        </div>
                        <div class="sidebar__post-content">
                          <h3>
                            <span class="sidebar__post-content-meta"><i class="far fa-door-open"></i>
                              <?php echo ($category_similar["category_name"]) ?>
                            </span>
                            <a
                              style="font-weight:500;font-size:13px;"><?php echo (formatMoney($category_similar["category_price"])) ?>/đêm</a>
                          </h3>
                        </div>
                      </a>
                    </li>
                    <?php endforeach;
                    } ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
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
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/jquery.form.min.js"></script>
    <script>
    $(function() {
      var star = '.star',
        selected = '.selected';

      $(star).on('click', function() {
        var selectedIndex = $(this).index() + 1;
        console.log('Số sao được chọn:', selectedIndex);
        $("#comment_vote").val(selectedIndex == 1 ? 5 : selectedIndex == 2 ? 4 : selectedIndex == 3 ?
          3 : selectedIndex == 4 ? 2 : selectedndex == 5 ? 1 : 0);
        $(selected).each(function() {
          I

          $(this).removeClass('selected');
        });
        $(this).addClass('selected');
      });
    });
    </script>
    <script>
    function saveScrollPosition() {
      sessionStorage.setItem('scrollPosition', window.scrollY.toString());
    }
    window.addEventListener('beforeunload', saveScrollPosition);

    function restoreScrollPosition() {
      var scrollPosition = sessionStorage.getItem('scrollPosition');
      if (scrollPosition !== null) {
        window.scrollTo(0, parseInt(scrollPosition));
        sessionStorage.removeItem('scrollPosition');
      }
    }
    window.addEventListener('load', restoreScrollPosition);
    </script>
  </body>

</html>