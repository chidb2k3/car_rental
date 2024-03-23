<?php include_once ("hight.php"); ?>
<!doctype html>
<html lang="en">

<head>
  <title>Cars</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

  <link rel="stylesheet" href="/chothuexe/views/user/fonts/icomoon/style.css">

  <link rel="stylesheet" href="/chothuexe/views/user/css/bootstrap.min.css">
  <link rel="stylesheet" href="/chothuexe/views/user/css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="/chothuexe/views/user/css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="/chothuexe/views/user/css/owl.carousel.min.css">
  <link rel="stylesheet" href="/chothuexe/views/user/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="/chothuexe/views/user/fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="/chothuexe/views/user/css/aos.css">

  <!-- MAIN CSS -->
  <link rel="stylesheet" href="/chothuexe/views/user/css/style.css">

</head>

<body>


  <div class="site-wrap" id="home-section">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>



    <?php include_once ("header.php"); ?>


    <div class="hero inner-page" style="background-image: url('/chothuexe/views/user/images/hero_1_a.jpg');">

      <div class="container">
        <div class="row align-items-end ">
          <div class="col-lg-5">

            <div class="intro">
              <h1><strong>Listings</strong></h1>
              <div class="custom-breadcrumbs"><a href="index.html">Home</a> <span class="mx-2">/</span>
                <strong>Listings</strong>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>






    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <h2 class="section-heading"><strong>Car Listings</strong></h2>
            <p class="mb-5">Đến với chúng tôi không lo về giá, chẳng ngại chất lượng! Khám phá ngay bây giờ:))</p>
          </div>
        </div>


        <div class="row">
          <!-- //start xe -->
          <?php
          foreach ($lists as $car) {
            echo '<div class="col-md-6 col-lg-4 mb-4">

            <div class="listing d-block  align-items-stretch">';
            echo ' <div class="listing-img h-100 mr-4">
            <img style="width: 100%; height: 200px" src="/chothuexe/views/img/xes/'.$car->getIdcar().'.png" alt="Image" class="img-fluid">
          </div>';
            echo '<div class="listing-contents h-100">';
            echo '  <h3>'.$car->getNameCar().'</h3> ';
            echo '<div class="rent-price">
          <strong>Đơn giá:'.number_format($car->getPrice(), 0, ',', '.') . '₫'.'</strong><span class="mx-1">/</span>Giờ
        </div>';
            echo ' <div class="d-block d-md-flex mb-3 border-bottom pb-3">
        <div class="listing-feature pr-4">
          <span class="caption">Biển số:</span>
          <span class="number">'.$car->getBienSo().'</span>
        </div>
        <div class="listing-feature pr-4">
          <span class="caption">Số ghế:</span>
          <span class="number">'.$car->getSoGhe().'</span>
        </div>
        <div class="listing-feature pr-4">
          <span class="caption">Số lượng:</span>
          <span class="number">'.$car->getQuantity().'</span>
        </div>
      </div>';
            echo '
      <div>
        <p>'.$car->getCompany().'
        </p>';
        if($car->getQuantity()>0){
          echo '<p style=" text-align: center;" ><a href="?cv=themvaogiohang&id='.$car->getIdcar().'" class="btn btn-primary btn-sm">Thuê Ngay</a>
          <a href="?cv=u_chitiet&id='.$car->getIdcar().'" class="btn btn-primary btn-sm">Chi Tiết</a>
        </p>';
        }else{
          echo '<p style=" text-align: center;" ><a href="#'.$car->getIdcar().'" class="btn btn-danger btn-sm">Hết Xe</a>
          <a href="?cv=u_chitiet&id='.$car->getIdcar().'" class="btn btn-primary btn-sm">Chi Tiết</a>
          </p>';
        }
       
     echo '</div>';





            echo '  </div>';
            echo '  </div>
            </div>';
          }
          ?>

          <!-- end xe -->

        </div>


        <div class="row">
          <div class="col-5">
            <div class="custom-pagination">
              <a href="#">1</a>
              <span>2</span>
              <a href="#">3</a>
              <a href="#">4</a>
              <a href="#">5</a>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-7">
            <h2 class="section-heading"><strong>Testimonials</strong></h2>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="testimonial-2">
              <blockquote class="mb-4">
                <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, deserunt eveniet veniam.
                  Ipsam, nam, voluptatum"</p>
              </blockquote>
              <div class="d-flex v-card align-items-center">
                <img src="/chothuexe/views/user/images/person_1.jpg" alt="Image" class="img-fluid mr-3">
                <div class="author-name">
                  <span class="d-block">Mike Fisher</span>
                  <span>Owner, Ford</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="testimonial-2">
              <blockquote class="mb-4">
                <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, deserunt eveniet veniam.
                  Ipsam, nam, voluptatum"</p>
              </blockquote>
              <div class="d-flex v-card align-items-center">
                <img src="/chothuexe/views/user/images/person_2.jpg" alt="Image" class="img-fluid mr-3">
                <div class="author-name">
                  <span class="d-block">Jean Stanley</span>
                  <span>Traveler</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="testimonial-2">
              <blockquote class="mb-4">
                <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem, deserunt eveniet veniam.
                  Ipsam, nam, voluptatum"</p>
              </blockquote>
              <div class="d-flex v-card align-items-center">
                <img src="/chothuexe/views/user/images/person_3.jpg" alt="Image" class="img-fluid mr-3">
                <div class="author-name">
                  <span class="d-block">Katie Rose</span>
                  <span>Customer</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-primary py-5">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-7 mb-4 mb-md-0">
            <h2 class="mb-0 text-white">What are you waiting for?</h2>
            <p class="mb-0 opa-7">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati, laboriosam.</p>
          </div>
          <div class="col-lg-5 text-md-right">
            <a href="#" class="btn btn-primary btn-white">Rent a car now</a>
          </div>
        </div>
      </div>
    </div>


    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <h2 class="footer-heading mb-4">About Us</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the
              blind texts. </p>
            <ul class="list-unstyled social">
              <li><a href="#"><span class="icon-facebook"></span></a></li>
              <li><a href="#"><span class="icon-instagram"></span></a></li>
              <li><a href="#"><span class="icon-twitter"></span></a></li>
              <li><a href="#"><span class="icon-linkedin"></span></a></li>
            </ul>
          </div>
          <div class="col-lg-8 ml-auto">
            <div class="row">
              <div class="col-lg-3">
                <h2 class="footer-heading mb-4">Quick Links</h2>
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Testimonials</a></li>
                  <li><a href="#">Terms of Service</a></li>
                  <li><a href="#">Privacy</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-lg-3">
                <h2 class="footer-heading mb-4">Resources</h2>
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Testimonials</a></li>
                  <li><a href="#">Terms of Service</a></li>
                  <li><a href="#">Privacy</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-lg-3">
                <h2 class="footer-heading mb-4">Support</h2>
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Testimonials</a></li>
                  <li><a href="#">Terms of Service</a></li>
                  <li><a href="#">Privacy</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-lg-3">
                <h2 class="footer-heading mb-4">Company</h2>
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Testimonials</a></li>
                  <li><a href="#">Terms of Service</a></li>
                  <li><a href="#">Privacy</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made
                with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com"
                  target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
            </div>
          </div>

        </div>
      </div>
    </footer>

  </div>

  <script src="/chothuexe/views/user/js/jquery-3.3.1.min.js"></script>
  <script src="/chothuexe/views/user/js/popper.min.js"></script>
  <script src="/chothuexe/views/user/js/bootstrap.min.js"></script>
  <script src="/chothuexe/views/user/js/owl.carousel.min.js"></script>
  <script src="/chothuexe/views/user/js/jquery.sticky.js"></script>
  <script src="/chothuexe/views/user/js/jquery.waypoints.min.js"></script>
  <script src="/chothuexe/views/user/js/jquery.animateNumber.min.js"></script>
  <script src="/chothuexe/views/user/js/jquery.fancybox.min.js"></script>
  <script src="/chothuexe/views/user/js/jquery.easing.1.3.js"></script>
  <script src="/chothuexe/views/user/js/bootstrap-datepicker.min.js"></script>
  <script src="/chothuexe/views/user/js/aos.js"></script>

  <script src="/chothuexe/views/user/js/main.js"></script>

</body>

</html>