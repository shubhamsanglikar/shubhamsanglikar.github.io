<?php
include 'database.php';
echo "haha";
if (isset($_REQUEST['query'])) {
	$query = $_REQUEST['query'];
	$sql = mysql_query ("SELECT username FROM users WHERE username LIKE '%{$query}%'");
	$array = array();
	while ($row = mysql_fetch_array($sql)) {
		$array[] = array (
				'label' => $row['username'],
				'value' => $row['username'],
		);
	}
	//RETURN JSON ARRAY
	echo json_encode ($array);
}

?>