
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
                  <li class="active"><a href="/chothuexe/controller/System.php?cv=u_home" class="nav-link"><b>Home</b></a></li>
                  <li><a href="/chothuexe/controller/System.php?cv=u_xe" class="nav-link"><b>Cars</b></a></li>
                  <li><a href="/chothuexe/controller/System.php?cv=giaodich" class="nav-link"><b>Giao dịch</b></a></li>
                  <li><a href="/chothuexe/controller/System.php?cv=u_lienhe" class="nav-link"><b>Liên hệ</b></a></li>
                  <li><a href="/chothuexe/controller/System.php?cv=giohang" class="nav-link"><i class="fa-solid fa-cart-shopping"></i><span style="color: red;
                  ">(<?php if(isset($_SESSION['Cart'])){
                    echo count($_SESSION['Cart']);
                  } ?>)</span></a></li>
                  <li><a href="/chothuexe/views/user/dangnhap.php" class="nav-link"><i class="fa-solid fa-user"></i><?php 
                 
                  if(isset($_SESSION['name'])){
                    echo '<b>    '.$_SESSION['name'].'</b>';
                    echo '<a href="/chothuexe/controller/System.php?cv=dangxuat" class="logout-btn"><i class="fa-solid fa-right-from-bracket"></i></a>
                    ';
                  }
                   ?></a></li>
                   

                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>