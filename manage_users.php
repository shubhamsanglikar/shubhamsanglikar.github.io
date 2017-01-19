<?php
include("header.php");
set_header_focus(4);
?>
<script type="text/javascript">

function onload()
{
	//document.getElementById("debug").innerHTML=temp;
	
}

</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PRGX</title>
<link rel="stylesheet" href="css/style.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/autocompleteScript.js"></script>
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

</head>

<body onload="onload()">
    <div class="container">
       
            <div class="input-field col-md-12"><input id="country_id" type="text" autocomplete="off" onkeyup="autocomplet('manage_users')"></input><label  for="country_id">Search User</label></div>
			<div id="country_list_id"></div>
		
						
    </div><!-- container -->
    
</body>
</html>
