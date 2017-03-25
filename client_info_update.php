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
							<h4 ><a href="add_clients.php">Add</a></h4>
						</div>
						
					</li>
					
					<li>
						<div class="collapsible-header">
							<h4 ><a href="client_info_update.php">Modify</a></h4>
						</div>
						
					</li>
					
					<li>
						<div class="collapsible-header">
							<h4 ><a href="client_info_delete.php">Delete</a></h4>
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
						echo "<option value:''>Select Client</option>";
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
			
			<div id="client_files_template_select">
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
				select_client_load_template_files(d.value);
			})
				
}

function show_client_info_data(d){
	//alert(d);	
	$("#client_load_template_div").html("");
	$("#client_files_template_select").html("");
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
"<form role='form' id='form' name='form' method='post'>"+
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
	//alert(d);	
	$("#client_load_template_div").html("");
	$("#client_files_template_select").html("");
	$.ajax({
		url: 'ajax/ajax_get_arraylist_from_database.php',
		type: 'POST',
		data: {'query': "SELECT clt_id from client_load_template WHERE c_id="+d , 'val':'clt_id'},
		success:function(data){
			//alert(data);
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
			//alert($("#load_select option:selected").val());
			$("#search2").click(function() {
				 show_client_load_template_data($("#load_select option:selected").val());
			})
			
		}
	});
	
}

