<?php
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
                session_start();
                $_SESSION['you'] = $user;
                $_SESSION['name'] = $user->getFullname();
                return true;
            }
        }
        return false;

    }
    public function taiKhoanTonTai($email) : bool{
        foreach ($this->dsuser as $user) {
            if ($user->getEmail()==$email) {
                return true;
            }
        }
        return false;

    }
    public function DangKy($fullname, $email, $password, $sdt)
    {
        if($this->taiKhoanTonTai($email)==true){
            $thongbao = "Email đã tồn tại!!!!!";
            include_once("../views/user/dangky.php");
        }else{
            try {
                $conn = $this->database->connect();
                $sql = "INSERT INTO users (fullname, email, password, sdt, role)
                VALUES ('$fullname', '$email', '$password', $sdt, 0)";
    
                // Thực thi câu lệnh SQL
                $conn->exec($sql);
                $thongbao = "Đăng ký thành công!! Vui lòng đăng nhập để tiếp tục.";
                include_once("../views/user/dangnhap.php");
            } catch (PDOException $e) {
                // Nếu có lỗi, in ra thông báo lỗi
                echo "Lỗi: " . $e->getMessage();
            }
    
        }

        


    }

}

$database = new Database();
$hethong = new System($database, $database->getdsUsers(), $database->getdsCompany(), $database->getdsCar(), $database->getdsHoaDon(), $database->getdsBinhLuan());
// $hethong -> xemdsCompanys();
// $hethong -> xemdsUsers();
// $hethong->xemdsCars();
// $hethong->xemdsHoaDons();
// $hethong->xemdsBinhLuans();




if (isset ($_GET['cv'])) {
    $cv = $_GET['cv'];
}
switch ($cv) {
    case "dangnhap":
        if ($hethong->DangNhap($_POST['email'], md5($_POST['password'])) == true) {
            if($_SESSION['you']->getRole()==1){
                include_once("../views/admin/index.php");

            }else{
                header("Location: ../views/user/index.php");
            }
            
            
            echo "<script>alert('Đăng nhập thành công!');</script>";
        } else {
            $thongbao = "Sai tên đăng nhập hoặc mật khẩu!";
            include_once("../views/user/dangnhap.php");
        }

        break;
    case "dangky":
        $hethong->DangKy($_POST['fullname'], $_POST['email'], md5($_POST['password']),$_POST['sdt']);
        break;
    //Thêm các trường hợp khác nếu cần
    default:
    // Thực hiện các câu lệnh mặc định nếu không có trường hợp nào khớp
}



?>