<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cập nhật phòng | Nhom 3</title>
    <?php include "../library.php" ?>
  </head>

  <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
      <?php 
        include "../../controllers/rooms.php";
        include "../layout/navbar.php";
        include "../layout/sidebar.php";
      ?>
      <div class="content-wrapper">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Cập nhật phòng</h1>
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
                    <h3 class="card-title">Cập nhật phòng</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="quickForm" method="POST" action="update_rooms.php" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $detailrooms['id']; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="id_category">Loại Phòng</label>
                      <select name="id_category" class="form-control" id="id_category" placeholder="Select category">
                        <option value="">-- Chọn loại phòng --</option>
                        <?php foreach($list_categories as $lct) :?>
                        <option value="<?= $lct['id'] ?>"
                          <?php echo ($lct['id'] == $detailrooms['id_category']) ? 'selected' : ''; ?>>
                          <?= $lct['name'] ?></option>
                        <?php endforeach;?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="ten_phong">Tên Phòng</label>
                      <input type="text" name="name" class="form-control" id="ten_phong" placeholder="Nhập tên phòng"
                        value="<?php echo $detailrooms['name'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="current_img">Ảnh hiện tại</label>
                      <img id="currentImage" src="../../../upload/<?= $detailrooms['img'] ?>" height="80" width="100"
                        class="rounded" alt="">
                    </div>
                    <div class="form-group">
                      <label for="anh_phong">Chọn ảnh mới</label>
                      <input type="file" name="img" id="anh_phong" value="<?php echo( $detailrooms['img']) ?>">
                    </div>
                    <div class="form-group">
                      <label for="gia">Giá</label>
                      <input type="text" name="price" class="form-control" id="gia" placeholder="Nhập giá"
                        value="<?php echo $detailrooms['price'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="number_adult">Số người lớn</label>
                      <input type="number" name="number_adult" min="1" max="5" id="number_adult"
                        placeholder="Nhập số người lớn" value="<?php echo $detailrooms['number_adult'] ?>">
                      <label for="number_children">Số trẻ em</label>
                      <input type="number" name="number_children" min="1" max="5" id="number_children"
                        placeholder="Nhập số trẻ em" value="<?php echo $detailrooms['number_children'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="summernote">Mô tả chi tiết</label>
                      <textarea name="description" id="summernote"><?php echo $detailrooms['description']; ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="trang_thai">Trạng thái</label>
                      <select name="status" class="form-control" id="trang_thai" required>
                        <option value="" <?php echo ($detailrooms['status'] == '') ? 'selected' : ''; ?>>--
                          Trạng thái --</option>
                        <option value="1" <?php echo ($detailrooms['status'] == '1') ? 'selected' : ''; ?>>Còn phòng
                        </option>
                        <option value="0" <?php echo ($detailrooms['status'] == '0') ? 'selected' : ''; ?>>Hết phòng
                        </option>
                      </select>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="update_rooms" class="btn btn-success">Cập nhật phòng</button>
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
    <script>
    function displaySelectedImage(input) {
      // Lấy đối tượng hình ảnh hiện tại
      var currentImage = document.getElementById('currentImage');

      // Kiểm tra xem người dùng đã chọn ảnh mới chưa
      if (input.files && input.files[0]) {
        // Đọc đường dẫn của ảnh mới
        var reader = new FileReader();
        reader.onload = function(e) {
          // Hiển thị ảnh mới
          currentImage.src = e.target.result;
        };
        reader.readAsDataURL(input.files[0]);
      }
    }
    </script>
    </div>
  </body>

</html>