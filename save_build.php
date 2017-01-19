<?php
include ("database.php");
session_start();
$id = $_POST['id'];
$name = $_POST['name'];
$desc = $_POST['desc'];
$freq = $_POST['freq'];

$sql = "UPDATE client_build_info SET cbi_build_name = '$name', cbi_build_description = '$desc' ,cbi_build_frequency='$freq' WHERE cbi_id = $id ";
mysql_query($sql);

echo "asdad";
?>