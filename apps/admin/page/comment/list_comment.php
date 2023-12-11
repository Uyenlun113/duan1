<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
  data-theme="theme-default">

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
                          <a href="list_comment.php?feedback=<?php echo $comment['id'] ?>">
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
            <h3>Add New Card</h3>
            <p>Add new card to complete payment</p>
          </div>
          <form id="addNewCCForm" class="row g-3" onsubmit="return false">
            <div class="col-12">
              <label class="form-label w-100" for="modalAddCard">Card Number</label>
              <div class="input-group input-group-merge">
                <input id="modalAddCard" name="modalAddCard" class="form-control credit-card-mask" type="text"
                  placeholder="1356 3215 6548 7898" aria-describedby="modalAddCard2" />
                <span class="input-group-text cursor-pointer p-1" id="modalAddCard2"><span
                    class="card-type"></span></span>
              </div>
            </div>
            <div class="col-12 col-md-6">
              <label class="form-label" for="modalAddCardName">Name</label>
              <input type="text" id="modalAddCardName" class="form-control" placeholder="John Doe" />
            </div>
            <div class="col-6 col-md-3">
              <label class="form-label" for="modalAddCardExpiryDate">Exp. Date</label>
              <input type="text" id="modalAddCardExpiryDate" class="form-control expiry-date-mask"
                placeholder="MM/YY" />
            </div>
            <div class="col-6 col-md-3">
              <label class="form-label" for="modalAddCardCvv">CVV Code</label>
              <div class="input-group input-group-merge">
                <input type="text" id="modalAddCardCvv" class="form-control cvv-code-mask" maxlength="3"
                  placeholder="654" />
                <span class="input-group-text cursor-pointer" id="modalAddCardCvv2"><i
                    class="bx bx-help-circle text-muted" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="Card Verification Value"></i></span>
              </div>
            </div>
            <div class="col-12">
              <label class="switch">
                <input type="checkbox" class="switch-input">
                <span class="switch-toggle-slider">
                  <span class="switch-on"></span>
                  <span class="switch-off"></span>
                </span>
                <span class="switch-label">Save card for future billing?</span>
              </label>
            </div>
            <div class="col-12 text-center">
              <button type="submit" class="btn btn-primary me-sm-3 me-1 mt-3">Submit</button>
              <button type="reset" class="btn btn-label-secondary btn-reset mt-3" data-bs-dismiss="modal"
                aria-label="Close">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</html>

<!-- beautify ignore:end -->