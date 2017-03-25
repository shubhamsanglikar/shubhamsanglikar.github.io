<?php
/*
 * 
 * 
 * client_name 
 * build_name
 *
 * $.ajax({
		url: 'ajax/ajax_set_session_varibles.php',
		type: 'POST',
		data: {'name':'','value':''},
		success:function(data){
		}
	});
 * 
 * 
 * 
 * 
 * 
 * 
 */
//include '../database_pdo.php';

//$pdo = connect();
//$_SESSION[$_POST['name']]=$_POST['value'];
echo json_encode($_POST['name']);
?>
