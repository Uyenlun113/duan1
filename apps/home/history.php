<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Hoexr | Hotel HTML Template Template</title>
    <?php include "./layouts/link.php" ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.min.css" rel="stylesheet" />
  </head>

  <body>

    <div class="page-wrapper">
      <div class="preloader"></div>
      <?php @include "./controllers/history.php" ?>
      <?php include "./layouts/header2.php" ?>
      <section class="page-title" style="background-image: url(images/background/page-title-bg.png);">
        <div class="auto-container">
          <div class="title-outer text-center">
            <h1 class="title">Thanh toán</h1>
            <ul class="page-breadcrumb">
              <li><a href="index.html">Home</a></li>
              <li>Shop</li>
            </ul>
          </div>
        </div>
      </section>
      <!-- end main-content -->

      <!--checkout Start-->
      <section>
        <div class="container pt-10">
          <div class="section-content">
            <div class="row mt-10">
              <div class="col-md-12 mt-10">
                <!-- Tabs navs -->
                <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a data-mdb-tab-init class="nav-link active" id="ex1-tab-1" href="#ex1-tabs-1" role="tab"
                      aria-controls="ex1-tabs-1" aria-selected="true">Tất cả đơn đặt</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a data-mdb-tab-init class="nav-link" id="ex1-tab-2" href="#ex1-tabs-2" role="tab"
                      aria-controls="ex1-tabs-2" aria-selected="false">Đang xử lý</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a data-mdb-tab-init class="nav-link" id="ex1-tab-3" href="#ex1-tabs-3" role="tab"
                      aria-controls="ex1-tabs-3" aria-selected="false">Thành công</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a data-mdb-tab-init class="nav-link" id="ex1-tab-4" href="#ex1-tabs-4" role="tab"
                      aria-controls="ex1-tabs-4" aria-selected="false">Từ chối</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a data-mdb-tab-init class="nav-link" id="ex1-tab-0" href="#ex1-tabs-0" role="tab"
                      aria-controls="ex1-tabs-0" aria-selected="false">Đã hủy</a>
                  </li>
                </ul>
                <!-- Tabs navs -->

                <!-- Tabs content -->
                <div class="tab-content" id="ex1-content">
                  <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                    <table class=" table border-top">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Mã đơn hàng</th>
                          <th>Tổng tiền</th>
                          <th>Tiền cọc</th>
                          <th>Phương thức cọc</th>
                          <th>Trạng thái</th>
                          <th>Hành động</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                  if (isset($list_all_orders) && is_array($list_all_orders)) {
                    foreach ($list_all_orders as $index => $all_orders): 
                              ?>
                        <tr>
                          <td style="width:10px"><?php echo $index + 1 ?></td>
                          <td><span><?php echo $all_orders['orders_code'] ?></span></td>
                          <td><span><?php echo $all_orders['orders_total'] ?></span></td>
                          <td><span><?php echo $all_orders['orders_deposit'] ?></span></td>
                          <td><span><?php echo $all_orders['orders_payment_method'] ?></span></td>
                          <td><span><?php echo $all_orders['orders_status'] ?></span></td>
                          <td>
                            <a href="list_rooms.php?action=delete&delete_rooms_id=<?= $rooms['id'] ?>">
                              <button class=" btn btn-sm btn-danger btn-icon">
                                Hủy phòng
                              </button>
                            </a>
                          </td>
                        </tr>
                        <?php endforeach;
                          }else {
                            echo "Không có dữ liệu danh mục.";
                        } ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                    <table class=" table border-top">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Mã đơn hàng</th>
                          <th>Tổng tiền</th>
                          <th>Tiền cọc</th>
                          <th>Phương thức cọc</th>
                          <th>Hành động</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                  if (isset($list_waiting_orders) && is_array($list_waiting_orders)) {
                    foreach ($list_waiting_orders as $index => $waiting_orders): 
                              ?>
                        <tr>
                          <td style="width:10px"><?php echo $index + 1 ?></td>
                          <td><span><?php echo $waiting_orders['orders_code'] ?></span></td>
                          <td><span><?php echo $waiting_orders['orders_total'] ?></span></td>
                          <td><span><?php echo $waiting_orders['orders_deposit'] ?></span></td>
                          <td><span><?php echo $waiting_orders['orders_payment_method'] ?></span></td>
                          <td>
                            <a href="list_rooms.php?action=delete&delete_rooms_id=<?= $rooms['id'] ?>">
                              <button class=" btn btn-sm btn-danger btn-icon">
                                Hủy phòng
                              </button>
                            </a>
                          </td>
                        </tr>
                        <?php endforeach;
                          }else {
                            echo "Không có dữ liệu danh mục.";
                        } ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                    <table class=" table border-top">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Mã đơn hàng</th>
                          <th>Tổng tiền</th>
                          <th>Tiền cọc</th>
                          <th>Phương thức cọc</th>
                          <th>Hành động</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                  if (isset($list_success_orders) && is_array($list_success_orders)) {
                    foreach ($list_success_orders as $index => $success_orders): 
                              ?>
                        <tr>
                          <td style="width:10px"><?php echo $index + 1 ?></td>
                          <td><span><?php echo $success_orders['orders_code'] ?></span></td>
                          <td><span><?php echo $success_orders['orders_total'] ?></span></td>
                          <td><span><?php echo $success_orders['orders_deposit'] ?></span></td>
                          <td><span><?php echo $success_orders['orders_payment_method'] ?></span></td>
                          <td>
                            <a href="list_rooms.php?action=delete&delete_rooms_id=<?= $rooms['id'] ?>">
                              <button class=" btn btn-sm btn-danger btn-icon">
                                Hủy phòng
                              </button>
                            </a>
                          </td>
                        </tr>
                        <?php endforeach;
                          }else {
                            echo "Không có dữ liệu danh mục.";
                        } ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="tab-pane fade" id="ex1-tabs-4" role="tabpanel" aria-labelledby="ex1-tab-4">
                    <table class=" table border-top">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Mã đơn hàng</th>
                          <th>Tổng tiền</th>
                          <th>Tiền cọc</th>
                          <th>Phương thức cọc</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                  if (isset($list_reject_orders) && is_array($list_reject_orders)) {
                    foreach ($list_reject_orders as $index => $reject_orders): 
                              ?>
                        <tr>
                          <td style="width:10px"><?php echo $index + 1 ?></td>
                          <td><span><?php echo $reject_orders['orders_code'] ?></span></td>
                          <td><span><?php echo $reject_orders['orders_total'] ?></span></td>
                          <td><span><?php echo $reject_orders['orders_deposit'] ?></span></td>
                          <td><span><?php echo $reject_orders['orders_payment_method'] ?></span></td>
                        </tr>
                        <?php endforeach;
                          }else {
                            echo "Không có dữ liệu danh mục.";
                        } ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="tab-pane fade" id="ex1-tabs-0" role="tabpanel" aria-labelledby="ex1-tab-0">
                    <table class=" table border-top">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Mã đơn hàng</th>
                          <th>Tổng tiền</th>
                          <th>Tiền cọc</th>
                          <th>Phương thức cọc</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                  if (isset($list_cancel_orders) && is_array($list_cancel_orders)) {
                    foreach ($list_cancel_orders as $index => $cancel_orders): 
                              ?>
                        <tr>
                          <td style="width:10px"><?php echo $index + 1 ?></td>
                          <td><span><?php echo $cancel_orders['orders_code'] ?></span></td>
                          <td><span><?php echo $cancel_orders['orders_total'] ?></span></td>
                          <td><span><?php echo $cancel_orders['orders_deposit'] ?></span></td>
                          <td><span><?php echo $cancel_orders['orders_payment_method'] ?></span></td>
                        </tr>
                        <?php endforeach;
                          }else {
                            echo "Không có dữ liệu danh mục.";
                        } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- Tabs content -->
              </div>

            </div>
          </div>
        </div>
      </section>
      <?php include "./layouts/footer.php" ?>
    </div>
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
    <script src="js/jquery.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.fancybox.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bxslider.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/appear.js"></script>
    <script src="js/owl.js"></script>
    <script src="js/script.js"></script>
    <script>
    $(document).ready(function() {
      $(".accordion-box .accordion").on("click", function() {
        var newAccordion = $(this);
        var dataName = newAccordion.data("name");
        $("#orders_payment_method").val(dataName);
      });
    });
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.umd.min.js">
    </script>
  </body>

</html>