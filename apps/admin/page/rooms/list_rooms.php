<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
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
  </head>

  <body>
    <?php @include "../../controllers/rooms_controller.php" ?>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <?php @include "../layout/sidebar.php" ?>
        <div class="layout-page">
          <?php @include "../layout/navbar.php" ?>
          <div class="content-wrapper">

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="py-3 mb-4">
                <span class="text-muted fw-light">Trang quản trị /</span> Danh sách phòng
              </h4>
              <!-- Product List Table -->
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Danh sách phòng</h5>
                  <div class="row justify-content-between">
                    <div class="row col-sm-12 col-md-6 justify-content-md-end">
                      <div style="display: flex; gap: 15px;">
                        <input type="search" class="form-control" placeholder="Tìm kiếm theo tên phòng" id="searchInput"
                          onchange="searchRooms()"
                          value="<?php echo isset($_GET['search_rooms']) ? htmlspecialchars($_GET['search_rooms']) : ''; ?>">
                      </div>
                    </div>
                    <?php if ($isCreateBooking): ?>
                    <a href="create_rooms.php" class="col-sm-12 col-md-2">
                      <button type="button" class="btn btn-primary w-100">
                        <i class="bx bx-plus me-sm-1"></i>
                        Thêm phòng
                      </button>
                    </a>
                    <?php else: ?>
                    <div></div>
                    <?php endif; ?>


                  </div>
                </div>
                <div class="card-datatable table-responsive">
                  <table class=" table border-top">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th></th>
                        <th>Phòng</th>
                        <th>Loại phòng</th>
                        <th>Số người ở</th>
                        <th>Giá phòng</th>
                        <th>Thao tác</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (isset($list_rooms) && is_array($list_rooms)) {
                        foreach ($list_rooms as $index => $rooms):
                          ?>
                      <tr>
                        <td style="width:10px">
                          <?php echo $index + 1 ?>
                        </td>
                        <td style="width:90px"><img src="../../../upload/<?= $rooms['room_image'] ?>" height="60"
                            width="80" class="rounded">
                        </td>
                        <td><span>
                            <?php echo $rooms['room_name'] ?>
                          </span></td>
                        <td><span>
                            <?php echo $rooms['category_name'] ?>
                          </span></td>
                        <td><span>
                            <?php echo $rooms['category_adult'] ?>
                          </span></td>
                        <td><span>$
                            <?php echo number_format($rooms['category_price'], 0, '.', ',') ?>
                          </span></td>

                        <td>
                          <?php if ($isUpdateRoom): ?>
                          <a href="update_rooms.php?action=update&update_rooms=<?= $rooms['id'] ?>">
                            <button class="btn btn-sm btn-warning btn-icon">
                              <i class="fa-regular fa-pen-to-square fa-md"></i>
                            </button>
                          </a>
                          <?php else: ?>
                          <div></div>
                          <?php endif; ?>
                          <?php if ($isDeleteRoom): ?>
                          <a href="#" onclick="confirmDelete(<?= $rooms['id'] ?>)">
                            <button class="btn btn-sm btn-danger btn-icon">
                              <i class="fas fa-trash fa-md"></i>
                            </button>
                          </a>

                          <?php else: ?>
                          <div></div>
                          <?php endif; ?>
                        </td>
                      </tr>
                      <?php endforeach;
                      } else {
                        echo "Không có dữ liệu danh mục.";
                      } ?>
                    </tbody>
                  </table>
                  <nav aria-label="Page navigation" class="d-flex align-items-center justify-content-end me-3 mt-3">
                    <ul class="pagination mb-0">
                      <li class="page-item prev">
                        <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevron-left"></i></a>
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
                        <a class="page-link" href="javascript:void(0);"><i class="tf-icon bx bx-chevron-right"></i></a>
                      </li>
                    </ul>
                  </nav>
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
  <script>
  function searchRooms() {
    var searchValue = document.getElementById('searchInput').value;
    window.location.href = '?search_rooms=' + encodeURIComponent(searchValue);
  }
  </script>
  <script>
  function confirmDelete(roomsId) {
    var confirmation = confirm("Bạn có chắc muốn xóa phòng này không?");
    if (confirmation) {
      window.location.href = "list_rooms.php?action=delete&delete_rooms_id=" + roomsId;
    }
  }
  </script>

</html>

<!-- beautify ignore:end -->