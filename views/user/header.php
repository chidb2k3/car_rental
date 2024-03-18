
<header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3">
              <div class="site-logo">
                <a href="index.php"><strong>CarRental</strong></a>
              </div>
            </div>

            <div class="col-9  text-right">
              
              <span class="d-inline-block d-lg-none"><a href="#" class=" site-menu-toggle js-menu-toggle py-5 "><span class="icon-menu h3 text-black"></span></a></span>

              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li class="active"><a href="index.html" class="nav-link">Home</a></li>
                  <li><a href="listing.html" class="nav-link">Cars</a></li>
                  <li><a href="testimonials.html" class="nav-link">Thuê xe</a></li>
                  <li><a href="blog.html" class="nav-link">Lịch thuê</a></li>
                  <li><a href="about.html" class="nav-link"><i class="fa-solid fa-cart-shopping"></i><span style="color: red;
                  ">(5)</span></a></li>
                  <li><a href="/chothuexe/views/user/dangnhap.php" class="nav-link"><i class="fa-solid fa-user"></i><?php 
                 
                  if(isset($_SESSION['name'])){
                    echo '<b>    '.$_SESSION['name'].'</b>';
                    echo '<a href="?logout" class="logout-btn"><i class="fa-solid fa-right-from-bracket"></i></a>
                    ';
                  }
                   ?></a></li>
                   

                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>