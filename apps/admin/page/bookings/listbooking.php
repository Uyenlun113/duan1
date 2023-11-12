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
                    <th style="width: 15%;text-align:start;">
                      Tên phòng
                    </th>
                    <th style="width: 10%">
                      Check-in
                    </th>
                    <th style="width: 10%">
                      Check-out
                    </th>
                    <th style="width: 10%" class="text-center">
                      Tổng tiền
                    </th>
                    <th style="width: 15%" class="text-center">
                      Phương thức thanh toán
                    </th>
                    <th style="width: 10%" class="text-center">
                      Trạng thái
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
                    </td>
                    <td style="text-align:start;">
                      <a>
                        <?php echo $booking['id_room'] ?>
                      </a>
                      <br />
                      <small>
                        Ngày đặt <?php echo $booking['create_date'] ?>
                      </small>
                    </td>
                    <td>
                      <span><?php echo $booking['checkin'] ?></span>
                    </td>
                    <td class="project_progress">
                      <span><?php echo $booking['check_out'] ?></span>
                    </td>
                    <td class="project_progress">
                      <span><?php echo $booking['total_price'] ?></span>
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
                    <td class="project-state">
                      <span>
                        <?php if ($booking['status'] == 1): ?>
                        <span class="badge badge-success">Đã thanh toán</span>
                        <?php else: ?>
                        <span class="badge badge-danger">Chưa thanh toán</span>
                        <?php endif; ?>
                      </span>
                    </td>
                    <td class="project-actions text-right">
                      <a class="btn btn-info btn-sm"
                        href="update_category.php?action=update&update_category=<?= $categories['id'] ?>">
                        <i class="fas fa-pencil-alt">
                        </i>&nbsp;
                        Edit
                      </a>
                      <a href="category.php?action=delete&delete_category_id=<?= $categories['id'] ?>"
                        class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>&nbsp;Delete</a>
                    </td>
                  </tr>
                  <?php endforeach;
                  }else {
    echo "Không có dữ liệu danh mục.";
} ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

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