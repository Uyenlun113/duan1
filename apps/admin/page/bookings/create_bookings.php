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
        include "../layout/navbar.php";
        include "../layout/sidebar.php";
        ?>
      <div class="content-wrapper">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Đặt phòng</h1>
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
                    <h3 class="card-title">Đặt phòng</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="quickForm" method="POST" action="create_bookings.php">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="customer_name">Tên khách hàng</label>
                        <input type="text" name="name_account" class="form-control" id="name_account"
                          placeholder="Nhập tên khách hàng">
                      </div>
                      <div class="form-group">
                        <label for="cccd">Số CCCD</label>
                        <input type="text" name="CCCD" class="form-control" id="cccd" placeholder="Nhập số CCCD">
                      </div>
                      <div class="form-group">
                        <label for="tel">Số điện thoại </label>
                        <input type="text" name="tel" class="form-control" id="tel" placeholder="Nhập số điện thoại">
                      </div>
                      <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="Nhập địa chỉ">
                      </div>
                      <div class="form-group row">
                        <label for="selectField" class="col-sm-2 col-form-label">Thông tin thuê
                          phòng</label>
                        <div class="col-sm-8 d-flex">
                          <button type="button" class="btn btn-primary ml-2" onclick="addFields()">Thêm phòng
                            mới</button>
                        </div>
                      </div>
                      <div id="additionalFields" class="additional-fields"></div>
                      <div class="form-group">
                        <label for="payment">Phương thức thanh toán</label>
                        <select name="payment" class="form-control" id="payment" placeholder="Select status">
                          <option value="">-- Phương thức thanh toán --</option>
                          <option value="1">Chuyển khoản</option>
                          <option value="0">Tiền mặt</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="status">Trạng thái</label>
                        <select name="status" class="form-control" id="status" placeholder="Select status">
                          <option value="">-- Trạng thái --</option>
                          <option value="1">Đã đặt phòng</option>
                          <option value="0">Chờ xác nhận</option>
                        </select>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" name="add_booking" class="btn btn-success">Đặt
                        phòng</button>
                      <a href="listbooking.php" class="btn btn-secondary ml-2">Quay lại</a>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-md-6">
              </div>
            </div>
          </div>
        </section>
      </div>
      <?php
        @include "../layout/footer.php";
        ?>
      <script src="../../plugins/summernote/summernote-bs4.min.js"></script>
      <script src="../../plugins/codemirror/codemirror.js"></script>
      <script src="../../plugins/codemirror/mode/css/css.js"></script>
      <script src="../../plugins/codemirror/mode/xml/xml.js"></script>
      <script src="../../plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
      <script src="../../dist/js/demo.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script>
      $currentRoomIndex = -1;

      function addFields() {
        $currentRoomIndex++;
        let fieldHtml = `
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Chọn phòng:</label>
          <div class="col-sm-4">
            <select class="form-control" name="room_id[]">
              <?php
              if (isset($list_rooms) && is_array($list_rooms)) {
                foreach ($list_rooms as $index => $rooms): ?>
                  <option value="<?php echo $rooms['id'] ?>"><?php echo $rooms['name'] ?></option>
                <?php endforeach;
              } else {
                echo "Không có dữ liệu phòng nào.";
              } ?>
            </select>
          </div>
          <div class="col-sm-3">
            <label>Check-in:</label>
             <input type="datetime-local" class="form-control" name="checkin[]" id="checkin" required min="<?php echo date('Y-m-d') . 'T00:00'; ?>">

          </div>
          <div class="col-sm-3">
            <label>Check-out:</label>
               <input type="datetime-local" class="form-control" name="checkout[]" id="checkout" required min="<?php echo date('Y-m-d') . 'T00:00'; ?>">
          </div>
<span style="color:red;font-size:12px;"><?php echo isset($overlapMessages[0]) ? $overlapMessages[0] : ''; ?></span>
          <button type="button" class="btn btn-danger remove-btn ml-2" onclick="removeField(this)">Xóa phòng</button>
        </div>
      `;

        $("#additionalFields").append(fieldHtml);

        // Hiển thị nút xóa khi có 2 phòng trở lên
        if ($("#additionalFields .form-group").length >= 2) {
          $("#additionalFields .form-group:first-child .remove-btn").show();
        }
      }

      function removeField(button) {
        $(button).closest('.form-group').remove();
        $currentRoomIndex--;

        // Ẩn nút xóa cho field đầu tiên nếu chỉ còn một field
        if ($("#additionalFields .form-group").length === 1) {
          $("#additionalFields .form-group:first-child .remove-btn").hide();
        }
      }
      </script>
    </div>
  </body>

</html>