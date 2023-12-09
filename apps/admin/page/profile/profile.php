<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr"
  data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>User Profile - Profile | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>
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
    <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css">
    <link rel="stylesheet" href="../../assets/vendor/css/pages/page-profile.css" />
    <script src="../../assets/vendor/js/helpers.js"></script>
    <script src="../../assets/js/config.js"></script>
    <style>
    .form-control:disabled {
      background-color: white;
      opacity: 1;
    }
    </style>
  </head>

  <body>
    <?php @include "../../controllers/profile-controller.php" ?>
    <div class="layout-wrapper layout-content-navbar  ">
      <div class="layout-container">
        <?php @include "../layout/sidebar.php" ?>
        <div class="layout-page">
          <?php @include "../layout/navbar.php" ?>
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="py-3 mb-4">
                <span class="text-muted fw-light">Trang quản trị /</span> Thông tin tài khoản
              </h4>
              <div class="row">
                <div class="col-12">
                  <div class="card mb-4">
                    <div class="user-profile-header-banner">
                      <img src="../../assets/img/pages/profile-banner.png" alt="Banner image" class="rounded-top">
                    </div>
                    <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                      <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        <img src="../../../upload/<?= $dataLoginUser['users_avatar'] ?>" alt="user image"
                          class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
                      </div>
                      <div class="flex-grow-1 mt-3 mt-sm-5">
                        <div
                          class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                          <div class="user-profile-info">
                            <h4><?= $dataLoginUser['users_name'] ?></h4>
                            <ul
                              class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                              <li class="list-inline-item fw-medium">
                                <i class='bx bx-map'></i> <?php echo ($dataLoginUser['users_address']) ?>
                              </li>
                              <li class="list-inline-item fw-medium">
                                <i class='bx bx-calendar-alt'></i>
                                <?php echo (new DateTime($dataLoginUser['create_date']))->format('d \T\h\á\n\g m - Y') ?>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mb-4">
                <h5 class="card-header">Thông tin cá nhân</h5>
                <div class="card-body">
                  <form id="formAccountSettings" method="POST" onsubmit="return false">
                    <div class="row">
                      <div class="mb-3 col-md-6">
                        <label for="firstName" class="form-label">Mã code</label>
                        <input class="form-control" type="text" value="<?php echo ($dataLoginUser['users_code']) ?>"
                          disabled />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="lastName" class="form-label">Họ và tên</label>
                        <input class="form-control" type="text" value="<?php echo ($dataLoginUser['users_name']) ?>"
                          disabled />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">Ngày sinh</label>
                        <input class="form-control" type="text" value="<?php echo ($dataLoginUser['users_birthday']) ?>"
                          disabled />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label class="form-label" for="phoneNumber">Số điện thoại</label>
                        <input type="text" class="form-control"
                          value="<?php echo ($dataLoginUser['users_phone_number']) ?>" disabled />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control" type="text" value="<?php echo ($dataLoginUser['users_email']) ?>"
                          disabled />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="organization" class="form-label">Căn cước công dân</label>
                        <input type="text" class="form-control" value="<?php echo ($dataLoginUser['users_CCCD']) ?>"
                          disabled />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" value="<?php echo ($dataLoginUser['users_address']) ?>"
                          disabled />
                      </div>
                      <div class="mb-3 col-md-6">
                        <label for="state" class="form-label">Chức vụ</label>
                        <input class="form-control" type="text" id="state" name="state" placeholder="California"
                          disabled />
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <?php include "../layout/footer.php" ?>
          </div>
        </div>
      </div>
    </div>
    <?php include "../layout/import_script.php" ?>
  </body>

</html>