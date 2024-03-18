<?php
include 'Company.php';
class Car {
    // Các thuộc tính
    private $idcar;
    private $namecar;
    private $bienso;
    private $soghe;
    private $quantity;
    private $price;
    private $company;

    // Constructor
    public function __construct($idcar=null, $namecar=null, $bienso=null,$soghe = null,$quantity=null, $price=null, $company=null) {
        $this->idcar = $idcar;
        $this->namecar = $namecar;
        $this->bienso = $bienso;
        $this->soghe = $soghe;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->company = $company;
    }

    // Getter và Setter cho các thuộc tính
    public function getIdcar() {
        return $this->idcar;
    }

    public function setIdcar($idcar) {
        $this->idcar = $idcar;
    }

    public function getNamecar() {
        return $this->namecar;
    }

    public function setNamecar($namecar) {
        $this->namecar = $namecar;
    }
    public function getBienso() {
        return $this->bienso;
    }

    public function setBienso($bienso) {
        $this->bienso = $bienso;
    }
    public function getSoghe() {
        return $this->soghe;
    }

    public function setSoghe($soghe) {
        $this->soghe = $soghe;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }
    public function getCompany(){
        return $this->company;
    }
     public function setCompany($company) {
        $this->company = $company;
    }
    public function toString() {
        return "ID: " . $this->idcar . ", Name: " . $this->namecar  .", Biển số: " . $this->bienso  .
        ", Sỗ chỗ ngồi: " . $this->soghe  . ", Quantity: " . $this->quantity . ", Price: " . $this->price. ", Hãng xe: " . $this->company;
    }
}

// // Sử dụng class Car
// $com = new Company(1, "HONDa");
// $car = new Car(1, "Toyota Camry", 10, 500000, $com);

// // Lấy giá trị các thuộc tính
// echo $car->getNamecar(); // Toyota Camry
// echo $car->getPrice(); // 30000

// // Thay đổi giá trị một thuộc tính
// $car->setQuantity(10);
// echo $car->getQuantity(); // 10
// echo $car->toString();
?>
