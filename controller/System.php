<?php
session_start();
include '../model/User.php';
include '../model/Car.php';
include '../model/BinhLuan.php';
include '../model/HoaDon.php';
include 'Database.php';

class System
{
    // Các thuộc tính
    private $dsuser; // Mảng các đối tượng User
    private $dscompany; // Mảng các đối tượng Company
    private $dscar; // Mảng các đối tượng Car
    private $dshoadon; // Mảng các đối tượng HoaDon
    private $dsbinhluan; // Mảng các đối tượng BinhLuan
    private $database;

    // Constructor
    public function __construct($database, $dsuser, $dscompany, $dscar, $dshoadon, $dsbinhluan)
    {
        $this->dsuser = $dsuser;
        $this->dscompany = $dscompany;
        $this->dscar = $dscar;
        $this->dshoadon = $dshoadon;
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
          
            $this->xoaXeTheoHang($this->tenHangXe($id));

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
                if (file_exists("../views/img/xes/" . $filename)) {
                    echo $filename . " đã tồn tại.";
                } else {
                    $carend = end($this->dscar);
                    $tenanh = $carend->getIdcar() + 1;
                    $filename = "$tenanh.png";

                    //echo $_FILES["photo"]["tmp_name"];
                    if (move_uploaded_file($_FILES["photo"]["tmp_name"], "../views/img/xes/" . $filename)) { // có thể có lỗi
                        echo "Tệp của bạn đã được tải lên thành công.";
                    } else {
                        echo "Lỗi: không thể di chuyển tệp đến upload/";
                    }
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
    public function xoaXeTheoHang($namecompany)
    {
        try {
            $conn = $this->database->connect();
            $sql = "DELETE FROM cars WHERE namecompany = '$namecompany'";
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
    public function layXe($id)
    {
        foreach ($this->dscar as $car) {
            if ($car->getIdcar() == $id) {
                return $car;
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

}



$database = new Database();
$hethong = new System($database, $database->getdsUsers(), $database->getdsCompany(), $database->getdsCar(), $database->getdsHoaDon(), $database->getdsBinhLuan());
$cv = "";
if (isset ($_GET['cv'])) {
    $cv = $_GET['cv'];
}

switch ($cv) {
    case "dangnhap":
        if ($hethong->DangNhap($_POST['email'], md5($_POST['password'])) == true) {
            if ($_SESSION['you']->getRole() == 1) {
                header("Location: ../views/admin/index.php");

            } else {
                header("Location: ../views/user/index.php");
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
    //Thêm các trường hợp khác nếu cần
    default:
    // Thực hiện các câu lệnh mặc định nếu không có trường hợp nào khớp
}






?>