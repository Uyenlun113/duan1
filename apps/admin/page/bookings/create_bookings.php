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
                         <label for="customer_name">Số CCCD</label>
                         <input type="text" name="cccd" class="form-control" id="cccd" placeholder="Nhập số CCCD">
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
                         <label for="selectField" class="col-sm-2 col-form-label">Thông tin thuê phòng</label>
                         <div class="col-sm-8 d-flex">
                           <button type="button" class="btn btn-primary ml-2" onclick="addFields()">Thêm phòng
                             mới</button>
                         </div>
                       </div>
                       <div id="additionalFields"></div>
                       <!-- <div class="d-flex">
                         <div class="form-group">
                           <label for="checkin">Check-in</label>
                           <input type="date" name="checkin" class="form-control" id="checkin" placeholder="">
                         </div>
                         <div class="form-group">
                           <label for="check_out">Check-out</label>
                           <input type="date" name="check_out" class="form-control" id="check_out" placeholder="">
                         </div>
                         <div class="form-group">
                           <button type="button" class=" btn btn-primary ml-4" onclick="addFields()">Thêm phòng</button>
                         </div>
                       </div> -->
                       <div id="additionalFields"></div>

                       <div class="form-group">
                         <label for="total_price">Tổng tiền</label>
                         <input type="text" name="total_price" class="form-control" id="total_price" placeholder="">
                       </div>
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
                           <option value="1">Đã thanh toán</option>
                           <option value="0">Chưa thanh toán</option>
                         </select>
                       </div>

                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                       <button type="submit" name="add_booking" class="btn btn-success">Đặt phòng</button>
                       <a href="listbooking.php" class="btn btn-secondary ml-2">Quay lại</a>
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
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
       <script>
       function addFields() {
         fieldHtml =
           '<div class="form-group row"><div class="form-group col-sm-8"><label for="selectField">Chọn phòng</label><div class="col-sm-12 d-flex"><select class="form-control" id="selectField"><option value="text">Text</option><option value="textarea">Textarea</option></select></div></div><button type="button" class="btn btn-danger remove-btn ml-2" onclick="removeField(this)">Xóa phòng</button></div>';
         $("#additionalFields").append(fieldHtml);
         if ($("#additionalFields .form-group").length >= 2) {
           $("#additionalFields .form-group:first-child .remove-btn").show();
         }
       }

       function removeField(button) {
         $(button).closest('.form-group').remove();

         // Ẩn nút xóa cho field đầu tiên nếu chỉ còn một field
         if ($("#additionalFields .form-group").length === 1) {
           $("#additionalFields .form-group:first-child .remove-btn").hide();
         }
       }
       $(document).ready(function() {
         // Handle form submission
         $("#dynamicForm").submit(function(e) {
           e.preventDefault();
           var formData = $(this).serialize();
           // You can send the formData using AJAX to a PHP file for further processing
           console.log(formData);
         });
       });
       </script>
     </div>
   </body>

 </html>