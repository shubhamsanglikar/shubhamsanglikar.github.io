<?php
// PDO connect *********
function connect() {
    return new PDO('mysql:host=localhost;dbname=prgx', 'root', 'shubhamrns', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

$pdo = connect();
$field = $_POST['field'];
$value = $_POST['value'];
if ($field=="build_name_select")
{
	//print_r($value);
	$sql = "SELECT cbi_build_name,cbi_id FROM client_build_info WHERE c_id = '$value'";
	$query = $pdo->prepare($sql);
	//$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
	$query->execute();
	$list = $query->fetchAll();
	$arr= array ();
	
	foreach ($list as $rs) {
		// put in bold the written text
		//echo "username='".$rs['username']."'";
	
		//$arr = $rs;
	//echo $rs['cbi_build_name'];
		array_push($arr, $rs);
		
	}
	
	echo json_encode($arr);
}
else if ($field=="show_data")
{
	//print_r($value);
	$sql = "SELECT cbi_id,cbi_build_name,cbi_build_description,cbi_build_frequency FROM client_build_info WHERE cbi_build_name = '$value'";
	$query = $pdo->prepare($sql);
	//$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
	$query->execute();
	$list = $query->fetchAll();
	$arr= array ();

	foreach ($list as $rs) {
		// put in bold the written text
		//echo "username='".$rs['username']."'";

		//$arr = $rs;
		//array_push($arr, $rs);

	}

	echo json_encode($rs);
}

?>