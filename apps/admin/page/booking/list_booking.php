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

    <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        "gtm.start": new Date().getTime(),
        event: "gtm.js"
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != "dataLayer" ? "&l=" + l : "";
      j.async = true;
      j.src =
        "../../../../www.googletagmanager.com/gtm5445.html?id=" + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, "script", "dataLayer", "GTM-5DDHKGP");
    </script>

    <?php @include "../layout/import_link.php" ?>
  </head>

  <body>
    <?php @include "../../controllers/bookingrooms.php" ?>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <?php @include "../layout/sidebar.php" ?>
        <div class="layout-page">
          <?php @include "../layout/navbar.php" ?>
          <div class="content-wrapper">

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="py-3 mb-4">
                <span class="text-muted fw-light">Trang quản trị /</span> Danh sách đặt phòng
              </h4>
              <div class="card text-center">
                <div class="card-header">
                  <ul class="nav nav-pills card-header-pills" style="margin-left: 0px;" role="tablist">
                    <li class="nav-item">
                      <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-within-card-all" aria-controls="navs-pills-within-card-all"
                        aria-selected="true">Tất cả</button>
                    </li>
                    <li class="nav-item">
                      <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-within-card-pending" aria-controls="navs-pills-within-card-pending"
                        aria-selected="false">Chờ xử lý</button>
                    </li>
                    <li class="nav-item">
                      <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-within-card-success" aria-controls="navs-pills-within-card-success"
                        aria-selected="false">Thành công</button>
                    </li>
                    <li class="nav-item">
                      <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-within-card-reject" aria-controls="navs-pills-within-card-reject"
                        aria-selected="false">Đã từ chối</button>
                    </li>
                    <li class="nav-item">
                      <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-within-card-cancel" aria-controls="navs-pills-within-card-cancel"
                        aria-selected="false">Đã hủy</button>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                  <div class="tab-content p-0">
                    <div class="tab-pane fade show active" id="navs-pills-within-card-all" role="tabpanel">
                      <div class="row justify-content-between">
                        <div class="col-sm-12 col-md-6 justify-content-md-end">
                          <input type="search" class="form-control col-sm-12 col-md-3"
                            placeholder="Tìm kiếm theo tên khách hàng hoặc mã phiếu">
                        </div>
                        <a href="create_bookings.php" class="col-sm-12 col-md-2">
                          <button type="button" class="btn btn-primary w-100">
                            <i class="bx bx-plus me-sm-1"></i>
                            Thêm phiếu đặt
                          </button>
                        </a>
                      </div>
                      <div class="table-responsive mt-4">
                        <table class=" table border-top">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Mã phiếu</th>
                              <th>Người đặt</th>
                              <th style="text-align:center">Tổng tiền</th>
                              <th style="text-align:center">Đã cọc</th>
                              <th style="text-align:center">Phương thức cọc</th>
                              <th style="text-align:center">Trạng thái</th>
                              <th style="text-align:center">Thao tác</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            if (isset($list_orders_all) && is_array($list_orders_all)) {
                              foreach ($list_orders_all as $index => $orders):
                                ?>
                            <tr>
                              <td style="width:10px">
                                <?php echo $index + 1 ?>
                              </td>
                              <td style="width:150px">
                                <?php echo $orders['orders_code'] ?>
                              </td>
                              <td style="width:15%"><span>
                                  <?php echo $orders['users_name'] ?>
                                </span></td>

                              <td style="text-align:center"><span>
                                  <?php echo ($orders['orders_total']) ?>
                                </span></td>
                              <td style="text-align:center"><span>
                                  <?php echo ($orders['orders_deposit']) ?>
                                </span></td>
                              <td style="text-align:left"><span>
                                  <?php echo ($orders['orders_payment_method']) ?>
                                </span></td>
                              <td style="text-align:start">
                                <span>
                                  <?php if ($orders['orders_status'] == 1): ?>
                                  <span class="badge bg-label-warning me-1">Chờ xử lý</span>
                                  <?php elseif ($orders['orders_status'] == 2): ?>
                                  <span class="badge bg-label-success  me-1">Thành công</span>
                                  <?php elseif ($orders['orders_status'] == 3): ?>
                                  <span class="badge bg-label-danger me-1">Đã từ chối</span>
                                  <?php else: ?>
                                  <span class="badge bg-label-secondary me-1">Đã hủy</span>
                                  <?php endif; ?>
                                </span>
                              </td>
                              <td style="text-align:center">
                                <div class="dropdown">
                                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                  <div class="dropdown-menu">
                                    <?php if ($orders['orders_status'] == 1): ?>
                                    <a class="dropdown-item"
                                      href="comfirm-booking.php?action=comfirm&comfirm-booking=<?= $orders['id'] ?>">
                                      <i class='bx bx-calendar-check me-1'></i>Xác nhận
                                    </a>
                                    <a class="dropdown-item"
                                      href="update_rooms.php?action=update&update_rooms=<?= $orders['id'] ?>">
                                      <i class="fa-solid fa-xmark me-1"></i>Từ chối
                                    </a>
                                    <?php endif; ?>
                                    <a class="dropdown-item"
                                      href="details_booking.php?detail_oders_item=<?= $orders['id'] ?>">
                                      <i class="fa-regular fa-eye me-1"></i>Xem chi tiết
                                    </a>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <?php endforeach;
                            } else {
                              echo "Không có dữ liệu danh mục.";
                            } ?>
                          </tbody>
                        </table>
                        <nav aria-label="Page navigation"
                          class="d-flex align-items-center justify-content-end me-3 mt-3">
                          <ul class="pagination mb-0">
                            <li class="page-item prev">
                              <a class="page-link" href="javascript:void(0);"><i
                                  class="tf-icon bx bx-chevron-left"></i></a>
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
                              <a class="page-link" href="javascript:void(0);"><i
                                  class="tf-icon bx bx-chevron-right"></i></a>
                            </li>
                          </ul>
                        </nav>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="navs-pills-within-card-pending" role="tabpanel">
                      <div class="row justify-content-between">
                        <div class="col-sm-12 col-md-6 justify-content-md-end">
                          <input type="search" class="form-control col-sm-12 col-md-3"
                            placeholder="Tìm kiếm theo tên khách hàng hoặc mã phiếu">
                        </div>
                        <a href="create_bookings.php" class="col-sm-12 col-md-2">
                          <button type="button" class="btn btn-primary w-100">
                            <i class="bx bx-plus me-sm-1"></i>
                            Thêm phiếu đặt
                          </button>
                        </a>
                      </div>
                      <div class="table-responsive mt-4">
                        <table class=" table border-top">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Mã phiếu</th>
                              <th>Người đặt</th>
                              <th style="text-align:center">Tổng tiền</th>
                              <th style="text-align:center">Đã cọc</th>
                              <th style="text-align:left">Phương thức cọc</th>
                              <th style="text-align:center">Thao tác</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            if (isset($list_orders_pending) && is_array($list_orders_pending)) {
                              foreach ($list_orders_pending as $index => $orders):
                                ?>
                            <tr>
                              <td style="width:10px">
                                <?php echo $index + 1 ?>
                              </td>
                              <td style="width:150px">
                                <?php echo $orders['orders_code'] ?>
                              </td>
                              <td style="width:15%"><span>
                                  <?php echo $orders['users_name'] ?>
                                </span></td>

                              <td style="text-align:center"><span>
                                  <?php echo ($orders['orders_total']) ?>
                                </span></td>
                              <td style="text-align:center"><span>
                                  <?php echo ($orders['orders_deposit']) ?>
                                </span></td>
                              <td style="text-align:left"><span>
                                  <?php echo ($orders['orders_payment_method']) ?>
                                </span></td>
                              <td style="text-align:center">
                                <div class="dropdown">
                                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item"
                                      href="comfirm-booking.php?action=comfirm&comfirm-booking=<?= $orders['id'] ?>">
                                      <i class='bx bx-calendar-check me-1'></i>Xác nhận
                                    </a>
                                    <a class="dropdown-item"
                                      href="update_rooms.php?action=update&update_rooms=<?= $orders['id'] ?>">
                                      <i class="fa-solid fa-xmark me-1"></i>Từ chối
                                    </a>
                                    <a class="dropdown-item"
                                      href="details_booking.php?detail_oders_item=<?= $orders['id'] ?>"><i
                                        class="fa-regular fa-eye me-1"></i>
                                      Xem chi tiết</a>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <?php endforeach;
                            } else {
                              echo "Không có dữ liệu danh mục.";
                            } ?>
                          </tbody>
                        </table>
                        <nav aria-label="Page navigation"
                          class="d-flex align-items-center justify-content-end me-3 mt-3">
                          <ul class="pagination mb-0">
                            <li class="page-item prev">
                              <a class="page-link" href="javascript:void(0);"><i
                                  class="tf-icon bx bx-chevron-left"></i></a>
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
                              <a class="page-link" href="javascript:void(0);"><i
                                  class="tf-icon bx bx-chevron-right"></i></a>
                            </li>
                          </ul>
                        </nav>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="navs-pills-within-card-success" role="tabpanel">
                      <div class="row justify-content-between">
                        <div class="col-sm-12 col-md-6 justify-content-md-end">
                          <input type="search" class="form-control col-sm-12 col-md-3"
                            placeholder="Tìm kiếm theo tên khách hàng hoặc mã phiếu">
                        </div>
                        <a href="create_bookings.php" class="col-sm-12 col-md-2">
                          <button type="button" class="btn btn-primary w-100">
                            <i class="bx bx-plus me-sm-1"></i>
                            Thêm phiếu đặt
                          </button>
                        </a>
                      </div>
                      <div class="table-responsive mt-4">
                        <table class=" table border-top">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Mã phiếu</th>
                              <th>Người đặt</th>
                              <th style="text-align:center">Tổng tiền</th>
                              <th style="text-align:center">Đã cọc</th>
                              <th style="text-align:left">Phương thức cọc</th>
                              <th style="text-align:center">Thao tác</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            if (isset($list_orders_success) && is_array($list_orders_success)) {
                              foreach ($list_orders_success as $index => $orders):
                                ?>
                            <tr>
                              <td style="width:10px">
                                <?php echo $index + 1 ?>
                              </td>
                              <td style="width:150px">
                                <?php echo $orders['orders_code'] ?>
                              </td>
                              <td style="width:15%"><span>
                                  <?php echo $orders['users_name'] ?>
                                </span></td>

                              <td style="text-align:center"><span>
                                  <?php echo ($orders['orders_total']) ?>
                                </span></td>
                              <td style="text-align:center"><span>
                                  <?php echo ($orders['orders_deposit']) ?>
                                </span></td>
                              <td style="text-align:left"><span>
                                  <?php echo ($orders['orders_payment_method']) ?>
                                </span></td>
                              <td style="text-align:center">
                                <div class="dropdown">
                                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item"
                                      href="details_booking.php?detail_oders_item=<?= $orders['id'] ?>"><i
                                        class="fa-regular fa-eye me-1"></i>
                                      Xem chi tiết</a>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <?php endforeach;
                            } else {
                              echo "Không có dữ liệu danh mục.";
                            } ?>
                          </tbody>
                        </table>
                        <nav aria-label="Page navigation"
                          class="d-flex align-items-center justify-content-end me-3 mt-3">
                          <ul class="pagination mb-0">
                            <li class="page-item prev">
                              <a class="page-link" href="javascript:void(0);"><i
                                  class="tf-icon bx bx-chevron-left"></i></a>
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
                              <a class="page-link" href="javascript:void(0);"><i
                                  class="tf-icon bx bx-chevron-right"></i></a>
                            </li>
                          </ul>
                        </nav>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="navs-pills-within-card-reject" role="tabpanel">
                      <div class="row justify-content-between">
                        <div class="col-sm-12 col-md-6 justify-content-md-end">
                          <input type="search" class="form-control col-sm-12 col-md-3"
                            placeholder="Tìm kiếm theo tên khách hàng hoặc mã phiếu">
                        </div>
                        <a href="create_bookings.php" class="col-sm-12 col-md-2">
                          <button type="button" class="btn btn-primary w-100">
                            <i class="bx bx-plus me-sm-1"></i>
                            Thêm phiếu đặt
                          </button>
                        </a>
                      </div>
                      <div class="table-responsive mt-4">
                        <table class=" table border-top">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Mã phiếu</th>
                              <th>Người đặt</th>
                              <th style="text-align:center">Tổng tiền</th>
                              <th style="text-align:center">Đã cọc</th>
                              <th style="text-align:left">Phương thức cọc</th>
                              <th style="text-align:center">Thao tác</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            if (isset($list_orders_reject) && is_array($list_orders_reject)) {
                              foreach ($list_orders_reject as $index => $orders):
                                ?>
                            <tr>
                              <td style="width:10px">
                                <?php echo $index + 1 ?>
                              </td>
                              <td style="width:150px">
                                <?php echo $orders['orders_code'] ?>
                              </td>
                              <td style="width:15%"><span>
                                  <?php echo $orders['users_name'] ?>
                                </span></td>

                              <td style="text-align:center"><span>
                                  <?php echo ($orders['orders_total']) ?>
                                </span></td>
                              <td style="text-align:center"><span>
                                  <?php echo ($orders['orders_deposit']) ?>
                                </span></td>
                              <td style="text-align:left"><span>
                                  <?php echo ($orders['orders_payment_method']) ?>
                                </span></td>
                              <td style="text-align:center">
                                <div class="dropdown">
                                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item"
                                      href="details_booking.php?detail_oders_item=<?= $orders['id'] ?>"><i
                                        class="fa-regular fa-eye me-1"></i>
                                      Xem chi tiết</a>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <?php endforeach;
                            } else {
                              echo "Không có dữ liệu danh mục.";
                            } ?>
                          </tbody>
                        </table>
                        <nav aria-label="Page navigation"
                          class="d-flex align-items-center justify-content-end me-3 mt-3">
                          <ul class="pagination mb-0">
                            <li class="page-item prev">
                              <a class="page-link" href="javascript:void(0);"><i
                                  class="tf-icon bx bx-chevron-left"></i></a>
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
                              <a class="page-link" href="javascript:void(0);"><i
                                  class="tf-icon bx bx-chevron-right"></i></a>
                            </li>
                          </ul>
                        </nav>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="navs-pills-within-card-cancel" role="tabpanel">
                      <div class="row justify-content-between">
                        <div class="col-sm-12 col-md-6 justify-content-md-end">
                          <input type="search" class="form-control col-sm-12 col-md-3"
                            placeholder="Tìm kiếm theo tên khách hàng hoặc mã phiếu">
                        </div>
                        <a href="create_bookings.php" class="col-sm-12 col-md-2">
                          <button type="button" class="btn btn-primary w-100">
                            <i class="bx bx-plus me-sm-1"></i>
                            Thêm phiếu đặt
                          </button>
                        </a>
                      </div>
                      <div class="table-responsive mt-4">
                        <table class=" table border-top">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Mã phiếu</th>
                              <th>Người đặt</th>
                              <th style="text-align:center">Tổng tiền</th>
                              <th style="text-align:center">Đã cọc</th>
                              <th style="text-align:left">Phương thức cọc</th>
                              <th style="text-align:center">Thao tác</th>

                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            if (isset($list_orders_cancel) && is_array($list_orders_cancel)) {
                              foreach ($list_orders_cancel as $index => $orders):
                                ?>
                            <tr>
                              <td style="width:10px">
                                <?php echo $index + 1 ?>
                              </td>
                              <td style="width:150px">
                                <?php echo $orders['orders_code'] ?>
                              </td>
                              <td style="width:15%"><span>
                                  <?php echo $orders['users_name'] ?>
                                </span></td>

                              <td style="text-align:center"><span>
                                  <?php echo ($orders['orders_total']) ?>
                                </span></td>
                              <td style="text-align:center"><span>
                                  <?php echo ($orders['orders_deposit']) ?>
                                </span></td>
                              <td style="text-align:left"><span>
                                  <?php echo ($orders['orders_payment_method']) ?>
                                </span></td>
                              <td style="text-align:center">
                                <div class="dropdown">
                                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item"
                                      href="details_booking.php?detail_oders_item=<?= $orders['id'] ?>"><i
                                        class="fa-regular fa-eye me-1"></i>
                                      Xem chi tiết</a>
                                  </div>
                                </div>
                              </td>
                            </tr>
                            <?php endforeach;
                            } else {
                              echo "Không có dữ liệu danh mục.";
                            } ?>
                          </tbody>
                        </table>
                        <nav aria-label="Page navigation"
                          class="d-flex align-items-center justify-content-end me-3 mt-3">
                          <ul class="pagination mb-0">
                            <li class="page-item prev">
                              <a class="page-link" href="javascript:void(0);"><i
                                  class="tf-icon bx bx-chevron-left"></i></a>
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
                              <a class="page-link" href="javascript:void(0);"><i
                                  class="tf-icon bx bx-chevron-right"></i></a>
                            </li>
                          </ul>
                        </nav>
                      </div>
                    </div>
                  </div>
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

</html>

<!-- beautify ignore:end -->