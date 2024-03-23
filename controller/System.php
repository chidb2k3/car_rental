<?php
session_start();
include '../model/User.php';
include '../model/Car.php';
include '../model/BinhLuan.php';
include '../model/HoaDon.php';
include '../model/ChiTietHoaDon.php';
include 'Database.php';

class System
{
    // Các thuộc tính
    private $dsuser; // Mảng các đối tượng User
    private $dscompany; // Mảng các đối tượng Company
    private $dscar; // Mảng các đối tượng Car
    private $dshoadon; // Mảng các đối tượng HoaDon
    private $dschitiethoadon;
    private $dsbinhluan; // Mảng các đối tượng BinhLuan
    private $database;


    // Constructor
    public function __construct($database, $dsuser, $dscompany, $dscar, $dshoadon, $dschitiethoadon, $dsbinhluan)
    {
        $this->dsuser = $dsuser;
        $this->dscompany = $dscompany;
        $this->dscar = $dscar;
        $this->dshoadon = $dshoadon;
        $this->dschitiethoadon = $dschitiethoadon;
        $this->dsbinhluan = $dsbinhluan;
        $this->database = $database;
    }

    // Getter và Setter cho các thuộc tính
    public function getDSUser()
    {
        return $this->dsuser;
    }

    public function setDSUser($dsuser)
    {
        $this->dsuser = $dsuser;
    }

    public function getDSCompany()
    {
        return $this->dscompany;
    }

    public function setDSCompany($dscompany)
    {
        $this->dscompany = $dscompany;
    }

    public function getDSCar()
    {
        return $this->dscar;
    }

    public function setDSCar($dscar)
    {
        $this->dscar = $dscar;
    }

    public function getDSHoaDon()
    {
        return $this->dshoadon;
    }

    public function setDSHoaDon($dshoadon)
    {
        $this->dshoadon = $dshoadon;
    }

    public function getDSBinhLuan()
    {
        return $this->dsbinhluan;
    }

    public function setDSBinhLuan($dsbinhluan)
    {
        $this->dsbinhluan = $dsbinhluan;
    }
    public function loadSystem()
    {
        $this->dscompany = $this->database->getdsCompany();
        $this->dscar = $this->database->getdsCar();
        $this->dsuser = $this->database->getdsUsers();
        $this->dsbinhluan = $this->database->getdsBinhluan();
        $this->dshoadon = $this->database->getdshoadon();
    }
    public function xemdsUsers()
    {
        foreach ($this->dsuser as $user) {
            echo $user->toString();
            echo "<br>";
        }
    }
    public function xemdsCompanys()
    {
        foreach ($this->dscompany as $company) {
            echo $company->toString();
            echo "<br>";
        }
    }
    public function layHangXe($id)
    {
        foreach ($this->dscompany as $company) {
            if ($company->getIdCompany() == $id) {
                return $company;
                break;
            }
        }
    }
    public function xemdsCars()
    {
        foreach ($this->dscar as $car) {
            echo $car->toString();
            echo "<br>";
        }
    }
    public function xemdsHoaDons()
    {
        foreach ($this->dshoadon as $hoadon) {
            echo $hoadon->toString();
            echo "<br>";
        }
    }
    public function xemdsBinhLuans()
    {
        foreach ($this->dsbinhluan as $binhluan) {
            echo $binhluan->toString();
            echo "<br>";
        }
    }
    public function DangNhap($email, $password): bool
    {
        foreach ($this->dsuser as $user) {
            if ($user->getEmail() == $email && $user->getPassword() == $password) {
                $_SESSION['you'] = $user;
                $_SESSION['name'] = $user->getFullname();
                $_SESSION['iduser'] = $user->getIduser();
                return true;
            }
        }
        return false;

    }
    public function taiKhoanTonTai($email): bool
    {
        foreach ($this->dsuser as $user) {
            if ($user->getEmail() == $email) {
                return true;
            }
        }
        return false;

    }
    public function DangKy($fullname, $email, $password, $sdt)
    {
        if ($this->taiKhoanTonTai($email) == true) {
            $thongbao = "Email đã tồn tại!!!!!";
            include_once ("../views/user/dangky.php");
        } else {
            try {
                $conn = $this->database->connect();
                $sql = "INSERT INTO users (fullname, email, password, sdt, role)
                VALUES ('$fullname', '$email', '$password', $sdt, 0)";

                // Thực thi câu lệnh SQL
                $conn->exec($sql);
                $thongbao = "Đăng ký thành công!! Vui lòng đăng nhập để tiếp tục.";
                include_once ("../views/user/dangnhap.php");
            } catch (PDOException $e) {
                // Nếu có lỗi, in ra thông báo lỗi
                echo "Lỗi: " . $e->getMessage();
            }

        }

    }
    // Start Quản lý Hãng Xe
    public function HangXe()
    {
        $_SESSION['active'] = "hangxe";
        include_once ("../views/admin/hangxe.php");
    }
    public function KiemTraTonTai($namecompany): bool
    {
        foreach ($this->dscompany as $company) {
            if ($company->getNameCompany() == $namecompany) {
                return true;
            }
        }
        return false;
    }
    public function tenHangXe($id)
    {
        foreach ($this->dscompany as $company) {
            if ($company->getIdCompany() == $id) {
                return $company->getNameCompany();
            }
        }
    }

