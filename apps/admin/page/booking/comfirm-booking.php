<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr"
  data-theme="theme-default" data-assets-path="../../assets/" data-template="vertical-menu-template">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Custom Options - Forms | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>
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

    <script src="../../assets/vendor/js/helpers.js"></script>
    <script src="../../assets/js/config.js"></script>

  </head>

  <body>
    <?php @include "../../controllers/comfirm-booking-controller.php" ?>
    <div class="layout-wrapper layout-content-navbar  ">
      <div class="layout-container">
        <?php @include "../layout/sidebar.php" ?>
        <div class="layout-page">
          <?php @include "../layout/navbar.php" ?>
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="py-3 mb-4">
                <span class="text-muted fw-light">Đặt phòng /</span> Xếp phòng
              </h4>
              <form id="quickForm" method="POST" action="comfirm-booking.php" enctype="multipart/form-data" novalidate>
                <div class="row gy-4">
                  <?php
                  if (isset($list_orders_items) && is_array($list_orders_items)) {
                    foreach ($list_orders_items as $index => $orders_item):
                      ?>
                  <div class="col-xl-12">
                    <div class="card">
                      <h5 class="card-header">
                        <span>
                          <?php echo ($orders_item['category_name']) ?> (
                          <?php echo ($orders_item['orders_item_quantity']) ?>
                          phòng )
                        </span>
                        <small style="text-align:end;display:block;margin-top:-12px;">
                          <?php echo date("d/m/Y", strtotime($orders_item['orders_item_checkin'])) ?> -
                          <?php echo date("d/m/Y", strtotime($orders_item['orders_item_checkout'])) ?>
                        </small>

                      </h5>
                      <div class="card-body">
                        <div class="row">
                          <?php
                              $list_rooms = getListRooms($orders_item['category_id']);
                              if (isset($list_rooms) && is_array($list_rooms)) {
                                foreach ($list_rooms as $index => $rooms):
                                  ?>
                          <div class="col-md-3 mb-md-0 mb-2">
                            <div class="form-check custom-option custom-option-basic" style="margin-bottom:10px;">
                              <label class="form-check-label custom-option-content" for="<?php echo ($rooms['id']) ?>">
                                <input class="form-check-input" type="checkbox"
                                  value="<?php echo $rooms['id'] . '|' . $orders_item['orders_id'] . '|' . $orders_item['orders_item_checkin'] . '|' . $orders_item['orders_item_checkout']; ?>"
                                  id="<?php echo $rooms['id']; ?>" name="list_room[]" />
                                <span class="custom-option-header">
                                  <span class="h6 mb-0">
                                    <?php echo ($rooms['room_code']) ?>
                                  </span>
                                  <small><?php if ($rooms['room_status'] == 1): ?>
                                    <span class="text-success">Còn trống</span>
                                    <?php else: ?>
                                    <span class="badge bg-label-primary me-1">Đã đặt</span>
                                    <?php endif; ?></small>
                                </span>
                                <span class="custom-option-body">
                                  <small class="option-text">
                                    <?php echo ($rooms['room_name']) ?>
                                  </small>
                                </span>
                              </label>
                            </div>
                          </div>
                          <?php endforeach;
                              } ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php endforeach;
                  } ?>
                </div>
                <div class="mt-3">
                  <button type="submit" name="confirm_booking" class="btn btn-primary">Xác nhận</button>
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

  </body>

</html>