function show_client_load_template_data(d){
	//alert(d);	
	$.ajax({
		url: 'ajax/ajax_get_single_row_from_database.php',
		type: 'POST',
		data: {'query':"SELECT * FROM client_load_template WHERE clt_id ='"+d+"' LIMIT 1" },
		success:function(data){
		//alert(data);
		var arr = jQuery.parseJSON(data);
		//alert(arr[0]['c_id']);
		
var htmltext="<div class='panel-heading'>"+
"<h3 >Table : client_load_template </h3></div>"+
"<form id='form' name='form'>"+
"<div class='container-fluid'>"+

"<div class='form-group input-field col-md-4'>"+
      "<label class='active' for='clt_no'>clt_no:</label>"+
      "<input type='number' readOnly='true' class='form-control' id='clt_no' name='clt_no' pattern='[0-9]' min='0' max='99999999999'>"+
      
"</div>"+

"<div class='form-group input-field col-md-4'>"+
"<label class='active' for='c_id'>c_id:</label>"+
"<input type='number' readOnly='true' class='form-control' id='c_id' name='c_id' pattern='[0-9]' min='0' max='99999999999'>"+

"</div>"+

"<div class='form-group input-field col-md-4'>"+
      "<label class='active' for='clt_id'>clt_id:</label>"+
      "<input type='text' readOnly='true' class='form-control' id='clt_id' name='clt_id' pattern='^[a-zA-Z0-9\s]{3,}$' maxlength='10' >"+
      
"</div>"+

"<div class='form-group input-field col-md-4'>"+
      "<label class='active' for='c_ShortName'>c_ShortName:</label>"+
      "<input type='text' readOnly='true' class='form-control' id='c_ShortName' name='c_ShortName' pattern='^[a-zA-Z\s]{3,}$' >"+
      
"</div>"+

"<div class='form-group input-field col-md-4'>"+
      "<label class='active' for='clt_FileConvention'>clt_FileConvention:</label>"+
      "<input type='text' class='form-control' id='clt_FileConvention' name='clt_FileConvention' pattern='^[a-zA-Z\s]{3,}$' >"+
      
"</div>"+

"<div class='form-group input-field col-md-4'>"+
      "<label class='active' for='clt_FileDescription'>clt_FileDescription:</label>"+
      "<input type='text' class='form-control' id='clt_FileDescription' name='clt_FileDescription' pattern='^[a-zA-Z\s]{3,}$' >"+
      
"</div>"+

"<div class='form-group input-field col-md-4'>"+
      "<label class='active' for='clt_LoadType'>clt_LoadType:</label>"+
      "<input type='text' class='form-control' id='clt_LoadType' name='clt_LoadType' pattern='^[a-zA-Z\s]{3,}$' >"+
      
"</div>"+

"<div class='form-group input-field col-md-4'>"+
      "<label class='active' for='clt_CDMSBatch'>clt_CDMSBatch:</label>"+
      "<input type='text' class='form-control' id='clt_CDMSBatch' name='clt_CDMSBatch' pattern='^[a-zA-Z\s]{3,}$' >"+
      
"</div>"+

"<div class='form-group input-field col-md-4'>"+
      "<label class='active' for='clt_ReceiveFrequency'>clt_ReceiveFrequency:</label>"+
      "<input type='text' class='form-control' id='clt_ReceiveFrequency' name='clt_ReceiveFrequency' pattern='^[a-zA-Z\s]{3,}$' >"+
      
"</div>"+

"<div class='form-group input-field col-md-4'>"+
      "<label class='active' for='clt_LoadFrequency'>clt_LoadFrequency:</label>"+
      "<input type='text' class='form-control' id='clt_LoadFrequency' name='clt_LoadFrequency' pattern='^[a-zA-Z\s]{3,}$' >"+
      
"</div>"+

"<div class='form-group input-field col-md-4'>"+
      "<label class='active' for='clt_WFilePath'>clt_WFilePath:</label>"+
      "<input type='text' class='form-control' id='clt_WFilePath' name='clt_WFilePath' pattern='^[a-zA-Z\s]{3,}$' >"+
      
"</div>"+

"<div class='form-group input-field col-md-4'>"+
      "<label class='active' for='clt_SFilePath'>clt_SFilePath:</label>"+
      "<input type='text' class='form-control' id='clt_SFilePath' name='clt_SFilePath' pattern='^[a-zA-Z\s]{3,}$' >"+
      
"</div>"+

"<div class='form-group input-field col-md-4'>"+
      "<label class='active' for='clt_filetype'>clt_filetype:</label>"+
      "<input type='text' class='form-control' id='clt_filetype' name='clt_filetype' pattern='^[a-zA-Z\s]{3,}$' >"+
      
"</div>"+

"<div class='form-group input-field col-md-4'>"+
      "<label class='active' for='clt_FolderShortName'>clt_FolderShortName:</label>"+
      "<input type='text' class='form-control' id='clt_FolderShortName' name='clt_FolderShortName' pattern='^[a-zA-Z\s]{3,}$' >"+
      
"</div>"+

"<div class='form-group input-field col-md-4'>"+
      "<label class='active' for='clt_ClientLoadPriority'>clt_ClientLoadPriority:</label>"+
      "<input type='number' class='form-control' id='clt_ClientLoadPriority' name='clt_ClientLoadPriority' pattern='^[a-zA-Z\s]{3,}$' min='0' max='99999999999'>"+
      
"</div>"+

"<div class='form-group input-field col-md-4'>"+
      "<label class='active' for='clt_FileLoadPriority'>clt_FileLoadPriority:</label>"+
      "<input type='number' class='form-control' id='clt_FileLoadPriority' name='clt_FileLoadPriority' pattern='^[a-zA-Z\s]{3,}$' min='0' max='99999999999'>"+
      
"</div>"+

"<div class='form-group input-field col-md-4'>"+
      "<label class='active' for='clt_TableName'>clt_TableName:</label>"+
      "<input type='text' class='form-control' id='clt_TableName' name='clt_TableName' pattern='^[a-zA-Z\s]{3,}$' >"+
      
"</div>"+

"<div class='form-group input-field col-md-4'>"+
      "<label class='active' for='clt_DataBaseName'>clt_DataBaseName:</label>"+
      "<input type='text' class='form-control' id='clt_DataBaseName' name='clt_DataBaseName' pattern='^[a-zA-Z\s]{3,}$' >"+
      
"</div>"+

"<div class='form-group input-field col-md-4'>"+
      "<label class='active' for='clt_DBServerName'>clt_DBServerName:</label>"+
      "<input type='text' class='form-control' id='clt_DBServerName' name='clt_DBServerName' pattern='^[a-zA-Z\s]{3,}$' >"+
      
"</div>"+

"<div class='form-group input-field col-md-4'>"+
      "<label class='active' for='clt_RenameString'>clt_RenameString:</label>"+
      "<input type='text' class='form-control' id='clt_RenameString' name='clt_RenameString' pattern='^[a-zA-Z\s]{3,}$' >"+
      
"</div>"+

"<div class='form-group input-field col-md-4'>"+
      "<label class='active' for='clt_FileEncoding'>clt_FileEncoding:</label>"+
      "<input type='text' class='form-control' id='clt_FileEncoding' name='clt_FileEncoding' pattern='^[a-zA-Z\s]{3,}$'>"+
      
"</div>"+

"<div class='form-group input-field col-md-4'>"+
      "<label class='active' for='clt_LRFilePath'>clt_LRFilePath:</label>"+
      "<input type='text' class='form-control' id='clt_LRFilePath' name='clt_LRFilePath' pattern='^[a-zA-Z\s]{3,}$'>"+
      
"</div>"+

"<div class='form-group input-field col-md-4'>"+
      "<label class='active' for='clt_EffectiveDate'>clt_EffectiveDate:</label>"+
      "<input type='text' class='form-control' id='clt_EffectiveDate' name='clt_EffectiveDate' pattern='(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))'>"+
      
"</div>"+

"<div class='form-group input-field col-md-4'>"+
      "<label class='active' for='clt_EndDate'>clt_EndDate:</label>"+
      "<input type='text' class='form-control' id='clt_EndDate' name='clt_EndDate' pattern='^[a-zA-Z\s]{3,}$'>"+
      
"</div>"+

"<div class='form-group input-field col-md-4'>"+
      "<label class='active' for='clt_CreateDate'>clt_CreateDate:</label>"+
      "<input type='text' class='form-control' id='clt_CreateDate' name='clt_CreateDate' pattern='^[a-zA-Z\s]{3,}$'>"+
      
"</div>"+

"<div class='form-group input-field col-md-4'>"+
      "<label class='active' for='clt_isActive'>clt_isActive:</label>"+
      "<input type='number' class='form-control' id='clt_isActive' name='clt_isActive' pattern='[0-1]{1}' title='Please enter either 0 or 1' placeholder='Enter either 0 or 1 only'>"+
      
"</div>"+

"<div class='form-group input-field col-md-4'>"+
      "<label class='active' for='clt_ViewName'>clt_ViewName:</label>"+
      "<input type='text' class='form-control' id='clt_ViewName' name='clt_ViewName' pattern='^[a-zA-Z\s]{3,}$'>"+
      
"</div>"+

"<div class='form-group input-field col-md-4'>"+
      "<label class='active' for='clt_Attribute2'>clt_Attribute2:</label>"+
      "<input type='text' class='form-control' id='clt_Attribute2' name='clt_Attribute2' pattern='^[a-zA-Z\s]{3,}$'>"+
      
"</div>"+

"<div class='form-group input-field col-md-4'>"+
      "<label class='active' for='clt_Attribute3'>clt_Attribute3:</label>"+
      "<input type='number' class='form-control' id='clt_Attribute3' name='clt_Attribute3' pattern='^[a-zA-Z\s]{3,}$' min='0' max='99999999999'>"+
      
"</div>"+

"<div class='form-group input-field col-md-4'>"+
      "<label class='active' for='clt_Attribute4'>clt_Attribute4:</label>"+
      "<input type='text' class='form-control' id='clt_Attribute4' name='clt_Attribute4' pattern='^[a-zA-Z\s]{3,}$' min='0' max='9'>"+
      
"</div><br><br>"+


"<button type='button' id='save1' name='save1' class='btn btn-default'>Save</button>"+
"</div>"+
"</form>";
			//$('#ajax_display_div').load('div_client_update.php #client_info_fields_div');
			//alert(arr[0]['c_id']);
			$('#client_load_template_div').html(htmltext);

			
			$("#clt_no").val(arr[0]['clt_no']);
			$("#clt_id").val(arr[0]['clt_id']);
			$("#c_id").val(arr[0]['c_id']);
			$("#c_ShortName").val(arr[0]['c_ShortName']);
			$("#clt_FileConvention").val(arr[0]['clt_FileConvention']);	
			$("#clt_FileDescription").val(arr[0]['clt_FileDescription']);
			$("#clt_LoadType").val(arr[0]['clt_LoadType']);
			$("#clt_CDMSBatch").val(arr[0]['clt_CDMSBatch']);
			$("#clt_ReceiveFrequency").val(arr[0]['clt_ReceiveFrequency']);
			$("#clt_LoadFrequency").val(arr[0]['clt_LoadFrequency']);
			$("#clt_WFilePath").val(arr[0]['clt_WFilePath']);
			$("#clt_SFilePath").val(arr[0]['clt_SFilePath']);
			$("#clt_filetype").val(arr[0]['clt_filetype']);
			$("#clt_FolderShortName").val(arr[0]['clt_FolderShortName']);
			$("#clt_ClientLoadPriority").val(arr[0]['clt_ClientLoadPriority']);
			$("#clt_FileLoadPriority").val(arr[0]['clt_FileLoadPriority']);
			$("#clt_TableName").val(arr[0]['clt_TableName']);
			$("#clt_DataBaseName").val(arr[0]['clt_DataBaseName']);
			$("#clt_DBServerName").val(arr[0]['clt_DBServerName']);
			$("#clt_RenameString").val(arr[0]['clt_RenameString']);
			$("#clt_FileEncoding").val(arr[0]['clt_FileEncoding']);
			$("#clt_LRFilePath").val(arr[0]['clt_LRFilePath']);
			$("#clt_EffectiveDate").val(arr[0]['clt_EffectiveDate']);
			$("#clt_EndDate").val(arr[0]['clt_EndDate']);
			$("#clt_CreateDate").val(arr[0]['clt_CreateDate']);
			$("#clt_isActive").val(arr[0]['clt_isActive']);
			$("#clt_ViewName").val(arr[0]['clt_ViewName']);
			$("#clt_Attribute2").val(arr[0]['clt_Attribute2']);
			$("#clt_Attribute3").val(arr[0]['clt_Attribute3']);
			$("#clt_Attribute4").val(arr[0]['clt_Attribute4']);			
 			
			$("#save1").click(function() {
 				 update_client_load_template_data(arr); 
					})
			
		}
	});
	
}

