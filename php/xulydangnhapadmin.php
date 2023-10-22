<?php
session_start();
$taikhoan=$_POST['data_username'];
$matkhau=md5($_POST['data_password']);
require ("../connection/db_connection.php");
$db = new db_connection();
$db->connect();
$taikhoan = mysqli_escape_string($db->conn, $taikhoan);
$matkhau = mysqli_escape_string($db->conn, $matkhau);
$sql = "SELECT * FROM nguoidung WHERE TaiKhoan = '$taikhoan' and Matkhau = '$matkhau' and MaQuyen !=1 and TrangThai =1";
$da = $db->get_list($sql);
if(sizeof($da)> 0){
    $_SESSION['currentUser'] = $da[0];
    echo 'yes';
}
else echo'no';
$db->dis_connect();
?>