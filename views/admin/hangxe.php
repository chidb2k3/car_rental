<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Quản Lý Hãng Xe</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <style>
        .btn-luu:hover {
            background-color: #f0f0f0;
            /* Màu nền khi di chuột qua */
        }

        #btn-them {
            background-color: #007bff;
            /* Màu nền */
            color: #fff;
            /* Màu chữ */
            border: none;
            /* Không có đường viền */
            padding: 10px 20px;
            /* Kích thước nút */
            font-size: 16px;
            /* Kích thước chữ */
            cursor: pointer;
            /* Con trỏ thành dấu nhấp chuột */
            border-radius: 5px;
            /* Bo tròn góc */
            transition: background-color 0.3s ease;
            /* Hiệu ứng chuyển đổi màu nền */
        }

        #btn-them:hover {
            background-color: #0056b3;
            /* Màu nền khi di chuột vào */
        }
    </style>

    <!-- Favicon -->
    <?php

    include ('head.php');


    ?>
    <script>
        $(document).ready(function () {
            $("#themdanhmuc").hide();
            $("#btn-them").click(function () {
                $("#danhsach").hide();
                $("#themdanhmuc").show();
            });
        });
        $(document).ready(function () {
            $("#suadanhmuc").hide();
            $("#btn-suadanhmuc").click(function () {
                $("#danhsach").hide();
                $("#suadanhmuc").show();

            });
        });
        <?php if (isset ($_GET['idhangxecapnhat'])) {
            echo '$(document).ready(function() {
                $("#themdanhmuc").hide();
                $("#danhsach").hide();
                $("#suadanhmuc").show();
            
            });';
        } ?>
    </script>
</head>

