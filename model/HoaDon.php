<?php

class HoaDon {
    // Các thuộc tính
    private $idhoadon;
    private $iduser;
    private $idcar;
    private $ngaygiothue;
    private $ngaygiotra;
    private $traxe;
    private $thanhtoan;
    private $ghichu;

    // Constructor
    public function __construct($idhoadon=null, $iduser=null, $idcar=null, $ngaygiothue=null, $ngaygiotra=null, $traxe=false, $thanhtoan=false, $ghichu=0) {
        $this->idhoadon = $idhoadon;
        $this->iduser = $iduser;
        $this->idcar = $idcar;
        $this->ngaygiothue = $ngaygiothue;
        $this->ngaygiotra = $ngaygiotra;
        $this->traxe = $traxe;
        $this->thanhtoan = $thanhtoan;
        $this->ghichu = $ghichu;
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

    public function getIdCar() {
        return $this->idcar;
    }

    public function setIdCar($idcar) {
        $this->idcar = $idcar;
    }

    public function getNgayGioThue() {
        return $this->ngaygiothue;
    }

    public function setNgayGioThue($ngaygiothue) {
        $this->ngaygiothue = $ngaygiothue;
    }

    public function getNgayGioTra() {
        return $this->ngaygiotra;
    }

    public function setNgayGioTra($ngaygiotra) {
        $this->ngaygiotra = $ngaygiotra;
    }

    public function getTraXe() {
        return $this->traxe;
    }

    public function setTraXe($traxe) {
        $this->traxe = $traxe;
    }

    public function getThanhToan() {
        return $this->thanhtoan;
    }

    public function setThanhToan($thanhtoan) {
        $this->thanhtoan = $thanhtoan;
    }

    public function getGhiChu() {
        return $this->ghichu;
    }

    public function setGhiChu($ghichu) {
        $this->ghichu = $ghichu;
    }

    // Phương thức toString
    public function toString() {
        return "ID Hóa Đơn: " . $this->idhoadon . ", ID Người Dùng: " . $this->iduser . ", ID Xe: " . $this->idcar . ", Ngày Giờ Thuê: " . $this->ngaygiothue . ", Ngày Giờ Trả: " . $this->ngaygiotra . ", Trả Xe: " . $this->traxe . ", Thanh Toán: " . $this->thanhtoan . ", Ghi Chú: " . $this->ghichu;
    }
}
// $hoadon = new HoaDon(1, 101, 201, "2024-03-17 08:00:00", "2024-03-18 10:00:00", true, true, "Ghi chú cho hóa đơn");

// // Gọi phương thức toString() và hiển thị kết quả
// echo $hoadon->toString();

?>
