<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Du an 1 | Nhom 3</title>
    <?php include "../library.php" ?>
    <style>
    p {
      margin: 0px;
    }
    </style>
  </head>

  <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
      <?php 
        include "../../controllers/room_service.php";
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
                <h1>Dịch Vụ</h1>
              </div>

            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Dịch Vụ Phòng</h3>
              <div class="card-tools">
                <a class="btn btn-success btn-sm" href="create_service.php">
                  <i class="fas fa-plus">
                  </i>&nbsp;
                  Thêm dịch vụ
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
                    <th style="width: 20%">
                      Tên
                    </th>
                    <th style="width: 20%">
                      Mô tả
                    </th>
                    <th style="width: 10%">
                      Giá
                    </th>

                    <th style="width: 20%" class="text-center">
                      Trạng thái
                    </th>
                    <th style="width: 20%">
                      Thao tác
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (isset($list_service) && is_array($list_service)) {
                    foreach ($list_service as $index => $service): ?>
                  <tr style="text-align:center;">
                    <td>
                      <?php echo $index + 1 ?>
                    </td>
                    <td>
                      <?php echo $service['name'] ?>
                    </td>
                    <td>
                      <?php echo $service['description'] ?>
                    </td>
                    <td>
                      <?php echo $service['price'] ?>
                    </td>
                    <td class="project-state">
                      <span>
                        <?php if ($service['status'] == 1): ?>
                        <span class="badge badge-success">Hoạt động</span>
                        <?php else: ?>
                        <span class="badge badge-danger">Tạm ẩn</span>
                        <?php endif; ?>
                      </span>
                    </td>
                    <td class="project-actions text-right">
                      <a class="btn btn-info btn-sm"
                        href="update_service.php?action=update&update_service=<?= $service['id'] ?>">
                        <i class="fas fa-pencil-alt">
                        </i>&nbsp;
                        Edit
                      </a>
                      <a href="listservice.php?action=delete&delete_service_id=<?= $service['id'] ?>"
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