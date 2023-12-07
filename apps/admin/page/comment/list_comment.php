<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
  data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>
      Product List - eCommerce
    </title>
    <meta name="description"
      content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5" />

    <style>
    .multiline-ellipsis {
      overflow: hidden;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
    }
    </style>
    <?php @include "../layout/import_link.php" ?>
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/rateyo/rateyo.css" />
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
                        <th>Đánh giá sao</th>
                        <th>Ngày viết</th>
                        <th>Nội dung</th>
                        <th>Thao tác</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                  if (isset($list_comment) && is_array($list_comment)) {
                    foreach ($list_comment as $index => $comment): 
?>
                      <tr>
                        <td><?php echo $index + 1 ?></td>
                        <td><span><?php echo $comment['category_name'] ?></span></td>
                        <td><span><?php echo $comment['user_name'] ?></span></td>
                        <td><span><?php echo $comment['comment_vote'] ?>
                            <div class="read-only-ratings" data-rateyo-read-only="true"></div>
                          </span></td>
                        <td><span><?php echo $comment['create_date'] ?></span></td>
                        <td><span>
                            <div class="multiline-ellipsis">
                              <?php echo $comment['comment_content'] ?>
                            </div>
                          </span></td>
                        <td>
                          <a href="list_comment.php?action=delete&delete_comment_id=<?= $comment['id'] ?>">
                            <button class=" btn btn-sm btn-danger btn-icon">
                              <i class="fas fa-trash fa-md"></i>
                            </button>
                          </a>
                        </td>
                      </tr>
                      <?php endforeach;
                  }else {
    echo "Không có dữ liệu danh mục.";
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

</html>

<!-- beautify ignore:end -->