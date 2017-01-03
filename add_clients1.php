<?php 
session_start();
include("database.php");
if(empty($_SESSION['username'])){
	header("Location:login.php?logout=success");
}

include("header.php");
echo "<script type='text/javascript'>
		$('.1').addClass('current-menu-item');
		</script>";

error_reporting(0);
extract($_POST);
if(isset($submit))
{
	$check=mysql_query("select * from client_info where c_id='$c_id'");
	if(mysql_fetch_array($check)>10)
	{
		echo "<br><br><br><div class=head1>Client Id Already Exists</div>";
		echo mysql_num_rows($check);
		exit;
	}
	echo "insertingg into database...";
	$query="insert into client_info(c_id,client,clienttype,description,shortname,country,location,otherdetails,effectivedate,endDate,createDate,activeflag) values('$c_id','$client','$clienttype','$description','$shortname','$country','$location','$otherdetails','$effectivedate','$enddate','$createdate','$activeflag')"; 
	$check=mysql_query($query)or die(mysql_error());
	echo "<br><br><br><div> Client succesfully added</div>";
	header("Location:client_load_template.php");
	echo "$effectivedate";
}
?>
<!DOCTYPE html>		
		<script type="text/javascript">
		function validate()
		{	
			alert($("#clienttype").val());
			//alert("fooooghj");
			if($.isNumeric($("#c_id").val())==false || $("#c_id").val()=="")
			{
				$('span[for="c_id"]').text("Enter a valid input");
				
			}
			else
			{
				$('span[for="c_id"]').text("");
			}
			
			
			if($.isAlphaNumeric($("#client").val())==false || $("#client").val()=="")
			{
				$('span[for="client"]').text("Enter a valid input");
			}
			else
			{
				$('span[for="client"]').text("");
			}
			
			
			
			
			if($("#clienttype").val()=="a")
			{
				
				if($.isAlphaNumeric($("#clienttype").val())==false)
				{
					alert("fghj");
					$('span[for="clienttype"]').text("Enter a valid input");
				}
				else
				{
					alert("fghjghjk");
					$('span[for="clienttype"]').text("");
				}
			}
			
			
			
	/*		if($("#client").val()!="")
			{
				if($.isAlphaNumeric($("#client").val())==false)
				{
					$('span[for="client"]').text("Enter a valid input");
				}
				else
				{
					$('span[for="client"]').text("");
				}
			}   */		
			
			
			
			if($("#description").val()!="")
			{
				if($.isAlphaNumeric($("#description").val())==false)
				{
					$('span[for="description"]').text("description");
				}
				else
				{
					$('span[for="description"]').text("");
				}
			}
			
			
			
			
			if($("#otherdetails").val()!="")
			{
				if($.isAlphaNumeric($("#otherdetails").val())==false)
				{
					$('span[for="otherdetails"]').text("Enter a valid input");
				}
				else
				{
					$('span[for="otherdetails"]').text("");
				}
			}
			
			
			
		/*	if($("#effectivedate").val()!="")
			{
				if(typeof() === 'string' || $.isAlphaNumeric($("#effectivedate").val())==false)
				{
					$('span[for="effectivedate"]').text("Enter a valid input");
				}
				else
				{
					$('span[for="effectivedate"]').text("");
				}
			} */
			
			
			
			if($("#activeflag").val()!="")
			{
				if($.isAlphaNumeric($("#activeflag").val())==false)
				{
					$('span[for="activeflag"]').text("Enter a valid input");
				}
				else
				{
					$('span[for="activeflag"]').text("");
				}
			}
			
			
			
			if($("#shortname").val()!="")
			{
				if($.isAlphaNumeric($("#shortname").val())==false)
				{
					$('span[for="shortname"]').text("Enter a valid input");
				}
				else
				{
					$('span[for="shortname"]').text("");
				}
			}
			
			
			
			if($("#country").val()!="")
			{
				if(typeof $("#country").val() === 'string')
				{
					$('span[for="country"]').text("");
				}
				else
				{
					$('span[for="country"]').text("Enter a valid string");
				}
			}
			
			
			
			if($("#location").val()!="")
			{
				if($.isAlphaNumeric($("#location").val())==false)
				{
					$('span[for="location"]').text("Enter a valid input");
				}
				else
				{
					$('span[for="location"]').text("");
				}
			}
		}		
		</script>
		
		<body>
	<br><br>
	<div class="container">
		<div class="inner-container ">
			<div class="exam-header">
				<h4 >Client Information</h4>
			</div>
			<form name="myform" id="myform" method="post" action="client_load_template.php">
				<div class="container-fluid">
					<div class="input-field col-md-4"><input id="c_id" name="c_id" type="text" onfocusout="validate()" ></input><label  for="c_id">Client ID</label><span for= "c_id" style = "color:red; padding:0px">temp</span>
					</div>
				
					<div class="input-field col-md-8"><input id="clienttype" name="clienttype" type="text" onfocusout="validate()"></input><label  for="clienttype">Client Type</label><span for= "clienttype" style = "color:red; padding:0px"></span></div>   
				
					<div class="input-field col-md-12"><input id="client" name="client" type="text" onfocusout="validate()"></input><label  for="client">Client</label><span for= "client" style = "color:red; padding:0px"></span></div>
				
					<div class="input-field col-md-12"><input id="description" name="description" type="text" onfocusout="validate()"></input><label  for="description">Description</label><span for= "description" style = "color:red; padding:0px"></span></div>
				
					<div class="input-field col-md-4"><input id="shortname" name="shortname"type="text" onfocusout="validate()"></input><label for="shortname">Short Name</label><span for= "shortname" style = "color:red; padding:0px"></span></div>
				
					<div class="input-field col-md-4"><input id="country" name="country" type="text" onfocusout="validate()"></input><label  for="country">Country</label><span for= "country" style = "color:red; padding:0px"></span></div>
				
					<div class="input-field col-md-4"><input id="location" name="location" type="text" onfocusout="validate()"></input><label for="location">Location</label><span for= "location" style = "color:red; padding:0px"></span></div>
				
					<div class="input-field col-md-12"><input id="otherdetails" name="otherdetails" type="text" onfocusout="validate()"></input><label for="otherdetails">Other Details</label><span for= "otherdetails" style = "color:red; padding:0px"></span></div>
				
					<div class="input-field col-md-12"><input id="effectivedate" name="effectivedate" type="text" placeholder ="please enter in dd-mm-yyyy format" onfocusout="validate()"></input><label for="effectivedate">Effective Date</label><span for= "effectivedate" style = "color:red; padding:0px"></span></div>
				
					
					
				
					<div>End Date<input id="enddate" name="enddate" type="date" ></input><label for="enddate"></label></div>
				
					<div class="input-field col-md-5"><input id="activeflag" name="activeflag" type="text" onfocusout="validate()"></input><label for="activeflag">Active Flag</label><span for= "activeflag" style = "color:red; padding:0px"></span></div>
			
			</div>
			
			<br>
			<input type="submit" value="Add" name="submit" class="waves-effect waves-light btn" onsubmit="validate1()" ></input>
			
		</form>
		
	
	</div>
	</div>
	
	<!--219 <div>Effective Date<input id="effectivedate" name="effectivedate" type="date" ></input><label for="effectivedate"></label></div> 
				
					<div>Create Date<input id="createdate" name="createdate" type="date" ></input><label for="createdate"></label></div> -->
	
