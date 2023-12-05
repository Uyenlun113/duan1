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
    <?php @include "../../controllers/roles-controller.php" ?>
    <div class="layout-wrapper layout-content-navbar ">
      <div class="layout-container">
        <?php @include "../layout/sidebar.php" ?>
        <div class="layout-page">
          <?php @include "../layout/navbar.php" ?>
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="py-3 mb-4">
                <span class="text-muted fw-light">Trang quản trị /</span><span> Thêm mới chức vụ</span>
              </h4>
              <form class="row g-3" method="POST" action="update-roles.php" enctype="multipart/form-data" novalidate>
                <div class="app-ecommerce">
                  <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-column justify-content-center">
                      <h4 class="mb-1 mt-3">Thêm mới</h4>
                      <p class="text-muted">Thêm một nhân viên mới vào hệ thống</p>
                    </div>
                    <div class="d-flex align-content-center flex-wrap gap-3">
                      <a href="roles.php"><button type="button" class="btn btn-label-secondary">Hủy bỏ</button></a>
                      <button type="submit" name="update_roles" class="btn btn-primary">Cập nhật mới</button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-lg-12">
                      <div class="card mb-4">
                        <div class="card-header">
                          <h5 class="card-tile mb-0">Thông tin chức vụ</h5>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <input type="text" class="form-control" placeholder="Nhập mã nhân viên" name="id" required
                              value="<?php echo($detail_roles["id"]) ?>" hidden>
                            <div class="mb-3 col-md-4">
                              <label class="form-label" for="ecommerce-product-name">Mã chức vụ</label>
                              <input type="text" class="form-control" placeholder="Nhập mã nhân viên" name="roles_code"
                                required value="<?php echo($detail_roles["roles_code"]) ?>">
                              <div class="invalid-feedback">
                                Mời bạn nhập mã chức vụ!
                              </div>
                            </div>
                            <div class="mb-3 col-md-8">
                              <label class="form-label" for="ecommerce-product-name">Tên chức vụ</label>
                              <input type="text" class="form-control" placeholder="Nhập tên chức vụ" name="roles_name"
                                required value="<?php echo($detail_roles["roles_name"]) ?>">
                              <div class="invalid-feedback">
                                Mời bạn nhập tên nhân viên!
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="mb-3 col-md-12">
                              <label class="form-label" for="ecommerce-product-name">Mô tả</label>
                              <textarea type="area" class="form-control" placeholder="Viết mô tả..."
                                name="roles_description" required
                                value="<?php echo($detail_roles["roles_description"]) ?>"><?php echo($detail_roles["roles_description"]) ?></textarea>
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-lg-12">
                      <div class="card mb-4">
                        <div class="card-header">
                          <h5 class="card-tile mb-0">Phân quyền</h5>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="d-flex flex-wrap">
                              <?php
                                if (isset($list_permission) && is_array($list_permission)) {
                                    foreach ($list_permission as $index => $permission):
                                        $permision_id = $permission['id'];
                                ?>
                              <div class="form-check me-lg-5">
                                <input class="form-check-input" type="checkbox" id="<?php echo $permision_id ?>"
                                  name="selected_permissions[]" value="<?php echo $permision_id ?>"
                                  <?php echo (in_array($permision_id, array_column($list_checked_permission, 'permision_id')) ? 'checked' : ''); ?> />
                                <label class="form-check-label" for="<?php echo $permision_id ?>">
                                  <?php echo $permission['permision_name'] ?>
                                </label>
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