<?php
/*
 * 
 * 
 * input: query
 * output: array['name']
 * $.ajax({
		url: 'ajax/ajax_get_single_row_from_database.php',
		type: 'POST',
		data: {query:" SELECT * FROM users WHERE username = 'abc' LIMIT 1 "},
		success:function(data){
		var arr = jQuery.parseJSON(data);
		
		var des= arr[0]['name'];
			
		}
	});
 * 
 * 
 * 
 * 
 * 
 * 
 */
function connect() {
    return new PDO('mysql:host=localhost;dbname=prgx', 'root', 'shubhamrns', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

$pdo = connect();
$query = $_POST['query'];
$query = $pdo->prepare($query);
$query->execute();
$list = $query->fetchAll();
$arr= array ();

foreach ($list as $rs) {
	
	$arr = $rs;
	
}
echo json_encode($list);
?>
