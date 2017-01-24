<?php
/*
 * 
 * 
 * input: query
 * output: array['name']
 * $.ajax({
		url: 'ajax/ajax_get_single_row_from_database.php',
		type: 'POST',
		data: {'query':" SELECT * FROM users WHERE username = 'abc' LIMIT 1 "},
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
include '../database_pdo.php';

$pdo = connect();
$query = $_POST['query'];
$query = $pdo->prepare($query);
$query->execute();
echo "success";
?>
