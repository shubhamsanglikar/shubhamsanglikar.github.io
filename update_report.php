<?php
// PDO connect *********
function connect() {
    return new PDO('mysql:host=localhost;dbname=prgx', 'root', 'shubhamrns', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

$pdo = connect();
$keyword = $_POST['keyword'];
$sql = "SELECT embed_code from reports where report_name = '$keyword'";
$query = $pdo->prepare($sql);
//$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();
$arr= array ();

foreach ($list as $rs) {
	// put in bold the written text
	//echo "username='".$rs['username']."'";
	
	$arr = $rs['embed_code'];
	
	echo $arr;
}

?>
