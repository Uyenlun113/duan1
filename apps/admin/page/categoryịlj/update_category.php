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
        include "../../controllers/category.php";
        include "../layout/navbar.php" ; 
        include "../layout/sidebar.php";
      ?>
       <div class="content-wrapper">
         <section class="content-header">
           <div class="container-fluid">
             <div class="row mb-2">
               <div class="col-sm-6">
                 <h1>Cập nhật loại phòng</h1>
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
                     <h3 class="card-title">Cập nhật loại phòng</h3>
                   </div>
                   <!-- /.card-header -->
                   <!-- form start -->
                   <form id="quickForm" method="POST" action="update_category.php">
                     <div class="card-body">
                       <div class="form-group">
                         <input type="text" name="id" hidden class="form-control" id="ma_loai_phong"
                           placeholder="Enter code" value="<?php echo $detailCategory['id'] ?>">
                       </div>
                       <div class="form-group">
                         <label for="ma_loai_phong">Mã loại phòng</label>
                         <input type="text" name="code" class="form-control" id="ma_loai_phong" placeholder="Enter code"
                           value="<?php echo $detailCategory['code'] ?>">
                       </div>
                       <div class="form-group">
                         <label for="ten_loai_phong">Tên loại phòng</label>
                         <input type="text" name="name" class="form-control" id="ten_loai_phong"
                           placeholder="Enter name" value="<?php echo $detailCategory['name'] ?>">
                       </div>
                       <div class="form-group">
                         <label for="trang_thai">Trạng thái</label>
                         <select name="status" class="form-control" id="trang_thai" placeholder="Select status"
                           required>
                           <option value="" <?php echo ($detailCategory['status'] == '') ? 'selected' : ''; ?>>--
                             Trạng thái --</option>
                           <option value="1" <?php echo ($detailCategory['status'] == '1') ? 'selected' : ''; ?>>Hoạt
                             Động</option>
                           <option value="0" <?php echo ($detailCategory['status'] == '0') ? 'selected' : ''; ?>>Tạm
                             Ẩn</option>
                         </select>
                       </div>
                       <div class="form-group">
                         <label for="mo_ta_chi_tiet">Mô tả chi tiết</label>
                         <textarea name="description"
                           id="summernote"><?php echo $detailCategory['description']; ?></textarea>

                       </div>
                     </div>
                     <!-- /.card-body -->
                     <div class="card-footer">
                       <button type="submit" name="update_category" class="btn btn-success">Cập nhật loại phòng</button>
                       <a href="category.php" class="btn btn-secondary ml-2">Quay lại</a>
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