<?php
// PDO connect *********
include 'database_pdo.php';

$pdo = connect();

$sql = "SELECT embed_code from reports where report_name = 'sample_null_values'";
$query = $pdo->prepare($sql);
//$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();
$arr= array ();

foreach ($list as $rs) {
	// put in bold the written text
	//echo "username='".$rs['username']."'";
	
	echo json_encode($rs['embed_code']);
	
	
}

?>
