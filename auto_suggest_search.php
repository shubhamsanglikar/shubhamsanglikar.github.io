<?php
// PDO connect *********
function connect() {
    return new PDO('mysql:host=localhost;dbname=prgx', 'root', 'shubhamrns', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

$pdo = connect();
$keyword = '%'.$_POST['keyword'].'%';

if( strcmp("manage_users",$_POST['temp'])== 0)
{
	$sql = "SELECT * FROM users WHERE username LIKE (:keyword) ORDER BY username ASC LIMIT 0, 10";
	$query = $pdo->prepare($sql);
	$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
	$query->execute();
	$list = $query->fetchAll();
	echo "<div class='card col-md-12'>";
	foreach ($list as $rs) {
		// put in bold the written text
		$user_name = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['username']);
		// add new option
		//echo '<li onclick="set_item(\''.str_replace("'", "\'", $rs['username']).'\')">'.$user_name.'</li>';
		echo "<div class='col-md-12 listbox' style='margin:5px'>";
		echo '<div onclick="set_item(\''.str_replace("'", "\'", $rs['username']).'\')">'.$user_name.'</div>';
		echo "</div>";
			
			
	}
	
	echo "<br></div>";
}
else 
{
	$sql = "SELECT * FROM client_info WHERE c_Client LIKE (:keyword) ORDER BY c_Client ASC LIMIT 0, 10";
	$query = $pdo->prepare($sql);
	$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
	$query->execute();
	$list = $query->fetchAll();
	echo "<div class='card col-md-12'>";
	foreach ($list as $rs) {
		// put in bold the written text
		$user_name = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['c_Client']);
		// add new option
		//echo '<li onclick="set_item(\''.str_replace("'", "\'", $rs['username']).'\')">'.$user_name.'</li>';
		echo "<div class='col-md-9 listbox' style='margin:10px'>";
		echo '<div onclick="set_item(\''.str_replace("'", "\'", $rs['c_Client']).'\')">'.$user_name.'</div>';
		echo "</div>";
			
			
	}
	
	echo "<br></div>";
}

?>