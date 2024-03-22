<?php include_once ("hight.php");
$_SESSION['idcar'] = $_GET['id'];
?>


<!doctype html>
<html lang="en">

<head>
    <title>Chi Tiết</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mammoth/1.0.1/mammoth.browser.min.js"></script>

    <link rel="stylesheet" href="/chothuexe/views/user/fonts/icomoon/style.css">

    <link rel="stylesheet" href="/chothuexe/views/user/css/bootstrap.min.css">
    <link rel="stylesheet" href="/chothuexe/views/user/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/chothuexe/views/user/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="/chothuexe/views/user/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/chothuexe/views/user/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/chothuexe/views/user/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="/chothuexe/views/user/css/aos.css">
    <script>
        window.onload = function () {
            loadComments();
        };
    </script>

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="/chothuexe/views/user/css/style.css">
    <style>
        .listing {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .listing-img {
            width: 100%;
            max-height: 400px;
            /* Điều chỉnh kích thước tối đa cho hình ảnh */
            overflow: hidden;
            /* Đảm bảo hình ảnh không tràn ra khỏi khu vực chứa */
            margin-bottom: 20px;
            /* Khoảng cách giữa hình ảnh và nội dung */
        }

        .comment-frame {
            background-color: #ffffff;
            /* Màu nền của khung comment sản phẩm */
            padding: 20px;
            height: 400px;
            /* Điều chỉnh chiều cao của khung comment sản phẩm */
            overflow: auto;
            /* Tạo thanh cuộn nếu nội dung dài hơn */
        }
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
                            <h1><strong>Chi tiết xe</strong></h1>
                            <div class="custom-breadcrumbs"><a href="index.html">Home</a> <span class="mx-2">/</span>
                                <strong>Chi Tiết</strong>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>



        <div class="site-section bg-light">
            <div class="container-fluid">
                <div class="row">
                    <?php
                    if (isset ($_GET['id'])) {
                        $car = $this->layXe($_GET['id']);
                        echo '<div class="col-md-6 col-lg-6 mb-4">
                <div class="listing d-block align-items-stretch">
                            <div class="listing-img h-100">
                                <img style="width:  90%; height: 250px;" src="/chothuexe/views/img/xes/' . $car->getIdcar() . '.png" alt="Image" class="img-fluid">
                            </div>
                            <div class="listing-contents">
                                <h3>' . $car->getNameCar() . '</h3>
                                <div class="rent-price">
                                    <strong>Đơn giá: ' . $car->getPrice() . ' đ/Giờ</strong>
                                </div>
                                <div class="d-block d-md-flex mb-3 border-bottom pb-3">
                                    <div class="listing-feature pr-4">
                                        <span class="caption">Biển số:</span>
                                        <span class="number">' . $car->getBienSo() . '</span>
                                    </div>
                                    <div class="listing-feature pr-4">
                                        <span class="caption">Số ghế:</span>
                                        <span class="number">' . $car->getSoGhe() . '</span>
                                    </div>
                                    <div class="listing-feature pr-4">
                                        <span class="caption">Số lượng:</span>
                                        <span class="number">' . $car->getQuantity() . '</span>
                                    </div>
                                </div>
                                <div>
                                    <p>' . $car->getCompany() . '</p>';
                        if ($car->getQuantity() > 0) {
                            echo '<p style=" text-align: center;" ><a href="?cv=themvaogiohang&id=' . $car->getIdcar() . '" class="btn btn-primary btn-sm">Thuê Ngay</a>
                                        <a href="?cv=u_chitiet&id=' . $car->getIdcar() . '" class="btn btn-primary btn-sm">Chi Tiết</a>
                                      </p>';
                        } else {
                            echo '<p style=" text-align: center;" ><a href="#' . $car->getIdcar() . '" class="btn btn-danger btn-sm">Hết Xe</a>
                                        <a href="?cv=u_chitiet&id=' . $car->getIdcar() . '" class="btn btn-primary btn-sm">Chi Tiết</a>
                                        </p>';
                        }
                        echo '  </div>
                            </div>
                        </div>
                    </div>';
                    }
                    ?>
                    <div class="col-md-6 col-lg-6 mb-4">
                        <h4>
                            Đánh giá sản phẩm
                        </h4>
                        <button onclick="loadComments()" style="color: red; font-family: 'Garamond', sans-serif;">Bình
                            Luận</button>
                        <div class="comment-frame" style="height: 350px;">
                            <!-- Nội dung của khung comment sản phẩm -->


                            <div d id="commentOverlay" class="overlay"
                                style="background-color: #FEEBD0; display: none;">
                                <div id="commentsContainer">
                                    <div id="existingComments"
                                        style="height: 300px; overflow: auto; border: 1px solid #ccc; padding: 10px;">
                                        <!-- Hiển thị các bình luận đã có -->
                                        <p>Bình luận 1</p>
                                        <p>Bình luận 2</p>
                                        <!-- ... -->
                                    </div>


                                </div>
                            </div>
                        </div>
                        <input type="text" id="commentInput" placeholder="Nhập bình luận...">
                        <button onclick="submitComment()"><img style="width: 30px; height: 20px;"
                                src="/chothuexe/views/img/icon/send.png"> </button>
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
    <script type="text/javascript">

        function toggleComments() {
            var commentsContainer = document.getElementById('commentsContainer');
            commentsContainer.style.display = commentsContainer.style.display === 'none' ? 'block' : 'none';
        }


        function loadComments() {
            // Hiển thị overlay
            $("#commentOverlay").show();

            // Sử dụng Ajax để tải nội dung bình luận từ máy chủ và hiển thị trong #existingComments
            $.ajax({
                url: '../views/user/load_comments.php', // Đường dẫn đến trang PHP xử lý bình luận
                type: 'GET',
                dataType: 'html',
                success: function (response) {
                    $("#existingComments").html(response);
                },
                error: function (error) {
                    console.error('Lỗi khi tải nội dung bình luận:', error);
                }
            });
        }


        function submitComment() {
            // Lấy nội dung bình luận từ ô nhập
            var commentInput = $("#commentInput");
            var commentText = commentInput.val();

            if (commentText.trim() !== '') {
                // Gửi dữ liệu bình luận đến máy chủ bằng Ajax
                $.ajax({
                    url: '../views/user/submit_comment.php', // Đường dẫn đến trang PHP xử lý gửi bình luận
                    type: 'POST',
                    data: { comment: commentText },
                    success: function (response) {
                        // Nếu gửi thành công, cập nhật nội dung bình luận
                        $("#existingComments").append(response);

                        // Xóa nội dung trong ô nhập sau khi gửi bình luận
                        commentInput.val('');
                    },
                    error: function (error) {
                        console.error('Lỗi khi gửi bình luận:', error);
                    }
                });
            }
        }
        function closeOverlay() {
            // Ẩn overlay
            $("#commentOverlay").hide();
        }




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