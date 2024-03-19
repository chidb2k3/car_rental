<?php 
class ChiTietHoaDon {
    private $idchitiet;
    private $idhoadon;
    private $idcar;
    private $ngaygiothue;
    private $ngaygiotra;
    private $traxe;
    private $ghichu;

    public function __construct($idchitiet, $idhoadon, $idcar, $ngaygiothue, $ngaygiotra, $traxe, $ghichu) {
        $this->idchitiet = $idchitiet;
        $this->idhoadon = $idhoadon;
        $this->idcar = $idcar;
        $this->ngaygiothue = $ngaygiothue;
        $this->ngaygiotra = $ngaygiotra;
        $this->traxe = $traxe;
        $this->ghichu = $ghichu;
    }

    public function getIdchitiet() {
        return $this->idchitiet;
    }

    public function setIdchitiet($idchitiet) {
        $this->idchitiet = $idchitiet;
    }

    public function getIdhoadon() {
        return $this->idhoadon;
    }

    public function setIdhoadon($idhoadon) {
        $this->idhoadon = $idhoadon;
    }

    public function getIdcar() {
        return $this->idcar;
    }

    public function setIdcar($idcar) {
        $this->idcar = $idcar;
    }

    public function getNgaygiothue() {
        return $this->ngaygiothue;
    }

    public function setNgaygiothue($ngaygiothue) {
        $this->ngaygiothue = $ngaygiothue;
    }

    public function getNgaygiotra() {
        return $this->ngaygiotra;
    }

    public function setNgaygiotra($ngaygiotra) {
        $this->ngaygiotra = $ngaygiotra;
    }

    public function getTraxe() {
        return $this->traxe;
    }

    public function setTraxe($traxe) {
        $this->traxe = $traxe;
    }

    public function getGhichu() {
        return $this->ghichu;
    }

    public function setGhichu($ghichu) {
        $this->ghichu = $ghichu;
    }
}

?>