function update_client_load_template_data(arr){
	alert(arr[0]['clt_id']);
	alert($("#clt_LoadType").val());
	//arr['u_desingation']=$("#selectname option:selected").text();
// 	//alert(arr[0]);
// 	alert(arr[0]['c_Client']);
// 	alert(arr[0]['c_Description']);
	//alert(arr['cbi_build_frequency']);
	$.ajax({
		url: 'ajax/insert_into_database.php',
		type: 'POST',
		data: {'query':"UPDATE client_load_template SET clt_FileConvention = '"+$('#clt_FileConvention').val()+"', clt_FileDescription ='"+$('#clt_FileDescription').val()+"' ,clt_LoadType ='"+$('#clt_LoadType').val()+"' ,clt_CDMSBatch ='"+$('#clt_CDMSBatch').val()+"',clt_ReceiveFrequency ='"+$('#clt_ReceiveFrequency').val()+"' ,clt_LoadFrequency ='"+$('#clt_LoadFrequency').val()+"', clt_WFilePath ='"+$('#clt_WFilePath').val()+"', clt_SFilePath = '"+$('#clt_SFilePath').val()+"' where 'clt_no' = "+arr[0]['clt_no']+" ;"},
		success:function(data){
		alert(data);
		//, clt_filetype ='"+$('#clt_filetype').val()+"',clt_FolderShortName ='"+$('#clt_FolderShortName').val()+"',clt_ClientLoadPriority ="+$('#clt_ClientLoadPriority').val()+",clt_FileLoadPriority ="+$('#clt_FileLoadPriority').val()+" , clt_TableName = '"+$('#clt_TableName').val()+"' , clt_DataBaseName ='"+$('#clt_DataBaseName').val()+"',clt_DBServerName ='"+$('#clt_DBServerName').val()+"', clt_RenameString ='"+$('#clt_RenameString').val()+"' ,clt_FileEncoding ='"+$('#clt_FileEncoding').val()+"' ,clt_LRFilePath ='"+$('#clt_LRFilePath').val()+"' ,clt_EffectiveDate ='"+$('#clt_EffectiveDate').val()+"' , clt_EndDate ='"+$('#clt_EndDate').val()+"', clt_CreateDate ='"+$('#clt_CreateDate').val()+"', clt_isActive ="+$('#clt_isActive').val()+", clt_ViewName ='"+$('#clt_ViewName').val()+"', clt_Attribute2 = '"+$('#clt_Attribute2').val()+"', clt_Attribute3 ="+$('#clt_Attribute3').val()+", clt_Attribute4 ="+$('#clt_Attribute5').val()+"
		//,clt_ReceiveFrequency ='"+$')#clt_ReceiveFrequency").val()+"' ,clt_LoadFrequency ='"+$("#clt_LoadFrequency").val()+"',clt_WFilePath ='"+$("#clt_WFilePath").val()+"',clt_SFilePath ='"+$("#clt_SFilePath").val()+"', clt_filetype ='"+$("#clt_filetype").val()+"',clt_FolderShortName ='"+$("#clt_FolderShortName").val()+"',clt_ClientLoadPriority ="+$("#clt_ClientLoadPriority").val()+",clt_FileLoadPriority ="+$("#clt_FileLoadPriority").val()+",clt_TableName ='"+$("#clt_TableName").val()+"',clt_DataBaseName ='"+$("#clt_DataBaseName").val()+"',clt_DBServerName ='"+$("#clt_DBServerName").val()+"', clt_RenameString ='"+$("#clt_RenameString").val()+"' ,clt_FileEncoding ='"+$("#clt_FileEncoding").val()+"' ,clt_LRFilePath ='"+$("#clt_LRFilePath").val()+"' ,clt_EffectiveDate ='"+$("#clt_EffectiveDate").val()+"' , clt_EndDate ='"+$("#clt_EndDate").val()+"', clt_CreateDate ='"+$("#clt_CreateDate").val()+"', clt_isActive ="+$("#clt_isActive").val()+", clt_ViewName ='"+$("#clt_ViewName").val()+"', clt_Attribute2 ='"+$("#clt_Attribute2").val()+"', clt_Attribute3 ="+$("#clt_Attribute3").val()+", clt_Attribute4 ="+$("#clt_Attribute5").val()+" 
		}
	});
}

















