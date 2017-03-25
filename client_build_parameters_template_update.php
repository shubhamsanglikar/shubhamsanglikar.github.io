<?php 
include("header.php");
set_header_focus(2);

error_reporting(0);
extract($_POST);

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
		<h3 >Update Build Parameters Template</h3>
			<a href="http://1000hz.github.io/bootstrap-validator/" target="_blank"></a>
    </div>
    <div class="panel-body">
    						
			
			<form id="form" name="form" method="post">
			<div class="container-fluid">
	 			 
	  
             	<div class="col-md-6">
					 		<label for="client_select">Client:</label>
					<?php 
						$q="select distinct c_id, c_Client from client_info";
						$c=mysql_query($q);
			
						echo "<select id='client_select' name='client_select' onchange='addBuildName(this,\"build_name_select\")' class='browser-default'>";
						while($row=mysql_fetch_array($c))
						{
				
							echo "<option value=".$row['c_id']." >".$row['c_Client']."</option>";

						}
						echo "</select>";
						
					?>
              		</div>
        	
			
      
	   

			             	<div class="col-md-6">
					 		<label for="build_name_select">Build_ID-Build_name:</label>
					
						<select id='build_name_select' name='build_name_select' onchange='addParameterName(this)' class='browser-default'>
						
						</select>
					
              		</div>
			             	<div class="col-md-6">
					 		<label for="parameter_name_select">Parameters_name:</label>
					
						<select id='parameter_name_select' name='parameter_name_select' class='browser-default'>
						<option value="Not Selected"></option>
						</select>
					
              		</div>
              		</div>
	

	  
	  <div class="container-fluid">

			<div  class="form-group input-field col-md-12">
		 
				<button id="button1" name="button" type="button" class="btn btn-default">Search</button>
				
				
			<hr>
			
			</div>
			</div>
	     <div id="build_parameter"> </div> 
	 
			</form>
  <div class="success_msg_div" id="country_id_1"> </div>
      </div>
	</div>	
	
</div>
</div>
</div>
</body>

<script type="text/javascript">
$(document).ready(function() {
    $('select').material_select();
});


function addBuildName(d,field){
	//alert(d.value);

	//$('#build_name_select').html("");
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


function addParameterName(d){
	//alert(d.value);
	var field = "parameter_name_select";
	var id=d.value;
	$('#parameter_name_select').html("");
	$.ajax({
		url: 'build_parameter_template_update.php',
		type: 'POST',
		data: {'field':field, 'value':id},
		success:function(data){
			//alert(data);
		var arr = jQuery.parseJSON(data);
		alert(arr);
		var al = arr.length;
			//alert(al);
			var i=0;
			for(i = 0 ;i<al ; i++){
					$('#parameter_name_select').append("<option value='"+arr[i]+"'>"+arr[i]+"</option>");
				
			}
			//var sel=$('#build_name_select option:selected').val();
			//alert(sel);
			$("#button1").click(function() {
				 update_build_data(id,$('#parameter_name_select option:selected').val(),'build_parameter_data');
			})
		
		}
	});
	
}




function update_build_data(a,d,field){
	alert(d);
	
	$.ajax({
		url: 'build_parameter_template_update.php',
		type: 'POST',
		data: {'field':"build_parameter_data", 'value':d ,'id':a},
		success:function(data){
		//alert(data);
		var arr = jQuery.parseJSON(data);
		//alert(arr[0]['cbp_parameter_name']);
var htmltext="<div class='form-group input-field col-md-6'>"+
"<label class='active' for='cbp_parameter_name'>Parameter Name:</label>"+
"<input type='text' class='form-control' id='cbp_parameter_name' name='cbp_parameter_name' >"+

"</div>"+

"<div class='form-group input-field col-md-5'>"+
"<label  class='active' for='cbp_parameter_value'>Parameter Value:</label>"+
"<input type='text' class='form-control' id='cbp_parameter_value' name='cbp_parameter_value' >"+

"</div>"+

"<div class='form-group input-field col-md-4'>"+
"<label class='active' for='cjt_EffectiveDate'>Effective Date:</label>"+
"<input type='text' class='form-control' id='cjt_EffectiveDate' name='cjt_EffectiveDate' pattern='(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31)-?:(?:0[1-9]|1[0-2])-(?:19|20)[0-9]{2}' title='Enter in dd-mm-yy format (1990's or 2000's)'>"+

"</div>"+

"<div class='form-group input-field col-md-4'>"+
"<label class='active' for='cjt_CancelDate'>Cancel Date:</label>"+
"<input type='text' class='form-control' id='cjt_CancelDate' name='cjt_CancelDate' pattern='(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31)-?:(?:0[1-9]|1[0-2])-(?:19|20)[0-9]{2}' title='Enter in dd-mm-yy format (1990's or 2000's)'>"+

"</div>"+

"<div class='col-md-4'>"+
"<label for='cjt_ActiveStatus'>Active Status:</label>"+
"<select id='cjt_ActiveStatus'name='cjt_ActiveStatus' class = 'browser-default'>"+
"<option value='Y'>Yes</option><option value='N'>No</option>"+
"</select></div>"+


"<div  class='form-group input-field col-md-12'>"+
	"<button type='button' id='save' name='save' class='btn btn-default'>Save</button><hr>"+
"</div>";
			$('#build_parameter').html(htmltext);
			$("#cbp_parameter_name").val(arr[0]['cbp_parameter_name']);
			$("#cbp_parameter_value").val(arr[0]['cbp_parameter_value']);
			$("#cjt_EffectiveDate").val(arr[0]['cjt_EffectiveDate']);
			$("#cjt_CancelDate").val(arr[0]['cjt_CancelDate']);
			$("#cjt_ActiveStatus").val(arr[0]['cjt_ActiveStatus']);

			$("#save").click(function() {
				 save_build_parameter_data(arr,'save_parameter_data');
			})

			
			
		}
	});
	
}

function save_build_parameter_data(arr,field){
	
	//alert(arr);
	//arr['u_desingation']=$("#selectname option:selected").text();
	var value=arr[0]['cbp_parameter_name'];
	arr[0]['cbp_parameter_name']=$("#cbp_parameter_name").val();
	arr[0]['cbp_parameter_value']=$("#cbp_parameter_value").val();
	arr[0]['cjt_EffectiveDate']=$("#cjt_EffectiveDate").val();
	arr[0]['cjt_CancelDate']=$("#cjt_CancelDate").val();
	arr[0]['cjt_ActiveStatus']=$("#cjt_ActiveStatus option:selected").val();
	//alert(field);
	alert(arr[0]['cbi_id']);
	alert(arr[0]['cbp_parameter_name']);
	//alert(arr[0]['cbp_parameter_value']);
	//alert(arr[0]['cjt_ActiveStatus']);
	alert(value);
	$.ajax({
		url: 'build_parameter_template_update.php',
		type: 'POST',
		data: {'field':field,'value':value,'id':arr[0]['cbi_id'],'name':arr[0]['cbp_parameter_name'],'val':arr[0]['cbp_parameter_value'],'can':arr[0]['cjt_CancelDate'],'eff':arr[0]['cjt_EffectiveDate'],'status':arr[0]['cjt_ActiveStatus']},
		success:function(data){
 			alert(data);
			var htmltext="<div class='card col-md-6'> " +
			"<div>Build information updated Sucessfully!</div>"+
			"</div>";
			$('#country_id_1').html(htmltext);
		
		}
	});
}

</script>

