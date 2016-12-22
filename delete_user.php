<?php

include ("database.php");
session_start();

$id = $_POST['id'];

$sql = "delete from users WHERE user_id = $id ";
mysql_query($sql);

?>