    public function ThemHangXe()
    {
        $namecompany = $_POST['namecompany'];

        if ($this->KiemTraTonTai($namecompany) == true) {
            echo "<script>alert('Hãng xe đã có trong danh sách!');</script>";
        } else {
            try {
                $conn = $this->database->connect();
                $sql = "INSERT INTO company (namecompany)
                    VALUES ('$namecompany')";

                // Thực thi câu lệnh SQL
                $conn->exec($sql);
                echo "<script>alert('Thêm thành công!');</script>";
                $_SESSION['thongbao'] = "Thêm thành công!";

            } catch (PDOException $e) {
                // Nếu có lỗi, in ra thông báo lỗi
                echo "Lỗi: " . $e->getMessage();
            }
        }
        $this->loadSystem();
        header("Location: System.php?cv=hangxe");
    }
    
    public function xoaHangXe($id)
    {
        try {
            $hangxe = $this->layHangXe($id);
            foreach($this->dscar as $car){
                if($car->getCompany()==$hangxe->getNameCompany()){
                    $this->xoaXe($car->getIdcar());
                }
            }

            // $this->xoaXeTheoHang($this->tenHangXe($id));

            $conn = $this->database->connect();
            $sql = "DELETE FROM company WHERE idcompany = $id";
            $conn->exec($sql);
            echo "<script>alert('Xóa thành công!');</script>";
            $_SESSION['thongbao'] = "Xóa thành công!";

        } catch (PDOException $e) {
            // Nếu có lỗi, in ra thông báo lỗi
            echo "Lỗi: " . $e->getMessage();
        }
        $this->loadSystem();
        // $this->HangXe();
        header("Location: System.php?cv=hangxe");

    }
    public function capNhatHangXe($id, $name)
    {
        try {
            $conn = $this->database->connect();
            $sql = "UPDATE company
            SET namecompany = '$name'
            WHERE idcompany=$id";
            $conn->exec($sql);
            // echo "<script>alert('Xóa thành công!');</script>";
            $_SESSION['thongbao'] = "Cập nhật thành công!";

        } catch (PDOException $e) {
            // Nếu có lỗi, in ra thông báo lỗi
            echo "Lỗi: " . $e->getMessage();
        }
        $this->loadSystem();
        // $this->HangXe();
        header("Location: System.php?cv=hangxe");
    }
    public function soLuongHangXe()
    {
        return count($this->dscompany);
    }
    // end Quản lý hãng xe

