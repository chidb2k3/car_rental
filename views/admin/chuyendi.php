
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Quản lý Chuyến đi</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
   <?php
   
   include('head.php');
   ?>
</head>

<body>
    <?php
           include('menu.php');
    ?>   
     
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Danh sách chuyến đi</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col"><input class="form-check-input" type="checkbox"></th>
                                    <th scope="col">STT</th>
                                    <th scope="col">Idxe</th>
                                    <th scope="col">Iduser</th>
                                    <th scope="col">Idtaixe</th>
                                    <!-- <th scope="col">Đón</th>
                                    <th scope="col">Trả</th>
                                    <th scope="col">Ngày đón</th>
                                    <th scope="col">Ngày trả</th>
                                    <th scope="col">Thời gian đón</th>
                                    <th scope="col"></th> -->
                                </tr>
                            </thead>
                            <tbody>
                              <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td>1</td>
                                    <td>xe001</td>
                                    <td>đf</td>
                                    <td>4</td>
                                    <!-- <td>'.$row['don'].'</td>
                                    <td>'.$row['tra'].'</td>
                                    <td>'.$row['ngaydon'].'</td>
                                    <td>'.$row['ngaytra'].'</td>
                                    <td>'.$row['thoigiandon'].'</td> -->
                                    <td><a class="btn btn-sm btn-primary" href="#">Xóa</a></td>
                                </tr>
                    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->


            <!-- Widgets End -->


            
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
</body>

</html>