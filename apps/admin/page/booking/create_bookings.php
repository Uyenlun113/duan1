<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
  data-theme="theme-default" data-assets-path="../../assets/">

  <head>
    <title>eCommerce Add Product - Apps | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>
    <?php include "../layout/import_link.php" ?>
  </head>

  <body>
    <?php @include "../../controllers/bookingrooms.php"; ?>

    <div class="layout-wrapper layout-content-navbar  ">
      <div class="layout-container">
        <?php @include "../layout/sidebar.php1" ?>
        <div class="layout-page">
          <?php @include "../layout/navbar.php1" ?>
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="py-3 mb-4">
                <span class="text-muted fw-light">eCommerce /</span><span> Add Product</span>
              </h4>
              <form id="quickForm" method="POST" action="create_bookings.php" enctype="multipart/form-data" novalidate>
                <div class="app-ecommerce">
                  <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-column justify-content-center">
                      <h4 class="mb-1 mt-3">Thêm phiếu đặt phòng</h4>
                      <p class="text-muted">Orders placed across your store</p>
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
                            <label class="form-label" for="users_name">Tên khách hàng</label>
                            <input type="text" class="form-control" id="users_name"
                              placeholder="Mời bạn nhập tên khách hàng" name="users_name">
                          </div>
                          <div class="row mb-3">
                            <div class="col"><label class="form-label" for="users_phone_number">Số điện thoại</label>
                              <input type="number" class="form-control" id="users_phone_number"
                                placeholder="Mời bạn nhập số điện thoại" name="users_phone_number"
                                aria-label="Product SKU">
                            </div>
                            <div class="col"><label class="form-label" for="users_email">Email</label>
                              <input type="text" class="form-control" id="users_email" placeholder="Mời bạn nhập email"
                                name="users_email" aria-label="Product barcode">
                            </div>

                          </div>
                          <!-- Description -->
                          <div>
                            <label class="form-label">Mô tả chi tiết</label>
                            <div class="form-control p-0 pt-1">
                              <div class="comment-toolbar border-0 border-bottom">
                                <div class="d-flex justify-content-start">
                                  <span class="ql-formats me-0">
                                    <button class="ql-bold"></button>
                                    <button class="ql-italic"></button>
                                    <button class="ql-underline"></button>
                                    <button class="ql-list" value="ordered"></button>
                                    <button class="ql-list" value="bullet"></button>
                                    <button class="ql-link"></button>
                                    <button class="ql-image"></button>
                                  </span>
                                </div>
                              </div>
                              <div class="comment-editor border-0 pb-4" id="ecommerce-category-description">
                              </div>

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

                                          <input type="datetime-local" class="form-control flatpickr-input"
                                            placeholder="YYYY-MM-DD HH:MM" id="flatpickr-multi" fdprocessedid="9xzjwn"
                                            name="booking_room_checkin">
                                        </div>
                                        <div class="col-md-6 col-12 mb-md-0 mb-3">
                                          <p class="mb-2 repeater-title">Check out</p>
                                          <input type="datetime-local" class="form-control  flatpickr-input"
                                            placeholder="1" min="1" max="50" name="booking_room_checkout" />
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-5 col-12  mb-md-0 mb-3 ps-md-0">
                                      <div class="row mb-2">
                                        <div class="col-md-4 col-12 mb-md-0 mb-3">
                                          <p class="mb-2 repeater-title">Số lượng</p>
                                          <input type="number" class="form-control invoice-item-qty" placeholder="1"
                                            min="1" max="50" name="booking_quantity" />
                                        </div>
                                        <div class="col-md-8 col-12 mb-md-0 mb-3">
                                          <p class="mb-2 repeater-title">Giá tiền ($ / đêm)</p>
                                          <input type="number" disabled class="form-control invoice-item-qty"
                                            placeholder="1" value="" name="booking_total_price" />
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
                          <div class="mb-3">
                            <label class="form-label" for="ecommerce-product-discount-price">Tổng tiền</label>
                            <input type="text" class="form-control" id="ecommerce-product-discount-price"
                              placeholder="Discounted Price" name="total_price" aria-label="Product discounted price">
                          </div>
                          <div class="mb-3 col ecommerce-select2-dropdown">
                            <label class="form-label mb-1" for="status-org">Phương thức thanh toán
                            </label>
                            <select class="select2 form-select" name="booking_payment"
                              data-placeholder="Phương thức thanh toán">
                              <option value="">Phương thức thanh toán</option>
                              <option value="1">Chuyển khoản</option>
                              <option value="0">Tiền mặt</option>
                            </select>
                          </div>
                          <!-- Discounted Price -->

                          <!-- Charge tax check box -->
                          <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" value="" id="price-charge-tax" checked>
                            <label class="form-label" for="price-charge-tax">
                              Charge tax on this product
                            </label>
                          </div>
                          <!-- Instock switch -->
                          <div class="d-flex justify-content-between align-items-center border-top pt-3">
                            <span class="mb-0 h6">In stock</span>
                            <div class="w-25 d-flex justify-content-end">
                              <label class="switch switch-primary switch-sm me-4 pe-2">
                                <input type="checkbox" class="switch-input" checked="">
                                <span class="switch-toggle-slider">
                                  <span class="switch-on">
                                    <span class="switch-off"></span>
                                  </span>
                                </span>
                              </label>
                            </div>
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

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../../assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="../../assets/vendor/libs/cleavejs/cleave.js"></script>
    <script src="../../assets/vendor/libs/cleavejs/cleave-phone.js"></script>
    <script src="../../assets/vendor/libs/jquery-repeater/jquery-repeater.js"></script>

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>


    <!-- Page JS -->
    <script src="../../assets/js/offcanvas-send-invoice.js"></script>
    <script src="../../assets/js/app-invoice-add.js"></script>

  </body>

</html>