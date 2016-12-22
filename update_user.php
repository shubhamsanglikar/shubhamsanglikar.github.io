<?php
// PDO connect *********
include ("database.php");
session_start();
$username = $_POST['username'];
$u_designation = $_POST['u_designation'];
$id = $_POST['id'];

$sql = "UPDATE users SET username = '$username', u_designation = '$u_designation' WHERE user_id = $id ";
mysql_query($sql);

if($_SESSION['username']==$username)
{$_SESSION['designation']=$u_designation;
}
?>