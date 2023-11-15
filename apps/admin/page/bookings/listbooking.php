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
        include "../layout/navbar.php" ; 
        include "../layout/sidebar.php";
      ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Quản lý đặt phòng</h1>
              </div>

            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Quản lý đặt phòng</h3>
              <div class="card-tools">
                <a class="btn btn-success btn-sm" href="create_bookings.php">
                  <i class="fas fa-plus">
                  </i>&nbsp;
                  Đặt phòng
                </a>
              </div>
            </div>
            <div class="card-body p-0">
              <table class="table table-striped projects">
                <thead>
                  <tr style="text-align:center;">
                    <th style="width: 5%">
                      #
                    </th>
                    <th style="width: 10%">
                      Tên khách hàng
                    </th>
                    <th style="width: 15%;">
                      Ngày đặt
                    </th>
                    <th style="width: 15%" class="text-center">
                      Phương thức thanh toán
                    </th>
                    <th style="width: 20%">
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (isset($list_booking) && is_array($list_booking)) {
                    foreach ($list_booking as $index => $booking): ?>
                  <tr style="text-align:center;">
                    <td>
                      <?php echo $index + 1 ?>
                    </td>
                    <td>
                      <?php echo isset($booking['name_account']) ? $booking['name_account'] : ''; ?>
                      <br />
                      <small>
                        SĐT : <?php echo $booking['tel'] ?>
                      </small>
                    </td>
                    <td>
                      <?php echo $booking['create_date'] ?>
                    </td>
                    <td class="project-state">
                      <span>
                        <?php if ($booking['payment'] == 1): ?>
                        <span class="badge badge-success">Tiền mặt</span>
                        <?php else: ?>
                        <span class="badge badge-success">Chuyển khoản</span>
                        <?php endif; ?>
                      </span>
                    </td>
                    <td class="project-actions text-right">
                      <a class="btn btn-info btn-sm" href="details_booking.php?detail_booking_id=<?= $booking['id'] ?>">
                        <i class="fas fa-info-circle"></i>&nbsp;Xem chi tiết đặt phòng
                      </a>

                      <!-- <a href="listbooking.php?action=cancel&cancel_booking_id=<?= $booking['id'] ?>"
                        class="btn btn-danger btn-sm mt-2 rounded-2"><i class="fas fa-trash"></i>&nbsp;Hủy đặt phòng</a> -->
                    </td>
                  </tr>
                  <?php endforeach;
                  }else {
    echo "Không có dữ liệu danh mục.";
} ?>
                </tbody>
              </table>
            </div>
          </div>


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