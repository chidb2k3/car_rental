<?php
// include '../model/Car.php';
class Database {
    // Thông tin kết nối MySQL
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'chothuexe'; // Thay thế 'ten_database' bằng tên cơ sở dữ liệu của bạn

    // Kết nối đến cơ sở dữ liệu
    public function connect() {
        $dsn = "mysql:host={$this->host};dbname={$this->database}";
        $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        try {
            $pdo = new PDO($dsn, $this->username, $this->password, $options);
            if ($pdo) {
                // echo "<h1>Thành công</h1>";
            }
            return $pdo;
        } catch (PDOException $e) {
            die("Lỗi kết nối: " . $e->getMessage());
        }
    }

    // Lấy danh sách người dùng từ cơ sở dữ liệu
    public function getdsUsers() {
        $pdo = $this->connect();
        $sql = "SELECT iduser, fullname, email, password, sdt, email, role FROM users";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $users = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $user = new User($row['iduser'], $row['fullname'], $row['email'], $row['password'], $row['sdt'], $row['role']);
            $users[] = $user;
        }
        return $users;
    }
    // Lấy danh sách hãng xe
    public function getdsCompany() {
        $pdo = $this->connect();
        $sql = "SELECT idcompany, namecompany FROM company";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $companys = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $company = new Company($row['idcompany'], $row['namecompany']);
            $companys[] = $company;
        }
        return $companys;
    }
     // Lấy danh sách xe
     public function getdsCar() {
        $pdo = $this->connect();
        $sql = "SELECT idcar, namecar, bienso, soghe, quantity, price, namecompany FROM cars";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $cars = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $car = new Car($row['idcar'], $row['namecar'],  $row['bienso'], $row['soghe'],$row['quantity'], $row['price'], $row['namecompany']);
            $cars[] = $car;
        }
        return $cars;
    }
     // Lấy danh sách hóa đơn
     public function getdsHoaDon() {
        $pdo = $this->connect();
        $sql = "SELECT idhoadon, iduser, thanhtoan FROM hoadon";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $hoadons = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $hoadon = new HoaDon($row['idhoadon'], $row['iduser'],$row['thanhtoan']);
            $hoadons[] = $hoadon;
        }
        return $hoadons;
    }
     // Lấy danh sách hóa đơn
     public function getdsBinhLuan() {
        $pdo = $this->connect();
        $sql = "SELECT idbinhluan, iduser, idcar, noidung, danhgia FROM binhluan";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $binhluans = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $binhluan = new BinhLuan($row['idbinhluan'], $row['iduser'], $row['idcar'], $row['noidung'], $row['danhgia']);
            $binhluans[] = $binhluan;
        }
        return $binhluans;
    }
    
}

// // Sử dụng class Database để lấy danh sách người dùng
// $database = new Database();
// $ds = $database->getdsCar();
// // // Hiển thị danh sách người dùng
// foreach ($ds as $user) {
//     echo $user->toString();
// }
 ?>