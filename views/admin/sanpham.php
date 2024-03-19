<?php
include("xuly/quanly.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Quản Lý Sản Phẩm</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <?php

    include('head.php');


    ?>
    <script>
        $(document).ready(function() {
            $("#themdanhmuc").hide();
            $("#btn-them").click(function() {
                $("#danhsach").hide();
                $("#themdanhmuc").show();
            });
        });
        $(document).ready(function() {
            $("#suadanhmuc").hide();
            $("#btn-suadanhmuc").click(function() {
                $("#danhsach").hide();
                $("#suadanhmuc").show();

            });
        });
        <?php if (isset($_GET['id-sua'])) {
            echo  '$(document).ready(function() {
                $("#themdanhmuc").hide();
                $("#danhsach").hide();
                $("#suadanhmuc").show();
            
            });';
        } ?>
    </script>
</head>

<body>
    <?php
    include('menu.php');
    ?>
    <button id="btn-them">Thêm xe</button>
    <div class="container-fluid pt-4 px-4" id="danhsach">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Danh sách<span style="color :red;"><?php if (isset($_SESSION['thongbao'])) {
                                                                        echo $_SESSION['thongbao'];
                                                                    }
                                                                    unset($_SESSION['thongbao']); ?></span></h6>


                <a href="">Show All</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">

                    <thead>
                        <tr class="text-dark">
                            <th scope="col">STT</th>
                            <th scope="col">ID</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Đơn giá</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                      <tr>
                                    <td>' . $stt++ . '</td>
                                    <td>' . $row['id'] . '</td>
                                    <td>' . $row['ten'] . '</td>
                                    <td>' . $row['soluong'] . '</td>
                                    <td>' . $row['dongia'] . '</td>
                                    <td>' . $row['iddm'] . '</td>
                                    <td><a class="btn btn-sm btn-primary" href=#">Xóa</a></td>
                                    <td><button ><a id="btn-suadanhmuc" href="#">Sửa </a></button></td>
                                </tr>



                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->

    <!-- Thêm, danh muc -->
    <div class="container-fluid pt-4 px-4" id="themdanhmuc">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Thêm sản phẩm</h6>

                <a href="">Show All</a>
            </div>
            <div class="table-responsive">
                <form action="xuly/action.php" method="POST" enctype="multipart/form-data">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th scope="col">STT</th>
                                <th scope="col">1</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr class="text-dark">
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col"><input type="text" name="ten"> </input></th>
                            </tr>

                            <tr class="text-dark">
                                <th scope="col">Ảnh</th>
                                <th scope="col"> <input type="file" name="photo" id="fileSelect">
                                </th>
                            </tr>

                            <tr class="text-dark">
                                <th scope="col">Số lượng</th>
                                <th scope="col"><input type="text" name="soluong"> </input></th>
                            </tr>
                            <tr class="text-dark">
                                <th scope="col">Đơn giá</th>
                                <th scope="col"><input type="text" name="dongia"> </input></th>
                            </tr>
                            <tr class="text-dark">
                                <th scope="col">Danh mục</th>
                                <th scope="col"><select name="iddm">
                                       

                                    </select></th>
                            </tr>

                            <tr class="text-dark" align="center">
                                <th scope="col" colspan="2"><button type="submit" name="cv" value="themsanpham">Lưu</button></th>

                            </tr>

                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <!-- end thêm danh mục -->
    <!-- Widgets End -->
    <!-- sửa danh mục -->
    <div class="container-fluid pt-4 px-4" id="suadanhmuc">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Sửa sản phẩm</h6>

                <a href="">Show All</a>
            </div>
            <div class="table-responsive">

                <table class="table text-start align-middle table-bordered table-hover mb-0">

                    <tbody>
   <form action="xuly/action.php?id=' . $id . '" method="POST">
                           
                            <tr class="text-dark">
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col"><input type="text" name ="ten" value="' . $row['ten'] . '"> </input></th>
                            </tr>
                            <tr class="text-dark">
                                <th scope="col">Số lượng</th>
                                <th scope="col"><input type="text" name ="soluong" value="' . $row['soluong'] . '"> </input></th>
                            </tr>
                            <tr class="text-dark">
                                <th scope="col">Đơn giá</th>
                                <th scope="col"><input type="text" name ="dongia" value="' . $row['dongia'] . '"> </input></th>
                            </tr>
                            <tr class="text-dark">
                                <th scope="col">Danh mục</th>
                                <th scope="col"><select name="iddm">';

</select></th>
                            </tr>
                           
                            <tr class="text-dark" align="center">
                                <th scope="col" colspan="2"><button type="submit" name="cv" value="updatesp">Lưu</button></th>

                            </tr>

                      

                    </tbody>
                </table>
                </form>
            </div>
        </div>
    </div>




    </div>
    <!-- Content End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/chothuexe/views/admin/lib/chart/chart.min.js"></script>
    <script src="/chothuexe/views/admin/lib/easing/easing.min.js"></script>
    <script src="/chothuexe/views/admin/lib/waypoints/waypoints.min.js"></script>
    <script src="/chothuexe/views/admin/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="/chothuexe/views/admin/lib/tempusdominus/js/moment.min.js"></script>
    <script src="/chothuexe/views/admin/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="/chothuexe/views/admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>