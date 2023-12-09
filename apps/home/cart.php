<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Hoexr | Hotel HTML Template Template</title>
    <?php include "./layouts/link.php" ?>
    <style>
    table.tbl-shopping-cart th,
    table.tbl-shopping-cart td,
    table.cart-total th,
    table.cart-total td {
      padding: 10px 20px;
    }
    </style>
  </head>

  <body>
    <div class="page-wrapper">
      <div class="preloader"></div>
      <?php @include "./controllers/cart-controller.php" ?>
      <?php @include "./layouts/header2.php" ?>
      <section class="page-title" style="background-image: url(images/background/page-title-bg.png);">
        <div class="auto-container">
          <div class="title-outer text-center">
            <h1 class="title">Giỏ hàng</h1>
            <ul class="page-breadcrumb">
              <li><a href="index.html">Trang chủ</a></li>
              <li>Giỏ hàng</li>
            </ul>
          </div>
        </div>
      </section>
      <section>
        <div class="container pb-100">
          <div class="section-content">
            <div class="row">
              <div class="col-md-9">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered tbl-shopping-cart">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Tên loại phòng</th>
                        <th>Checkin/Checkout</th>
                        <th>Giá phòng</th>
                        <th>Số lượng</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (isset($list_cart_items) && is_array($list_cart_items)) {
                        foreach ($list_cart_items as $index => $item_cart): ?>
                      <tr class="cart_item">
                        <td class="" style="width:100px;padding:10px;">
                          <img src="../upload/<?php echo ($item_cart["category_image"]) ?>" alt="" style="width:100%">
                        </td>
                        <td class="product-name">
                          <a href="shop-product-details.html">
                            <?php echo $item_cart['category_name'] ?>
                          </a>
                        </td>
                        <td class="product-price">
                          <span class="amount">
                            Check in:
                            <?php echo $item_cart['cart_item_checkin'] ?>
                            <br />
                            Check out:
                            <?php echo $item_cart['cart_item_checkin'] ?>
                          </span>
                        </td>
                        <td class="product-subtotal">
                          <span class="amount">
                            <?php echo (formatMoney($item_cart['cart_item_price'])) ?>
                          </span>
                        </td>
                        <td class="product-quantity">
                          <span class="amount">
                            <?php echo $item_cart['cart_item_quantity'] ?>
                          </span>
                        </td>
                      </tr>
                      <?php endforeach;
                      } ?>
                    </tbody>
                  </table>
                  <a href="index.php">
                    <span class="btn-title"><i>Tiếp tục đặt phòng &#8250; </i></span>
                  </a>
                </div>
              </div>
              <div class="col-md-3">
                <h4>Tổng thanh toán</h4>
                <table class="table table-bordered cart-total">
                  <tbody>
                    <?php
                    if (isset($list_cart_items) && is_array($list_cart_items)) {
                      foreach ($list_cart_items as $index => $item_cart): ?>
                    <tr>
                      <td>
                        <span>
                          <?php echo $item_cart['category_name'] ?>
                          &times;
                          <?php echo $item_cart['cart_item_quantity'] ?>
                        </span>
                      </td>
                      <td style="width:110px;padding:10px 10px">
                        <?php echo (formatMoney($item_cart['cart_item_quantity'] * $item_cart['cart_item_price'] )) ?>
                      </td>
                    </tr>
                    <?php endforeach;
                    } ?>
                    <tr>
                      <td>Tổng tiền</td>
                      <td style="width:110px;padding:10px 10px">
                        <?php echo (formatMoney($totalPrice)) ?>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <?php if ($totalPrice > 0): ?>
                <a class="theme-btn btn-style-one" style="width:100%" href="checkout.php">
                  <span class="btn-title">Thanh toán ngay</span>
                </a>
                <?php endif; ?>

              </div>
            </div>
          </div>
        </div>
      </section>
      <?php include "./layouts/footer.php" ?>
    </div>
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
    <script src="js/jquery.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.fancybox.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bxslider.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/appear.js"></script>
    <script src="js/owl.js"></script>
    <script src="js/script.js"></script>
  </body>

</html>