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
        include "../../controllers/detail_booking.php";
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
                    <td><?php echo $bookingroom['room_name'] ?></td>
                    <td>$<?php echo number_format($bookingroom['room_price'], 2, '.', ',');  ?></td>
                    <td><?php echo date("H:i - d/m/Y ", strtotime($bookingroom['checkin'])); ?></td>
                    <td><?php echo date("H:i - d/m/Y ", strtotime($bookingroom['check_out'])); ?></td>

                    <td class="project-state">
                      <span>
                        <?php if ($bookingroom['status'] == 1): ?>
                        <span class="badge badge-success">Đã đặt phòng</span>
                        <?php else: ?>
                        <span class="badge badge-danger">Đã hủy</span>
                        <?php endif; ?>
                      </span>
                    </td>
                    <?php if ($bookingroom['status'] == 1): ?>
                    <td class="project-actions text-right">
                      <a class="btn btn-info btn-sm"
                        href="update_bookingrooms.php?detail_booking_id=<?= $booking['id'] ?>&action=update&update_booking_id=<?= $bookingroom['id'] ?>">
                        <i class="fas fa-pencil-alt"></i>&nbsp;Sửa đặt phòng
                      </a>
                      <a href="details_booking.php?detail_booking_id=<?= $booking['id'] ?>&action=cancel&cancel_booking_id=<?= $bookingroom['id'] ?>"
                        class="btn btn-danger btn-sm rounded-2">
                        <i class="fas fa-trash"></i>&nbsp;Hủy đặt phòng
                      </a>
                    </td>
                    <?php endif; ?>
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

          <div class="row">
            <div class="col-6">
              <p class="lead">Thanh toán</p>
              <div class="table-responsive">
                <table class="table">

                  <tr>
                    <th style="width:50%">Tổng tiền:</th>
                    <td>$<?php echo number_format($total_money, 2, '.', ','); ?></td>
                  </tr>
                  <tr>
                    <th>Tax (9.3%)</th>
                    <td>$10.00</td>
                  </tr>
                  <tr>
                    <th>Total:</th>
                    <td>$<?php echo   number_format($total_money+10, 2, '.', ','); ?></td>
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