<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
  data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>
      Danh mục
    </title>
    <meta name="description"
      content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5" />

    <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        "gtm.start": new Date().getTime(),
        event: "gtm.js"
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != "dataLayer" ? "&l=" + l : "";
      j.async = true;
      j.src =
        "../../../../www.googletagmanager.com/gtm5445.html?id=" + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, "script", "dataLayer", "GTM-5DDHKGP");
    </script>

    <?php @include "../layout/import_link.php" ?>
  </head>

  <body>
    <?php @include "../../controllers/room_service_controller.php" ?>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <?php @include "../layout/sidebar.php" ?>
        <div class="layout-page">
          <?php @include "../layout/navbar.php" ?>
          <div class="content-wrapper">

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="py-3 mb-4">
                <span class="text-muted fw-light">Trang quản trị /</span> Danh sách dịch vụ
              </h4>
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Danh sách dịch vụ</h5>
                  <div class="row justify-content-between">
                    <div class="col-sm-12 col-md-6 justify-content-md-end">
                      <input type="search" class="form-control col-sm-12 col-md-3"
                        placeholder="Tìm kiếm theo tên dịch vụ">
                    </div>
                    <a href="create_service.php" class="col-sm-12 col-md-2">
                      <button class="dt-button add-new btn btn-primary ms-2  w-100" tabindex="0"><span> <i
                            class="bx bx-plus me-sm-1"></i>
                          Thêm mới
                        </span></button>
                    </a>

                  </div>
                </div>
                <div class="card-datatable table-responsive">
                  <table class=" table border-top">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Tên dịch vụ</th>
                        <th>Mô tả chi tiết</th>
                        <th>Thao tác</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      if (isset($list_service) && is_array($list_service)) {
                        foreach ($list_service as $index => $service):
                          ?>
                      <tr>
                        <td style="width:15px">
                          <?php echo $index + 1 ?>
                        </td>
                        <td style="width:30%">
                          <?php echo $service['service_name'] ?>
                        </td>
                        <td>
                          <?php echo $service['service_description'] ?>
                        </td>
                        <td style="width:150px">
                          <a href="update_service.php?action=update&update_service=<?= $service['id'] ?>">
                            <button class="btn btn-sm btn-warning btn-icon">
                              <i class="fa-regular fa-pen-to-square fa-md"></i>
                            </button>
                          </a>
                          <a href="list_service.php?action=delete&delete_service_id=<?= $service['id'] ?>">
                            <button class=" btn btn-sm btn-danger btn-icon">
                              <i class="fas fa-trash fa-md"></i>
                            </button>
                          </a>
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

</html>

<!-- beautify ignore:end -->