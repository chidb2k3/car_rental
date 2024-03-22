
<?php 
// session_start(); 

 ?>
 <?php
// Kiểm tra nếu người dùng nhấp vào nút đăng xuất
if(isset($_GET['logout'])) {
    // Hủy bỏ phiên hiện tại để đăng xuất người dùng
    session_unset();
    session_destroy();
    
    // Chuyển hướng người dùng đến trang đăng nhập hoặc trang chính
    header("Location: dangnhap.php"); // Thay đổi đường dẫn tới trang đăng nhập nếu cần
    exit; // Dừng việc thực thi mã tiếp theo sau khi chuyển hướng
}
?>