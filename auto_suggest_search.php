<?php
// PDO connect *********
function connect() {
    return new PDO('mysql:host=localhost;dbname=prgx', 'root', 'shubhamrns', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

$pdo = connect();
$keyword = '%'.$_POST['keyword'].'%';
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
			echo "<div class='col-md-9' style='margin:10px'>";
			echo '<div onclick="set_item(\''.str_replace("'", "\'", $rs['username']).'\')">'.$user_name.'</div>';
			echo "</div>";
			
			
}

echo "<br></div>";
?>