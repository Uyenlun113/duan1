<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Du an 1 | Nhom 3</title>
    <?php 
        //include library
        @include "library.php";
      ?>
  </head>

  <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
      <?php 
        //include navbar
        @include "page/layout/navbar.php";
        //include sidebar
        @include "page/layout/sidebar.php";
        //include dashboard
        @include "page/dashboard.php";
        //include footer
        @include "page/layout/footer.php";
      ?>
    </div>
  </body>

</html>