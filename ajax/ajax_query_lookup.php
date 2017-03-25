<?php


include '../database_pdo.php';
$pdo = connect();

$query = $_POST['query'];
$val = $_POST['val'];

$query = $pdo->prepare($query);
//$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();

$arr= array();


	if(sizeof($list)==0)
	{
		array_push($arr, $val);
	}
	else
	{
		array_push($arr, $list[0]['name']);
	}
	array_push($arr, $val);
	
	
echo json_encode($arr);

?>
