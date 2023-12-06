<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title>Hoexr | Hotel HTML Template | Home Page 01</title>
    <?php @include "./layouts/link.php" ?>
  </head>

  <body>
    <div class="page-wrapper">
      <?php @include "./controllers/index.php" ?>
      <?php @include "./layouts/header.php" ?>
      <?php @include "./layouts/banner.php" ?>

      <!-- About Section -->
      <section class="about-section">
        <div class="auto-container">
          <div class="row">
            <!-- Content Column -->
            <div class="content-column col-xl-6 col-lg-6 order-lg-2 wow fadeInRight" data-wow-delay="600ms">
              <div class="inner-column">
                <div class="sec-title">
                  <span class="sub-title">SONA hottel</span>
                  <h2>Most Safe & Rated <br>Hotel in London.</h2>
                  <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do <br>tempor
                    incididunt ut labore et dolore magna aliqua. Quis ipsum <br>suspendisse ultrices gravida. Risus
                    commodo maecenas accumsan<br> lacus vel facilisis.</div>
                </div>
                <div class="outer-box">
                  <div class="info-block">
                    <div class="inner">
                      <div class="icon-box"><i class="flaticon-light"></i></div>
                      <h4 class="title">The Best <br>Lighting</h4>
                    </div>
                  </div>
                  <div class="info-block">
                    <div class="inner">
                      <div class="icon-box"><i class="flaticon-pool"></i></div>
                      <h4 class="title">The Best <br>Swiming</h4>
                    </div>
                  </div>
                </div>
                <div class="btn-box">
                  <a href="page-about.html" class="theme-btn btn-style-one"><span class="btn-title">Discover
                      More</span></a>
                  <div class="contact-info">
                    <div class="icon-box"><i class="flaticon-customer-service"></i></div>
                    <span>Booking Now</span>
                    <h4 class="title">956 220 6666</h4>
                  </div>
                </div>
              </div>
            </div>

            <!-- Image Column -->
            <div class="image-column col-xl-6 col-lg-6">
              <div class="inner-column wow fadeInLeft">
                <figure class="image-1 overlay-anim wow fadeInUp"><img src="images/resource/about1-1.jpg" alt="">
                </figure>
                <figure class="image-2 overlay-anim wow fadeInLeft"><img src="images/resource/about1-2.jpg" alt="">
                </figure>
                <div class="btn-box">
                  <a class="play-now-two" data-caption="">
                    <i class="icon fa fa-play" aria-hidden="true"></i>
                    <span class="ripple"></span>
                  </a>
                </div>
                <div class="exp-box bounce-y">
                  <figure class=" overlay-anim wow fadeInLeft"><img src="images/resource/exp-icon.png" alt=""></figure>
                  <h4 class="title">Luxury Room</h4>
                  <div class="text">Donec in quis the asd <br>pellentesque velit. Donec id <br>velit arcu posuere blane.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="rooms-section pb-100">
        <div class="auto-container">
          <div class="sec-title text-center wow fadeInUp">
            <span class="sub-title">Hoexr Luxury Rooms</span>
            <h3>Phòng nghỉ nổi bật</h3>
          </div>
          <div class="row">
            <?php
                  if (isset($list_rooms_popular) && is_array($list_rooms_popular)) {
                    foreach ($list_rooms_popular as $index => $room_popular): ?>
            <div class="room-block col-lg-6 col-md-6 col-sm-12">
              <div class="inner-box wow fadeIn">
                <div class="image-box">
                  <figure class="image-2 overlay-anim" style="height: 400px;"><img
                      src="../upload/<?php echo($room_popular["img"]) ?>" alt="">
                  </figure>
                </div>
                <div class="content-box">
                  <h6 class="title"><a href="room-details.html"><?php echo($room_popular["name"]) ?></a></h6>
                  <span class="price"><?php echo($room_popular["price"]) ?>$ / NIGHT</span>
                </div>
                <div class="box-caption">
                  <a href="room-details.php?action=detail&room_details=<?= $room_popular['id'] ?>" title=""
                    class="book-btn">book now</a>
                  <ul class="bx-links">
                    <li><a href="room-details.html" title=""><i class="fa fa-wifi"></i></a></li>
                    <li><a href="room-details.html" title=""><i class="fa fa-bed"></i></a></li>
                    <li><a href="room-details.html" title=""><i class="fa fa-bath"></i></a></li>
                    <li><a href="room-details.html" title=""><i class="fa fa-shower"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <?php endforeach;
                          } ?>
          </div>
        </div>
      </section>
      <section class="service-section">
        <div class="auto-container">
          <div class="sec-title text-center wow slideInUp">
            <span class="sub-title">Hoexr SERVICES</span>
            <h2>Hotel Facilities</h2>
          </div>
          <div class="row">
            <div class="service-block col-lg-4 col-md-6 col-sm-12">
              <div class="inner-box wow fadeIn" data-wow-delay="100ms">
                <div class="icon-box wow fadeInUp"><i class="flaticon-bed-2"></i></div>
                <div class="content-box">
                  <h4 class="title"><a href="page-service-details.html">Room Service</a></h4>
                  <div class="text">Orci varius natoque penatibus magnis ders disney parturient ridiculus</div>
                </div>
              </div>
            </div>
            <div class="service-block col-lg-4 col-md-6 col-sm-12">
              <div class="inner-box wow fadeIn" data-wow-delay="200ms">
                <div class="icon-box wow fadeInUp"><i class="flaticon-travel"></i></div>
                <div class="content-box">
                  <h4 class="title"><a href="page-service-details.html">Pick Up & Drop</a></h4>
                  <div class="text">Orci varius natoque penatibus magnis ders disney parturient ridiculus</div>
                </div>
              </div>
            </div>
            <div class="service-block col-lg-4 col-md-6 col-sm-12">
              <div class="inner-box wow fadeIn" data-wow-delay="300ms">
                <div class="icon-box wow fadeInUp"><i class="flaticon-wifi"></i></div>
                <div class="content-box">
                  <h4 class="title"><a href="page-service-details.html">Fibre Internet</a></h4>
                  <div class="text">Orci varius natoque penatibus magnis ders disney parturient ridiculus</div>
                </div>
              </div>
            </div>
            <div class="service-block col-lg-4 col-md-6 col-sm-12">
              <div class="inner-box wow fadeIn" data-wow-delay="400ms">
                <div class="icon-box wow fadeInUp"><i class="flaticon-breakfast"></i></div>
                <div class="content-box">
                  <h4 class="title"><a href="page-service-details.html">Breakfast</a></h4>
                  <div class="text">Orci varius natoque penatibus magnis ders disney parturient ridiculus</div>
                </div>
              </div>
            </div>
            <div class="service-block col-lg-4 col-md-6 col-sm-12">
              <div class="inner-box wow fadeIn" data-wow-delay="500ms">
                <div class="icon-box wow fadeInUp"><i class="flaticon-swimming-pool"></i></div>
                <div class="content-box">
                  <h4 class="title"><a href="page-service-details.html">Swimming Pool</a></h4>
                  <div class="text">Orci varius natoque penatibus magnis ders disney parturient ridiculus</div>
                </div>
              </div>
            </div>
            <div class="service-block col-lg-4 col-md-6 col-sm-12">
              <div class="inner-box wow fadeIn" data-wow-delay="600ms">
                <div class="icon-box wow fadeInUp"><i class="flaticon-car"></i></div>
                <div class="content-box">
                  <h4 class="title"><a href="page-service-details.html">Parking Space</a></h4>
                  <div class="text">Orci varius natoque penatibus magnis ders disney parturient ridiculus</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="video-section">
        <div class="bg bg-image" style="background-image: url(images/background/1.jpg);"></div>
        <div class="auto-container">
          <div class="row">
            <div class="content-column col-lg-9 col-md-12 col-sm-12">
              <div class="inner-column">
                <div class="sec-title-two light wow slideInUp">
                  <span class="sub-title">Promotional Video</span>
                  <h2> Book Hotal Rooms, <br>et Deals & Book Flights Online.</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="booking-section">
        <div class="auto-container">
          <div class="row">
            <div class="col-lg-6 booking-form-column wow fadeInUp">
              <div class="inner-column">
                <div class="sec-title">
                  <span class="sub-title">ROOMS & SUITES</span>
                  <h2>Hotel Booking </h2>
                </div>
                <form class="bk-form">
                  <div class="frm-field">
                    <input type="text" name="check-in" class="date-pick" placeholder="Check in" />
                    <img src="images/icons/mail.png" alt="" />
                  </div>
                  <div class="frm-field">
                    <input type="text" name="check-in" class="date-pick" placeholder="Check out" />
                    <img src="images/icons/mail.png" alt="" />
                  </div>
                  <div class="frm-field">
                    <select>
                      <option>Adult</option>
                      <option>Adult</option>
                      <option>Adult</option>
                      <option>Adult</option>
                    </select>
                    <i class="fa fa-angle-down"></i>
                  </div>
                  <div class="frm-field">
                    <select>
                      <option>Children</option>
                      <option>Children</option>
                      <option>Children</option>
                      <option>Children</option>
                    </select>
                    <i class="fa fa-angle-down"></i>
                  </div>
                  <div class="form-submit">
                    <button type="submit">Check Availability</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-lg-6 booking-content-column wow fadeInRight" data-wow-delay="200ms">
              <div class="inner-column">
                <div class="sec-title white">
                  <span class="sub-title">Hoexr HOTEL</span>
                  <h2>Check Availability </h2>
                </div>
                <p>Each of our guest rooms feature a private bath, wi-fi, cable television and include full breakfast.
                </p>
                <p>Mea nibh meis philosophia eu. Duis legimus efficiantur ea sea. Id placerat tacimates definitionem
                  sea, prima quidam vim no. Duo nobis persecuti cu.</p>
                <div class="contact-info">
                  <div class="icon-box"><i class="flaticon-customer-service"></i></div>
                  <span>Booking Now</span>
                  <h4 class="title">956 220 6666</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php 
      @include "./layouts/footer.php"
      ?>
    </div>
    <?php @include "./layouts/script.php" ?>
  </body>

</html>