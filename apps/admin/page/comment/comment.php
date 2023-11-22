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
        include "../../controllers/comment.php";
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
                <h1>Quản lý bình luận</h1>
              </div>

            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Quản lý bình luận</h3>
              <div class="card-tools">
              </div>
            </div>
            <div class="card-body p-0">
              <table class="table table-striped projects">
                <thead>
                  <tr style="text-align:center;">
                    <th style="width: 5%">
                      #
                    </th>
                    <th style="width: 15%">
                      Mã khách hàng
                    </th>
                    <th style="width: 20%;text-align:start;">
                      Mã phòng
                    </th>
                   
                    <th style="width: 20%">
                      Nội dung
                    </th>
                    <th style="width: 10%" class="text-center">
                        vote
                    </th>
                    <th style="width: 10%">
                      Ngày tạo
                    </th>
                    <th style="width: 10%">
                    Thao tác
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (isset($list_comment) && is_array($list_comment)) {
                    foreach ($list_comment as $index => $comment): ?>
                  <tr style="text-align:center;">
                    <td>
                      <?php echo $index + 1 ?>
                    </td>
                    <td>
                      <?php echo $comment['id_user'] ?>
                    </td>
                    <td style="text-align:start;">
                        <?php echo $comment['id_room'] ?>
                      <br />
                     
                    </td>
                    <td class="project_progress">
                      <span><?php echo $comment['content'] ?></span>
                    </td>
                    <td class="project_progress">
                      <span><?php echo $comment['vote'] ?></span>
                    </td>
                    <td style="text-align:start;">
                        <?php echo $comment['create_date'] ?>
                      </td>
                    <td class="project-actions text-right">
                      <a href="comment.php?action=delete&delete_comment_id=<?= $comment['id'] ?>"
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