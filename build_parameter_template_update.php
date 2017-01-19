<?php
// PDO connect *********
function connect() {
    return new PDO('mysql:host=localhost;dbname=prgx', 'root', 'shubhamrns', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}
session_start();
$pdo = connect();
$field = $_POST['field'];
$value = $_POST['value'];

//echo $value;
if ($field=="parameter_name_select")
{
	//print_r($value);
	$sql = "SELECT cbp_parameter_name FROM client_build_parameters_template WHERE cbi_id = '$value'";
	$query = $pdo->prepare($sql);
	//$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
	$query->execute();
	$list = $query->fetchAll();
	$arr= array ();
	
	foreach ($list as $rs) {
		// put in bold the written text
		//echo "username='".$rs['username']."'";
	
		//$arr = $rs;
		//echo $rs['cbp_parameter_name'];
		array_push($arr, $rs['cbp_parameter_name']);
		
	}
	
	echo json_encode($arr);
}

else if ($field=="build_parameter_data")
{
	//print_r($value);
	$id=$_POST['id'];
	$sql = "SELECT * FROM client_build_parameters_template WHERE cbp_parameter_name = '$value' and cbi_id = $id ";
	$query = $pdo->prepare($sql);
	//$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
	$query->execute();
	$list = $query->fetchAll();
	echo json_encode($list);
}

else if ($field=="save_parameter_data")
{
	//print_r($value);
	$b_id = $_POST['id'];
	$name = $_POST['name'];
	$val = $_POST['val'];
	$can = $_POST['can'];
	$eff = $_POST['eff'];
	$status = $_POST['status'];
	
	$sql = "UPDATE client_build_parameters_template SET cbp_parameter_name = '$name', cbp_parameter_value = '$val' ,cjt_EffectiveDate = '$eff',cjt_CancelDate ='$can',cjt_ActiveStatus = '$status' WHERE cbp_parameter_name = '$value' and cbi_id = $b_id";
	$query = $pdo->prepare($sql);
	//$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
	$query->execute();
	
}
?>