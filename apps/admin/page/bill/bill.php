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
        include "../../controllers/bill.php";
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
                <h1>Quản lý hóa đơn</h1>
              </div>

            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Quản lý hóa đơn</h3>
              <div class="card-tools">
                <a class="btn btn-success btn-sm" href="create_bill.php">
                  <i class="fas fa-plus">
                  </i>&nbsp;
                  Thêm hóa đơn
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
                      Mã hóa đơn
                    </th>
                    <th style="width: 25%;text-align:start;">
                      Giá
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
                  if (isset($list_bill) && is_array($list_bill)) {
                    foreach ($list_bill as $index => $bill): ?>
                  <tr style="text-align:center;">
                    <td>
                      <?php echo $index + 1 ?>
                    </td>
                    <td>
                      <?php echo $bill['id_booking'] ?>
                    </td>
                    <td style="text-align:start;">
                      <a>
                        <?php echo $bill['total_price'] ?>
                      </a>
                      <br />
                    </td>
                    <td class="project-state">
                      <span>
                        <?php if ($categories['status'] == 1): ?>
                        <span class="badge badge-success">Hoạt động</span>
                        <?php else: ?>
                        <span class="badge badge-danger">Tạm ẩn</span>
                        <?php endif; ?>
                      </span>
                    </td>
                    <td class="project-actions text-right">
                      <a class="btn btn-info btn-sm"
                        href="update_bill.php?action=update&update_bill=<?= $bill['id'] ?>">
                        <i class="fas fa-pencil-alt">
                        </i>&nbsp;
                        Edit
                      </a>
                      <a href="bill.php?action=delete&delete_bill_id=<?= $bill['id'] ?>"
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