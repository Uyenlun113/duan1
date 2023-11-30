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
                <span class="text-muted fw-light">Trang quản trị /</span><span>Cập nhật thông tin nhân viên</span>
              </h4>
              <form class="row g-3" method="POST" action="create_staff.php" enctype="multipart/form-data" novalidate>
                <div class="app-ecommerce">
                  <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-column justify-content-center">
                      <h4 class="mb-1 mt-3">Cập nhật</h4>

                    </div>
                    <div class="d-flex align-content-center flex-wrap gap-3">
                      <a href="list_staff.php"><button type="button" class="btn btn-label-secondary">Hủy bỏ</button></a>
                      <button type="submit" name="update_staff" class="btn btn-primary">Lưu lại</button>
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
                              <input type="hidden" name="id" value="<?php echo $detail_staff['id']; ?>">
                              <label class="form-label" for="ecommerce-product-name">Mã nhân viên</label>
                              <input type="text" class="form-control" placeholder="Nhập mã nhân viên" name="users_code"
                                value="<?php echo $detail_staff['users_code']; ?>" required>
                              <div class="invalid-feedback">
                                Mời bạn nhập mã nhân viên!
                              </div>
                            </div>
                            <div class="mb-3 col-md-9">
                              <label class="form-label" for="ecommerce-product-name">Tên nhân viên</label>
                              <input type="text" class="form-control" placeholder="Nhập tên nhân viên" name="users_name"
                                value="<?php echo $detail_staff['users_name']; ?>" required>
                              <div class="invalid-feedback">
                                Mời bạn nhập tên nhân viên!
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="mb-3 col-md-10">
                              <label class="form-label" for="ecommerce-product-name">Hình ảnh</label>
                              <input type="file" class="form-control" name="users_avatar"
                                value="<?php echo $detail_staff['users_avatar']; ?>" id="basic-default-upload-file"
                                required="">
                              <div class="invalid-feedback">
                                Mời bạn chọn ảnh!
                              </div>
                            </div>
                            <div class=" col-md-2">
                              <img src="../../upload/<?php echo $detail_staff['users_avatar']; ?>" height="65"
                                width="100" class="mt-3 rounded" alt="">
                            </div>
                          </div>
                          <div class="mb-3 col-md-9">
                            <label class="form-label" for="ecommerce-product-name">Email</label>
                            <input type="text" class="form-control" placeholder="Nhập email nhân viên"
                              name="users_email" value="<?php echo $detail_staff['users_email']; ?>" required>
                            <div class="invalid-feedback">
                              Mời bạn nhập email!
                            </div>
                          </div>
                          <div class="mb-3 col-md-9">
                            <label class="form-label" for="ecommerce-product-name">Tài khoản</label>
                            <input type="text" class="form-control" placeholder="Nhập tài khoản nhân viên"
                              name="users_account" value="<?php echo $detail_staff['users_account']; ?>" required>
                            <div class="invalid-feedback">
                              Mời bạn nhập tài khoản!
                            </div>
                          </div>
                          <div class="mb-3 col-md-9">
                            <label class="form-label" for="ecommerce-product-name">Mật khẩu</label>
                            <input type="password" class="form-control" placeholder="Nhập mật khẩu"
                              name="users_password" value="<?php echo $detail_staff['users_password']; ?>" required>
                            <div class="invalid-feedback">
                              Mời bạn nhập mật khẩu!
                            </div>
                          </div>
                          <div class="mb-3 col ecommerce-select2-dropdown">
                            <label class="form-label mb-1 d-flex justify-content-between align-items-center"
                              for="category-org">
                              <span>Chức vụ</span><a href="javascript:void(0);" class="fw-medium">Thêm chức vụ</a>
                            </label>
                            <select class="select2 form-select" name="users_position"
                              data-placeholder="-- Chọn chức vụ --">
                              <option value="">-- Chọn chức vụ --</option>
                              <?php foreach($list_categories as $category) :?>
                              <option value="<?= $category['id'] ?>"><?= $category['category_name']?></option>
                              <?php endforeach;?>
                            </select>
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
                              value="<?php echo $detail_staff['users_CCCD']; ?>">
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="ecommerce-product-price">Số điện thoại</label>
                            <input type="text" class="form-control" placeholder="Nhập số điện thoại"
                              name="users_phone_number" value="<?php echo $detail_staff['users_phone_number']; ?>">
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="ecommerce-product-price">Ngày tháng năm sinh</label>
                            <input type="date" class="form-control" placeholder="Nhập ngày tháng năm sinh"
                              name="users_birthday" value="<?php echo $detail_staff['users_birthday']; ?>">
                          </div>
                          <div class="mb-3">
                            <label class="form-label" for="ecommerce-product-price">Địa chỉ</label>
                            <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="users_address"
                              value="<?php echo $detail_staff['users_address']; ?>">
                          </div>
                          <!-- <div class="mb-3">
                            <label for="ecommerce-product-tags" class="form-label mb-1">Dịch vụ phòng</label>
                            <input id="ecommerce-product-tags" class="form-control" name="ecommerce-product-tags"
                              value="Normal,Standard,Premium" aria-label="Product Tags" />
                          </div> -->
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
  </body>

</html>