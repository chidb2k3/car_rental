<?php include_once ("hight.php"); ?>
<!doctype html>
<html lang="en">

<head>
    <title>Thông tin xác thực thanh toán</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css">

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
    <style>
    </style>

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
                            <h1><strong>Thông tin đơn hàng thanh toán</strong></h1>
                            <div class="custom-breadcrumbs"><a href="index.html">Home</a> <span class="mx-2">/</span>
                                <strong>Thanh toán</strong>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="site-section bg-light">
            <div class="container">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Tên Xe</th>
                                    <th scope="col">Biển số</th>
                                    <th scope="col">Số ghế</th>
                                    <th scope="col">Giá thuê/h</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Ngày giờ thuê</th>
                                    <th scope="col">Ngày giờ trả</th>
                                    <th scope="col">Số giờ</th>
                                    <th scope="col">Tổng tiền</th>


                                </tr>
                            </thead>
                            <tbody>
                                <form action="?cv=thanhtoan" method="POST">
                                    <?php
                                    $stt = 0;
                                    $tongTien = 0;
                                    foreach ($_SESSION['chitiets'] as $chitiet) {
                                        $car = $this->layXe($chitiet->getIdCar());
                                        echo '<tr>';
                                        echo ' <th scope="row">' . ++$stt . '</th>';
                                        echo '<td scope="col" style="text-align: center;">
                                    <img src="/chothuexe/views/img/xes/' . $car->getIdcar() . '.png"
                                        style="width: 50px; height: 50px; display: inline-block; vertical-align: middle;">
                                </td>';
                                        echo '<td>' . $car->getNamecar() . '</td>';
                                        echo '<td>' . $car->getBienso() . '</td>';
                                        echo '<td>' . $car->getSoghe() . '</td>';
                                        echo '<td>' . $car->getPrice() . '</td>';
                                        echo '<td>' . $chitiet->getGhiChu() . '</td>';
                                        echo '<td>' . $chitiet->getNgayGioThue() . '</td>';
                                        echo '<td>' . $chitiet->getNgayGioTra() . '</td>';
                                        // Chuyển đổi định dạng sang đối tượng DateTime
                                        $ngayGioThue = new DateTime($chitiet->getNgayGioThue());
                                        $ngayGioTra = new DateTime($chitiet->getNgayGioTra());
                                        $soGio = $ngayGioTra->diff($ngayGioThue)->h + ($ngayGioTra->diff($ngayGioThue)->days * 24);
                                        echo '<td>' . $soGio . '</td>';
                                        $tien = $soGio * $chitiet->getGhiChu() * $car->getPrice();
                                        $soTien = number_format($tien, 0, ',', '.') . '₫';
                                        echo '<td>' . $soTien . '</td>';
                                        echo '</tr>';
                                        $tongTien += $tien;
                                    }

                                    $_SESSION['tongtien']=$tongTien;
                                    $tt = number_format($tongTien, 0, ',', '.') . '₫';
                                    ?>
                                </form>
                                <h3>Thanh toán đơn hàng: DH-KB01</h3>
                                <h5>Chi tiết các đơn hàng:</h5><span style="color: red">Kiểm tra kĩ thông tin trước khi
                                    banking và Hoàn tất!!Thanks<span><br>
                                        <span style="color: red">Thời gian: 
                                            <?php $ngayGioHienTai = date('Y-m-d H:i:s');
                                            echo $ngayGioHienTai;
                                            ?><span>
                            </tbody>
                        </table>
                        <h2>Tổng số tiền cần thanh toán: <span style="color: red;">
                                <?php echo $tt; ?><span></h2>
                        <label>Hình thức thanh toán:</label>
                        <select>
                            <option>Chuyển khoản</option>
                            <option>Tiền mặt</option>
                            <option>Ví điện tử Momo</option>
                        </select>
                        <img style="width: 200px; height: 200px;" src="/chothuexe/views/img/icon/qr.png">
                        <a href="?cv=hoantatthanhtoan" class="btn btn-danger btn-sm">Hoàn tất thanh toán</a>
                    </div>

                </div>
            </div>
        </div>




        <div class="row">
            <div class="col-5">

            </div>
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
                        there live the blind texts. </p>
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
                            template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a
                                href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </footer>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>

    <script>
        $(document).rea dy(function () {
            $('#ngay_gio').datetimepicker({
                format: 'Y-m-d H:i', // Định dạng ngày và giờ
                step: 30 // Bước nhảy của thời gian (đơn vị: phút)
            });
        });
    </script>
    <?php
    foreach ($cars as $car) {
        echo '<script>
    document.addEventListener("DOMContentLoaded", function () {
        var ngayGioThueInput = document.getElementById("ngay_gio_thue_' . $car->getIdCar() . '");
        var ngayGioTraInput = document.getElementById("ngay_gio_tra_' . $car->getIdCar() . '");

        // Nếu đã lưu trữ dữ liệu trước đó trong local storage, khôi phục nó
        if (localStorage.getItem("ngay_gio_thue_' . $car->getIdCar() . '")) {
            ngayGioThueInput.value = localStorage.getItem("ngay_gio_thue_' . $car->getIdCar() . '");
        }
        if (localStorage.getItem("ngay_gio_tra_' . $car->getIdCar() . '")) {
            ngayGioTraInput.value = localStorage.getItem("ngay_gio_tra_' . $car->getIdCar() . '");
        }

        // Lưu trữ dữ liệu mới khi thay đổi
        ngayGioThueInput.addEventListener("change", function () {
            localStorage.setItem("ngay_gio_thue_' . $car->getIdCar() . '", ngayGioThueInput.value);
        });

        ngayGioTraInput.addEventListener("change", function () {
            localStorage.setItem("ngay_gio_tra_' . $car->getIdCar() . '", ngayGioTraInput.value);
        });
    });
</script>';
    }

    ?>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var ngayGioThueInput = document.getElementById("ngay_gio_thue");
            var ngayGioTraInput = document.getElementById("ngay_gio_tra");

            // Nếu đã lưu trữ dữ liệu trước đó trong local storage, khôi phục nó
            if (localStorage.getItem("ngay_gio_thue")) {
                ngayGioThueInput.value = localStorage.getItem("ngay_gio_thue");
            }
            if (localStorage.getItem("ngay_gio_tra")) {
                ngayGioTraInput.value = localStorage.getItem("ngay_gio_tra");
            }

            // Lưu trữ dữ liệu mới khi thay đổi
            ngayGioThueInput.addEventListener("change", function () {
                localStorage.setItem('ngay_gio_thue', ngayGioThueInput.value);
            });

            ngayGioTraInput.addEventListener("change", function () {
                localStorage.setItem("ngay_gio_tra", ngayGioTraInput.value);
            });
        });
    </script>


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