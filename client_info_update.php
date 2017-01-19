<?php
include("header.php");
set_header_focus(1);

?>

<!DOCTYPE html>

<body>

	<div class="container-fluid">
	
		<div id="side_menu" class="col-md-3 side-menu"><!-- ***************side-menu***************** -->
			
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
		<h3 >Update Clients Information</h3>
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
				
							echo "<option onclick='show_options(this)' value=".$row['c_id']." >".$row['c_Client']."</option>";

						}
						echo "</select>";
					?>
              		</div>
        	</div>
        	<div id="show_option" >
        	
        	</div>
			
			
			<div id="ajax_display_div">
			</div>
			
			<div id="client_load_template_div">
			
			</div>
			
		
</form></div></div></div>
</div>
</div>
</body>
<script>

$(document).ready(function() {
    $('select').material_select();
  });


function show_options(d){
	alert(d.value);


var htmltext="<div class='col-md-12'>"+
"<button id='client_info' class='btn btn-default' type='button' name = 'client_info'>Client_Info</button>&nbsp;"+
"<button id='client_load_template' class='btn btn-default' type='button' name = 'client_load_template'>Client_Load_Template</button>&nbsp;"+
"<button id='client_files_template' class='btn btn-default' type='button' name = 'client_files_template'>Client_Files_Template</button>&nbsp;"+

"</div>";
			
			$("#show_option").html(htmltext);
			$("#client_info").click(function() {
				 show_client_info_data(d.value);
			})

			$("#client_load_template").click(function() {
				 select_client_load_template(d.value);
			})

			$("#client_files_template").click(function() {
				 show_client_template_data(d.value);
			})
				
}

function show_client_info_data(d){
	//alert(d);	
	$.ajax({
		url: 'ajax/ajax_get_single_row_from_database.php',
		type: 'POST',
		data: {'query':"SELECT * FROM client_info WHERE c_id ="+d+" LIMIT 1" },
		success:function(data){
		alert(data);
		var arr = jQuery.parseJSON(data);
		//alert(arr);
		
var htmltext="  <div class='panel-heading'>"+
"<h3 >Table : client_info </h3></div>"+
"<form role='form' id='form' name='form' method='post' action='client_load_template.php'>"+
"<div class='container-fluid'>"+

	
	"<div class='form-group input-field col-md-4'>"+
         "<label class='active' for='c_Client'>c_Client:</label>"+
         "<input type='text' class='form-control' id='c_Client' name='c_Client' pattern='[A-Z]([A-Z0-9]*[a-z][a-z0-9]*[A-Z]|[a-z0-9]*[A-Z][A-Z0-9]*[a-z])[A-Za-z0-9]*' title='Enter in CamelCase e.g SouthAmerica'>"+
         
   "</div>"+
	
	"<div class='form-group input-field col-md-4'>"+
         "<label class='active' for='c_ClientType'>c_ClientType:</label>"+
         "<input type='text' class='form-control' id='c_ClientType' name='c_ClientType' pattern='[a-zA-Z0-9\s]{0,}$' >"+
         
   "</div>"+
	
	"<div class='form-group input-field col-md-4'>"+
         "<label class='active' for='c_Description'>c_Description:</label>"+
         "<input type='text' class='form-control' id='c_Description' name='c_Description' pattern='[a-zA-Z0-9\s]{0,}$' >"+
         
   "</div>"+
	
	"<div class='form-group input-field col-md-4'>"+
         "<label class='active' for='c_ShortName'>c_ShortName:</label>"+
         "<input type='text' class='form-control' id='c_ShortName' name='c_ShortName' pattern='[A-Z\s]{0,}' title='Uppercase only e.g ABC'>"+
         
   "</div>"+
		
	"<div class='form-group input-field col-md-4'>"+
         "<label class='active' for='c_Country'>c_Country:</label>"+
         "<input type='text' class='form-control' id='c_Country' name='c_Country' pattern='[A-Z\s]{0,}' title='Uppercase only e.g ABC' >"+
         
   "</div>"+
	
	"<div class='form-group input-field col-md-4'>"+
         "<label class='active' for='c_Location'>c_Location:</label>"+
         "<input type='text' class='form-control' id='c_Location' name='c_Location' pattern='[A-Z\s]{0,}' title='Uppercase only e.g ABC'>"+
         
   "</div>"+
	
	"<div class='form-group input-field col-md-4'>"+
         "<label class='active' for='c_OtherDetails'>c_OtherDetails:</label>"+
         "<input type='text' class='form-control' id='c_OtherDetails' name='c_OtherDetails' pattern='[a-zA-Z0-9\s]' >"+
      
   "</div>"+
	
	"<div class='form-group input-field col-md-4'>"+
         "<label class='active' for='c_EffectiveDate'>c_EffectiveDate:</label>"+
         "<input type='text' class='form-control' id='c_EffectiveDate' name='c_EffectiveDate' pattern='(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31)-?:(?:0[1-9]|1[0-2])-(?:19|20)[0-9]{2}' title='Enter in dd-mm-yy format (1990's or 2000's)'>"+
         
   "</div>"+
	
	"<div class='form-group input-field col-md-4'>"+
         "<label class='active' for='c_EndDate'>c_EndDate:</label>"+
         "<input type='text' class='form-control' id='c_EndDate' name='c_EndDate' pattern='(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31)-?:(?:0[1-9]|1[0-2])-(?:19|20)[0-9]{2}' title='Enter in dd-mm-yy format (1990's or 2000's)'>"+
         
  " </div>"+
	
	"<div class='form-group input-field col-md-4'>"+
         "<label class='active' for='c_CreateDate'>c_CreateDate:</label>"+
         "<input type='text' class='form-control' id='c_CreateDate' name='c_CreateDate' pattern='(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31)-?:(?:0[1-9]|1[0-2])-(?:19|20)[0-9]{2}' title='Enter in dd-mm-yy format (1990's or 2000's)'>"+
         
   "</div>"+
	
	"<div class='form-group input-field col-md-4'>"+
         "<label class='active' for='c_ActiveFlag'>c_ActiveFlag:</label>"+
         "<input type='text' class='form-control' id='c_ActiveFlag' name='c_ActiveFlag' pattern='[0-1]{1}' title='Please enter either 0 or 1' value='1'>"+
         
   "</div>"+
	
	
	
   
"</div>"+
"<button id='save' type='button' name='save' class='btn btn-default'>Save</button>"+
"</div></form>";
			//$('#ajax_display_div').load('div_client_update.php #client_info_fields_div');
			//alert(arr[0]['c_id']);
			$('#ajax_display_div').html(htmltext);
			
			$("#c_Client").val(arr[0]['c_Client']);
			$("#c_ClientType").val(arr[0]['c_ClientType']);
			$("#c_Description").val(arr[0]['c_Description']);
			$("#c_ShortName").val(arr[0]['c_ShortName']);
			$("#c_Country").val(arr[0]['c_Country']);
			$("#c_Location").val(arr[0]['c_Location']);
			$("#c_EndDate").val(arr[0]['c_EndDate']);
			$("#c_CreateDate").val(arr[0]['c_CreateDate']);
			$("#c_ActiveFlag").val(arr[0]['c_ActiveFlag']);
			
						
			$("#save").click(function() {
				 update_client_data(arr);
			})
			
		}
	});
	
}

