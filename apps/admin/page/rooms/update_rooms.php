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
    <?php @include "../../controllers/rooms_controller.php" ?>
    <div class="layout-wrapper layout-content-navbar ">
      <div class="layout-container">
        <?php @include "../layout/sidebar.php" ?>
        <div class="layout-page">
          <?php @include "../layout/navbar.php" ?>
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="py-3 mb-4">
                <span class="text-muted fw-light">Trang quản trị /</span><span> Cập nhật phòng</span>
              </h4>
              <form class="row g-3" method="POST" action="update_rooms.php" enctype="multipart/form-data" novalidate>
                <div class="app-ecommerce">
                  <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-column justify-content-center">
                      <h4 class="mb-1 mt-3">Cập nhật phòng</h4>
                      <p class="text-muted">Cập nhật lại thông tin phòng <?php echo($detail_rooms["room_name"]) ?></p>
                    </div>
                    <div class="d-flex align-content-center flex-wrap gap-3">
                      <a href="list_rooms.php"><button type="button" class="btn btn-label-secondary">Hủy bỏ</button></a>
                      <button type="submit" name="update_rooms" class="btn btn-primary">Lưu lại</button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 col-lg-8">
                      <div class="card mb-4">
                        <div class="card-header">
                          <h5 class="card-tile mb-0">Thông tin phòng</h5>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="mb-3 col-md-3">
                              <input type="hidden" name="id" value="<?php echo $detail_rooms['id']; ?>">

                              <label class="form-label" for="ecommerce-product-name">Mã phòng</label>
                              <input type="text" class="form-control" placeholder="Nhập mã phòng" name="room_code"
                                value=" <?php echo($detail_rooms["room_code"]) ?>" required>
                              <div class="invalid-feedback">
                                Mời bạn nhập mã phòng!
                              </div>
                            </div>
                            <div class="mb-3 col-md-9">
                              <label class="form-label" for="ecommerce-product-name">Tên phòng</label>
                              <input type="text" class="form-control" placeholder="Nhập tên phòng" name="room_name"
                                value=" <?php echo($detail_rooms["room_name"]) ?>" required>
                              <div class="invalid-feedback">
                                Mời bạn nhập tên phòng!
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="mb-3 col-md-10">
                              <label class="form-label" for="ecommerce-product-name">Hình ảnh</label>
                              <input type="file" class="form-control" name="room_image" id="basic-default-upload-file"
                                value=" <?php echo($detail_rooms["room_image"]) ?>" required="">
                              <div class="invalid-feedback">
                                Mời bạn nhập tên phòng!
                              </div>
                            </div>
                            <div class=" col-md-2">
                              <img src="../../upload/<?php echo($detail_rooms["room_image"]) ?>" height="65" width="100"
                                class="mt-3 rounded" alt="">
                            </div>
                          </div>
                          <input type="hidden" value="<?php echo($detail_rooms["room_description"]) ?>"
                            name="room_description" id="roomDescriptionInput">
                          <div class="has-validation">
                            <label class="form-label">Mô tả phòng<span class="text-muted"></span></label>
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
                              <?php echo($detail_rooms["room_description"]) ?>
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

                          <div class="mb-3 col ecommerce-select2-dropdown">
                            <label class="form-label mb-1 d-flex justify-content-between align-items-center"
                              for="category-org">
                              <span>Loại phòng</span><a href="javascript:void(0);" class="fw-medium">Thêm loại phòng</a>
                            </label>
                            <select class="select2 form-select" name="category_id"
                              data-placeholder="-- Chọn loại phòng --">
                              <option value="">-- Chọn loại phòng --</option>
                              <?php foreach($list_categories as $category) :?>

                              <option value="<?= $category['id'] ?>"
                                <?php echo ($category['id'] == $detail_rooms['category_id']) ? 'selected' : ''; ?>>
                                <?= $category['category_name'] ?></option>
                              <?php endforeach;?>
                            </select>
                          </div>
                          <!-- Status -->
                          <div class="mb-3 col ecommerce-select2-dropdown">
                            <label class="form-label mb-1" for="status-org">Trạng thái phòng
                            </label>
                            <select disabled value="<?php echo($detail_rooms["room_status"]) ?>"
                              class="select2 form-select" name="room_status" data-placeholder="-- Trạng thái --">
                              <option value="" <?php echo ($detail_rooms['room_status'] == '') ? 'selected' : ''; ?>>--
                                Trạng
                                thái --</option>
                              <option value="1" <?php echo ($detail_rooms['room_status'] == '1') ? 'selected' : ''; ?>>
                                Còn
                                trống
                              </option>
                              <option value="0" <?php echo ($detail_rooms['room_status'] == '0') ? 'selected' : ''; ?>>
                                Đã đặt
                              </option>
                              <option value="2" <?php echo ($detail_rooms['room_status'] == '2') ? 'selected' : ''; ?>>
                                Hết
                                phòng
                              </option>
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
      document.getElementById('roomDescriptionInput').value = content;
    });
    </script>
  </body>

</html>