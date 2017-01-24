<?php 
include("header.php");
set_header_focus(5);

error_reporting(0);
extract($_POST);

if(isset($submit))
{
	$username = $_SESSION['username'];

	$check=mysql_query("select * from users where username = '$username' ");
	$row = mysql_fetch_array($check);
	echo "<script type='text/javascript'> alert('".$row['password'].",".$cp."');</script>";
	if(strcmp($row['password'],$cp)==0)
	{
		if($np!="")
		{
			$query="update users set password = '$np' where username = '$username'";
			$check=mysql_query($query)or die(mysql_error());
			echo "<script type='text/javascript'> alert('Password changed successfully!');</script>";
			header("Location:dashboard.php");
		}
		else 
		{
			echo "<script type='text/javascript'><div class='col-md-12'>Please enter valid new password!<></script>";
		}
	}
	else {
		echo "<script type='text/javascript'> alert('Current password is incorrect!');</script>";
	}
	
}

?>
<!DOCTYPE html>

<body>


<script type="text/javascript">
$(document).ready(function() {
    $('select').material_select();
  });



var $form = $("form"),
$successMsg = $(".alert");
$form.validator().on("submit", function(e){
if(!e.isDefaultPrevented()){
  e.preventDefault();
  $successMsg.show();
}
});


</script>
	<br><br>
	<div class="container">
		<div class="inner-container ">
			<div class="exam-header">
				<h4 >Change Password</h4>
			</div>
			<form name="form" method="post" action="">
			<div class="container"><br>
				<div class="input-field col-md-12"><input id="cp" name="cp" type="password" value="" ></input><label  for="cp">Current Password</label></div>
				<div class="input-field col-md-12"><input id="np" name="np" type="password" ></input><label  for="np">New Password</label></div>

			<br><br>
			
					<div><input type="submit" value="Change Password" name="submit" class=" btn btn-primary"></input></div>
			</div>
		</form>
	
		</div>
		</div>

	
		
	

</body>	
</html>