<?php
// PDO connect *********
function connect() {
    return new PDO('mysql:host=localhost;dbname=prgx', 'root', 'shubhamrns', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

$pdo = connect();
$field = $_POST['field'];
$value = $_POST['value'];
if ($field=="table")
{
	$sql = "SELECT distinct TableName FROM prgstats WHERE DatabaseName = '$value'";
	$query = $pdo->prepare($sql);
	//$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
	$query->execute();
	$list = $query->fetchAll();
	$arr= array ();
	
	foreach ($list as $rs) {
		// put in bold the written text
		//echo "username='".$rs['username']."'";
	
		//$arr = $rs;
	
		array_push($arr, $rs['TableName']);
		
	}
	
	echo json_encode($arr);
}
else if ($field=="field")
{
	$sql = "SELECT distinct Field FROM prgstats WHERE TableName = '$value'";
	$query = $pdo->prepare($sql);
	//$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
	$query->execute();
	$list = $query->fetchAll();
	$arr= array ();

	foreach ($list as $rs) {
		// put in bold the written text
		//echo "username='".$rs['username']."'";

		//$arr = $rs;

		array_push($arr, $rs['Field']);

	}

	echo json_encode($arr);
}


?>
