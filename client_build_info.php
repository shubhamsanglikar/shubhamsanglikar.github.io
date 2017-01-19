<?php 
include("header.php");
set_header_focus(2);

error_reporting(0);
extract($_POST);
if(isset($submit))
{
	$check=mysql_query("select * from client_build_info where cbi_build_name='$cbi_build_name'");
	if(mysql_fetch_array($check)>0)
	{
		echo "<br><br><br><div class=head1>Build Name Already Exists</div>";
		echo mysql_num_rows($check);
		exit;
	}
	//echo "insertingg into database...";
	$query="insert into client_build_info( c_id , cbi_build_name , cbi_build_description , cbi_build_frequency ) values('$client_select' , '$cbi_build_name' , '$cbi_build_description' , '$cbi_build_frequency')"; 
	$check=mysql_query($query)or die(mysql_error());
	//echo "<br><br><br><div> Build succesfully added</div>";
	$_SESSION['cbi_build_name']=$cbi_build_name;
	
    header("Location:display_build_success.php?cbi_build_name='$cbi_build_name'");
}
?>



<!DOCTYPE html>

<body>
<script type="text/javascript">
$(document).ready(function() {
    $('select').material_select();
  });

</script>
	<div class="container-fluid">
	
		<div class="col-md-3 side-menu"><!-- ***************side-menu***************** -->
			
				<ul class="collapsible" data-collapsible="accordion">
					<li>
						<div class="collapsible-header">
							<h4 ><a href="client_build_info.php">Add</a></h4>
						</div>
						
					</li>
					
					<li>
						<div class="collapsible-header">
							<h4 ><a href="build_update.php">Modify</a></h4>
						</div>
						
					</li>
					
					<li>
						<div class="collapsible-header">
							<h4 ><a href="client_build_info_delete.php">Delete</a></h4>
						</div>
						
					</li>		
				</ul>
			
		</div>	
<div class="col-md-9 ">
<div class="container-fluid">
  <div class="panel panel-default card">
    <div class="panel-heading">
		<h3 >Client Build Info</h3>
			<a href="http://1000hz.github.io/bootstrap-validator/" target="_blank"></a>
    </div>
    <div class="panel-body">
   
			<form id="form" name="form" method="post">
			<div class="container-fluid">
	 			 
	  
             	<div class="col-md-10">
					 		<label for="Client">Client:</label>
					<?php 
						$q="select distinct c_id, c_Client from client_info";
						$c=mysql_query($q);
			
						echo "<select id='client_select' name='client_select' class='browser-default'>";
						while($row=mysql_fetch_array($c))
						{
				
							echo "<option value=".$row['c_id']." >".$row['c_Client']."</option>";

						}
						echo "</select>";
					?>
              		</div>
        	</div>
			
			
	  <hr>
		     
		  
		  
      
	  <div class="container-fluid">
	  
       
		
		<div class="form-group input-field col-md-4 ">
              <label for="cbi_build_name">cbi_build_name:</label>
              <input type="text" class="form-control" id="cbi_build_name" name="cbi_build_name" pattern="^[a-zA-Z\s]{3,}$" >
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cbi_build_description">cbi_build_description:</label>
              <input type="text" class="form-control" id="cbi_build_description" name="cbi_build_description" pattern="^[a-zA-Z\s]{3,}$" >
              
        </div>
		
		<div class="col-md-4">
              <label for="cbi_build_frequency">cbi_build_frequency:</label>
              <select id="cbi_build_frequency" name="cbi_build_frequency" class="browser-default"  >
              <option value = "Yearly">Yearly</option>
              <option value = "Monthly">Monthly</option>
              <option value = "Adhoc">Adhoc</option>
			  </select>
        </div>
        
        <div class="col-md-12">
		 	<button type="submit" class="btn btn-default" name = "submit">Save</button>
	    </div>
        
			</div>
      </form>
	
	</div>
		
</div>

</div>
</div>
</div>
</body>
</html>
