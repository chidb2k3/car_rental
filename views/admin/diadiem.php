<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Quản Lý Địa Điểm Đón Trả</title>
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
            $("#btn-suadanhmuc").click(function(){
                $("#danhsach").hide();
                $("#suadanhmuc").show();
                
            });
        });
        <?php if(isset($_GET['id-sua'])){
            echo  '$(document).ready(function() {
                $("#themdanhmuc").hide();
                $("#danhsach").hide();
                $("#suadanhmuc").show();
            
            });';
        }?>
    </script>
</head>

<body>
    <?php
    include('menu.php');
    ?>
    <button id="btn-them">Thêm địa điểm</button>
    <div class="container-fluid pt-4 px-4" id="danhsach">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Danh sách<span style="color :red;"><?php  if(isset($_SESSION['thongbao'])){echo $_SESSION['thongbao'];} unset($_SESSION['thongbao']);?></span></h6>


                <a href="">Show All</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">

                    <thead>
                        <tr class="text-dark">
                            <th scope="col">STT</th>
                            <th scope="col">Tên địa điểm</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                
                    <tr>
                                    <td></td>
                                    <td></td>
                                    <td><a class="btn btn-sm btn-primary" href="xuly/action.php?cv=xoadiadiem&id='.$row['id'].'">Xóa</a></td>
                                    <td><button ><a id="btn-suadanhmuc" href="diadiem.php?id-sua='.$row['id'].'">Sửa </a></button></td>
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
                <h6 class="mb-0">Thêm địa điểm</h6>

                <a href="">Show All</a>
            </div>
            <div class="table-responsive">
                <form action="xuly/action.php" method="POST">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th scope="col">STT</th>
                                <th scope="col">1</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-dark">
                                <th scope="col">Tên địa điểm</th>
                                <th scope="col"><input type="text" name="ten"> </input></th>
                            </tr>
                            <tr class="text-dark" align="center">
                                <th scope="col" colspan="2"><button type="submit" name="cv" value="themdiadiem">Lưu</button></th>

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
                <h6 class="mb-0">Sửa địa điểm</h6>

                <a href="">Show All</a>
            </div>
            <div class="table-responsive">
               
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th scope="col">STT</th>
                                <th scope="col">ID</th>
                                <th scope="col">Tên địa điểm</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <form action="xuly/action.php" method="POST">
                        <?php
                        $stt = 1;
                        $id = $_GET['id-sua'];
                        $conn = mysqli_connect("localhost", "root", "", "dacs2");
                        $sql = "SELECT * FROM diadiem WHERE id='$id'";
                        $kq = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_array($kq)) {
                            echo '
                            <tr class="text-dark">
                            <th scope="col">1</th>
                            <th scope="col"><input type="text" name="id" value="'.$row['id'].'" size="5" readonly></input></th>
                            <th scope="col"><input type="text" name="ten" value="'.$row['ten'].'"></input></th>
                            <th scope="col" colspan="2"><button type="submit" name="cv" value="suadiadiem">Lưu</button></th>

                        </tr>';
                        }?>
                            

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