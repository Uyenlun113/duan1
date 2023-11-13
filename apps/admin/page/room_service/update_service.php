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
        include "../../controllers/room_service.php";
        include "../layout/navbar.php" ; 
        include "../layout/sidebar.php";
      ?>
       <div class="content-wrapper">
         <section class="content-header">
           <div class="container-fluid">
             <div class="row mb-2">
               <div class="col-sm-6">
                 <h1>Cập nhật dịch vụ</h1>
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
                     <h3 class="card-title">Cập nhật dịch vụ</h3>
                   </div>
                   <!-- /.card-header -->
                   <!-- form start -->
                   <form id="quickForm" method="POST" action="update_service.php">
                     <div class="card-body">
                       <div class="form-group">
                       <input type="hidden" name="id" value="<?php echo $detailService['id']; ?>">
                        </div>
                       </div>
                       <div class="form-group">
                         <label for="ten_dich_vu">Tên Dịch vụ</label>
                         <input type="text" name="name" class="form-control" id="ten_dich_vu"
                           placeholder="Enter name" value="<?php echo $detailService['name'] ?>">
                       </div>
                       <div class="form-group">
                         <label for="mo_ta_chi_tiet">Mô tả chi tiết</label>
                         <textarea name="description"
                           id="summernote"><?php echo $detailService['description']; ?></textarea>
                       </div>
                       <div class="form-group">
                         <label for="gia">Giá</label>
                         <input type="text" name="price" class="form-control" id="gia"
                           placeholder="Enter price" value="<?php echo $detailService['price'] ?>">
                       </div>
                       <div class="form-group">
                         <label for="trang_thai">Trạng thái</label>
                         <select name="status" class="form-control" id="trang_thai" placeholder="Select status"
                           required>
                           <option value="" <?php echo ($detailService['status'] == '') ? 'selected' : ''; ?>>--
                             Trạng thái --</option>
                           <option value="1" <?php echo ($detailService['status'] == '1') ? 'selected' : ''; ?>>Hoạt
                             Động</option>
                           <option value="0" <?php echo ($detailService['status'] == '0') ? 'selected' : ''; ?>>Tạm
                             Ẩn</option>
                         </select>
                       </div>
                       
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                       <button type="submit" name="update_service" class="btn btn-success">Cập nhật dịch vụ</button>
                       <a href="listservice.php" class="btn btn-secondary ml-2">Quay lại</a>
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