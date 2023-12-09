<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr"
  data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>eCommerce Add Product - Apps | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>
    <meta name="description"
      content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
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
      j.src =
        '../../../../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-5DDHKGP');
    </script>
    <?php @include "../layout/import_link.php" ?>
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/tagify/tagify.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
  </head>

  <body>
    <?php @include "../../controllers/users_controller.php" ?>
    <div class="layout-wrapper layout-content-navbar ">
      <div class="layout-container">
        <?php @include "../layout/sidebar.php" ?>
        <div class="layout-page">
          <?php @include "../layout/navbar.php" ?>
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="py-3 mb-4">
                <span class="text-muted fw-light">Trang quản trị /</span><span> Thêm mới nhân viên</span>
              </h4>
              <form class="needs-validation" method="POST" action="create_staff.php" enctype="multipart/form-data"
                novalidate>
                <div class="app-ecommerce">
                  <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-column justify-content-center">
                      <h4 class="mb-1 mt-3">Thêm mới</h4>
                      <p class="text-muted">Thêm một nhân viên mới vào hệ thống</p>
                    </div>
                    <div class="d-flex align-content-center flex-wrap gap-3">
                      <a href="list_staff.php"><button type="button" class="btn btn-label-secondary">Hủy bỏ</button></a>
                      <button type="submit" name="create_staff" class="btn btn-primary">Thêm mới</button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-lg-8">
                      <div class="card mb-4">
                        <div class="card-header">
                          <h5 class="card-tile mb-0">Thông tin nhân viên</h5>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="mb-3 col-md-3">
                              <label class="form-label" for="ecommerce-product-name">Mã nhân viên</label>
                              <input type="text" class="form-control" placeholder="Nhập mã nhân viên" name="users_code"
                                required>
                              <div class="invalid-feedback">
                                Mời bạn nhập mã nhân viên!
                              </div>
                            </div>
                            <div class="mb-3 col-md-9">
                              <label class="form-label" for="ecommerce-product-name">Tên nhân viên</label>
                              <input type="text" class="form-control" placeholder="Nhập tên nhân viên" name="users_name"
                                required>
                              <div class="invalid-feedback">
                                Mời bạn nhập tên nhân viên!
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="mb-3 col-md-10">
                              <label class="form-label" for="ecommerce-product-name">Hình ảnh</label>
                              <input type="file" class="form-control" name="users_avatar" id="basic-default-upload-file"
                                required="">
                              <div class="invalid-feedback">
                                Mời bạn chọn ảnh!
                              </div>
                            </div>
                          </div>
                          <div class="mb-3 col-md-9">
                            <label class="form-label" for="ecommerce-product-name">Email</label>
                            <input type="text" class="form-control" placeholder="Nhập email nhân viên"
                              name="users_email" required>
                            <div class="invalid-feedback">
                              Mời bạn nhập email!
                            </div>
                          </div>
                          <div class="mb-3 col-md-9">
                            <label class="form-label" for="ecommerce-product-name">Tài khoản</label>
                            <input type="text" class="form-control" placeholder="Nhập tài khoản nhân viên"
                              name="users_account" required>
                            <div class="invalid-feedback">
                              Mời bạn nhập tài khoản!
                            </div>
                          </div>
                          <div class="mb-3 col-md-9">
                            <label class="form-label" for="ecommerce-product-name">Mật khẩu</label>
                            <input type="password" class="form-control" placeholder="Nhập mật khẩu"
                              name="users_password" required>
                            <div class="invalid-feedback">
                              Mời bạn nhập mật khẩu!
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12 col-lg-4">
                      <div class="card mb-4">
                        <div class="card-header">
                          <h5 class="card-title mb-0">Thông tin bổ sung</h5>
                        </div>
                        <div class="card-body">
                          <div class="mb-3">
                            <label class="form-label" for="ecommerce-product-price">Số CCCD</label>
                            <input type="text" class="form-control" placeholder="Nhập số CCCD" name="users_CCCD"
                              required>
                            <div class="invalid-feedback">
                              Mời bạn nhập số CCCD!
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="ecommerce-product-price">Số điện thoại</label>
                            <input type="text" class="form-control" placeholder="Nhập số điện thoại"
                              name="users_phone_number" required>
                            <div class="invalid-feedback">
                              Mời bạn nhập số điện thoại!
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="ecommerce-product-price">Ngày tháng năm sinh</label>
                            <input type="date" class="form-control" placeholder="Nhập số điện thoại"
                              name="users_birthday" required>
                            <div class="invalid-feedback">
                              Mời bạn nhập năm sinh!
                            </div>
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="ecommerce-product-price">Địa chỉ</label>
                            <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="users_address"
                              required>
                            <div class="invalid-feedback">
                              Mời bạn nhập địa chỉ!
                            </div>
                          </div>
                          <div class="mb-3">
                            <label for="ecommerce-product-tags" class="form-label mb-1">Chức vụ</label>
                            <select id="select2Dark" name="list_roles_staff[]" class="select2 form-select" multiple>
                              <?php
                            if (isset($list_roles) && is_array($list_roles)) {
                              foreach ($list_roles as $index => $roles) :
                            ?> <option value="<?php echo($roles['id']) ?>"><?php echo($roles['roles_name']) ?>
                              </option>
                              <?php endforeach;
                            } else {
                              echo "Không có dữ liệu danh mục.";
                            } ?>
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
    </div>
    <?php @include "../layout/import_script.php" ?>

    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
    <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="../../assets/vendor/js/menu.js"></script>
    <script>
    (function() {
      'use strict'
      var forms = document.querySelectorAll('.needs-validation')
      Array.prototype.slice.call(forms)
        .forEach(function(form) {
          form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }

            form.classList.add('was-validated')
          }, false)
        })
    })()
    </script>
    <script>
    var quill = new Quill('#snow-editor', {
      theme: 'snow'
    });
    quill.on('text-change', function() {
      var content = quill.root.innerHTML;
      document.getElementById('roomDescriptionInput').value = content;
    });
    </script>
    <script src="../../assets/vendor/libs/select2/select2.js"></script>
    <script src="../../assets/vendor/libs/tagify/tagify.js"></script>
    <script src="../../assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
    <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="../../assets/vendor/libs/bloodhound/bloodhound.js"></script>

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../../assets/js/forms-selects.js"></script>
    <script src="../../assets/js/forms-tagify.js"></script>
    <script src="../../assets/js/forms-typeahead.js"></script>
    <script src="../../assets/js/form-validation.js"></script>
  </body>

</html>