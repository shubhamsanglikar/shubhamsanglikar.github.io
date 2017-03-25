<?php 



$cn=mysql_connect("localhost","root","") or die("Could not Connect MySql");
mysql_select_db("property",$cn)  or die("Could connect to Database");

	


$query = $_POST['q'];
$val = $_POST['val'];
	$rs=mysql_query($query);
	if(mysql_num_rows($rs)>1)
	{
	$arr=array();
		while($row=mysql_fetch_array($rs))
			{
					array_push($arr,$row[$val]);				
			}
	echo json_encode($arr);
	}
	
?>