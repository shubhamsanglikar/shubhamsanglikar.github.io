<?php 

session_start();
include("../database.php");

$threshold = 5;
$query = $_POST['query'];
$query2 = $_POST['query_bm'];
	$rs=mysql_query($query);
	if(mysql_num_rows($rs)>1)
	{
		$main_arr = array();
	$arr=array();
	$jsonArrayItem_ser = array();
	$arr_ser=array();
		while($row=mysql_fetch_array($rs))
			{
				$jsonArrayItem = array();
				
				//$jsonArrayItem['label'] = $row[1];
				$jsonArrayItem['label'] = $row[0];
				$jsonArrayItem_ser['value'] = $row[1];
					array_push($arr,$jsonArrayItem);	
					array_push($arr_ser,$jsonArrayItem_ser);
			}
			array_push($main_arr, $arr);
			array_push($main_arr, $arr_ser);
			
			
			
			
	$rs1 = mysql_query($query2);	
	if(mysql_num_rows($rs1)>1)
	{
		$arr_bm = array();
		$cnt = 0;
		while($row=mysql_fetch_array($rs1))
		{
			
			$jsonArrayItem_bm = array();
			
			$jsonArrayItem_bm['value'] = $row[1];
			if($row[1]-$threshold < $arr_ser[$cnt]['value'] && $arr_ser[$cnt]['value'] < $row[1]+$threshold){
				$jsonArrayItem_bm['color'] = "#999900";
			}
			
			array_push($arr_bm,$jsonArrayItem_bm);
			$cnt=$cnt+1;
		}
	
		array_push($main_arr, $arr_bm);
			
			
	}
			
	echo json_encode($main_arr);
	}
	
?>