function select_client_load_template_files(d){
	//alert(d);	
	$("#client_load_template_div").html("");
	$("#client_files_template_select").html("");
	$.ajax({
		url: 'ajax/ajax_get_arraylist_from_database.php',
		type: 'POST',
		data: {'query': "SELECT clt_id from client_load_template WHERE c_id="+d , 'val':'clt_id'},
		success:function(data){
			//alert(data);
			var arr = jQuery.parseJSON(data);
			var al = arr.length;
			var i=0;
			var htmltext1="<label for='load_select'>Client_load_template ID:</label>"+
			"<select id='load_select' name='load_select' class='browser-default'>"+
			"</select>"+
			"<button id='search3' type='button' name='search2' class='btn btn-default'>Search</button>";
			$('#ajax_display_div').html(htmltext1);
			for(i = 0 ;i < al ; i++){	
				$('#load_select').append("<option value='"+arr[i]+"'>"+arr[i]+"</option>");
			}
			//alert($("#load_select option:selected").val());
			$("#search3").click(function() {
				select_client_files_template($("#load_select option:selected").val());
			})
			
		}
	});
	
}



function select_client_files_template(d){
	alert(d);	
	$.ajax({
		url: 'ajax/ajax_get_single_row_from_database.php',
		type: 'POST',
		data: {'query': "SELECT * from client_files_template WHERE clt_id='"+d+"' " },
		success:function(data){
			//alert(data);
			var arr = jQuery.parseJSON(data);
			//alert(arr);
			var al = arr.length;
			var i=0;
			var htmltext1="<label for='files_select'>Client_files_template ID:</label>"+
			"<select id='files_select' name='files_select' class='browser-default'>"+
			"</select>"+
			"<button id='search4' type='button' name='search4' class='btn btn-default'>Search</button>";
			$('#client_files_template_select').html(htmltext1);
			for(i = 0 ;i < al ; i++){	
// 				alert(arr[i]['cft_id']);
// 				alert(arr[i]['cft_FileConvention']);
				$('#files_select').append("<option value='"+arr[i]['cft_id']+"'>"+arr[i]['cft_id']+' - '+arr[i]['cft_FileConvention']+"</option>");
			}
			//alert($("#load_select option:selected").val());
			$("#search4").click(function() {
				 show_client_files_template_data($("#files_select option:selected").val());
			})
			
		}
	});
	
}

