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
    <?php @include "../../controllers/categories_controller.php" ?>
    <div class="layout-wrapper layout-content-navbar ">
      <div class="layout-container">
        <?php @include "../layout/sidebar.php" ?>
        <div class="layout-page">
          <?php @include "../layout/navbar.php" ?>
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="py-3 mb-4">
                <span class="text-muted fw-light">Trang quản trị /</span><span> Thêm loại phòng</span>
              </h4>
              <form class="row g-3" method="POST" action="create_category.php" enctype="multipart/form-data" novalidate>
                <div class="app-ecommerce">
                  <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-column justify-content-center">
                      <h4 class="mb-1 mt-3">Thêm mới</h4>
                      <p class="text-muted">Thêm một loại phòng mới vào hệ thống</p>
                    </div>
                    <div class="d-flex align-content-center flex-wrap gap-3">
                      <a href="list_category.php"><button type="button" class="btn btn-label-secondary">Hủy
                          bỏ</button></a>
                      <button type="submit" name="create_category" class="btn btn-primary">Thêm mới</button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-lg-8">
                      <div class="card mb-4">
                        <div class="card-header">
                          <h5 class="card-tile mb-0">Thông tin loại phòng</h5>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="mb-3 col-md-3">
                              <label class="form-label" for="ecommerce-product-name">Mã loại phòng</label>
                              <input type="text" class="form-control" placeholder="Nhập mã danh mục"
                                name="category_code" required>
                              <div class="invalid-feedback">
                                Mời bạn nhập mã loại phòng!
                              </div>
                            </div>
                            <div class="mb-3 col-md-9">
                              <label class="form-label" for="ecommerce-product-name">Tên danh mục</label>
                              <input type="text" class="form-control" placeholder="Nhập tên danh mục"
                                name="category_name" required>
                              <div class="invalid-feedback">
                                Mời bạn nhập tên loại phòng!
                              </div>
                            </div>
                          </div>
                          <input type="hidden" name="category_description" id="categoryDescriptionInput">
                          <div class="has-validation">
                            <label class="form-label">Mô tả loại phòng<span class="text-muted"></span></label>
                            <div id="snow-toolbar">
                              <span class="ql-formats">
                                <select class="ql-font"></select>
                                <select class="ql-size"></select>
                              </span>
                              <span class="ql-formats">
                                <button class="ql-bold"></button>
                                <button class="ql-italic"></button>
                                <button class="ql-underline"></button>
                                <button class="ql-strike"></button>
                              </span>
                              <span class="ql-formats">
                                <select class="ql-color"></select>
                                <select class="ql-background"></select>
                              </span>
                              <span class="ql-formats">
                                <button class="ql-script" value="sub"></button>
                                <button class="ql-script" value="super"></button>
                              </span>
                              <span class="ql-formats">
                                <button class="ql-header" value="1"></button>
                                <button class="ql-header" value="2"></button>
                                <button class="ql-blockquote"></button>
                                <button class="ql-code-block"></button>
                              </span>
                            </div>
                            <div id="snow-editor" data-placeholder="Mời bạn nhập mô tả chi tiết"></div>
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
                          <div class="mb-3 col ecommerce-select2-dropdown">
                            <label class="form-label mb-1" for="status-org">Trạng thái
                            </label>
                            <select class="select2 form-select" name="category_status"
                              data-placeholder="-- Trạng thái --">
                              <option value="">-- Trạng thái --</option>
                              <option value="1">Hoạt động</option>
                              <option value="0">Tạm ẩn</option>
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
      document.getElementById('categoryDescriptionInput').value = content;
    });
    </script>
  </body>

</html>