<?php 

session_start();
include("database.php");
if(empty($_SESSION['username'])){
	header("Location:login.php?logout=success");
}

include("header.php");
echo "<script type='text/javascript'>
		$('.5').addClass('current-menu-item');
		</script>";

error_reporting(0);
extract($_POST);

if(isset($submit))
{
	$check=mysql_query("select * from users where username='$username'");
	if(mysql_fetch_array($check)>1	)
	{
		echo "<br><br><br><div class=head1>Username Already Exists</div>";
		exit;
	}
	$query="insert into users(username,password,u_designation) values('$username','$password','$selectname1')";
	$check=mysql_query($query)or die(mysql_error());
	echo "<br><br><div>Client successfully added</div>";
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
				<h4 >User Information</h4>
			</div>
			<form name="form" method="post" action="">
			<div class="container-fluid">
				<div class="input-field col-md-4"><input id="username" name="username" type="text" ></input><label  for="username">Username</label></div>
				
				<div class="input-field col-md-8"><input id="password" name="password" type="password" ></input><label  for="password">Password</label></div>
				
<br><br>
				
<div class="input-field col-md-8">
    <select name="selectname1">
      
      <option value="admin">Admin</option>
      <option value="technical">Technical User</option>
      <option value="business">Business User</option>
      
    </select>
  <label>Designation</label></div>
			
			<br><br>
			
					<div><input type="submit" value="Add" name="submit" class="waves-effect waves-light btn"></input>
			</div>
			</div>
		</form>
	
		</div>
		</div>

</body>	
</html>