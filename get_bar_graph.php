<?php 

session_start();
include("database.php");


$query = $_POST['q'];
	$rs=mysql_query($query);
	if(mysql_num_rows($rs)>1)
	{
	$arr=array();
		while($row=mysql_fetch_array($rs))
			{
				$jsonArrayItem = array();
				$jsonArrayItem['label'] = $row[0];
				$jsonArrayItem['value'] = $row[1];
					array_push($arr,$jsonArrayItem);				
			}
	echo json_encode($arr);
	}
	
?>