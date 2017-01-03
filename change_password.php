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
	//echo "hii";
	if(strcmp($row['password'],$cp)==0)
	{
		if($np!="")
		{
			$query="update users set password = '$np' where username = '$username'";
			$check=mysql_query($query)or die(mysql_error());
			echo "<script type='text/javascript'> alert('Password changed successfully!');</script>";
			header("Location:home.php");
		}
		else 
		{
			echo "<script type='text/javascript'> alert('Please enter valid new password!');</script>";
		}
	}
	else {
		echo "<script type='text/javascript'> alert('Current password is incorrect!');</script>";
	}
	
}

?>
<!DOCTYPE html>

<body>

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      <a href="http://1000hz.github.io/bootstrap-validator/" target="_blank">Bootstrap Validator Plugin</a> demo
    </div>
    <div class="panel-body">
      <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Successfully submitted!</strong> The form is valid.
      </div>
      <form role="form">
        <div class="form-group input-field">
          	<label for="name">Name:</label>
          	<input type="text" class="form-control" id="name" name="name" pattern="^[a-zA-Z\s]{3,}$" required>
          	
        </div>
        <div class="form-group input-field">
          	<label for="email">Email address:</label>
          	<input type="email" class="form-control" id="email" name="email" required>
          	
        </div>
        <div class="form-group input-field">
          	<label for="email">Email address:</label>
          	<input type="email" class="form-control" id="email" name="email" required>
          	
        </div>
        <button type="submit" class="btn btn-default">Subscribec</button>
      </form>
    </div>
    
</div>
</div>











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
				<div class="input-field col-md-12"><input id="cp" name="cp" type="password" ></input><label  for="cp">Current Password</label></div>
				<div class="input-field col-md-12"><input id="np" name="np" type="password" ></input><label  for="np">New Password</label></div>

			<br><br>
			
					<div><input type="submit" value="Change Password" name="submit" class=" btn btn-primary"></input></div>
			</div>
		</form>
	
		</div>
		</div>

		
		
		
		
		
		
		
	

</body>	
</html>