<?php 
include("header.php");
set_header_focus(2);

error_reporting(0);
extract($_POST);
if(isset($submit))
{	
	echo $build_name_select;
	echo $cbp_parameter_name;
	echo $cbp_parameter_value;
	echo $cjt_ActiveStatus;
	$query="insert into client_build_parameters_template( cbi_id , c_id , cbp_parameter_name , cbp_parameter_value , cjt_EffectiveDate , cjt_CancelDate , cjt_ActiveStatus ) values($build_name_select , $client_select , '$cbp_parameter_name' , '$cbp_parameter_value' , '$cjt_EffectiveDate' , '$cjt_CancelDate' , '$cjt_ActiveStatus')";
	$a=mysql_query($query);
	if($a) 
		echo "<div class='container'><div class='card col-md-12 success_msg_div'>Parameters Added Successfully</div></div>";
	else 
		echo "asd";
}
?>



<!DOCTYPE html>

<body>
<div class="container-fluid">
	
		<div class="col-md-3 side-menu"><!-- ***************side-menu***************** -->
			
				<ul class="collapsible" data-collapsible="accordion">
					<li>
						<div class="collapsible-header">
							<h4 ><a href="client_build_parameters_template.php">Add</a></h4>
						</div>
						
					</li>
					
					<li>
						<div class="collapsible-header">
							<h4 ><a href="client_build_parameters_template_update.php">Modify</a></h4>
						</div>
						
					</li>
					
					<li>
						<div class="collapsible-header">
							<h4 ><a href="client_build_parameters_template_delete.php">Delete</a></h4>
						</div>
						
					</li>		
				</ul>
			
		</div>
		<div class="col-md-9 ">
<div class="container-fluid">
  <div class="panel panel-default">
    <div class="panel-heading">
	<h3 >Client Build Parameters Template</h3>
      <a href="http://1000hz.github.io/bootstrap-validator/" target="_blank"></a>
    </div>
    <div class="panel-body">
    							
      <form id="form" name="form" method="post">
			<div class="container-fluid">
	 			 <div class="col-md-8">
					 		<label for="client_select">Client:</label>
					<?php 
						$q="select distinct c_id, c_Client from client_info";
						$c=mysql_query($q);
			
						echo "<select id='client_select' name='client_select' class='browser-default'>";
						
						while($row=mysql_fetch_array($c))
						{
				
							echo "<option onclick='addBuildName(this,\"build_name_select\")' value=".$row['c_id']." >".$row['c_Client']."</option>";

						}
						echo "</select>";
					
					?>
              		</div>
        	
     
			             	<div class="col-md-4">
					 		<label for="Client">Build_ID-Build_name:</label>
									<select id='build_name_select' name='build_name_select' class='browser-default'>
						</select>
							</div>
        	
	  
     <br>
		<br>
		
		
		<div class="form-group input-field col-md-6">
              <label for="cbp_parameter_name">Parameter Name:</label>
              <input type="text" class="form-control" id="cbp_parameter_name" name="cbp_parameter_name" >
              
        </div>
		
		<div class="form-group input-field col-md-5">
              <label for="cbp_parameter_value">Parameter Value:</label>
              <input type="text" class="form-control" id="cbp_parameter_value" name="cbp_parameter_value" >
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cjt_EffectiveDate">Effective Date:</label>
              <input type="text" class="form-control" id="cjt_EffectiveDate" name="cjt_EffectiveDate" pattern="(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31)-?:(?:0[1-9]|1[0-2])-(?:19|20)[0-9]{2}" title="Enter in dd-mm-yy format (1990's or 2000's)">
              
              
        </div>
		
		
		
		<div class="form-group input-field col-md-4">
              <label for="cjt_CancelDate">Cancel Date:</label>
              <input type="text" class="form-control" id="cjt_CancelDate" name="cjt_CancelDate" pattern="(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31)-?:(?:0[1-9]|1[0-2])-(?:19|20)[0-9]{2}" title="Enter in dd-mm-yy format (1990's or 2000's)">
              
              
        </div>
		
		<div class="col-md-4">
              <label for="cjt_ActiveStatus">Active Status:</label>
              <select id='cjt_ActiveStatus'name='cjt_ActiveStatus' class = 'browser-default'>
			  <option value='Y'>Yes</option>
              <option value='N'>No</option>
              </select>
        </div>
		
	 
			<div  class="form-group input-field col-md-12">
		 
				<button type="submit" name="submit" class="btn btn-default">Add</button>
				
			<hr>
			
			</div>
        
	</div>
      </form>
    </div>	
    
</div>
</div>
</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('select').material_select();
  });

function addBuildName(d,field){
	alert(d.value);

	$('#build_name_select').html("");
	$.ajax({
		url: 'build_name_select.php',
		type: 'POST',
		data: {'field':field, 'value':d.value},
		success:function(data){
			//alert(data);
		var arr = jQuery.parseJSON(data);
		//alert(arr);
		var al = arr.length;
			//alert(al);
			var i=0;
			for(i = 0 ;i<al ; i++){
					$('#build_name_select').append("<option value='"+arr[i]['cbi_id']+"'>"+arr[i]['cbi_build_name']+"</option>");
				
			}
			
		}
	});
	
}

</script>
