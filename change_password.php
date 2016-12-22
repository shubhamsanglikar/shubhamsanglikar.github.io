<?php 

session_start();
include("database.php");
$username = $_SESSION['username'];
if(empty($_SESSION['username'])){
	header("Location:login.php?logout=success");
}

include("header.php");
echo "<script type='text/javascript'>
		$('.4').addClass('current-menu-item');
		</script>";

error_reporting(0);
extract($_POST);

if(isset($submit))
{
	$check=mysql_query("select * from users where username='$username'");
	$row = mysql_fetch_array($check);
	echo "hii";
	if(strcmp($row['password'],$cp)==0)
	{
		echo $username;
		$query="update users set password = '$np' where username = '$username'";
		$check=mysql_query($query)or die(mysql_error());
		echo "alert('Password Changed Successfully')";
		header("Location:home.php");
	}
	else {
		echo "eoor";
	}
	
}

?>
<!DOCTYPE html>

<body>
<script type="text/javascript">
$(document).ready(function() {
    $('select').material_select();
  });

</script>
	<br><br>
	<div class="container">
		<div class="inner-container ">
			<div class="exam-header">
				<h4 >Client Information</h4>
			</div>
			<form name="form" method="post" action="">
			<div class="container">
				<div class="input-field col-md-5"><input id="cp" name="cp" type="password" ></input><label  for="cp">Current Password</label></div>
				<br><div class="input-field col-md-5"><input id="np" name="np" type="password" ></input><label  for="np">New Password</label></div>

			<br><br>
			
					<div><input type="submit" value="Change Password" name="submit" class="waves-effect waves-light btn"></input>
			</div>
			</div>
		</form>
	
		</div>
		</div>

</body>	
</html>