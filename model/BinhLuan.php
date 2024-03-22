<?php

class BinhLuan {
    // Các thuộc tính
    private $idbinhluan;
    private $iduser;
    private $idcar;
    private $noidung;
    private $danhgia;
    private $thoigian;

    // Constructor
    public function __construct($idbinhluan=null, $iduser=null, $idcar=null, $noidung=null, $danhgia=null,$thoigian=null) {
        $this->idbinhluan = $idbinhluan;
        $this->iduser = $iduser;
        $this->idcar = $idcar;
        $this->noidung = $noidung;
        $this->danhgia = $danhgia;
        $this->thoigian = $thoigian;
    }
    public function getThoiGian(){
        return $this->thoigian;
    }
    public function setThoiGian($thoigian){
        $this->thoigian = $thoigian;
    }

    // Getter và Setter cho các thuộc tính
    public function getIdBinhLuan() {
        return $this->idbinhluan;
    }

    public function setIdBinhLuan($idbinhluan) {
        $this->idbinhluan = $idbinhluan;
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

    public function getNoiDung() {
        return $this->noidung;
    }

    public function setNoiDung($noidung) {
        $this->noidung = $noidung;
    }

    public function getDanhGia() {
        return $this->danhgia;
    }

    public function setDanhGia($danhgia) {
        $this->danhgia = $danhgia;
    }

    // Phương thức toString
    public function toString() {
        return "ID Bình Luận: " . $this->idbinhluan . ", ID Người Dùng: " . $this->iduser . ", ID Xe: " . $this->idcar . ", Nội Dung: " . $this->noidung . ", Đánh Giá: " . $this->danhgia;
    }
}
// $binhluan = new BinhLuan(1, 101, 201, "Xe rất đẹp và tiện ích", 5);

// // Gọi phương thức toString() và hiển thị kết quả
// echo $binhluan->toString();

?>
