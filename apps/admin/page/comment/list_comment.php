<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
  data-theme="theme-default">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Product List - eCommerce | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>
    <meta name="description"
      content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://themeselection.com/item/sneat-bootstrap-html-admin-template/">
    <!-- ? PROD Only: Google Tag Manager (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
    <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src = '../../../../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-5DDHKGP');
    </script>
    <link rel="icon" type="image/x-icon"
      href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/favicon/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
      rel="stylesheet"> <!-- Icons -->
    <link rel="stylesheet" href="../../assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" /> <!-- Core CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" /> <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/select2/select2.css"> <!-- Page CSS -->
    <script src="../../assets/vendor/js/helpers.js"></script>
    <script src="../../assets/js/config.js"></script>
  </head>

  <body>
    <?php @include "../../controllers/comments_controller.php" ?>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <?php @include "../layout/sidebar.php" ?>
        <div class="layout-page">
          <?php @include "../layout/navbar.php" ?>
          <div class="content-wrapper">

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="py-3 mb-4">
                <span class="text-muted fw-light">Trang quản trị /</span> Danh sách bình luận
              </h4>
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Danh sách bình luận</h5>
                  <div class="row justify-content-between">
                    <div class="col-sm-12 col-md-6 justify-content-md-end">
                      <input type="search" class="form-control col-sm-12 col-md-3"
                        placeholder="Tìm kiếm theo tên phòng">
                    </div>
                  </div>
                </div>
                <div class="card-datatable table-responsive">
                  <table class=" table border-top">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Loại phòng</th>
                        <th>Người bình luận</th>
                        <th style="text-align:center">Đánh giá</th>
                        <th style="text-align:center">Ngày viết</th>
                        <th>Nội dung</th>
                        <th style="text-align:center">Thao tác</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (isset($list_comment) && is_array($list_comment) && count($list_comment) > 0) {
                        foreach ($list_comment as $index => $comment):
                          ?>
                      <tr>
                        <td>
                          <?php echo $index + 1 ?>
                        </td>
                        <td><span>
                            <?php echo $comment['category_name'] ?>
                          </span></td>
                        <td><span>
                            <?php echo $comment['user_name'] ?>
                          </span></td>
                        <td style="text-align:center">
                          <span>
                            <?php
                                for ($i = 0; $i < $comment['comment_vote']; $i++) {
                                  echo '<i class="bx bxs-star" style="color:orange;font-size:15px;"></i>';
                                }
                                for ($i = 0; $i < 5 - $comment['comment_vote']; $i++) {
                                  echo '<i class="bx bx-star" style="color:orange;font-size:15px;"></i>';
                                }
                                ?>
                          </span>
                        </td>
                        <td style="text-align:center">
                          <span>
                            <?php echo formatDatetimeVi($comment['create_date']) ?>
                          </span>
                        </td>
                        <td><span>
                            <div class="multiline-ellipsis">
                              <?php echo $comment['comment_content'] ?>
                            </div>
                          </span></td>
                        <td style="text-align:center">
                          <a
                            href="feedback.php?feedback=<?php echo $comment['id'] ?>&category_id=<?php echo $comment['category_id'] ?>">
                            <button class=" btn btn-sm btn-warning btn-icon">
                              <i class='bx bx-message-square-dots'></i>
                            </button>
                          </a>
                          <a href="list_comment.php?action=delete&delete_comment_id=<?= $comment['id'] ?>">
                            <button class=" btn btn-sm btn-danger btn-icon">
                              <i class="fas fa-trash fa-md"></i>
                            </button>
                          </a>
                        </td>
                      </tr>
                      <?php endforeach;
                      } else {
                        ?>
                      <tr>
                        <td colspan="7" style="text-align:center;">
                          Không có dữ liệu hiển thị!
                        </td>
                      </tr>
                      <?php
                      } ?>
                    </tbody>
                  </table>
                  <nav aria-label="Page navigation" class="d-flex align-items-center justify-content-end me-3 mt-3">
                    <ul class="pagination mb-0">
                      <li class="page-item prev">
                        <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevron-left"></i></a>
                      </li>
                      <li class="page-item active">
                        <a class="page-link" href="javascript:void(0);">1</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="javascript:void(0);">2</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="javascript:void(0);">3</a>
                      </li>
                      <li class="page-item next">
                        <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevron-right"></i></a>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
            <!-- / Content -->
            <?php @include "../layout/footer.php" ?>
            <div class="content-backdrop fade"></div>
          </div>
        </div>
      </div>

      <div class="layout-overlay layout-menu-toggle"></div>
      <div class="drag-target"></div>
    </div>

  </body>
  <?php @include "../layout/import_script.php" ?>
  <script src="../../assets/js/extended-ui-star-ratings.js"></script>
  <div class="modal fade" id="addNewCCModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
      <div class="modal-content p-3 p-md-5">
        <div class="modal-body">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="text-center mb-4">
            <h3>Phản hồi bình luận</h3>
          </div>
          <form method="POST" class="needs-validation" action="list_comment.php" enctype="multipart/form-data"
            novalidate>
            <div class="col-12">
              <label class="form-label w-100" for="comment_content">Phản hồi</label>
              <textarea name="comment_content" class="form-control credit-card-mask"></textarea>
            </div>
            <div class="col-12 text-center">
              <button type="submit" name="feedback_comment" class="btn btn-primary me-sm-3 me-1 mt-3">Phản hồi</button>
              <a href="">
                <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal"
                  aria-label="Close">Hủy bỏ</button>
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</html>

<!-- beautify ignore:end -->