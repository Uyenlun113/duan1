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
        include "../../controllers/bill.php";
        include "../layout/navbar.php" ; 
        include "../layout/sidebar.php";
      ?>
       <div class="content-wrapper">
         <section class="content-header">
           <div class="container-fluid">
             <div class="row mb-2">
               <div class="col-sm-6">
                 <h1>Thêm mới hóa đơn</h1>
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
                     <h3 class="card-title">Thêm mới hóa đơn</h3>
                   </div>
                   <!-- /.card-header -->
                   <!-- form start -->
                   <form id="quickForm" method="POST" action="create_bill.php">
                     <div class="card-body">
                       <div class="form-group">
                         <label for="ma_hoa_don">Mã hóa đơn</label>
                         <input type="text" name="id_booking" class="form-control" id="ma_hoa_don"
                           placeholder="Enter id_booking">
                       </div>
                       <div class="form-group">
                         <label for="gia">giá</label>
                         <input type="text" name="total_price" class="form-control" id="gia"
                           placeholder="Enter total_price">
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
                       <button type="submit" name="add_bill" class="btn btn-success">Thêm mới hóa đơn</button>
                       <a href="bill.php" class="btn btn-secondary ml-2">Quay lại</a>
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