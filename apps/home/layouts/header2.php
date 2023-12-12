<header class="main-header header-style-two">
  <div class="auto-container">
    <div class="header-top">
      <div class="inner-box">
        <div class="top-left">

        </div>
        <div class="top-right">
          <ul class="social-icon-one">
            <?php
            if (isset($_SESSION['login_home'])) {
              $userData = $_SESSION['login_home'];
              echo '<span></span>';
              echo '<a href="#"><button>Chào ' . $userData['users_name'] . '</button></a>';
              echo '<button>&nbsp;&nbsp;|&nbsp;&nbsp;</button>';
              echo '<a href="history.php"><button>Lịch sử giao dịch</button></a>';
              echo '<button>&nbsp;&nbsp;|&nbsp;&nbsp;</button>';
              echo '<a href="logout.php"><button>Đăng xuất</button></a>';
            } else {
              echo '<a href="login.php"><button>ĐĂNG NHẬP</button></a>';
              echo '<button>&nbsp;|&nbsp;</button>';
              echo '<a href="register.php"><button>ĐĂNG KÍ</button></a>';
            }
            ?>
          </ul>
        </div>
      </div>
    </div>
    <!-- Main box -->
    <div class="main-box">
      <div class="logo-box">
        <div class="logo"><a href="index-2.html"><img src="images/logo-v5-black.png" alt="" title="Tronis"></a>
        </div>
      </div>
      <!--Nav Box-->
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
      <div class="outer-box">
        <button class="search-btn">
          <img src="images/icons/search.png" alt="Serch-Btn-Img">
        </button>
        <a href="cart.php">
          <div class="mobile-nav-toggler"><i class="icon fa-regular fa-cart-shopping"></i>
        </a>
      </div>
    </div>
  </div>
  <div class="search-popup">
    <span class="search-back-drop"></span>
    <button class="close-search"><span class="fa fa-times"></span></button>
    <div class="search-inner">
      <div class="form-group">
        <input type="search" name="search-field" id="search_category" onchange="searchCategory()"
          placeholder="Tìm kiếm..."
          value="<?php echo isset($_GET['search_category']) ? htmlspecialchars($_GET['search_category']) : ''; ?>">
      </div>
    </div>
  </div>
  <!-- End Header Search -->

  <!-- Sticky Header  -->
  <div class="sticky-header">
    <div class="auto-container">
      <div class="inner-container">
        <!--Logo-->
        <div class="logo">
          <a href="index.html" title=""><img src="images/logo-v5-black.png" alt="" title=""></a>
        </div>
        <!--Right Col-->
        <div class="nav-outer">
          <!-- Main Menu -->
          <nav class="main-menu">
            <div class="navbar-collapse show collapse clearfix">
              <ul class="navigation clearfix">
                <!--Keep This Empty / Menu will come through Javascript-->
              </ul>
            </div>
          </nav><!-- Main Menu End-->
          <!--Mobile Navigation Toggler-->
          <div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
        </div>
      </div>
    </div>
  </div><!-- End Sticky Menu -->
  </div>
</header>