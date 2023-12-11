<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Hoexr | Hotel HTML Template Template</title>
    <?php include "./layouts/link.php" ?>
    <style>
    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
      background-color: #aa8453;
      border-radius: 8px 8px 8px 8px;
      color: #fff;
      font-weight: 500;
    }

    .nav-tabs {
      border: none;
      margin-bottom: 30px !important;
    }

    .nav-item {
      margin-right: 20px;

    }

    .nav-item .nav-link {
      color: #aa8453;

    }

    .nav-item:hover {
      border: none;
      color: #aa8453;
    }

    table {
      border: 1px solid #dee2e6 !important;
    }
    </style>
  </head>

  <body>

    <div class="page-wrapper">
      <div class="preloader"></div>
      <?php @include "./controllers/history.php" ?>
      <?php include "./layouts/header2.php" ?>
      <section class="page-title" style="background-image: url(images/background/page-title-bg.png);">
        <div class="auto-container">
          <div class="title-outer text-center">
            <h1 class="title">Lịch sử giao dịch</h1>
            <ul class="page-breadcrumb">
              <li><a href="index.php">Trang chủ</a></li>
              <li>Lịch sử giao dịch</li>
            </ul>
          </div>
        </div>
      </section>
      <!-- end main-content -->

      <!--checkout Start-->
      <section>
        <div class="container pt-10 mt-60">
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

                    <div class="table-responsive">
                      <table class="table table-striped tbl-shopping-cart border-top border-right">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Mã đơn hàng</th>
                            <th>Tổng tiền</th>
                            <th>Tiền cọc</th>
                            <th>Phương thức cọc</th>
                            <th style="text-align:center;">Trạng thái</th>
                            <th style="text-align:center;">Hành động</th>

                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          if (isset($list_all_orders) && is_array($list_all_orders) && count($list_all_orders) > 0) {
                            foreach ($list_all_orders as $index => $all_orders):
                              ?>
                          <tr>
                            <td style="width:10px">
                              <?php echo $index + 1 ?>
                            </td>
                            <td><span>ĐH -
                                <?php echo $all_orders['orders_code'] ?>
                              </span></td>
                            <td><span>
                                <?php echo formatMoney($all_orders['orders_total']) ?>
                              </span></td>
                            <td><span>
                                <?php echo formatMoney($all_orders['orders_deposit']) ?>
                              </span></td>
                            <td><span>
                                <?php echo $all_orders['orders_payment_method'] ?>
                              </span></td>
                            <td style="text-align:center;"><span>
                                <?php if ($all_orders['orders_status'] == 1): ?>
                                <span>Chờ xử lý</span>
                                <?php elseif ($all_orders['orders_status'] == 2): ?>
                                <span>Thành công</span>
                                <?php elseif ($all_orders['orders_status'] == 3): ?>
                                <span>Đã từ chối</span>
                                <?php else: ?>
                                <span>Đã hủy</span>
                                <?php endif; ?>
                              </span></td>
                            <td style="text-align:center;">
                              <?php if ($all_orders['orders_status'] == 1): ?>
                              <a href="history.php?action=cancel&cancel_order_id=<?= $all_orders['id'] ?>">
                                <button class="btn btn-sm btn-danger btn-icon">
                                  Hủy phòng
                                </button>
                              </a>
                              <?php endif; ?>
                            </td>
                          </tr>
                          <?php endforeach;
                          } else {
                            ?>
                          <tr>
                            <td colspan="5" style="text-align:center;">
                              Không có dữ liệu hiển thị!
                            </td>
                          </tr>
                          <?php
                          } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                    <table class="table table-striped tbl-shopping-cart border-top">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Mã đơn hàng</th>
                          <th>Tổng tiền</th>
                          <th>Tiền cọc</th>
                          <th>Phương thức cọc</th>
                          <th style="text-align:center">Hành động</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        if (isset($list_waiting_orders) && is_array($list_waiting_orders) && count($list_waiting_orders) > 0) {
                          foreach ($list_waiting_orders as $index => $waiting_orders):
                            ?>
                        <tr>
                          <td style="width:10px">
                            <?php echo $index + 1 ?>
                          </td>
                          <td>
                            <span>
                              ĐH -
                              <?php echo $waiting_orders['orders_code'] ?>
                            </span>
                          </td>
                          <td><span>
                              <?php echo formatMoney($waiting_orders['orders_total']) ?>
                            </span></td>
                          <td><span>
                              <?php echo formatMoney($waiting_orders['orders_deposit']) ?>
                            </span></td>
                          <td><span>
                              <?php echo $waiting_orders['orders_payment_method'] ?>
                            </span></td>
                          <td style="text-align:center">
                            <a href="history.php?action=cancel&cancel_order_id=<?= $waiting_orders['id'] ?>">
                              <button class=" btn btn-sm btn-danger btn-icon">
                                Hủy phòng
                              </button>
                            </a>
                          </td>
                        </tr>
                        <?php endforeach;
                        } else {
                          ?>
                        <tr>
                          <td colspan="5" style="text-align:center;">
                            Không có dữ liệu hiển thị!
                          </td>
                        </tr>
                        <?php
                        } ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                    <table class="table table-striped tbl-shopping-cart border-top">
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
                        if (isset($list_success_orders) && is_array($list_success_orders) && count($list_success_orders) > 0) {
                          foreach ($list_success_orders as $index => $success_orders):
                            ?>
                        <tr>
                          <td style="width:10px">
                            <?php echo $index + 1 ?>
                          </td>
                          <td><span>
                              ĐH -
                              <?php echo $success_orders['orders_code'] ?>
                            </span></td>
                          <td><span>
                              <?php echo formatMoney($success_orders['orders_total']) ?>
                            </span></td>
                          <td><span>
                              <?php echo formatMoney($success_orders['orders_deposit']) ?>
                            </span></td>
                          <td><span>
                              <?php echo $success_orders['orders_payment_method'] ?>
                            </span></td>
                        </tr>
                        <?php
                          endforeach;
                        } else {
                          ?>
                        <tr>
                          <td colspan="5" style="text-align:center;">
                            Không có dữ liệu hiển thị!
                          </td>
                        </tr>
                        <?php
                        } ?>
                      </tbody>
                    </table>

                  </div>
                  <div class="tab-pane fade" id="ex1-tabs-4" role="tabpanel" aria-labelledby="ex1-tab-4">
                    <table class="table table-striped tbl-shopping-cart  border-top">
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
                        if (isset($list_reject_orders) && is_array($list_reject_orders) && count($list_reject_orders) > 0) {
                          foreach ($list_reject_orders as $index => $reject_orders):
                            ?>
                        <tr>
                          <td style="width:10px">
                            <?php echo $index + 1 ?>
                          </td>
                          <td><span>
                              ĐH -
                              <?php echo $reject_orders['orders_code'] ?>
                            </span></td>
                          <td><span>
                              <?php echo formatMoney($reject_orders['orders_total']) ?>
                            </span></td>
                          <td><span>
                              <?php echo formatMoney($reject_orders['orders_deposit']) ?>
                            </span></td>
                          <td><span>
                              <?php echo $reject_orders['orders_payment_method'] ?>
                            </span></td>
                        </tr>
                        <?php endforeach;
                        } else {
                          ?>
                        <tr>
                          <td colspan="5" style="text-align:center;">
                            Không có dữ liệu hiển thị!
                          </td>
                        </tr>
                        <?php
                        } ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="tab-pane fade" id="ex1-tabs-0" role="tabpanel" aria-labelledby="ex1-tab-0">
                    <table class="table table-striped tbl-shopping-cart border-top">
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
                        if (isset($list_cancel_orders) && is_array($list_cancel_orders) && count($list_cancel_orders) > 0) {
                          foreach ($list_cancel_orders as $index => $cancel_orders):
                            ?>
                        <tr>
                          <td style="width:10px">
                            <?php echo $index + 1 ?>
                          </td>
                          <td><span>
                              ĐH -
                              <?php echo $cancel_orders['orders_code'] ?>
                            </span></td>
                          <td><span>
                              <?php echo formatMoney($cancel_orders['orders_total']) ?>
                            </span></td>
                          <td><span>
                              <?php echo formatMoney($cancel_orders['orders_deposit']) ?>
                            </span></td>
                          <td><span>
                              <?php echo $cancel_orders['orders_payment_method'] ?>
                            </span></td>
                        </tr>
                        <?php
                          endforeach;
                        } else {
                          ?>
                        <tr>
                          <td colspan="5" style="text-align:center;">
                            Không có dữ liệu hiển thị!
                          </td>
                        </tr>
                        <?php
                        } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
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