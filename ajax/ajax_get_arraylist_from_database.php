<?php


/*
 * 
 * input: query - string, select-value
 * output: json encoded array 
 * implementation:
 *  $.ajax({
				url: 'ajax/ajax_get_arraylist_from_database.php',
				type: 'POST',
				data: {'query': "SELECT cbi_build_name from client_build_info", 'val':'cbi_build_name'},
				success:function(data){
					var arr = jQuery.parseJSON(data);
					var al = arr.length;
					var i=0;
					for(i = 0 ;i < al ; i++){	
						$('#build_select').append("<option value='"+arr[i]+"'>"+arr[i]+"</option>");
					}
					
					
				}
			});
 * 
 * 
 * 
 * 
 */
include '../database_pdo.php';
$pdo = connect();

$query = $_POST['query'];
$val = $_POST['val'];

$query = $pdo->prepare($query);
//$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();

$arr= array();

foreach ($list as $rs) {

	array_push($arr, $rs[$val]);
	
}
echo json_encode($arr);

?>
