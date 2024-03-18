<?php

class User {
    // Các thuộc tính
    private $iduser;
    private $fullname;
    private $email;
    private $password;
    private $sdt;
    private $role;

    // Constructor
    public function __construct($iduser, $fullname,$email,$password, $sdt, $role) {
        $this->iduser = $iduser;
        $this->fullname = $fullname;
        $this->password = $password;
        $this->email = $email;
        $this->sdt = $sdt;
        $this->role = $role;
    }

    // Getter và Setter cho các thuộc tính
    public function getIduser() {
        return $this->iduser;
    }

    public function setIduser($iduser) {
        $this->iduser = $iduser;
    }

    public function getFullname() {
        return $this->fullname;
    }

    public function setFullname($fullname) {
        $this->fullname = $fullname;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }


    public function getSdt() {
        return $this->sdt;
    }

    public function setSdt($sdt) {
        $this->sdt = $sdt;
    }

    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }
     public function toString() {
        return "ID: " . $this->iduser . ", Fullname: " . $this->fullname . ", Password: " . $this->password . ", Email: " . $this->email . ", Phone: " . $this->sdt . ", Role: " . $this->role;
    }
}

// // Sử dụng class User
// $user = new User(1, "John Doe", "johndoe@example.com", "password123",  "123456789", "1234567890", "user");

// // Lấy giá trị các thuộc tính
// echo $user->getFullname(); // John Doe

// // Thay đổi giá trị một thuộc tính
// $user->setFullname("Jane Doe");
// echo $user->getFullname(); // Jane Doe
// echo $user->toString();
?>
