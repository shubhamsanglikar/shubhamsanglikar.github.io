<?php 
session_start();
include("database.php");
if(empty($_SESSION['username'])){
	header("Location:login.php?logout=success");
}

include("header.php");
echo "<script type='text/javascript'>
		$('.2').addClass('current-menu-item');
		</script>";

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
  <div class="panel panel-default">
    <div class="panel-heading">
		<h3 >Update Build</h3>
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
			
						echo "<select id='client_select' name='client_select' class='browser-default'>";
						while($row=mysql_fetch_array($c))
						{
				
							echo "<option onclick='addBuildName(this,\"build_name_select\")' value=".$row['c_id']." >".$row['c_Client']."</option>";

						}
						echo "</select>";
						
					?>
              		</div>
        	
			
      
	   

			             	<div class="col-md-6">
					 		<label for="build_name_select">Build_ID-Build_name:</label>
					
						<select id='build_name_select' name='build_name_select' class='browser-default'>
						</select>
					
              		</div>
        	</div>
	

	  
	  <div class="container-fluid">

			<div  class="form-group input-field col-md-12">
		 
				<button id="button" name="button" type="button" class="btn btn-default">Search</button>
				
				
			<hr>
			
			</div>
			</div>
	     <div id="build_data"> </div> 
	 
			</form>
 
      </div>
	</div>	
	
</div>
 <div id="country_id_1"> </div>
 </div>
 </div>
</body>

<script type="text/javascript">
$(document).ready(function() {
    $('select').material_select();
  });


function addBuildName(d,field){
	//alert(d.value);

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
					$('#build_name_select').append("<option value='"+arr[i]['cbi_build_name']+"'>"+arr[i]['cbi_build_name']+"</option>");
				
			}
			//var sel=$('#build_name_select option:selected').val();
			//alert(sel);
			$("#button").click(function() {
				 update_build_data($('#build_name_select option:selected').val(),'show_data');
			})
		
		}
	});
	
}

function update_build_data(d,field){
	//alert(d);


	$.ajax({
		url: 'build_name_select.php',
		type: 'POST',
		data: {'field':field, 'value':d},
		success:function(data){
		//alert(data);
		var arr = jQuery.parseJSON(data);
		//alert(arr);
		var al = arr.length;
			//alert(al);
var htmltext="<div class='form-group input-field col-md-4 '>"+
"<label class='active' for='cbi_build_name'>cbi_build_name:</label>"+
"<input type='text' class='form-control' id='cbi_build_name' name='cbi_build_name' >"+

"</div>"+
"<div class='form-group input-field col-md-4'>"+
"<label class='active' for='cbi_build_description'>cbi_build_description:</label>"+
"<input type='text' class='form-control' id='cbi_build_description'name='cbi_build_description' >"+

"</div>"+

"<div class='col-md-4'>"+
"<label for='cbi_build_frequency'>cbi_build_frequency:</label>"+
"<select id='cbi_build_frequency' name='cbi_build_frequency' class='browser-default'  >"+
"<option value = 'Yearly'>Yearly</option><option value ='Monthly'>Monthly</option><option value = 'Adhoc'>Adhoc</option>"+
"</select></div>"+

"<div class='col-md-12'>"+
"<button id='save' class='btn btn-default' type='button' name = 'save'>Save</button></div>"+

"</div>";
			$('#build_data').html(htmltext);
			$("#cbi_build_name").val(arr['cbi_build_name']);
			$("#cbi_build_description").val(arr['cbi_build_description']);
			//$("#cbi_build_frequency").(arr['cbi_build_frequency']);
			$("#cbi_build_frequency").find("option[value="+arr['cbi_build_frequency']+"]").attr('selected','selected')

			$("#save").click(function() {
				 save_build_data(arr);
			})

			
			
		}
	});
	
}

function save_build_data(arr){
	
	//alert(arr);
	//arr['u_desingation']=$("#selectname option:selected").text();
	arr['cbi_build_name']=$("#cbi_build_name").val();
	arr['cbi_build_description']=$("#cbi_build_description").val();
	arr['cbi_build_frequency']=$("#cbi_build_frequency option:selected").val();
	//alert(arr[0]);
	//alert(arr['cbi_build_name']);
	//alert(arr['cbi_build_description']);
	//alert(arr['cbi_build_frequency']);
	$.ajax({
		url: 'save_build.php',
		type: 'POST',
		data: {'id':arr[0],'name':arr['cbi_build_name'],'desc':arr['cbi_build_description'],'freq':$("#cbi_build_frequency option:selected").val()},
		success:function(data){
 			//alert(data);
			var htmltext="<div class='card col-md-6'> " +
			"<div>Build information updated Sucessfully!</div>"+
			"</div>";
			$('#country_id_1').html(htmltext);
		
		}
	});
}

</script>


	
		