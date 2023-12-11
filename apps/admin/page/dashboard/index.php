<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr"
  data-theme="theme-default">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Product List - eCommerce | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>
    <meta name="description"
      content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <link rel="canonical" href="https://themeselection.com/item/sneat-bootstrap-html-admin-template/">
    <link rel="icon" type="image/x-icon"
      href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/favicon/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap"
      rel="stylesheet">
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
    <?php @include "../../controllers/index-controller.php" ?>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <?php @include "../layout/sidebar.php" ?>
        <div class="layout-page">
          <?php @include "../layout/navbar.php" ?>
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary">
                            Chào mừng bạn đã trở lại, <?php echo $dataLoginUser['users_name'] ?> 🎉
                          </h5>
                          <p class="mb-4">Hãy bắt đầu công việc quản lý hôm nay của bạn ngay thôi nào!</p>
                          <a href="javascript:;" class="btn btn-sm btn-label-primary">Bắt đầu ngay</a>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img src="../../assets/img/illustrations/man-with-laptop-light.png" height="140"
                            alt="View Badge User">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-4">
                  <div class="card card-border-shadow-primary h-100">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                          <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-truck"></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">
                          <?php echo (count($list_orders_all)) ?>
                        </h4>
                      </div>
                      <p class="mb-1">Tổng số đơn đặt phòng</p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-4">
                  <div class="card card-border-shadow-warning h-100">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                          <span class="avatar-initial rounded bg-label-warning"><i class='bx bx-error'></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">
                          <?php echo (count($list_orders_pending)) ?>
                        </h4>
                      </div>
                      <p class="mb-1">Chờ xác nhận</p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-4">
                  <div class="card card-border-shadow-success h-100">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                          <span class="avatar-initial rounded bg-label-success"><i
                              class='bx bx-git-repo-forked'></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">
                          <?php echo (count($list_orders_success)) ?>
                        </h4>
                      </div>
                      <p class="mb-1">Thành công</p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-3 mb-4">
                  <div class="card card-border-shadow-danger h-100">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-2 pb-1">
                        <div class="avatar me-2">
                          <span class="avatar-initial rounded bg-label-danger"><i class='bx bx-time-five'></i></span>
                        </div>
                        <h4 class="ms-1 mb-0">
                          <?php echo (count($list_orders_cancel)) ?>
                        </h4>
                      </div>
                      <p class="mb-1">Đã bị huỷ</p>
                    </div>
                  </div>
                </div>
                <div class="col-12 mb-4">
                  <div class="card">
                    <div class="card-header header-elements">
                      <div>
                        <h5 class="card-title mb-0">Doanh thu</h5>
                        <small class="text-muted">Biểu đồ doanh thu theo từng năm</small>
                      </div>
                      <div class="card-header-elements ms-auto py-0">
                        <select name="year" id="chooseYear" class="selectpicker w-100 show-tick form-control"
                          onchange="chooseYear()">
                          <?php
                          for ($year = 2023; $year >= 2013; $year--) {
                            $selected = ($year == $currentYear) ? "selected" : "";
                            echo "<option value=\"$year\" $selected>$year</option>";
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="card-body">
                      <div style="font-size:13px;text-align:center">
                        <i>Biểu đồ doanh thu năm
                          <?php echo ($currentYear) ?>
                        </i>
                      </div>
                      <canvas id="lineChart" class="chartjs" height="100"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php include "../layout/footer.php" ?>
            <div class="content-backdrop fade"></div>
          </div>
        </div>
      </div>
      <div class="layout-overlay layout-menu-toggle"></div>
      <div class="drag-target"></div>
    </div>
    <?php include "../layout/import_script.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    const ctx = document.getElementById('lineChart');
    let resultListRevenue = <?php echo json_encode($resultListRevenue); ?>;
    console.log(resultListRevenue);
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9",
          "Tháng 10", "Tháng 11", "Tháng 12"
        ],
        datasets: [{
          label: 'My First Dataset',
          data: resultListRevenue,
          borderColor: "#696cff",
          tension: 0.5,
          pointStyle: "circle",
          backgroundColor: "#696cff",
          fill: false,
          pointRadius: 1,
          pointHoverRadius: 5,
          pointHoverBorderWidth: 5,
          pointBorderColor: "transparent",
          pointHoverBorderColor: "i",
          pointHoverBackgroundColor: "#696cff",
        }, ],
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        },
        plugins: {
          legend: {
            display: false
          }
        }
      }
    });
    </script>

    <script>
    function chooseYear() {
      searchValueCheckin = document.getElementById('chooseYear').value
      window.location.href = '?current_year=' + encodeURIComponent(searchValueCheckin);
    }
    </script>

  </body>

</html>