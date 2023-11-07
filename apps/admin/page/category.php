<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Du an 1 | Nhom 3</title>
    <?php @include "library.php" ?>
  </head>

  <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
      <?php 
        @include_once  "../controllers/category.php";
        @include "layout/navbar.php";
        @include "layout/sidebar.php";
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
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Projects</li>
                </ol>
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
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
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
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (isset($list_categories) && is_array($list_categories)) {
                    foreach ($list_categories as $categories): ?>
                  <tr style="text-align:center;">
                    <td>
                      #
                    </td>
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
                        <span class="badge badge-success">Hoạt động</span>
                        <?php else: ?>
                        <span class="badge badge-danger">Tạm ẩn</span>
                        <?php endif; ?>
                      </span>
                    </td>
                    <td class="project-actions text-right">
                      <a class="btn btn-primary btn-sm" href="#">
                        <i class="fas fa-eye">
                        </i>&nbsp;
                        View
                      </a>
                      <a class="btn btn-info btn-sm" href="#">
                        <i class="fas fa-pencil-alt">
                        </i>&nbsp;
                        Edit
                      </a>
                      <a class="btn btn-danger btn-sm" href="#">
                        <i class="fas fa-trash">
                        </i>&nbsp;
                        Delete
                      </a>
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
        @include "layout/footer.php";
      ?>
    </div>
  </body>

</html>