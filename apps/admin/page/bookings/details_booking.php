<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Du an 1 | Nhom 3</title>
    <?php include "../library.php" ?>
  </head>

  <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
      <?php
        include "../../controllers/bookingrooms.php";
        // include "../layout/navbar.php";
        // include "../layout/sidebar.php";
        ?>
      <div class="content-wrapper ">
        <section class="content-header">
          <h1>Thông tin đặt phòng</h1>
          <div class="row content-header">
            <div class="col-sm-4 invoice-col">
              <address>
                <?php
                    if (isset($detailbooking) && is_array($detailbooking) && !empty($detailbooking)) {
                        $booking = $detailbooking; 
                ?>
                <strong> Tên khách hàng:
                  <?php echo isset($booking['name_account']) ? $booking['name_account'] : ''; ?>
                </strong><br>
                Địa chỉ : <?php echo $booking['address'] ?><br>
                Số điện thoại : <?php echo $booking['tel'] ?><br>
                Ngày đặt : <?php echo $booking['create_date'] ?><br>
                <?php
                  }?>
              </address>
            </div>
          </div>
          <!-- Table row -->
          <div class="row">
            <div class="col-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr></tr>
                  <th>#</th>
                  <th>Tên phòng</th>
                  <th>Giá phòng</th>
                  <th>Check-in</th>
                  <th>Check-out</th>
                  <th>Trạng thái</th>
                  <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  if (isset($list_detail_booking) && is_array($list_detail_booking)) {
                    foreach ($list_detail_booking as $index => $bookingroom):
                  ?>
                  <tr>
                    <td><?php echo $index + 1 ?></td>
                    <td>
                      <?php
                    if (isset($list_rooms) && is_array($list_rooms)) {
                      foreach ($list_rooms as $rooms): ?>
                      <?php echo $rooms['name'] ?>
                      <?php endforeach;
                    } else {
                      echo "Không có dữ liệu phòng nào.";
                    } ?>

                    </td>
                    <td><?php echo $bookingroom['total_price'] ?></td>
                    <td><?php echo $bookingroom['checkin'] ?></td>
                    <td><?php echo $bookingroom['check_out'] ?></td>
                    <td><?php echo $bookingroom['status'] == 1 ? 'Đã đặt phòng' : 'Đã hủy'; ?></td>
                    <td class="project-actions text-right">
                      <a class="btn btn-info btn-sm" href="#">
                        <i class="fas fa-pencil-alt"></i>&nbsp;Edit
                      </a>
                      <a href="#" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i>&nbsp;Delete
                      </a>
                    </td>
                  </tr>
                  <?php
        endforeach;
    } else {
        echo "<tr><td colspan='7'>Không có dữ liệu danh mục.</td></tr>";
    }
    ?>
                </tbody>

              </table>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-6 ">
              <p class="lead">Amount Due 2/22/2014</p>
              <div class="table-responsive">
                <table class="table">
                  <tr>
                    <th style="width:50%">Subtotal:</th>
                    <td>$250.30</td>
                  </tr>
                  <tr>
                    <th>Tax (9.3%)</th>
                    <td>$10.34</td>
                  </tr>
                  <tr>
                    <th>Shipping:</th>
                    <td>$5.80</td>
                  </tr>
                  <tr>
                    <th>Total:</th>
                    <td>$265.24</td>
                  </tr>
                </table>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <?php
        @include "../layout/footer.php";
        ?>
    </div>
  </body>

</html>