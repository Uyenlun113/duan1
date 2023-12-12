<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr"
  data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

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
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" /> <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/select2/select2.css"> <!-- Page CSS -->
    <script src="../../assets/vendor/js/helpers.js"></script>
    <script src="../../assets/js/config.js"></script>
    <link rel="stylesheet" href="../../assets/vendor/libs/quill/editor.css">
    <link rel="stylesheet" href="../../assets/vendor/libs/select2/select2.css" />
  </head>

  <body>
    <?php @include "../../controllers/categories_controller.php" ?>
    <div class="layout-wrapper layout-content-navbar ">
      <div class="layout-container">
        <?php @include "../layout/sidebar.php1" ?>
        <div class="layout-page">
          <?php @include "../layout/navbar.php1" ?>
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="py-3 mb-4">
                <span class="text-muted fw-light">Trang quản trị /</span><span> Cập nhật loại phòng</span>
              </h4>
              <form class="row g-3" method="POST" action="update_category.php" enctype="multipart/form-data" novalidate>
                <div class="app-ecommerce">
                  <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-column justify-content-center">
                      <h4 class="mb-1 mt-3">Cập nhật loại phòng</h4>
                      <p class="text-muted">Cập nhật lại thông tin loại phòng
                        <?php echo($detailCategory["category_name"]) ?>
                      </p>
                    </div>
                    <div class="d-flex align-content-center flex-wrap gap-3">
                      <a href="list_category.php"><button type="button" class="btn btn-label-secondary">Hủy
                          bỏ</button></a>
                      <button type="submit" name="update_category" class="btn btn-primary">Lưu lại</button>
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
                              <input type="hidden" name="id" value="<?php echo $detailCategory['id']; ?>">
                              <label class="form-label" for="ecommerce-product-name">Mã loại phòng</label>
                              <input type="text" class="form-control" placeholder="Nhập mã danh mục"
                                name="category_code" value="<?php echo $detailCategory['category_code'];  ?>" required>
                              <div class="invalid-feedback">
                                Mời bạn nhập mã danh mục!
                              </div>
                            </div>
                            <div class="mb-3 col-md-9">
                              <label class="form-label" for="ecommerce-product-name">Tên danh mục</label>
                              <input type="text" class="form-control" placeholder="Nhập tên danh mục"
                                name="category_name" value="<?php echo $detailCategory['category_name'];  ?>" required>
                              <div class="invalid-feedback">
                                Mời bạn nhập tên danh mục!
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="mb-3 col-md-10">
                              <label class="form-label" for="ecommerce-product-name">Hình ảnh</label>
                              <input type="file" class="form-control" name="category_image"
                                id="basic-default-upload-file" value=" <?php echo($detailCategory["category_image"]) ?>"
                                required>
                              <div class="invalid-feedback">
                                Mời bạn nhập tên phòng!
                              </div>
                            </div>

                          </div>
                          <input type="hidden" name="category_description" id="categoryDescriptionInput"
                            value=" <?php echo $detailCategory['category_description'];?>">
                          <div class="has-validation">
                            <label class="form-label">Mô tả danh mục<span class="text-muted"></span></label>
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
                            <div id="snow-editor" data-placeholder="Mời bạn nhập mô tả chi tiết">
                              <?php echo $detailCategory['category_description'];?></div>
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
                            <label class="form-label" for="ecommerce-product-price">Giá tiền</label>
                            <input type="number" class="form-control" placeholder="Nhập giá phòng" name="category_price"
                              value="<?php echo($detailCategory["category_price"]) ?>
">
                          </div>

                          <div class="mb-3">
                            <label class="form-label" for="ecommerce-product-price">Số người tối đa</label>
                            <input type="number" class="form-control" placeholder="Nhập số người tối đa"
                              name="category_adult" value="<?php echo($detailCategory["category_adult"]) ?>">
                          </div>
                          <div class="mb-3 col ecommerce-select2-dropdown">
                            <label class="form-label mb-1" for="status-org">Trạng thái
                            </label>
                            <select class="select2 form-select" name="category_status"
                              value="<?php echo $detailCategory['category_status'];?>"
                              data-placeholder="-- Trạng thái --">
                              <option value=""
                                <?php echo ($detailCategory['category_status'] == '') ? 'selected' : ''; ?>>--
                                Trạng
                                thái --</option>
                              <option value="1"
                                <?php echo ($detailCategory['category_status'] == '1') ? 'selected' : ''; ?>>
                                Hoạt động
                              </option>
                              <option value="0"
                                <?php echo ($detailCategory['category_status'] == '0') ? 'selected' : ''; ?>>
                                Tạm ẩn
                              </option>

                            </select>
                          </div>
                          <div class="mb-3">
                            <label for="ecommerce-product-tags" class="form-label mb-1">Dịch vụ</label>
                            <select id="select2Dark" name="list_service_add[]" class="select2 form-select" multiple>
                              <?php
                                if (isset($list_service) && is_array($list_service)) {
                                    foreach ($list_service as $index => $service) :
                                        $isSelected = in_array($service['id'], array_column($list_detail_category, 'service_id'));
                                ?>
                              <option <?php echo $isSelected ? 'selected' : ''; ?>
                                value="<?php echo $service['id']; ?>">
                                <?php echo $service['service_name']; ?>
                              </option>
                              <?php
                                    endforeach;
                                } else {
                                    echo "Không có dữ liệu danh mục.";
                                }
                                ?>
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
    <?php @include "../layout/import_script.php" ?>
    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
    <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="../../assets/vendor/js/menu.js"></script>
    <script src="../../assets/vendor/libs/select2/select2.js"></script>
    <script src="../../assets/vendor/libs/tagify/tagify.js"></script>
    <script src="../../assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
    <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="../../assets/vendor/libs/bloodhound/bloodhound.js"></script>
    <script src="../../assets/js/main.js"></script>
    <script src="../../assets/js/forms-selects.js"></script>
    <script src="../../assets/js/forms-tagify.js"></script>
    <script src="../../assets/js/forms-typeahead.js"></script>
    <script src="../../assets/js/form-validation.js"></script>
  </body>

</html>