function show_client_files_template_data(d){
	alert(d);	
	$.ajax({
		url: 'ajax/ajax_get_single_row_from_database.php',
		type: 'POST',
		data: {'query':"SELECT * FROM client_files_template WHERE cft_id ='"+d+"' LIMIT 1" },
		success:function(data){
		alert(data);
		var arr = jQuery.parseJSON(data);
		//alert(arr[0]['c_id']);
		
var htmltext1="<div class='panel-heading'>"+
"<h3 >Client Files Template</h3></div><form role='form'></div>"+
"<div class='panel-body'>"+
    
 
"<form id='form1' name='form1'>"+
"<div class='container-fluid'>"+
	
	"<div class='form-group input-field col-md-4'>"+
        "<label class='active' for='cft_id'>cft_id:</label>"+
        "<input type='number' readOnly='true' class='form-control' id='cft_id' name='cft_id' pattern='[0-9]' >"+
        
  "</div>"+
	
	"<div class='form-group input-field col-md-4'>"+
        "<label class='active' for='clt_no'>clt_no:</label>"+
        "<input type='number'readOnly='true' class='form-control' id='clt_no' name='clt_no' pattern='[0-9]' >"+
        
  "</div>"+
  	
	"<div class='form-group input-field col-md-4'>"+
        "<label class='active' for='cft_FileConvention'>cft_FileConvention:</label>"+
        "<input type='text' class='form-control' id='cft_FileConvention' name='cft_FileConvention'>"+
        
  "</div>"+
	
	"<div class='form-group input-field col-md-4'>"+
        "<label class='active' for='cft_Description'>cft_Description:</label>"+
        "<input type='text' class='form-control' id='cft_Description' name='cft_Description' pattern='[a-zA-Z\s]{0,}$' >"+
        
  "</div>"+
	
	"<div class='form-group input-field col-md-4'>"+
        "<label class='active' for='cft_DataItem'>cft_DataItem:</label>"+
        "<input type='text' class='form-control' id='cft_DataItem' name='cft_DataItem' pattern='[A-Z\s]{0,}$'  title='Uppercase only e.g ABC'>"+
        
 " </div>"+
	
	"<div class='form-group input-field col-md-4'>"+
	"<label class='active' for='cft_TalendSupport'>cft_TalendSupport</label>"+
    	"<select name='cft_TalendSupport' class='browser-default' id='cft_TalendSupport' >"+
			"<option value='1'>Y</option><option value='0'>N</option  >"+
		"</select>"+
		
	"</div>"+
	
	"<div class='form-group input-field col-md-6'>"+
	"<label class='active' for='cft_LoadType'>cft_LoadType</label>"+
    "<select class='browser-default' name='cft_LoadType' id='cft_LoadType' >"+
			"<option value='' >Choose your option</option><option value='HadoopLoad'>HadoopLoad</option ><option value='TalendLoad'>TalendLoad</option  ><option value='Manual'>Manual</option  >"+
		"</select>"+
		
	"</div>"+
	
	"<div class='form-group input-field col-md-4'>"+
        "<label class='active' for='cft_ReceiveFrequency'>cft_ReceiveFrequency:</label>"+
        "<input type='text' class='form-control' id='cft_ReceiveFrequency' name='cft_ReceiveFrequency' pattern='[a-zA-Z\s]{0,}$' >"+
        
  "</div>"+
	
	"<div class='form-group input-field col-md-6'>"+
	"<label class='active' for='cft_IsMultiSchema'>cft_IsMultiSchema</label>"+	
     "<select class='browser-default' name='cft_IsMultiSchema' id='cft_IsMultiSchema'>"+
			"<option value=''>Choose your option</option><option value='1'>Y</option><option value='0'>N</option >"+
		"</select>"+
		
	"</div>"+
	
	"<div class='form-group input-field col-md-5'>"+
	"<label class='active' for='cft_IsDemilited'>cft_IsDemilited</label>"+
    "<select class='browser-default's name='cft_IsDemilited' id='cft_IsDemilited'>"+
			"<option value=''>Choose your option</option><option value='1'>Y</option><option value='0'>N</option>"+
		"</select>"+
		
	"</div>"+
	
	"<div class='form-group input-field col-md-4'>"+
        "<label class='active' for='cft_Delimeter'>cft_Delimeter:</label>"+
        "<input type='text' class='form-control' id='cft_Delimeter' name='cft_Delimeter' pattern='[a-zA-Z\s]{0,}$' >"+
        
  "</div>"+
	
	"<div class='form-group input-field col-md-4'>"+
        "<label class='active' for='cft_DefaultDelCount'>cft_DefaultDelCount:</label>"+
        "<input type='text' class='form-control' id='cft_DefaultDelCount' name='cft_DefaultDelCount' pattern='[a-zA-Z\s]{0,}$' >"+
        
  "</div>"+
	
	"<div class='form-group input-field col-md-4'>"+
        "<label class='active' for='cft_TextQualifier'>cft_TextQualifier:</label>"+
        "<input type='text' class='form-control' id='cft_TextQualifier' name='cft_TextQualifier' pattern='[a-zA-Z\s]{0,}$' >"+
        
  "</div>"+
	
	"<div class='form-group input-field col-md-6'>"+
        "<label class='active' for='cft_RecordSeparator'>cft_RecordSeparator:</label>"+
        "<input type='text' class='form-control' id='cft_RecordSeparator' name='cft_RecordSeparator' pattern='[a-zA-Z\s]{0,}$' >"+
     "</div>"+
	
	"<div class='form-group input-field col-md-6'>"+
	"<label class='active' for='cft_IsPositional'>cft_IsPositional</label>"+
    "<select class='browser-default' class='browser-default' name='cft_IsPositional' id='cft_IsPositional'>"+
		"<option value=''>Choose your option</option><option value='1'>Y</option><option value='0'>N</option>"+
		"</select>"+
		
	"</div>"+
	
	"<div class='form-group input-field col-md-7'>"+
	"<label class='active' for='cft_IsEBCIDIC'>cft_IsEBCDIC</label>"+
    "<select class='browser-default' name='cft_IsEBCIDIC' id:'cft_IsEBCIDIC' >"+
			"<option value=''>Choose your option</option ><option value='1'>Y</option> <option value='0'>N</option >"+
		"</select>"+
	"</div>"+
	
	"<div class='form-group input-field col-md-5'>"+
        "<label class='active' for='cft_RecordLength'>cft_RecordLength:</label>"+
        "<input type='text' class='form-control' id='cft_RecordLength' name='cft_RecordLength' pattern='[a-zA-Z\s]{0,}$'  title='Mandatory for EBCDIC'>"+
        
  "</div>"+
	
		
	"<div class='form-group input-field col-md-6'>"+
	"<label class='active' for='cft_IsOracleDMP'>cft_IsOracleDMP</label>"+
    	"<select class='browser-default' name='cft_IsOracleDMP' id='cft_IsOracleDMP'>"+
			"<option value=''>Choose your option</option><option value='1'>Y</option><option value='0'>N</option>"+
		"</select>"+
		
	"</div>"+
	
	"<div class='form-group input-field col-md-6'>"+
	"<label class='active' for='cft_OracleDMPType'>cft_OracleDMPType</label>"+
    "<select class='browser-default' name='cft_OracleDMPType' id='cft_OracleDMPType'>"+
			"<option value=''>Choose your option</option><option value='Dump'>Dump</option ><option value='Pump'>Pump</option >"+
		"</select>"+
		
	"</div>"+
	
	"<div class='form-group input-field col-md-6'>"+
	"<label class='active' for='cft_IsReportImage'>cft_IsReportImage</label>"+
    "<select class='browser-default' name='cft_IsReportImage' id='cft_IsReportImage' >"+
			"<option value=''>Choose your option</option><option value='1'>Y</option ><option value='0'>N</option >"+
		"</select>"+
		
	"</div>"+
	
	"<div class='form-group input-field col-md-4'>"+
        "<label class='active' for='cft_IsX12'>cft_IsX12:</label>"+
        "<input type='text' class='form-control' id='cft_IsX12' name='cft_IsX12' pattern='[0-1]{1}' title='Please enter either 0 or 1' placeholder='Enter either 0 or 1 only'>"+
        
 " </div>"+
	
	"<div class='form-group input-field col-md-4'>"+
        "<label class='active' for='cft_IsEDIFACT'>cft_IsEDIFACT:</label>"+
        "<input type='text' class='form-control' id='cft_IsEDIFACT' name='cft_IsEDIFACT' pattern='[0-1]{1}' title='Please enter either 0 or 1' placeholder='Enter either 0 or 1 only'>"+
        
  "</div>"+
	
	"<div class='form-group input-field col-md-4'>"+
        "<label class='active' for='cft_IsFoxpro'>cft_IsFoxpro:</label>"+
        "<input type='text' class='form-control' id='cft_IsFoxpro' name='cft_IsFoxpro' pattern='[0-1]{1}' title='Please enter either 0 or 1' placeholder='Enter either 0 or 1 only'>"+
        
  "</div>"+
	
	"<div class='form-group input-field col-md-4'>"+
        "<label class='active' for='cft_IsSaveFile'>cft_IsSaveFile:</label>"+
        "<input type='text' class='form-control' id='cft_IsSaveFile' name='cft_IsSaveFile' pattern='[0-1]{1}' title='Please enter either 0 or 1' placeholder='Enter either 0 or 1 only'>"+
        
  "</div>"+
	
	"<div class='form-group input-field col-md-4'>"+
        "<label class='active' for='cft_TableName'>cft_TableName:</label>"+
        "<input type='text' class='form-control' id='cft_TableName' name='cft_TableName' pattern='[a-zA-Z\s]{0,}$' >"+
        
  "</div>"+
	
	"<div class='form-group input-field col-md-4'>"+
        "<label class='active' for='cft_EffectiveDate'>cft_EffectiveDate:</label>"+
        "<input type='text' class='form-control' id='cft_EffectiveDate' name='cft_EffectiveDate' pattern='[a-zA-Z\s]{0,}$' >"+
        
  "</div>"+
	
	"<div class='form-group input-field col-md-4'>"+
        "<label class='active' for='cft_EndDate'>cft_EndDate:</label>"+
        "<input type='text' class='form-control' id='cft_EndDate' name='cft_EndDate' pattern='[a-zA-Z\s]{0,}$' >"+
        
  "</div>"+
	
	"<div class='form-group input-field col-md-4'>"+
	"<label class='active' for='cft_IsActive'>cft_IsActive</label>"+
    "<select class='browser-default' name='cft_IsActive' id='cft_IsActive' >"+
			"<option value='' >Choose your option</option>"+
			"<option value='1'>Y</option  ><option value='0'>N</option>"+
		"</select>"+
		
"</div>"+
	
	"<div class='form-group input-field col-md-4'>"+
        "<label class='active' for='cft_Attribute1'>cft_Attribute1:</label>"+
        "<input type='text' class='form-control' id='cft_Attribute1' name='cft_Attribute1' pattern='[a-zA-Z\s]{0,}$' >"+
        
  "</div>"+
	
	"<div class='form-group input-field col-md-4'>"+
        "<label class='active' for='cft_Attribute2'>cft_Attribute2:</label>"+
        "<input type='text' class='form-control' id='cft_Attribute2' name='cft_Attribute2' pattern='[a-zA-Z\s]{0,}$' >"+
        
  "</div>"+
  
	
	"<div class='form-group input-field col-md-4'>"+
        "<label class='active' for='cft_Attribute3'>cft_Attribute3:</label>"+
        "<input type='text' class='form-control' id='cft_Attribute3' name='cft_Attribute3' pattern='[a-zA-Z\s]{0,}$' >"+
        
"  </div>"+
	
"	<div class='form-group input-field col-md-4'>"+
        "<label class='active' for='cft_Attribute4'>cft_Attribute4:</label>"+
        "<input type='text' class='form-control' id='cft_Attribute4' name='cft_Attribute4' pattern='[0-1]{1}' title='Please enter either 0 or 1' placeholder='Enter either 0 or 1 only'>"+
        
"</div>"+

"	<div class='form-group input-field col-md-4'>"+
"<label class='active' for='clt_id'>clt_id:</label>"+
"<input type='text' readOnly='true' class='form-control' id='clt_id' name='clt_id' >"+

"</div>"+

"<br><br>"+
"</div>"+	
"<div>"+
"<button type='submit' name='save4' id='save4' class='btn btn-default'>Submit</button>"+
"</div>"+
"</form>"+
" </div>";
			//$('#ajax_display_div').load('div_client_update.php #client_info_fields_div');
			//alert(arr[0]['c_id']);
			$('#client_load_template_div').html(htmltext1);

			
			$("#cft_id").val(arr[0]['cft_id']);
     		$("#clt_no").val(arr[0]['clt_no']);
 			$("#cft_FileConvention").val(arr[0]['cft_FileConvention']);
 			$("#cft_Description").val(arr[0]['cft_Description']);
 			$("#cft_DataItem").val(arr[0]['cft_DataItem']);	
 			$("#cft_TalendSupport").val(arr[0]['cft_TalendSupport']);
 			$("#cft_LoadType").val(arr[0]['cft_LoadType']);
 			$("#cft_ReceiveFrequency").val(arr[0]['cft_ReceiveFrequency']);
 			$("#cft_IsMultiSchema").val(arr[0]['cft_IsMultiSchema']);
 			$("#cft_IsDelimited").val(arr[0]['cft_IsDelimited']);
 			$("#cft_Delimiter").val(arr[0]['cft_Delimiter']);
 			$("#cft_DefaultDelCount").val(arr[0]['cft_DefaultDelCount']);
 			$("#cft_TextQualifier").val(arr[0]['cft_TextQualifier']);
 			$("#cft_RecordSeparator").val(arr[0]['cft_RecordSeparator']);
 			$("#cft_IsPositional").val(arr[0]['cft_IsPositional']);
 			$("#cft_IsEBCDIC").val(arr[0]['cft_IsEBCDIC']);
 			$("#cft_RecordLength").val(arr[0]['cft_RecordLength']);
 			$("#cft_IsOracleDMP").val(arr[0]['cft_IsOracleDMP']);
 			$("#cft_OracleDMPType").val(arr[0]['cft_OracleDMPType']);
 			$("#cft_IsReportImage").val(arr[0]['cft_IsReportImage']);
 			$("#cft_IsX12").val(arr[0]['cft_IsX12']);
 			$("#cft_IsEDIFACT").val(arr[0]['cft_IsEDIFACT']);
 			$("#cft_Foxpro").val(arr[0]['cft_Foxpro']);
 			$("#cft_SaveFile").val(arr[0]['cft_SaveFile']);
 			$("#cft_TableName").val(arr[0]['cft_TableName']);
 			$("#cft_EffectiveDate").val(arr[0]['cft_EffectiveDate']);
 			$("#cft_EndDate").val(arr[0]['cft_EndDate']);
 			$("#cft_IsActive").val(arr[0]['cft_IsActive']);
 			$("#cft_Attribute1").val(arr[0]['cft_Attribute1']);
 			$("#cft_Attribute2").val(arr[0]['cft_Attribute2']);
		    $("#cft_Attribute3").val(arr[0]['cft_Attribute3']);
			$("#cft_Attribute4").val(arr[0]['cft_Attribute4']);			
			$("#clt_id").val(arr[0]['clt_id']);			
			
			$("#save4").click(function() {
 				 update_client_files_template_data(arr); 
					})
			
			
			
		
		}
	});
	
}

