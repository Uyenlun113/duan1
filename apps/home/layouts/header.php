<header class="main-header header-style-one">
  <div class="auto-container">
    <div class="main-box">
      <div class="logo-box">
        <div class="logo"><a href="index-2.html"><img src="images/logo-v4-black.png" alt="" title="Tronis"></a>
        </div>
      </div>
      <div class="nav-outer">
        <nav class="nav main-menu">
          <ul class="navigation">
            <li><a href="index.php">Trang chủ</a>
            </li>
            <li><a href="category-list.php">Loại phòng</a></li>
            <li><a href="#">Blog</a>
            </li>
            <li><a href="#">Về chúng tôi</a></li>
            <li><a href="contact.php">Liên hệ</a></li>
          </ul>
        </nav>
      </div>
      <div class="outer-box" style="color:#fff;">
        <?php
            if (isset($_SESSION['login_home'])) {
              $userData = $_SESSION['login_home'];
              echo '<a href="#" style="color:#fff;">Chào ' . $userData['users_name'] . '</a>';
              echo '&nbsp;&nbsp;|&nbsp;&nbsp;';
              echo '<a href="history.php"style="color:#fff;"><i class="fa-solid fa-clock-rotate-left"></i></a>';
              echo '&nbsp;&nbsp;|&nbsp;&nbsp;';
              echo '<a href="cart.php"style="color:#fff;"><i class="fa-regular fa-cart-shopping"></i></a>';
              echo '&nbsp;&nbsp;|&nbsp;&nbsp;';
              echo '<a href="logout.php"style="color:#fff;">Đăng xuất</a>';
            } else {
              echo '<a href="login.php"style="color:#fff;">ĐĂNG NHẬP</a>';
              echo '&nbsp;|&nbsp;';
              echo '<a href="register.php"style="color:#fff;">ĐĂNG KÍ</a>';
            }
            ?>
      </div>
    </div>
    <!-- Mobile Menu  -->
    <div class="mobile-menu">
      <div class="menu-backdrop"></div>
      <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
      <nav class="menu-box">
        <div class="upper-box">
          <div class="nav-logo"><a href="index.html"><img src="images/logo-2.png" alt="" title=""></a></div>
          <div class="close-btn"><i class="icon fa fa-times"></i></div>
        </div>
        <ul class="navigation clearfix">
          <!--Keep This Empty / Menu will come through Javascript-->
        </ul>
        <ul class="contact-list-one">
          <li>
            <!-- Contact Info Box -->
            <div class="contact-info-box">
              <i class="icon lnr-icon-phone-handset"></i>
              <span class="title">Call Now</span>
              <a href="tel:+92880098670">+92 (8800) - 98670</a>
            </div>
          </li>
          <li>
            <!-- Contact Info Box -->
            <div class="contact-info-box">
              <span class="icon lnr-icon-envelope1"></span>
              <span class="title">Send Email</span>
              <a href="mailto:help@company.com">help@company.com</a>
            </div>
          </li>
          <li>
            <!-- Contact Info Box -->
            <div class="contact-info-box">
              <span class="icon lnr-icon-clock"></span>
              <span class="title">Send Email</span>
              Mon - Sat 8:00 - 6:30, Sunday - CLOSED
            </div>
          </li>
        </ul>
        <ul class="social-links">
          <li><a href="#"><i class="fab fa-twitter"></i></a></li>
          <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
          <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
          <li><a href="#"><i class="fab fa-instagram"></i></a></li>
        </ul>
      </nav>
    </div>

    <div class="search-popup">
      <span class="search-back-drop"></span>
      <button class="close-search"><span class="fa fa-times"></span></button>
      <div class="search-inner">
        <form method="post" action="https://kodesolution.com/html/2023/hoexr-html/index.html">
          <div class="form-group">
            <input type="search" name="search-field" value="" placeholder="Search..." required="">
            <button type="submit"><i class="fa fa-search"></i></button>
          </div>
        </form>
      </div>
    </div>

    <div class="sticky-header">
      <div class="auto-container">
        <div class="inner-container">
          <div class="logo">
            <a href="index.html" title=""><img src="images/logo-v4-black.png" alt="" title=""></a>
          </div>
          <div class="nav-outer">
            <nav class="main-menu">
              <div class="navbar-collapse show collapse clearfix">
                <ul class="navigation clearfix">
                </ul>
              </div>
            </nav>
            <div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>