<!--	
	<br><br>
	<div class="container">
		<div class="inner-container">
			<div class="exam-header">
				<h4 >Client Load</h4>
			</div>
			<form name="form" method="post" action="">
			<div class="container-fluid">
			
	//		<?php 
	//		$q="select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME='client_load_template'";
	//		$c=mysql_query($q);
			
	//		while($row=mysql_fetch_array($c))
	//		{
				//echo $row['COLUMN_NAME'];
			
			
				
	//			echo "<div class='input-field col-md-4'><input type='text' id='".$row['COLUMN_NAME']."1'";
	//			if($row['COLUMN_NAME']=="clt_id"){echo "value = 'test'";}
	//			echo " name=".$row['COLUMN_NAME']."></input><label for=".$row['COLUMN_NAME']."1".">".$row['COLUMN_NAME']."</label></div>";
	//		}	
	// --> 		?>	
			</div>
			
			<br>
							<input type="submit" value="Add" name="submit"class="waves-effect waves-light btn"></input>
			
		</form>
		
	
		</div>
	
	</div>   --> 
 	
				
	 
</body>




   

    <!-- Bootsrap javascript file -->
    <script src="assets/js/bootstrap.min.js"></script>
	<!-- javascript validation file -->
	<!-- <script src="gen_validatorv4.js" type="text/javascript"></script> -->
    

</html>