<?php
//query for loading files ...
//select cft.cft_id, cft.cft_Delimiter, cid.ind_FileName from client_files_template as cft inner join client_inventory_details as cid on cid.cft_id = cft.cft_id 
/*******************variables************************/

/***************************************************/

session_start();
$un = $_SESSION['username'];
handle_session();







/*******************includes************************/
include("database.php");

/***************************************************/

/*******************function definations************************/

function handle_session(){
	if(empty($_SESSION['username'])){
		header("Location:login.php?logout=success");
	}

}

function set_header_focus($focus){
	echo "<script type='text/javascript'>
		$('.".$focus."').addClass('current-menu-item');
		</script>";
}

/**************************************************************/

?>	