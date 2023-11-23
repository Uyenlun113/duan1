<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="description" content="Sona Template">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sona | Template</title>
    <?php
      @include "../library.php";
    ?>

  </head>

  <body>
    <?php
      @include "../layout/header.php";
      @include "../../controllers/detail_rooms.php";

    ?>
    <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="breadcrumb-text">
              <h2>Our Rooms</h2>
              <div class="bt-option">
                <a href="./home.html">Home</a>
                <span>Rooms</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Breadcrumb Section End -->

    <!-- Room Details Section Begin -->
    <section class="room-details-section spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="room-details-item">
              <img src="../../../upload/<?= $detailrooms['img'] ?>" style="width:100%;height:450px" alt="">
              <div class="rd-text">
                <div class="rd-title">
                  <h3><?php echo($detailrooms["name"])?></h3>
                  <div class="rdt-right">
                    <div class="rating">
                      <i class="icon_star"></i>
                      <i class="icon_star"></i>
                      <i class="icon_star"></i>
                      <i class="icon_star"></i>
                      <i class="icon_star-half_alt"></i>
                    </div>
                    <a href="#">Booking Now</a>
                  </div>
                </div>
                <h2>$<?php echo  number_format(($detailrooms["price"]), 2, '.') ?><span>/một đêm</span></h2>
                <table>
                  <tbody>
                    <tr>
                      <td class="r-o">Size:</td>
                      <td>30 ft</td>
                    </tr>
                    <tr>
                      <td class="r-o">Capacity:</td>
                      <td>Max persion 5</td>
                    </tr>
                    <tr>
                      <td class="r-o">Bed:</td>
                      <td>King Beds</td>
                    </tr>
                    <tr>
                      <td class="r-o">Services:</td>
                      <td>Wifi, Television, Bathroom,...</td>
                    </tr>
                  </tbody>
                </table>
                <p class="f-para"><?php echo($detailrooms["description"])?>
                </p>
              </div>
            </div>
            <div class="rd-reviews">
              <h4>Reviews</h4>
              <div class="review-item">
                <div class="ri-pic">
                  <img src="img/room/avatar/avatar-1.jpg" alt="">
                </div>
                <div class="ri-text">
                  <span>27 Aug 2019</span>
                  <div class="rating">
                    <i class="icon_star"></i>
                    <i class="icon_star"></i>
                    <i class="icon_star"></i>
                    <i class="icon_star"></i>
                    <i class="icon_star-half_alt"></i>
                  </div>
                  <h5>Brandon Kelley</h5>
                  <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                    adipisci velit, sed quia non numquam eius modi tempora. incidunt ut labore et dolore
                    magnam.</p>
                </div>
              </div>
              <div class="review-item">
                <div class="ri-pic">
                  <img src="img/room/avatar/avatar-2.jpg" alt="">
                </div>
                <div class="ri-text">
                  <span>27 Aug 2019</span>
                  <div class="rating">
                    <i class="icon_star"></i>
                    <i class="icon_star"></i>
                    <i class="icon_star"></i>
                    <i class="icon_star"></i>
                    <i class="icon_star-half_alt"></i>
                  </div>
                  <h5>Brandon Kelley</h5>
                  <p>Neque porro qui squam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                    adipisci velit, sed quia non numquam eius modi tempora. incidunt ut labore et dolore
                    magnam.</p>
                </div>
              </div>
            </div>
            <div class="review-add">
              <h4>Add Review</h4>
              <form action="#" class="ra-form">
                <div class="row">
                  <div class="col-lg-6">
                    <input type="text" placeholder="Name*">
                  </div>
                  <div class="col-lg-6">
                    <input type="text" placeholder="Email*">
                  </div>
                  <div class="col-lg-12">
                    <div>
                      <h5>You Rating:</h5>
                      <div class="rating">
                        <i class="icon_star"></i>
                        <i class="icon_star"></i>
                        <i class="icon_star"></i>
                        <i class="icon_star"></i>
                        <i class="icon_star-half_alt"></i>
                      </div>
                    </div>
                    <textarea placeholder="Your Review"></textarea>
                    <button type="submit">Submit Now</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="room-booking">
              <h3>Your Reservation</h3>
              <form action="#">
                <div class="check-date">
                  <label for="date-in">Check In:</label>
                  <input type="text" class="date-input" id="date-in">
                  <i class="icon_calendar"></i>
                </div>
                <div class="check-date">
                  <label for="date-out">Check Out:</label>
                  <input type="text" class="date-input" id="date-out">
                  <i class="icon_calendar"></i>
                </div>
                <div class="select-option">
                  <label for="guest">Guests:</label>
                  <select id="guest">
                    <option value="">3 Adults</option>
                  </select>
                </div>
                <div class="select-option">
                  <label for="room">Room:</label>
                  <select id="room">
                    <option value="">1 Room</option>
                  </select>
                </div>
                <button type="submit">Check Availability</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Room Details Section End -->

    <?php 
      @include "../layout/footer.php"
    ?>

    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/jquery.magnific-popup.min.js"></script>
    <script src="../../assets/js/jquery-3.3.1.min.js"></script>
    <script src="../../assets/js/jquery.nice-select.min.js"></script>
    <script src="../../assets/js/jquery-ui.min.js"></script>
    <script src="../../assets/js/jquery.slicknav.js"></script>
    <script src="../../assets/js/owl.carousel.min.js"></script>
    <script src="../../assets/js/main.js"></script>
  </body>

</html>