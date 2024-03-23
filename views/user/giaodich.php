<?php include_once ("hight.php"); ?>
<!doctype html>
<html lang="en">

<head>
    <title>Lịch sử giao dịch</title>
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
                            <h4><strong>Lịch sử giao dịch</strong></h4>
                            <div class="custom-breadcrumbs"><a href="index.html">Home</a> <span class="mx-2">/</span>
                                <strong>Cảm ơn
                                    <?php if (isset ($_SESSION['name'])) {
                                        echo $_SESSION['name'] . " đã tích cực giao dịch trong thời gian qua:))";
                                    } ?>
                                </strong>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>






        <div class="site-section bg-light">
            <div class="container">
                <div class="row">
                    <!-- //start xe -->
                    <h4 style="color: red; font-size: 1.5em; font-weight: bold; text-transform: uppercase;">Danh sách hóa đơn của bạn</h4>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">IDHD</th>
                                <th scope="col">IDKH</th>
                                <th scope="col">Họ Tên</th>
                                <th scope="col">SĐT</th>
                                <th scope="col">Thời gian</th>
                                <th scope="col">Tổng tiền(đ)</th>
                                <th scope="col">Thanh toán</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $iduser= 0;
                                if(isset($_SESSION['iduser'])){
                                    $iduser = $_SESSION['iduser'];
                                }
                               
                                foreach($this->dshoadon as $hoadon){
                                    if ($hoadon->getIdUser()==$iduser) {
                                        echo '<tr>';
                                        echo '<td>HD-' . $hoadon->getIdHoaDon() . '</td>';
                                        echo '<td>KH-' . $hoadon->getIdUser() . '</td>';
                                        $user = $this->layKhachHang($hoadon->getIdUser());
                                        echo '<td>' . $user->getFullname() . '</td>';
                                        echo '<td>' . $user->getSdt() . '</td>';
                                        echo '<td>' . $hoadon->getThoigian() . '</td>';
                                        $tongtien = number_format($hoadon->getTongtien(), 0, ',', '.') . '₫';
                                        echo '<td>' . $tongtien . '</td>';
                                        if ($hoadon->getThanhToan() == 0) {
                                            echo '<td><span style="color: red;">Chưa thanh toán</span></td>';
                                        } else {
                                            echo '<td><span style="color: blue;">Đã thanh toán</span></td>';
                                        }
    
                                        echo '<td><a class="btn btn-sm btn-primary" id="btn-suadanhmuc" href="?cv=chitiethoadon&idhoadon=' . $hoadon->getIdHoaDon() . '">Chi tiết</a></td>';
                                        echo '</tr>';
                                      
                                    
                                }}
                                
                                

                                ?>
                            </tr>
                        </tbody>
                    </table>

                    <!-- end xe -->

                </div>
            </div>
        </div>



        

        <div class="site-section bg-primary py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 mb-4 mb-md-0">
                        <h2 class="mb-0 text-white">What are you waiting for?</h2>
                        <p class="mb-0 opa-7">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati,
                            laboriosam.</p>
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
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the
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
                                <script>document.write(new Date().getFullYear());</script> All rights reserved | This
                                template is made
                                with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a
                                    href="https://colorlib.com" target="_blank">Colorlib</a>
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