function update_client_files_template_data(arr){
	alert(arr[0]['cft_id']);
	alert($("#cft_LoadType").val());


		$.ajax({
		url: 'ajax/insert_into_database.php',
		type: 'POST',
		data: {'query':"UPDATE client_files_template SET cft_FileConvention = '"+$('#cft_FileConvention').val()+"', cft_Description ='"+$('#cft_Description').val()+"' ,cft_DataItem ='"+$('#cft_DataItem').val()+"' ,cft_TalendSupport ='"+$('#cft_TalendSupport').val()+"',cft_LoadType ='"+$('#cft_LoadType').val()+"' ,cft_ReceiveFrequency ='"+$('#cft_ReceiveFrequency').val()+"', cft_IsMultiSchema ='"+$('#cft_IsMultiSchema').val()+"', cft_IsDelimited = '"+$('#cft_IsDelimited').val()+"' where cft_id = "+arr[0]['cft_id']+" ;"},
		success:function(data){
		alert(data);
		//, cft_Delimiter ='"+$('#cft_Delimiter').val()+"',cft_DefaultDelCount ='"+$('#cft_DefaultDelCount').val()+"',cft_TextQualifier ="+$('#cft_TextQualifier').val()+",cft_RecordSeparator ="+$('#cft_RecordSeparator').val()+" , cft_IsPositional = '"+$('#cft_IsPositional').val()+"' , cft_IsEBCDIC ='"+$('#cft_IsEBCDIC').val()+"',cft_RecordLength ='"+$('#cft_RecordLength').val()+"', cft_IsOracleDMP ='"+$('#cft_IsOracleDMP').val()+"' ,cft_OracleDMPType ='"+$('#cft_OracleDMPType').val()+"' ,cft_IsReportImage ='"+$('#cft_IsReportImage').val()+"' ,cft_IsX12 ='"+$('#cft_IsX12').val()+"' , cft_IsEDIFACT ='"+$('#cft_IsEDIFACT').val()+"', cft_Foxpro ='"+$('#cft_Foxpro').val()+"', cft_SaveFile ="+$('#cft_SaveFile').val()+", cft_TableName ='"+$('#cft_TableName').val()+"', cft_EffectiveDate = '"+$('#cft_EffectiveDate').val()+"', cft_EndDate ="+$('#cft_EndDate').val()+" , cft_IsActive ="+$('#cft_IsActive').val()+" , cft_Attribute1 ="+$('#cft_Attribute1').val()+" , cft_Attribute2 ="+$('#cft_Attribute2').val()+", cft_Attribute3 ="+$('#cft_Attribute3').val()+", cft_Attribute4 ="+$('#cft_Attribute4').val()+"
		//,clt_ReceiveFrequency ='"+$')#clt_ReceiveFrequency").val()+"' ,clt_LoadFrequency ='"+$("#clt_LoadFrequency").val()+"',clt_WFilePath ='"+$("#clt_WFilePath").val()+"',clt_SFilePath ='"+$("#clt_SFilePath").val()+"', clt_filetype ='"+$("#clt_filetype").val()+"',clt_FolderShortName ='"+$("#clt_FolderShortName").val()+"',clt_ClientLoadPriority ="+$("#clt_ClientLoadPriority").val()+",clt_FileLoadPriority ="+$("#clt_FileLoadPriority").val()+",clt_TableName ='"+$("#clt_TableName").val()+"',clt_DataBaseName ='"+$("#clt_DataBaseName").val()+"',clt_DBServerName ='"+$("#clt_DBServerName").val()+"', clt_RenameString ='"+$("#clt_RenameString").val()+"' ,clt_FileEncoding ='"+$("#clt_FileEncoding").val()+"' ,clt_LRFilePath ='"+$("#clt_LRFilePath").val()+"' ,clt_EffectiveDate ='"+$("#clt_EffectiveDate").val()+"' , clt_EndDate ='"+$("#clt_EndDate").val()+"', clt_CreateDate ='"+$("#clt_CreateDate").val()+"', clt_isActive ="+$("#clt_isActive").val()+", clt_ViewName ='"+$("#clt_ViewName").val()+"', clt_Attribute2 ='"+$("#clt_Attribute2").val()+"', clt_Attribute3 ="+$("#clt_Attribute3").val()+", clt_Attribute4 ="+$("#clt_Attribute5").val()+" 
		}
	});
}
</script>
