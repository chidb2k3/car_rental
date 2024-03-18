<?php

class Company {
    // Các thuộc tính
    private $idcompany;
    private $namecompany;

    // Constructor
    public function __construct($idcompany=null, $namecompany=null) {
        $this->idcompany = $idcompany;
        $this->namecompany = $namecompany;
    }

    // Getter và Setter cho các thuộc tính
    public function getIdCompany() {
        return $this->idcompany;
    }

    public function setIdCompany($idcompany) {
        $this->idcompany = $idcompany;
    }

    public function getNameCompany() {
        return $this->namecompany;
    }

    public function setNameCompany($namecompany) {
        $this->namecompany = $namecompany;
    }

    // Phương thức toString
    public function toString() {
        return "ID Company: " . $this->idcompany . ", Name Company: " . $this->namecompany;
    }
}
// $cp = new Company(10,"Vinfact");
// echo $cp->toString();
?>
