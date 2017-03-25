<?php
//query for loading files ...
//select cft.cft_id, cft.cft_Delimiter, cid.ind_FileName from client_files_template as cft inner join client_inventory_details as cid on cid.cft_id = cft.cft_id 
/*******************variables************************/

/***************************************************/

/*******************includes************************/
include("database.php");


/***************************************************/

session_start();

$un = $_SESSION['username'];
handle_session();









/*******************function definations************************/

function handle_session(){
	
	if(empty($_SESSION['username'])){
		header("Location:login.php?logout=success");
	}
	
	if(!isset($_SESSION['client_name'])){
		
		
		$a = mysql_query("select c_Client from client_info order by c_Client ASC limit 1");
		$row = mysql_fetch_array($a);
		$_SESSION['client_name']= $row['c_Client'];
	}
	else{
		echo"var set";
	}
	

}

function set_header_focus($focus){
	echo "<script type='text/javascript'>
		$('.".$focus."').addClass('current-menu-item');
		</script>";
}



function set_session_client_name($client_name){
	$_SESSION['client_name']=$client_name;
}


function set_session_build_name($build_name){
	$_SESSION['build_name']=$build_name;
}

/**************************************************************/

?>	