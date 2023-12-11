<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr"
  data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Preview - Invoice | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>


    <meta name="description"
      content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://themeselection.com/item/sneat-bootstrap-html-admin-template/">

    <link rel="icon" type="image/x-icon"
      href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/favicon/favicon.ico" />

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
      rel="stylesheet">

    <link rel="stylesheet" href="../../assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />

    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="../../assets/vendor/css/pages/app-invoice.css" />
    <script src="../../assets/vendor/js/helpers.js"></script>
    <script src="../../assets/js/config.js"></script>
  </head>

  <body>
    <?php @include "../../controllers/order-controller.php" ?>
    <div class="layout-wrapper layout-content-navbar  ">
      <div class="layout-container">
        <?php @include "../layout/sidebar.php" ?>
        <div class="layout-page">
          <?php @include "../layout/navbar.php" ?>
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row invoice-preview">
                <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4">
                  <div class="card invoice-preview-card">
                    <div class="card-body">
                      <div
                        class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column p-sm-3 p-0">
                        <div class="mb-xl-0 mb-4">
                          <div class="d-flex svg-illustration mb-3 gap-2">

                            <span class="app-brand-text demo text-body fw-bold">Chi tiết đặt phòng</span>
                          </div>

                        </div>

                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                      <div class="row p-sm-3 p-0">
                        <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-4 mb-sm-0 mb-4">
                          <h6 class="pb-2">Thông tin khách hàng:</h6>

                          <table>
                            <tbody>

                              <tr>
                                <td class="pe-3">Mã đặt phòng :</td>
                                <td>
                                  ĐH - <?php echo $detail_orders['orders_code'] ?>
                                </td>
                              </tr>
                              <tr>
                                <td class="pe-3">Tên khách hàng :</td>
                                <td>
                                  <?php echo $detail_users['users_name'] ?>
                                </td>
                              </tr>
                              <tr>
                                <td class="pe-3">Số điện thoại :</td>
                                <td>
                                  <?php echo $detail_users['users_phone_number'] ?>
                                </td>
                              </tr>
                              <tr>
                                <td class="pe-3">Địa chỉ :</td>
                                <td>
                                  <?php echo $detail_users['users_address'] ?>
                                </td>
                              </tr>
                              <tr>
                                <td class="pe-3">Ngày đặt :</td>
                                <td>
                                  <?php echo formatDatetimeVi( $detail_orders['create_date']) ?>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>

                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table border-top m-0">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Loại phòng</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Số người</th>
                            <th>Checkin</th>
                            <th>Checkout</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          if (isset($list_order_items) && is_array($list_order_items)) {
                            foreach ($list_order_items as $index => $order_detail):
                              ?>
                          <tr>
                            <td class="text-nowrap">
                              <?php echo $index + 1 ?>
                            </td>
                            <td class="text-nowrap">
                              <?php echo $order_detail['category_name'] ?>
                            </td>
                            <td>
                              <?php echo formatMoney($order_detail['orders_item_price'])  ?>
                            </td>
                            <td>
                              <?php echo $order_detail['orders_item_quantity'] ?>
                            </td>
                            <td>
                              <?php echo $order_detail['orders_item_count_people'] ?>
                            </td>
                            <td>
                              <?php echo formatDatetimeEn($order_detail['orders_item_checkin']) ?>
                            </td>
                            <td>
                              <?php echo formatDatetimeEn($order_detail['orders_item_checkout']) ?>
                            </td>
                          </tr>
                          <?php endforeach;
                          } else {
                            echo "Không có dữ liệu danh mục.";
                          } ?>
                        </tbody>
                      </table>
                    </div>

                    <div class="card-body">
                      <div class="row">
                        <div class="col-12">
                          <span class="fw-medium">Ghi chú:</span>
                          <span>
                            <?php echo isset($detail_orders['orders_description']) ? $detail_orders['orders_description'] : "Không có ghi chú" ?>
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- /Invoice -->

                <!-- Invoice Actions -->
                <div class="col-xl-3 col-md-4 col-12 invoice-actions">
                  <div class="card">
                    <div class="card-body">
                      <button class="btn btn-label-secondary d-grid w-100 mb-3">
                        Download
                      </button>
                      <a class="btn btn-label-secondary d-grid w-100 mb-3" target="_blank"
                        href="app-invoice-print.html">
                        Print
                      </a>
                      <a href="app-invoice-edit.html" class="btn btn-label-secondary d-grid w-100 mb-3">
                        Edit Invoice
                      </a>
                      <button class="btn btn-primary d-grid w-100" data-bs-toggle="offcanvas"
                        data-bs-target="#addPaymentOffcanvas">
                        <span class="d-flex align-items-center justify-content-center text-nowrap"><i
                            class="bx bx-dollar bx-xs me-1"></i>Add Payment</span>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php @include "../layout/footer.php" ?>
            <div class="content-backdrop fade"></div>
          </div>
        </div>
      </div>
    </div>
    <?php @include "../layout/import_script.php" ?>
  </body>

</html>