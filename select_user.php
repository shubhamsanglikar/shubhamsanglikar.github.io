<?php
// PDO connect *********
function connect() {
    return new PDO('mysql:host=localhost;dbname=prgx', 'root', 'shubhamrns', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

$pdo = connect();
$keyword = $_POST['keyword'];
$sql = "SELECT * FROM users WHERE username = '$keyword' LIMIT 1";
$query = $pdo->prepare($sql);
//$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();

foreach ($list as $rs) {
	// put in bold the written text
	echo "username='".$rs['username']."'";
	echo "<div class='card col-md-12'>";
	
	echo "<div class='col-md-11' style='margin:10px'>";
	echo "<div class='text-center col-md-12' ><b>".$rs['username']."</b></div>";
	echo "<div class='text-center col-md-6' ><button class='btn-primary' onclick='update_user();'><i class='fa fa-pencil' aria-hidden='true'> </i> Edit</button></div>";
	echo "<div class='text-center col-md-6' ><button class='btn-primary'><i class='fa fa-times' aria-hidden='true'> </i> Delete</button></div>";
	echo "</div>";
	
	echo "</div>";

	echo "<br></div>";
}

?>