    // Start xe
    public function Xe()
    {
        $_SESSION['active'] = "xe";
        include_once ("../views/admin/dsxe.php");
    }
    public function soLuongXe()
    {
        return count($this->dscar);
    }
    public function themXe()
    {
        if (isset ($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
            $filename = $_FILES["photo"]["name"];
            $filetype = $_FILES["photo"]["type"];
            $filesize = $_FILES["photo"]["size"];

            // Xác minh phần mở rộng tệp
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if (!array_key_exists($ext, $allowed))
                die ("Lỗi: Vui lòng chọn định dạng tệp hợp lệ.");

            // Xác minh kích thước tệp - tối đa 5MB
            $maxsize = 5 * 1024 * 1024;
            if ($filesize > $maxsize)
                die ("Lỗi: Kích thước tệp lớn hơn giới hạn cho phép.");

            // Xác minh loại MIME của tệp
            if (in_array($filetype, $allowed)) {
                // Kiểm tra xem tệp có tồn tại hay không trước khi tải lên
                $carend = end($this->dscar);
                $tenanh = $carend->getIdcar() + 1;
                $filename = "$tenanh.png";

                //echo $_FILES["photo"]["tmp_name"];
                if (move_uploaded_file($_FILES["photo"]["tmp_name"], "../views/img/xes/" . $filename)) { // có thể có lỗi
                    echo "Tệp của bạn đã được tải lên thành công.";
                } else {
                    echo "Lỗi: không thể di chuyển tệp đến upload/";
                }

            } else {
                echo "Lỗi: Đã xảy ra sự cố khi tải tệp của bạn lên. Vui lòng thử lại.";
            }
        } else {
            echo "Error: " . $_FILES["photo"]["error"];
        }
        $namecar = $_POST['namecar'];
        $bienso = $_POST['bienso'];
        $soghe = $_POST['soghe'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $namecompany = $_POST['company'];
        try {
            $conn = $this->database->connect();
            $sql = "INSERT INTO cars (namecar, bienso, soghe, quantity, price, namecompany)
                    VALUES ('$namecar', '$bienso', $soghe, $quantity, $price, '$namecompany')";

            // Thực thi câu lệnh SQL
            $conn->exec($sql);
            echo "<script>alert('Thêm thành công!');</script>";
            $_SESSION['thongbao'] = "Thêm thành công!";

        } catch (PDOException $e) {
            // Nếu có lỗi, in ra thông báo lỗi
            echo "Lỗi: " . $e->getMessage();
        }

        $this->loadSystem();
        header("Location: System.php?cv=xe");
    }
    public function xoaXe($id)
    {
        try {
            $this->xoaChiTietHoaDonTheoXe($id);
            $this->xoaBinhLuanTheoXe($id);
            $conn = $this->database->connect();
            $sql = "DELETE FROM cars WHERE idcar = $id";
            $conn->exec($sql);
            echo "<script>alert('Xóa thành công!');</script>";
            $_SESSION['thongbao'] = "Xóa thành công!";

        } catch (PDOException $e) {
            // Nếu có lỗi, in ra thông báo lỗi
            echo "Lỗi: " . $e->getMessage();
        }
        $this->loadSystem();
        // $this->HangXe();
        header("Location: System.php?cv=xe");

    }

    public function layXe($id)
    {
        foreach ($this->dscar as $car) {
            if ($car->getIdcar() == $id) {
                return $car;
            }
        }
    }
    public function layXeTheoTen($namecompany)
    {
        foreach ($this->dscar as $car) {
            if ($car->getCompany() == $namecompany) {
                return $car;
            }
        }
    }
    public function layTenXe($id)
    {
        foreach ($this->dscar as $car) {
            if ($car->getIdcar() == $id) {
                return $car->getNamecar();
            }
        }
    }

    public function capNhatXe()
    {
        try {
            $idcar = $_POST['idcar'];
            $namecar = $_POST['namecar'];
            $bienso = $_POST['bienso'];
            $soghe = $_POST['soghe'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];
            $namecompany = $_POST['company'];

            $conn = $this->database->connect();
            $sql = "UPDATE cars
            SET namecar = '$namecar', bienso = '$bienso', soghe = $soghe, quantity = $quantity, price = $price, namecompany = '$namecompany'
            WHERE idcar=$idcar";
            $conn->exec($sql);
            // echo "<script>alert('Xóa thành công!');</script>";
            $_SESSION['thongbao'] = "Cập nhật thành công!";

        } catch (PDOException $e) {
            // Nếu có lỗi, in ra thông báo lỗi
            echo "Lỗi: " . $e->getMessage();
        }
        $this->loadSystem();
        // $this->HangXe();
        header("Location: System.php?cv=xe");
    }




    // end xe
    // start user
    public function KhachHang()
    {
        $_SESSION['active'] = "khachhang";
        include_once ("../views/admin/khachhang.php");
    }
    public function soLuongKhachHang()
    {
        return count($this->dsuser);
    }
    public function xoaKhachHang($id)
    {
        try {
            foreach($this->dshoadon as $hoadon){
                if($hoadon->getIdUser()==$id){
                    $this->xoaHoaDon($hoadon->getIdHoaDon());
                }
            }
            // $this->xoaHoaDonTheoMaKH($id);
            $this->xoaBinhLuanTheoKH($id);   
            $conn = $this->database->connect();
            $sql = "DELETE FROM users WHERE iduser = $id";
            $conn->exec($sql);
            echo "<script>alert('Xóa thành công!');</script>";
            $_SESSION['thongbao'] = "Xóa thành công!";

        } catch (PDOException $e) {
            // Nếu có lỗi, in ra thông báo lỗi
            echo "Lỗi: " . $e->getMessage();
        }
        $this->loadSystem();
        // $this->HangXe();
        header("Location: System.php?cv=khachhang");

    }
    public function layKhachHang($id)
    {
        foreach ($this->dsuser as $user) {
            if ($user->getIduser() == $id) {
                return $user;
            }
        }
    }

    //end user
    //start hoadon
    public function hoaDon()
    {
        $_SESSION['active'] = "hoadon";
        include_once ("../views/admin/dshoadon.php");
    }
    public function soLuongHoaDon()
    {
        return count($this->dshoadon);
    }
    
    public function xoaHoaDonTheoMaKH($id)
    {
        try {
            $conn = $this->database->connect();
            $sql = "DELETE FROM hoadon WHERE iduser = $id";
            $conn->exec($sql);
            // echo "<script>alert('Xóa thành công!');</script>";
            // $_SESSION['thongbao'] = "Xóa thành công!";

        } catch (PDOException $e) {
            // Nếu có lỗi, in ra thông báo lỗi
            echo "Lỗi: " . $e->getMessage();
        }
        // $this->loadSystem();
        // $this->HangXe();
        // header("Location: System.php?cv=xe");

    }
    public function laydsChiTietTheoHoaDon($id)
    {
        $ds = [];
        foreach ($this->dschitiethoadon as $chitiethoadon) {
            if ($chitiethoadon->getIdhoadon() == $id) {
                $ds[] = $chitiethoadon;
            }
        }
        return $ds;
    }
    public function layHoaDonTheoMaHoaDon($id)
    {
        foreach ($this->dshoadon as $hoadon) {
            if ($hoadon->getIdHoaDon() == $id) {
                return $hoadon;
            }
        }
    }
    public function xoaChiTietHoaDonTheoHoaDon($id)
    {
        try {
            $conn = $this->database->connect();
            $sql = "DELETE FROM chitiethoadon WHERE idhoadon = $id";
            $conn->exec($sql);
            // echo "<script>alert('Xóa thành công!');</script>";
            // $_SESSION['thongbao'] = "Xóa thành công!";

        } catch (PDOException $e) {
            // Nếu có lỗi, in ra thông báo lỗi
            echo "Lỗi: " . $e->getMessage();
        }
        // $this->loadSystem();
        // $this->HangXe();
        // header("Location: System.php?cv=xe");

    }
    public function xoaChiTietHoaDonTheoXe($id)
    {
        try {
            $conn = $this->database->connect();
            $sql = "DELETE FROM chitiethoadon WHERE idcar = $id";
            $conn->exec($sql);
            // echo "<script>alert('Xóa thành công!');</script>";
            // $_SESSION['thongbao'] = "Xóa thành công!";

        } catch (PDOException $e) {
            // Nếu có lỗi, in ra thông báo lỗi
            echo "Lỗi: " . $e->getMessage();
        }
        // $this->loadSystem();
        // $this->HangXe();
        // header("Location: System.php?cv=xe");

    }
    public function xoaHoaDon($id)
    {
        try {

            $this->xoaChiTietHoaDonTheoHoaDon($id);

            $conn = $this->database->connect();
            $sql = "DELETE FROM hoadon WHERE idhoadon = $id";
            $conn->exec($sql);
            echo "<script>alert('Xóa thành công!');</script>";
            $_SESSION['thongbao'] = "Xóa thành công!";

        } catch (PDOException $e) {
            // Nếu có lỗi, in ra thông báo lỗi
            echo "Lỗi: " . $e->getMessage();
        }
        $this->loadSystem();
        // $this->HangXe();
        header("Location: System.php?cv=hoadon");

    }
    public function xacThucThanhToan($id)
    {
        try {

            $conn = $this->database->connect();
            $sql = "UPDATE hoadon
            SET thanhtoan = 1
            WHERE idhoadon=$id";
            $conn->exec($sql);
            // echo "<script>alert('Xóa thành công!');</script>";
            $_SESSION['thongbao'] = "Đã xác thực thanh toán thành công cho hóa đơn HD-" . $id;

        } catch (PDOException $e) {
            // Nếu có lỗi, in ra thông báo lỗi
            echo "Lỗi: " . $e->getMessage();
        }
        $this->loadSystem();
        // $this->HangXe();
        header("Location: System.php?cv=hoadon&idhoadonchitiet=$id");
    }
    public function tangSoXe($id,$sl){
        try {

            $conn = $this->database->connect();
            $sql = "UPDATE cars
            SET quantity = quantity + $sl
            WHERE idcar=$id";
            $conn->exec($sql);
            // echo "<script>alert('Xóa thành công!');</script>";
            // $_SESSION['thongbao'] = "Cập nhật thành công!";

        } catch (PDOException $e) {
            // Nếu có lỗi, in ra thông báo lỗi
            echo "Lỗi: " . $e->getMessage();
        }
    }
   
    public function traXe($id)
    {
        try {
            $idcar = $_GET['idcar'];
            $sl = $_GET['sl'];
            $idhoadonchitiet = $_GET['idhoadonchitiet'];
            $conn = $this->database->connect();
            $sql = "UPDATE chitiethoadon
            SET traxe = 1
            WHERE idchitiet=$id";
            $conn->exec($sql);
            // echo "<script>alert('Xóa thành công!');</script>";
            $_SESSION['thongbao'] = "Xe thuộc hồ sơ HS-" . $id . " đã trả thành công!";
            $this->tangSoXe($idcar,$sl);



        } catch (PDOException $e) {
            // Nếu có lỗi, in ra thông báo lỗi
            echo "Lỗi: " . $e->getMessage();
        }
        $this->loadSystem();
        // $this->HangXe();
        header("Location: System.php?cv=hoadon&idhoadonchitiet=$idhoadonchitiet");
    }







    //end hoadon
    //start binhluan
    public function binhLuan()
    {
        $_SESSION['active'] = "binhluan";
        include_once ("../views/admin/binhluan.php");
    }
    public function xoaBinhLuanTheoXe($id)
    {
        try {
            $conn = $this->database->connect();
            $sql = "DELETE FROM binhluan WHERE idcar = $id";
            $conn->exec($sql);
            echo "<script>alert('Xóa thành công!');</script>";
            $_SESSION['thongbao'] = "Xóa thành công!";

        } catch (PDOException $e) {
            // Nếu có lỗi, in ra thông báo lỗi
            echo "Lỗi: " . $e->getMessage();
        }

    }
    public function xoaBinhLuanTheoKH($id)
    {
        try {
            $conn = $this->database->connect();
            $sql = "DELETE FROM binhluan WHERE iduser = $id";
            $conn->exec($sql);
            echo "<script>alert('Xóa thành công!');</script>";
            $_SESSION['thongbao'] = "Xóa thành công!";

        } catch (PDOException $e) {
            // Nếu có lỗi, in ra thông báo lỗi
            echo "Lỗi: " . $e->getMessage();
        }

    }
    public function soLuongBinhLuan()
    {
        return count($this->dsbinhluan);
    }
    public function xoaBinhLuan($id)
    {
        try {
            $conn = $this->database->connect();
            $sql = "DELETE FROM binhluan WHERE idbinhluan = $id";
            $conn->exec($sql);
            echo "<script>alert('Xóa thành công!');</script>";
            $_SESSION['thongbao'] = "Xóa thành công!";

        } catch (PDOException $e) {
            // Nếu có lỗi, in ra thông báo lỗi
            echo "Lỗi: " . $e->getMessage();
        }
        $this->loadSystem();
        // $this->HangXe();
        header("Location: System.php?cv=binhluan");

    }


    //end binhluan
    //user
    public function u_Xe()
    {
        $lists = $this->dscar;
        include_once ("../views/user/cars.php");
    }
    public function u_Home()
    {
        include_once ("../views/user/index.php");
    }
    public function u_LienHe()
    {
        include_once ("../views/user/lienhe.php");
    }
    public function u_ChiTiet()
    {
        include_once ("../views/user/chitiet.php");
    }
    public function themvaogiohang()
    {
        if (isset ($_SESSION['you'])) {

            $id = $_GET['id'];
            if (isset ($_SESSION['Cart'][$id])) {
                $soluong = $_SESSION['Cart'][$id] + 1;
                $_SESSION['Cart'][$id] = $soluong;
            } else {
                $soluong = 1;
                $_SESSION['Cart'][$id] = $soluong;
            }
            // header("location:cart.php");
            // exit();
            // print_r($_SESSION['Cart']);
            header("Location: System.php?cv=giohang");
            // session_destroy();
            // echo "Sản phẩm đã đc thêm vào giỏ hàng";
            // header("location: ../home/giohang.php");
        } else {

            $thongbao = "Vui lòng đăng nhập trước khi đặt xe!!";
            include_once ("../views/user/dangnhap.php");
        }

    }
    public function giohang()
    {
        $sid = 0;
        $first = 1;
        if (isset ($_SESSION['Cart'])) {

            foreach ($_SESSION['Cart'] as $key => $value) {
                if ($first == 1) {
                    $sid = $key;
                    $first = 0;
                } else
                    $sid = $sid . "," . $key;
            }

        }
        $conn = $this->database->connect();
        $sql = "SELECT * FROM cars where idcar in ($sid)";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $cars = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $car = new Car($row['idcar'], $row['namecar'], $row['bienso'], $row['soghe'], $row['quantity'], $row['price'], $row['namecompany']);
            $cars[] = $car;
        }

        include_once ("../views/user/giohang.php");
    }
    public function xoakhoigiohang()
    {
        $id = $_GET['id'];
        unset($_SESSION['Cart'][$id]);
        header("Location: System.php?cv=giohang");
    }
    public function cong()
    {
        $id = $_GET['id'];
        $car = $this->layXe($id);
        if ($_SESSION['Cart'][$id] < $car->getQuantity()) {
            $_SESSION['Cart'][$id] += 1;
        }

        header("Location: System.php?cv=giohang");
    }
    public function tru()
    {
        $id = $_GET['id'];
        if ($_SESSION['Cart'][$id] > 1) {
            $_SESSION['Cart'][$id] -= 1;
        }

        header("Location: System.php?cv=giohang");
    }


    // endusser
    public function dangXuat()
    {
        session_unset();
        session_destroy();
        header("Location: ../views/user/dangnhap.php");
    }
    public function thanhToan()
    {
        $_SESSION['chitiets'] = [];
        foreach ($_SESSION['Cart'] as $key => $value) {
            $idcar = $key;
            $soluong = $_SESSION['Cart'][$key];
            $ngaygiothue = date('Y-m-d H:i:s', strtotime($_POST["ngaygiothue$key"]));
            $_SESSION["ngaygiothue$key"] = $ngaygiothue;
            $ngaygiotra = date('Y-m-d H:i:s', strtotime($_POST["ngaygiotra$key"]));
            $_SESSION["ngaygiotra$key"] = $ngaygiotra;
            $chitiet = new ChiTietHoaDon(null, null, $idcar, $ngaygiothue, $ngaygiotra, 0, $soluong);
            $_SESSION['chitiets'][] = $chitiet;
        }
        include_once ("../views/user/thongtinhoadon.php");

    }
    public function layGioHang(){
        $carts = [];
        foreach ($_SESSION['Cart'] as $key => $value) {
            $idcar = $key;
            $soluong = $_SESSION['Cart'][$key];
            $ngaygiothue = date('Y-m-d H:i:s', strtotime($_SESSION["ngaygiothue$key"]));
            $ngaygiotra = date('Y-m-d H:i:s', strtotime($_SESSION["ngaygiotra$key"]));
            $chitiet = new ChiTietHoaDon(null, null, $idcar, $ngaygiothue, $ngaygiotra, 0, $soluong);
            $carts[] = $chitiet;
        }
        return $carts;
    }
    public function giamSoXe($id,$sl){
        try {

            $conn = $this->database->connect();
            $sql = "UPDATE cars
            SET quantity = quantity - $sl
            WHERE idcar=$id";
            $conn->exec($sql);
            // echo "<script>alert('Xóa thành công!');</script>";
            // $_SESSION['thongbao'] = "Cập nhật thành công!";

        } catch (PDOException $e) {
            // Nếu có lỗi, in ra thông báo lỗi
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function hoanTatThanhToan()
    {
        try {
            $iduser = $_SESSION['iduser'];
            $thoigian = date('Y-m-d H:i:s');
            $tongtien = $_SESSION['tongtien'];
            $conn = $this->database->connect();
            $sql = "INSERT INTO hoadon (iduser, thoigian, tongtien, thanhtoan)
            VALUES ('$iduser', '$thoigian', '$tongtien', 0)";
            $conn->exec($sql);
            // echo "<script>alert('Thêm thành công!');</script>";
            $_SESSION['thongbao'] = "Thêm thành công!";
            $idhoadon = $conn->lastInsertId();
            echo "HIHI";
            $carts = $this->layGioHang();
            foreach ($carts as $chitiet) {
                $chitiet->setIdhoadon($idhoadon);
                $idcar = $chitiet->getIdcar();
                $ngaygiothue = $chitiet->getNgaygiothue();
                $ngaygiotra = $chitiet->getNGaygiotra();
                $soluong = $chitiet->getGhichu();
                $sql = "INSERT INTO chitiethoadon (idhoadon, idcar, ngaygiothue, ngaygiotra,traxe,ghichu)
            VALUES ('$idhoadon', '$idcar', '$ngaygiothue', '$ngaygiotra', 0, '$soluong')";
                $conn->exec($sql);

                $this->giamSoXe($idcar,$soluong);

            }


        } catch (PDOException $e) {
            // Nếu có lỗi, in ra thông báo lỗi
            echo "Lỗi: " . $e->getMessage();
        }
        header("Location: System.php?cv=giaodich");
    }
    //start giaodich
    public function giaoDich(){
        $this->loadSystem();
        include_once ("../views/user/giaodich.php");
    }
    //end giaodich
    public function chiTietHoaDon(){
        $this->loadSystem();
        include_once ("../views/user/chitiethoadon.php");
    }
    public function trangChu(){
        include_once ("../views/admin/index.php");
    }
    public function trangHome(){
        include_once ("../views/user/index.php");
    }
    public function locXe(){
        $hangxe = $_POST['hangxe'];
        $lists = [];
        foreach($this->dscar as $car){
            if($car->getCompany()==$hangxe){
                $lists[] = $car;
            }

        }
        include_once ("../views/user/cars.php");

    }


}



$database = new Database();
$hethong = new System($database, $database->getdsUsers(), $database->getdsCompany(), $database->getdsCar(), $database->getdsHoaDon(), $database->getdsChiTietHoaDon(), $database->getdsBinhLuan());
$cv = "";
if (isset ($_GET['cv'])) {
    $cv = $_GET['cv'];
}

switch ($cv) {
    case "dangnhap":
        if ($hethong->DangNhap($_POST['email'], md5($_POST['password'])) == true) {
            if ($_SESSION['you']->getRole() == 1) {
                header("Location: System.php?cv=trangchu");

            } else {
                // header("Location: ../views/user/index.php");
                header("Location: System.php?cv=tranghome");
                // include_once ("../views/user/index.php");
            }


            // echo "<script>alert('Đăng nhập thành công!');</script>";
        } else {
            $thongbao = "Sai tên đăng nhập hoặc mật khẩu!";
            include_once ("../views/user/dangnhap.php");
        }

        break;
    case "dangky":
        $hethong->DangKy($_POST['fullname'], $_POST['email'], md5($_POST['password']), $_POST['sdt']);
        break;
    case 'hangxe':
        $hethong->HangXe();
        break;
    case 'themhangxe':
        $hethong->ThemHangXe();
        break;
    case 'xoahangxe':
        $hethong->xoaHangXe($_GET['id']);
        break;
    case 'capnhathangxe':
        $hethong->capNhatHangXe($_POST['idcompany'], $_POST['namecompany']);
        break;
    case 'xe':
        $hethong->Xe();
        break;
    case 'themxe':
        $hethong->themXe();
        break;
    case 'xoaxe':
        $hethong->xoaXe($_GET['id']);
        break;
    case 'capnhatxe':
        $hethong->capNhatXe();
        break;
    case 'khachhang':
        $hethong->KhachHang();
        break;
    case 'xoakhachhang':
        $hethong->xoaKhachHang($_GET['id']);
        break;
    case 'hoadon':
        $hethong->hoaDon();
        break;
    case 'xoahoadon':
        $hethong->xoaHoaDon($_GET['id']);
        break;
    case 'xacthucthanhtoan':
        $hethong->xacThucThanhToan($_GET['id']);
        break;
    case 'traxe':
        $hethong->traXe($_GET['id']);
        break;
    case 'binhluan':
        $hethong->binhLuan();
        break;
    case 'xoabinhluan':
        $hethong->xoaBinhLuan($_GET['id']);
        break;
    case 'u_xe':
        $hethong->u_Xe();
        break;
    case 'u_home':
        $hethong->u_Home();
        break;
    case 'u_lienhe':
        $hethong->u_LienHe();
        break;
    case 'u_chitiet':
        $hethong->u_ChiTiet();
        break;
    case 'themvaogiohang':
        $hethong->themvaogiohang();
        break;
    case 'giohang':
        $hethong->giohang();
        break;
    case 'xoakhoigiohang':
        $hethong->xoakhoigiohang();
        break;
    case 'cong':
        $hethong->cong();
        break;
    case 'tru':
        $hethong->tru();
        break;
    case 'dangxuat':
        $hethong->dangXuat();
        break;
    case 'thanhtoan':
        $hethong->thanhToan();
        break;
    case 'hoantatthanhtoan':
        $hethong->hoanTatThanhToan();
        break;
    case 'giaodich':
        $hethong->giaoDich();
        break;
    case 'chitiethoadon':
        $hethong->chiTietHoaDon();
        break;
    case 'trangchu':
        $hethong->trangChu();
        break;
    case 'tranghome':
        $hethong->trangHome();
        break;
    case 'locxe':
        $hethong->locXe();
        break;
    //Thêm các trường hợp khác nếu cần
    default:
    // Thực hiện các câu lệnh mặc định nếu không có trường hợp nào khớp
}






?>