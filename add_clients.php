<?php 
session_start();
include("database.php");




error_reporting(0);
extract($_POST);
if(isset($submit))
{
	$check=mysql_query("select * from client_info where c_id='$clientid'");
	if(mysql_num_rows($check)>0)
	{
		echo "<br><br><br><div class=head1>Client Id Already Exists</div>";
		exit;
	}
	echo "insertingg into database...";
	$query="insert into client_info(c_id,c_Client,c_ClientType,c_Description,c_ShortName,c_Country,c_Location,c_OtherDetails,c_EffectiveDate,c_EndDate,c_CreateDate,c_ActiveFlag) values('$clientid','$client','$clienttype','$description','$shortname','$country','$location','$otherdetails','$effectivedate','$enddate','$createdate','$activeflag')"; 
	$check=mysql_query($query)or die(mysql_error());
	echo "<br><br><br><div> Client succesfully added</div>";
	echo "$effectivedate";
}
?>
<!DOCTYPE html>
<?php 
include("header.php");
echo "<script type='text/javascript'>
		$('.1').addClass('current-menu-item');
		</script>";
?>
	
	<br><br>
	<div class="container">
		<div class="inner-container ">
			<div class="exam-header">
				<h4 >Client Information</h4>
			</div>
			<form name="form" method="post" action="">
			<div class="container-fluid">
				<div class="input-field col-md-4"><input id="c_id" name="clientid" type="text" ></input><label  for="c_id">Client ID</label></div>
				
				<div class="input-field col-md-8"><input id="c_ClientType" name="clienttype" type="text" ></input><label  for="c_ClientType">Client Type</label></div>
				
				<div class="input-field col-md-12"><input id="c_Client" name="client" type="text" ></input><label  for="c_Client">Client</label></div>
				
				<div class="input-field col-md-12"><input id="c_Description" name="description" type="text"></input><label  for="c_Description">Description</label></div>
				
				<div class="input-field col-md-4"><input id="c_ShortName" name="shortname"type="text"></input><label for="c_ShortName">Short Name</label></div>
				
				<div class="input-field col-md-4"><input id="c_Country" name="country" type="text" ></input><label  for="c_Country">Country</label></div>
				
				<div class="input-field col-md-4"><input id="c_Location" name="location" type="text" ></input><label for="c_Location">Location</label></div>
				
				<div class="input-field col-md-12"><input id="c_OtherDetails" name="otherdetails" type="text" ></input><label for="c_OtherDetails">Other Details</label></div>
				
				<div>Effective Date<input id="c_EffectiveDate" name="effectivedate" type="date" ></input><label for="c_EffectiveDate"></label></div>
				
				<div>Create Date<input id="c_CreateDate" name="createdate" type="date" ></input><label for="c_CreateDate"></label></div>
				
				<div>End Date<input id="c_EndDate" name="enddate" type="date" ></input><label for="c_EndDate"></label></div>
				
				<div class="input-field col-md-5"><input id="c_ActiveFlag" name="activeflag" type="text" ></input><label for="c_ActiveFlag">Active Flag</label></div>
			
			</div>
			
			<br>
							<input type="submit" value="Add" name="submit" class="waves-effect waves-light btn"></input>
			
		</form>
	
		</div>
	
	</div>    
	</div>
	<br><br>
	<div class="container">
		<div class="inner-container">
			<div class="exam-header">
				<h4 >Client Load</h4>
			</div>
			<form name="form" method="post" action="">
			<div class="container-fluid">
			
			<?php 
			$q="select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='client_load_template'";
			$c=mysql_query($q);
			
			while($row=mysql_fetch_array($c))
			{
				//echo $row['COLUMN_NAME'];
			
			
				
				echo "<div class='input-field col-md-4'><input type='text' id='".$row['COLUMN_NAME']."1'";
				if($row['COLUMN_NAME']=="clt_id"){echo "value = 'test'";}
				echo " name=".$row['COLUMN_NAME']."></input><label for=".$row['COLUMN_NAME']."1".">".$row['COLUMN_NAME']."</label></div>";
			}	
			?>	
			</div>
			
			<br>
							<input type="submit" value="Add" name="submit"class="waves-effect waves-light btn"></input>
			
		</form>
		
	
		</div>
	
	</div>    
 	
				
	 
</body>




   

    <!-- Bootsrap javascript file -->
    <script src="assets/js/bootstrap.min.js"></script>
    

</html>