function update_client_data(arr){

	//arr['u_desingation']=$("#selectname option:selected").text();
	arr[0]['c_Client']=$("#c_Client").val();
	arr[0]['c_Description']=$("#c_Description").val();
	arr[0]['c_ShortName']=$("#c_ShortName").val();
	arr[0]['c_Country']=$("#c_Country").val();
	arr[0]['c_Location']=$("#c_Location").val();
	arr[0]['c_EndDate']=$("#c_EndDate").val();
	arr[0]['c_CreateDate']=$("#c_CreateDate").val();
	arr[0]['c_ActiveFlag']=$("#c_ActiveFlag").val();
	//alert(arr[0]);
	alert(arr[0]['c_Client']);
	alert(arr[0]['c_Description']);
	//alert(arr['cbi_build_frequency']);
	$.ajax({
		url: 'ajax/insert_into_database.php',
		type: 'POST',
		data: {query:"UPDATE client_info SET c_Client = '"+arr[0]['c_Client']+"', c_Description ='"+arr[0]['c_Description']+"' ,c_ShortName ='"+arr[0]['c_ShortName']+"' ,c_Country ='"+arr[0]['c_Country']+"' ,c_Location ='"+arr[0]['c_Location']+"' ,c_EndDate ='"+arr[0]['c_EndDate']+"',c_CreateDate ='"+arr[0]['c_CreateDate']+"' , c_ActiveFlag='"+arr[0]['c_ActiveFlag']+"' WHERE c_id = "+arr[0]['c_id']+" "},
		success:function(data){
		alert(data);
			
		}
	});
}

function select_client_load_template(d){
	alert(d);	
	$.ajax({
		url: 'ajax/ajax_get_arraylist_from_database.php',
		type: 'POST',
		data: {'query': "SELECT clt_id from client_load_template WHERE c_id="+d , 'val':'clt_id'},
		success:function(data){
			alert(data);
			var arr = jQuery.parseJSON(data);
			var al = arr.length;
			var i=0;
			var htmltext1="<label for='load_select'>Client_load_template ID:</label>"+
			"<select id='load_select' name='load_select' class='browser-default'>"+
			"</select>"+
			"<button id='search2' type='button' name='search2' class='btn btn-default'>Search</button>";
			$('#ajax_display_div').html(htmltext1);
			for(i = 0 ;i < al ; i++){	
				$('#load_select').append("<option value='"+arr[i]+"'>"+arr[i]+"</option>");
			}
			
			$("#search2").click(function() {
				 update_client_data(arr);
			})
			
		}
	});
	
}



</script>
