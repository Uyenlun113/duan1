<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Hoexr | Hotel HTML Template Template</title>
    <?php include "./layouts/link.php" ?>
  </head>

  <body>
    <div class="page-wrapper">
      <div class="preloader"></div>
      <?php @include "./controllers/cart.php" ?>
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
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Số lượng</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                  if (isset($list_cart_items) && is_array($list_cart_items)) {
                    foreach ($list_cart_items as $index => $item_cart): ?>
                      <tr class="cart_item">

                        <td class="product-thumbnail"><a href="#"><img alt="product"
                              src="images/resource/products/1.jpg"></a></td>
                        <td class="product-name">
                          <a href="shop-product-details.html"><?php echo $item_cart['category_name'] ?></a>
                          <ul class="variation">
                            <li class="variation-size">Size: <span>Medium</span></li>
                          </ul>
                        </td>
                        <td class="product-price">
                          <span class="amount">
                            Check in: <?php echo $item_cart['cart_item_checkin'] ?>
                            <br />
                            Check out: <?php echo $item_cart['cart_item_checkin'] ?>
                          </span>
                        </td>

                        <td class="product-subtotal"><span class="amount">$36.00</span></td>

                        <td class="product-quantity">
                          <span class="amount">1</span>
                        </td>
                      </tr>
                      <?php endforeach;
                          } ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="col-md-3">
                <h4>Cart Totals</h4>
                <table class="table table-bordered cart-total">
                  <tbody>
                    <tr>
                      <td>Cart Subtotal</td>
                      <td>$180.00</td>
                    </tr>
                    <tr>
                      <td>Shipping and Handling</td>
                      <td>$70.00</td>
                    </tr>
                    <tr>
                      <td>Order Total</td>
                      <td>$250.00</td>
                    </tr>
                  </tbody>
                </table>
                <a class="theme-btn btn-style-one" href="checkout.php">
                  <span class="btn-title">Thanh toán</span>
                </a>
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