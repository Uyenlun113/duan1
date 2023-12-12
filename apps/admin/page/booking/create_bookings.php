<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
  data-theme="theme-default" data-assets-path="../../assets/">

  <head>
    <title>eCommerce Add Product - Apps | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

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
      <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css"
        class="template-customizer-theme-css" />
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

  </head>

  <body>
    <?php @include "../../controllers/order-controller.php"; ?>

    <div class="layout-wrapper layout-content-navbar  ">
      <div class="layout-container">
        <?php @include "../layout/sidebar.php" ?>
        <div class="layout-page">
          <?php @include "../layout/navbar.php" ?>
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="py-3 mb-4">
                <span class="text-muted fw-light">Trang chủ /</span><span> Thêm phiếu đặt phòng</span>
              </h4>
              <form id="quickForm" method="POST" action="create_bookings.php" enctype="multipart/form-data" novalidate>
                <div class="app-ecommerce">
                  <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-column justify-content-center">
                      <h4 class="mb-1 mt-3">Thêm phiếu đặt phòng</h4>
                    </div>
                    <div class="d-flex align-content-center flex-wrap gap-3">
                      <a href="list_booking.php"><button type="button" class="btn btn-label-secondary">Quay lại</button>
                      </a>
                      <button type="submit" name="add_booking" class="btn btn-primary">Đặt phòng</button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-lg-9">
                      <div class="card mb-4">
                        <div class="card-header">
                          <h5 class="card-tile mb-0">Thông tin khách hàng</h5>
                        </div>
                        <div class="card-body">
                          <div class="mb-3">
                            <label class="form-label" for="orders_user_name">Tên khách hàng</label>
                            <input type="text" class="form-control" id="orders_user_name"
                              placeholder="Mời bạn nhập tên khách hàng" name="orders_user_name">
                          </div>
                          <div class="row mb-3">
                            <div class="col"><label class="form-label" for="orders_user_phone">Số điện thoại</label>
                              <input type="text" class="form-control" id="orders_user_phone"
                                placeholder="Mời bạn nhập số điện thoại" name="orders_user_phone"
                                aria-label="Product SKU">
                            </div>
                            <div class="col"><label class="form-label" for="orders_user_adders">Địa chỉ</label>
                              <input type="text" class="form-control" id="orders_user_adders"
                                placeholder="Mời bạn nhập địa chỉ" name="orders_user_adders"
                                aria-label="Product barcode">
                            </div>

                          </div>

                        </div>
                      </div>
                      <div class="card mb-4">
                        <div class="card-header mb-0 pb-0">
                          <h5 class="card-title mb-0">Thông tin phòng</h5>
                        </div>
                        <div class="card-body">
                          <div class="source-item py-sm-3">
                            <div class="mb-3" data-repeater-list="repeater">
                              <div class="repeater-wrapper pt-0 pt-md-4" data-repeater-item>
                                <div class="d-flex border rounded position-relative pe-0">
                                  <div class="row w-100 m-0 p-3">
                                    <div class="col-md-7 col-12  mb-md-0 mb-3 ps-md-0">
                                      <div class="row mb-2">
                                        <div class="col-md-12 col-12 mb-md-0 mb-3">
                                          <p class="mb-2 repeater-title">Loại phòng</p>
                                          <select class="select2 form-select" name="category_id"
                                            data-placeholder="-- Chọn loại phòng --">
                                            <option value="">-- Chọn loại phòng --</option>
                                            <?php foreach($list_category as $category) :?>
                                            <option value="<?= $category['id'] ?>"><?= $category['category_name']?>
                                            </option>
                                            <?php endforeach;?>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-6 col-12 mb-md-0 mb-3">
                                          <p class="mb-2 repeater-title">Check in</p>
                                          <input type="date" class="form-control flatpickr-input"
                                            placeholder="YYYY-MM-DD" id="flatpickr-multi" fdprocessedid="9xzjwn"
                                            name="orders_item_checkin">
                                        </div>
                                        <div class="col-md-6 col-12 mb-md-0 mb-3">
                                          <p class="mb-2 repeater-title">Check out</p>
                                          <input type="date" class="form-control  flatpickr-input" placeholder="1"
                                            min="1" max="50" name="orders_item_checkout" />
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-5 col-12  mb-md-0 mb-3 ps-md-0">
                                      <div class="row mb-2">
                                        <div class="col-md-6 col-12 mb-md-0 mb-3">
                                          <p class="mb-2 repeater-title">Số lượng</p>
                                          <input type="number" class="form-control invoice-item-qty" placeholder="1"
                                            min="1" max="50" name="orders_item_quantity" />
                                        </div>
                                        <div class="col-md-6 col-12 mb-md-0 mb-3">
                                          <p class="mb-2 repeater-title">Số người</p>
                                          <input type="number" class="form-control invoice-item-qty" placeholder="1"
                                            value="" name="orders_item_count_people" />
                                        </div>
                                      </div>
                                    </div>

                                  </div>
                                  <div
                                    class="d-flex flex-column align-items-center justify-content-between border-start p-2">
                                    <i class="bx bx-x fs-4 text-muted cursor-pointer" data-repeater-delete></i>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-12">
                                <button type="button" class="btn btn-primary" data-repeater-create>Thêm phòng
                                  mới</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-lg-3">
                      <div class="card mb-4">
                        <div class="card-header">
                          <h5 class="card-title mb-0">Thông tin đặt phòng</h5>
                        </div>
                        <div class="card-body">
                          <div class="mb-3 col ecommerce-select2-dropdown">
                            <label class="form-label mb-1" for="status-org">Phương thức thanh toán
                            </label>
                            <select class="select2 form-select" name="booking_payment"
                              data-placeholder="Phương thức thanh toán">
                              <option value="Tiền mặt">Tiền mặt</option>
                              <option value="Chuyển khoản">Chuyển khoản</option>
                              <option value="Quẹt thẻ">Quẹt thẻ</option>
                            </select>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <?php @include "../layout/footer.php" ?>
            <div class="content-backdrop fade"></div>
          </div>
        </div>
      </div>
      <div class="layout-overlay layout-menu-toggle"></div>
      <div class="drag-target"></div>
    </div>
    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
    <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="../../assets/vendor/js/menu.js"></script>
    <script src="../../assets/vendor/libs/quill/katex.js"></script>
    <script src="../../assets/vendor/libs/quill/quill.js"></script>
    <script src="../../assets/vendor/libs/select2/select2.js"></script>
    <script src="../../assets/vendor/libs/dropzone/dropzone.js"></script>
    <script src="../../assets/vendor/libs/jquery-repeater/jquery-repeater.js"></script>
    <script src="../../assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="../../assets/vendor/libs/tagify/tagify.js"></script>
    <script src="../../assets/js/main.js"></script>
    <script src="../../assets/js/app-ecommerce-product-add.js"></script>
    <script src="../../assets/js/offcanvas-send-invoice.js"></script>
    <script src="../../assets/js/app-invoice-add.js"></script>
    <script src="../../assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="../../assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="../../assets/vendor/libs/cleavejs/cleave-phone.js"></script>
    <script src="../../assets/vendor/libs/jquery-repeater/jquery-repeater.js"></script>
    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
    <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="../../assets/vendor/js/menu.js"></script>
    <script src="../../assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="../../assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="../../assets/vendor/libs/cleavejs/cleave-phone.js"></script>
    <script src="../../assets/vendor/libs/jquery-repeater/jquery-repeater.js"></script>
    <script src="../../assets/js/main.js"></script>
    <script src="../../assets/js/offcanvas-send-invoice.js"></script>
    <script src="../../assets/js/app-invoice-add.js"></script>
  </body>

</html>