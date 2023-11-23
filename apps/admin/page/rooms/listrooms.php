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
        include "../../controllers/rooms.php";
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
                <h1>Quản lý phòng</h1>
              </div>

            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Quản lý loại phòng</h3>
              <div class="card-tools">
                <a class="btn btn-success btn-sm" href="create_rooms.php">
                  <i class="fas fa-plus">
                  </i>&nbsp;
                  Thêm phòng
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
                    <th style="width: 11%">
                      Loại phòng
                    </th>
                    <th style="width: 11%;text-align:start;">
                      Tên phòng
                    </th>
                    <th style="width: 11%">
                      Ảnh phòng
                    </th>
                    <th style="width: 11%">
                      Giá phòng
                    </th>
                    <th style="width: 11%;">
                      Số người lớn
                    </th>
                    <th style="width: 10%">
                      Số trẻ em
                    </th>
                    <th style="width: 11%">
                      Dịch vụ
                    </th>
                    <th style="width: 11%">
                      Trạng thái
                    </th>
                    <th style="width: 11%">
                      Thao tác
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (isset($list_rooms) && is_array($list_rooms)) {
                    foreach ($list_rooms as $index => $rooms): 
?>
                  <tr style="text-align:center;">
                    <td>
                      <?php echo $index + 1 ?>
                    </td>
                    <td>
                      <span><?php echo $rooms['name_category'] ?></span>
                    </td>
                    <td style="text-align:start;">
                      <a>
                        <?php echo $rooms['name'] ?>
                      </a>
                      <br />
                      <small>
                        Ngày tạo <?php echo $rooms['create_date'] ?>
                      </small>
                    </td>
                    <td>
                      <img src="../../../upload/<?= $rooms['img'] ?>" height="80" width="100" class="rounded" alt="">

                    </td>

                    <td>
                      <span><?php echo number_format($rooms['price'], 2, '.', ',') ?></span>
                    </td>
                    <td>
                      <span><?php echo $rooms['number_adult'] ?></span>
                    </td>
                    <td>
                      <span><?php echo $rooms['number_children'] ?></span>
                    </td>
                    <td>
                      <?php echo $rooms['name_service'] ?>
                    </td>

                    <td class="project-state">
                      <span>
                        <?php if ($rooms['status'] == 1): ?>
                        <span class="badge badge-success">Còn phòng</span>
                        <?php else: ?>
                        <span class="badge badge-danger">Hết phòng</span>
                        <?php endif; ?>
                      </span>
                    </td>
                    <td class="project-actions text-right">
                      <a class="btn btn-info btn-sm"
                        href="update_rooms.php?action=update&update_rooms=<?= $rooms['id'] ?>">
                        <i class="fas fa-pencil-alt">
                        </i>&nbsp;
                        Edit
                      </a>
                      <a href="listrooms.php?action=delete&delete_rooms_id=<?= $rooms['id'] ?>"
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