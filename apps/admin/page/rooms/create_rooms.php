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
      <div class="content-wrapper">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Thêm Phòng</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Project Add</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <!-- left column -->
              <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-success">
                  <div class="card-header">
                    <h3 class="card-title">Quản lý phòng</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="quickForm" method="POST" action="create_rooms.php">
                    <div class="form-group">
                      <label for="ten_dich_vu">Tên phòng</label>
                      <input type="text" name="name" class="form-control" id="ten_phong" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                      <label for="anh">Ảnh</label>
                      <input type="file" name="img" class="form-control" id="anh" placeholder="Enter img">
                    </div>
                    <div class="form-group">
                      <label for="id">Loại Phòng</label>
                      <select name="id" class="form-control" id="id" placeholder="Select price">
                        <option value="">-- Chọn loại phòng --</option>
                        <?php foreach($list_categories as $lct) :?>
                        <option value="<?= $lct['id'] ?>"><?= $lct['name']?></option>
                        <?php endforeach;?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="gia">Giá</label>
                      <input type="text" name="price" class="form-control" id="gia" placeholder="Enter price">
                    </div>
                    <div class="form-group">
                      <label for="number_adult">Số người lớn</label>
                      <input type="number" name="number_adult" min="1" max="5" id="number_adult">
                      <label for="number_adult">số trẻ em</label>
                      <input type="number" name="number_children" min="1" max="5" id="number_children">
                    </div>
                    <div class="form-group">

                    </div>
                    <div class="form-group">
                      <label for="number_adult">Dịch vụ </label>
                      <input type="text" name="id_service" class="form-control" id="id_service"
                        placeholder="Enter service">
                    </div>

                    <div class="form-group">
                      <label for="mo_ta_chi_tiet">Mô tả chi tiết</label>
                      <textarea name="description" id="summernote"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="trang_thai">Trạng thái</label>
                      <select name="status" class="form-control" id="trang_thai" placeholder="Select status">
                        <option value="">-- Trạng thái --</option>
                        <option value="1">Hoạt Động</option>
                        <option value="0">Tạm Ẩn</option>
                      </select>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="" class="btn btn-success">Thêm Phòng</button>
                  <a href="listrooms.php" class="btn btn-secondary ml-2">Quay lại</a>
                </div>
                </form>

              </div>
              <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
          </div>
          <!-- /.row -->
      </div><!-- /.container-fluid -->
      </section>
    </div>
    <?php 
        @include "../layout/footer.php";
      ?>
    <script src="../../plugins/summernote/summernote-bs4.min.js"></script>
    <!-- CodeMirror -->
    <script src="../../plugins/codemirror/codemirror.js"></script>
    <script src="../../plugins/codemirror/mode/css/css.js"></script>
    <script src="../../plugins/codemirror/mode/xml/xml.js"></script>
    <script src="../../plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    </div>
  </body>

</html>