<!-- load_comments.php -->


<?php
session_start();
include_once("../../controller/Database.php");
include_once("../../model/BinhLuan.php");
include_once("../../model/User.php");


$idcar = $_SESSION['idcar'];

$db = new Database();
$dsBinhLuan= $db -> getdsBinhLuan();
$dsUser = $db->getdsUsers();
function layTen($id){
    $db = new Database();
    $dsUser = $db->getdsUsers();
    foreach($dsUser as $user){
        if($user->getIduser()==$id){
            return $user->getFullname();
        }
    }
    
}
    //Lưu database


    // Thực hiện lưu vào cơ sở dữ liệu hoặc nơi lưu trữ khác

    // Giả định rằng bạn có một hàm hoặc truy vấn để lưu vào cơ sở dữ liệu
    // saveCommentToDatabase($commentText);

    // Hiển thị thông tin bình luận vừa gửi
    // Hiển thị bình luận
foreach ($dsBinhLuan as $binhluan) {
    if($binhluan->getIdCar() == $idcar){
        $name= layTen($binhluan->getIdUser());
        echo '<div class="comment">';
        echo '<img src="/chothuexe/views/img/icon/user.png" alt="Avatar" class="avatar" style="width: 25px; height: 25px; border-radius: 50%;">';
        echo '<span class="username"  style="font-weight: bold;">' . $name . ':</span>';
        echo '<p class="comment-text">Comment: <span style="color: blue;">' . $binhluan->getNoiDung() . '<span></p>';
        echo '<span style="color: red; font-size: small;">time: '.$binhluan->getThoiGian().'</span>
        ';
        echo '</div>';
    }
    
 }




 ?>