<body>
    <?php
    include ('menu.php');
    ?>
    <button id="btn-them">Thêm hãng xe</button>
    <span style="color: red">
        <?php if (isset ($_SESSION['thongbao'])) {
            echo $_SESSION['thongbao'];
            unset($_SESSION['thongbao']);
        } ?>
    </span>
    <div class="container-fluid pt-4 px-4" id="danhsach">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Danh Sách Hãng Xe (Số lượng:
                    <?php echo $this->soLuongHangXe(); ?>)<span style="color :red;">
                        <?php if (isset ($_SESSION['thongbao'])) {
                            echo $_SESSION['thongbao'];
                        }
                        unset($_SESSION['thongbao']); ?>
                    </span>
                </h6>
                <form action="" method="POST">
                    <input name="timkiem" class=" mr-sm-2" type="search" placeholder="Nhập tên hãng xe!" required
                        aria-label="Search" value="<?php if (isset ($_POST['timkiem'])) {
                            echo $_POST['timkiem'];
                        } ?>">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                </form>
                <form method="GET">
                    <select name="sl" class="">
                        <option value="<?php echo count($this->dscompany); ?>">All</option>
                        <option value="3" <?php if (isset ($_GET['sl']) && $_GET['sl'] == 3) {
                            echo "selected";
                        } ?>>3</option>
                        <option value="5" <?php if (isset ($_GET['sl']) && $_GET['sl'] == 5) {
                            echo "selected";
                        } ?>>5</option>
                        <option value="7" <?php if (isset ($_GET['sl']) && $_GET['sl'] == 7) {
                            echo "selected";
                        } ?>>7</option>
                        <option value="9" <?php if (isset ($_GET['sl']) && $_GET['sl'] == 9) {
                            echo "selected";
                        } ?>>9</option>
                    </select>
                    <button class="btn btn-outline-success " name="cv" value="hangxe" type="submit">ok</button>
                </form>


                <a href="?cv=hangxe">Show All</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">

                    <thead>
                        <tr class="text-dark">
                            <th scope="col">STT</th>
                            <th scope="col">ID</th>
                            <th scope="col">Tên hãng xe</th>
                            <th scope="col"></th>
                            <th scope="col"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Số phần tử trên mỗi trang
                        $stt = 0;
                        $count = 0;
                        if (isset ($_GET['sl'])) {
                            $sl = $_GET['sl'];
                            $sotrang = ceil(count($this->dscompany) / $sl);
                            $tranghientai = isset ($_GET['page']) ? $_GET['page'] : 1;
                            $batdau = ($tranghientai - 1) * $sl;
                            $arr = array_slice($this->dscompany, $batdau, $sl);
                            if (isset ($_POST['timkiem'])) {
                                foreach ($this->dscompany as $company) {
                                    if ($company->getNameCompany() == $_POST['timkiem']) {
                                        $count++;
                                        echo '<tr>';
                                        echo '<td>' . ++$stt . '</td>';
                                        echo '<td>' . $company->getIdCompany() . '</td>';
                                        echo '<td>' . $company->getNameCompany() . '</td>';
                                        echo '<td><a class="btn btn-sm btn-primary" href="?cv=xoahangxe&id=' . $company->getIdCompany() . '">Xóa</a></td>';
                                        echo '<td><a class="btn btn-sm btn-primary" id="btn-suadanhmuc" href="?cv=hangxe&idhangxecapnhat=' . $company->getIdCompany() . '">Cập nhật</a></td>';
                                        echo '</tr>';

                                    }
                                }
                                if ($count == 0) {
                                    echo "Không tìm thấy kết quả nào!";
                                } else {
                                    echo "Tìm thấy 1 kết quả";
                                }



                            } else {
                                foreach ($arr as $company) {
                                    echo '<tr>';
                                    echo '<td>' . ++$stt . '</td>';
                                    echo '<td>' . $company->getIdCompany() . '</td>';
                                    echo '<td>' . $company->getNameCompany() . '</td>';
                                    echo '<td><a class="btn btn-sm btn-primary" href="?cv=xoahangxe&id=' . $company->getIdCompany() . '">Xóa</a></td>';
                                    echo '<td><a class="btn btn-sm btn-primary" id="btn-suadanhmuc" href="?cv=hangxe&idhangxecapnhat=' . $company->getIdCompany() . '">Cập nhật</a></td>';
                                    echo '</tr>';
                                }

                            }


                        } else {



                            if (isset ($_POST['timkiem'])) {
                                foreach ($this->dscompany as $company) {
                                    if ($company->getNameCompany() == $_POST['timkiem']) {
                                        $count++;
                                        echo '<tr>';
                                        echo '<td>' . ++$stt . '</td>';
                                        echo '<td>' . $company->getIdCompany() . '</td>';
                                        echo '<td>' . $company->getNameCompany() . '</td>';
                                        echo '<td><a class="btn btn-sm btn-primary" href="?cv=xoahangxe&id=' . $company->getIdCompany() . '">Xóa</a></td>';
                                        echo '<td><a class="btn btn-sm btn-primary" id="btn-suadanhmuc" href="?cv=hangxe&idhangxecapnhat=' . $company->getIdCompany() . '">Cập nhật</a></td>';
                                        echo '</tr>';

                                    }
                                }
                                if ($count == 0) {
                                    echo "Không tìm thấy kết quả nào!";
                                } else {
                                    echo "Tìm thấy 1 kết quả";
                                }



                            } else {
                                foreach ($this->dscompany as $company) {
                                    echo '<tr>';
                                    echo '<td>' . ++$stt . '</td>';
                                    echo '<td>' . $company->getIdCompany() . '</td>';
                                    echo '<td>' . $company->getNameCompany() . '</td>';
                                    echo '<td><a class="btn btn-sm btn-primary" href="?cv=xoahangxe&id=' . $company->getIdCompany() . '">Xóa</a></td>';
                                    echo '<td><a class="btn btn-sm btn-primary" id="btn-suadanhmuc" href="?cv=hangxe&idhangxecapnhat=' . $company->getIdCompany() . '">Cập nhật</a></td>';
                                    echo '</tr>';
                                }

                            }
                        }


                        ?>
                    </tbody>
                </table>
                <div style="display: flex; justify-content: center; margin-top: 30px;">
                
                <?php
                if (isset ($_GET['sl'])) {
                    echo ' <nav aria-label="...">
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>';
                    for ($i = 1; $i <= $sotrang; $i++) {
                        $p = 1;
                        if (isset ($_GET['page'])) {
                            $p = $_GET['page'];
                        }
                        if ($i == $p) {
                            echo "<li class='page-item active'><a class='page-link' 
                                href='?cv=hangxe&sl=$sl&page=$i'>$i</a></li>";
                        } else {
                            echo "<li class='page-item'><a class='page-link' 
                                href='?cv=hangxe&sl=$sl&page=$i'>$i</a></li>";
                        }

                    }
                    echo '
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>';



                }
                ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Recent Sales End -->

    <!-- Thêm, danh muc -->
    <div class="container-fluid pt-4 px-4" id="themdanhmuc">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Thêm hãng xe</h6>
            </div>
            <div class="table-responsive">
                <form action="?cv=themhangxe" method="POST">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th scope="col">STT</th>
                                <th scope="col">1</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-dark">
                                <th scope="col">Tên hãng xe</th>
                                <th scope="col"><input type="text" name="namecompany" required> </input></th>
                            </tr>
                            <tr class="text-dark" align="center">
                                <th scope="col" colspan="2"><button type="submit" class="btn btn-success">Hoàn
                                        thành</button></th>

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
                <h6 class="mb-0">Cập nhật hãng xe</h6>
            </div>
            <div class="table-responsive">

                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">STT</th>
                            <th scope="col">ID</th>
                            <th scope="col">Tên hãng xe</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if (isset ($_GET['idhangxecapnhat'])) {
                            $hangxe = $this->layHangXe($_GET['idhangxecapnhat']);

                        }
                        ?>
                        <form action="?cv=capnhathangxe" method="POST">

                            <tr class="text-dark">
                                <th scope="col">1</th>
                                <th scope="col"><input type="text" name="idcompany" value="<?php
                                if (isset ($hangxe)) {
                                    echo $hangxe->getIdCompany();
                                }
                                ?>" size="5" readonly></input></th>
                                <th scope="col"><input type="text" name="namecompany" value="<?php
                                if (isset ($hangxe)) {
                                    echo $hangxe->getNameCompany();
                                }
                                ?>"></input></th>
                                <th scope="col" colspan="2"><button type="submit" class="btn btn-success">Hoàn
                                        thành</button></th>

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
    <script src="/chothuexe/views/admin/js/main.js"></script>
    <script>
        document.getElementById("btn-luu").addEventListener("click", function () {
            document.getElementById("namecompany").value = ""; // Đặt giá trị của namecompany về null
        });

    </script>
</body>

</html>