<!-- submit_comment.php -->

<?php
session_start();
include_once("../../controller/Database.php");
include_once("../../model/BinhLuan.php");
include_once("../../model/User.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nhận dữ liệu bình luận từ phía máy khách
    $noidung = $_POST['comment'];
    $iduser = $_SESSION['iduser'];
    $idcar = $_SESSION['idcar'];
    $thoigian = date('Y-m-d H:i:s');

    $db = new Database();
    try {
        $conn = $db->connect();
        $sql = "INSERT INTO binhluan (iduser, idcar, noidung, danhgia, thoigian)
            VALUES ('$iduser', '$idcar', '$noidung', 5, '$thoigian')";

        // Thực thi câu lệnh SQL
        $conn->exec($sql);
        // echo "<script>alert('Thêm thành công!');</script>";
        // $_SESSION['thongbao'] = "Thêm thành công!";

    } catch (PDOException $e) {
        // Nếu có lỗi, in ra thông báo lỗi
        echo "Lỗi: " . $e->getMessage();
    }
    //Lưu database


    // Thực hiện lưu vào cơ sở dữ liệu hoặc nơi lưu trữ khác

    // Giả định rằng bạn có một hàm hoặc truy vấn để lưu vào cơ sở dữ liệu
    // saveCommentToDatabase($commentText);

    // Hiển thị thông tin bình luận vừa gửi
 echo '<div class="comment">';
 echo '<img src="/chothuexe/views/img/icon/user.png" alt="Avatar" class="avatar" style="width: 25px; height: 25px; border-radius: 50%;">';
 echo '<span class="username" style="font-weight: bold;">' . $_SESSION['name'] . ':</span>';
 echo '<p class="comment-text">Comment: <span style="color: blue;">' . $noidung . '<span></p>';
 echo '<span style="color: red; font-size: small;">time: '.$thoigian.'</span>';
 echo '</div>';
}
?>