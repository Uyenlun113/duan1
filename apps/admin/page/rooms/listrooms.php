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
<<<<<<< HEAD
        include "../../controllers/rooms.php";
=======
        include "../../controllers/category.php";
>>>>>>> 7d99d4e4f28c533c22e490ad8b1b961161078039
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
                <h1>Quản lý loại phòng</h1>
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
<<<<<<< HEAD
                <a class="btn btn-success btn-sm" href="create_rooms.php">
                  <i class="fas fa-plus">
                  </i>&nbsp;
                  Thêm phòng
=======
                <a class="btn btn-success btn-sm" href="create_category.php">
                  <i class="fas fa-plus">
                  </i>&nbsp;
                  Thêm loại phòng
>>>>>>> 7d99d4e4f28c533c22e490ad8b1b961161078039
                </a>
              </div>
            </div>
            <div class="card-body p-0">
              <table class="table table-striped projects">
                <thead>
                  <tr style="text-align:center;">
<<<<<<< HEAD
                  <th style="width: 3%">
                    #
                    </th>
                    <th style="width: 11%">
                    tên phong 
                    </th>
                    <th style="width: 11%">
                    Ảnh phòng 
                    </th>
                    <th style="width: 11%">
                    giá phòng 
                    </th>
                    <th style="width: 11%;text-align:start;">
                    số người lớn
                    </th>
                    <th style="width: 11%">
                      số trẻ em
                    </th>
                    <th style="width: 11%">
                    dịch vụ
                    </th>
                  
                    <th style="width: 11%">
                     Ngày cập nhật
                    </th>
                    <th style="width: 11%">
                      mô tả
                    </th>
                    <th style="width: 11%">
                     trang thái
                     </th>
=======
                    <th style="width: 5%">
                      #
                    </th>
                    <th style="width: 10%">
                      Mã phòng
                    </th>
                    <th style="width: 25%;text-align:start;">
                      Tên loại phòng
                    </th>
                    <th style="width: 10%">
                      Ngày cập nhật
                    </th>
                    <th style="width: 20%">
                      Mô tả chi tiết
                    </th>
                    <th style="width: 10%" class="text-center">
                      Trạng thái
                    </th>
                    <th style="width: 20%">
                    </th>
>>>>>>> 7d99d4e4f28c533c22e490ad8b1b961161078039
                  </tr>
                </thead>
                <tbody>
                  <?php
<<<<<<< HEAD
                  if (isset($list_rooms) && is_array($list_rooms)) {
                    foreach ($list_rooms as $index => $rooms): ?>
=======
                  if (isset($list_categories) && is_array($list_categories)) {
                    foreach ($list_categories as $index => $categories): ?>
>>>>>>> 7d99d4e4f28c533c22e490ad8b1b961161078039
                  <tr style="text-align:center;">
                    <td>
                      <?php echo $index + 1 ?>
                    </td>
<<<<<<< HEAD
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
                      <?php echo $rooms['img'] ?>
                    </td>
                    
                    <td>
                      <span><?php echo $rooms['price'] ?></span>
                    </td>
                    <td>
                      <span><?php echo $rooms['number_adult'] ?></span>
                    </td>
                    <td>
                      <span><?php echo $rooms['number_children'] ?></span>
                    </td>
                    <td>
                      <span><?php echo $rooms['id_service'] ?></span>
                    </td>
                    <td>
                      <span><?php echo $rooms['update_date'] ?></span>
                    </td>
                    <td >
                      <span><?php echo $rooms['description'] ?></span>
                    </td>
                    
                    
                    <td class="project-state">
                      <span>
                        <?php if ($rooms['status'] == 1): ?>
=======
                    <td>
                      <?php echo $categories['code'] ?>
                    </td>
                    <td style="text-align:start;">
                      <a>
                        <?php echo $categories['name'] ?>
                      </a>
                      <br />
                      <small>
                        Ngày tạo <?php echo $categories['create_date'] ?>
                      </small>
                    </td>
                    <td>
                      <span><?php echo $categories['update_date'] ?></span>
                    </td>
                    <td class="project_progress">
                      <span><?php echo $categories['description'] ?></span>
                    </td>
                    <td class="project-state">
                      <span>
                        <?php if ($categories['status'] == 1): ?>
>>>>>>> 7d99d4e4f28c533c22e490ad8b1b961161078039
                        <span class="badge badge-success">Hoạt động</span>
                        <?php else: ?>
                        <span class="badge badge-danger">Tạm ẩn</span>
                        <?php endif; ?>
                      </span>
                    </td>
                    <td class="project-actions text-right">
                      <a class="btn btn-info btn-sm"
<<<<<<< HEAD
                        href="update_rooms.php?action=update&update_rooms=<?= $rooms['id'] ?>">
=======
                        href="update_category.php?action=update&update_category=<?= $categories['id'] ?>">
>>>>>>> 7d99d4e4f28c533c22e490ad8b1b961161078039
                        <i class="fas fa-pencil-alt">
                        </i>&nbsp;
                        Edit
                      </a>
<<<<<<< HEAD
                      <a href="rooms.php?action=delete&delete_rooms_id=<?= $rooms['id'] ?>"
=======
                      <a href="category.php?action=delete&delete_category_id=<?= $categories['id'] ?>"
>>>>>>> 7d99d4e4f28c533c22e490ad8b1b961161078039
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