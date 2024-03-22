<?php

class HoaDon {
    // Các thuộc tính
    private $idhoadon;
    private $iduser;
    private $thoigian;
    private $tongtien;
   
    private $thanhtoan;


    // Constructor
    public function __construct($idhoadon=null, $iduser=null,$thoigian=null, $tongtien=null, $thanhtoan=false) {
        $this->idhoadon = $idhoadon;
        $this->iduser = $iduser; 
        $this->thoigian = $thoigian;
        $this->tongtien = $tongtien;
        $this->thanhtoan = $thanhtoan;
    }

    // Getter và Setter cho các thuộc tính
    public function getIdHoaDon() {
        return $this->idhoadon;
    }

    public function setIdHoaDon($idhoadon) {
        $this->idhoadon = $idhoadon;
    }

    public function getIdUser() {
        return $this->iduser;
    }

    public function setIdUser($iduser) {
        $this->iduser = $iduser;
    }
    public function getThoigian() {
        return $this->thoigian;
    }
    public function setThoigian($thoigian) {
        $this->thoigian = $thoigian;
    }
    public function getTongtien() {
        return $this->tongtien;
    }



    public function getThanhToan() {
        return $this->thanhtoan;
    }

    public function setThanhToan($thanhtoan) {
        $this->thanhtoan = $thanhtoan;
    }


    // Phương thức toString
    public function toString() {
        return "ID Hóa Đơn: " . $this->idhoadon  . ", ID User: " . $this->iduser.", Thanh Toán: " . $this->thanhtoan;
    }
}
// $hoadon = new HoaDon(1, 101, 201, "2024-03-17 08:00:00", "2024-03-18 10:00:00", true, true, "Ghi chú cho hóa đơn");

// // Gọi phương thức toString() và hiển thị kết quả
// echo $hoadon->toString();

?>
