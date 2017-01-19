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
	if(mysql_fetch_array($check)>0)
	{
		echo "<br><br><br><div class=head1>Client Id Already Exists</div>";
		echo mysql_num_rows($check);
		exit;
	}
	echo "insertingg into database...";
	$query="insert into client_load_template(clt_no,clt_id,c_id,c_ShortName,clt_FileConvention,clt_FileDescription,clt_LoadType,clt_CDMSBatch,clt_ReceiveFrequency,clt_LoadFrequency,clt_WFilePath,clt_SFilePath,clt_filetype,clt_FolderShortName,clt_ClientLoadPriority,clt_FileLoadPriority,clt_TableName,clt_DataBaseName,clt_DBServerName,clt_RenameString,clt_FileEncoding,clt_LRFilePath,clt_EffectiveDate,clt_EndDate,clt_CreateDate,clt_isActive,clt_ViewName,clt_Attribute2,clt_Attribute3,clt_Attribute4) values('$clt_no','$clt_id','$c_id','$c_ShortName','$clt_FileConvention','$clt_FileDescription','$clt_LoadType','$clt_CDMSBatch','$clt_ReceiveFrequency','$clt_LoadFrequency','$clt_WFilePath','$clt_SFilePath','$clt_filetype','$clt_FolderShortName','$clt_ClientLoadPriority','$clt_FileLoadPriority','$clt_TableName','$clt_DataBaseName','$clt_DBServerName','$clt_RenameString','$clt_FileEncoding','$clt_LRFilePath','$clt_EndDate','$clt_CreateDate','$clt_isActive','$clt_ViewName','$clt_Attribute2','$clt_Attribute3','$clt_Attribute4')"; 
	$check=mysql_query($query)or die(mysql_error());
	echo "<br><br><br><div> Client succesfully added</div>";
	header("Location:client_files_template.php");
	echo "$effectivedate";
}
?>



<!DOCTYPE html>

<body>

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
	<h3 >Client Load Template</h3>
      <a href="http://1000hz.github.io/bootstrap-validator/" target="_blank"></a>
    </div>
    <div class="panel-body">
    <!--  <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        
      </div>							-->
      <form role="form" id="form" name="form">
	  <div class="container-fluid">
	  
        <div class="form-group input-field col-md-4">
              <label for="clt_no">clt_no:</label>
              <input type="number" class="form-control" id="clt_no" name="clt_no" pattern="[0-9]" min="0" max="99999999999">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_id">clt_id:</label>
              <input type="text" class="form-control" id="clt_id" name="clt_id" pattern="^[a-zA-Z0-9\s]{3,}$" maxlength="10" >
              
        </div>
		
		<!-- <div class="form-group input-field col-md-4">
              <label for="c_id">c_id:</label>
              <input type="number" class="form-control" id="c_id" name="c_id" pattern="[0-9]" min="0" max="99999999999">
              
        </div> -->
		
		<div class="form-group input-field col-md-4">
              <label for="c_ShortName">c_ShortName:</label>
              <input type="text" class="form-control" id="c_ShortName" name="c_ShortName" pattern="^[a-zA-Z\s]{3,}$" >
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_FileConvention">clt_FileConvention:</label>
              <input type="text" class="form-control" id="clt_FileConvention" name="clt_FileConvention" pattern="^[a-zA-Z\s]{3,}$" >
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_FileDescription">clt_FileDescription:</label>
              <input type="text" class="form-control" id="clt_FileDescription" name="clt_FileDescription" pattern="^[a-zA-Z\s]{3,}$" >
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_LoadType">clt_LoadType:</label>
              <input type="text" class="form-control" id="clt_LoadType" name="clt_LoadType" pattern="^[a-zA-Z\s]{3,}$" >
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_CDMSBatch">clt_CDMSBatch:</label>
              <input type="text" class="form-control" id="clt_CDMSBatch" name="clt_CDMSBatch" pattern="^[a-zA-Z\s]{3,}$" >
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_ReceiveFrequency">clt_ReceiveFrequency:</label>
              <input type="text" class="form-control" id="clt_ReceiveFrequency" name="clt_ReceiveFrequency" pattern="^[a-zA-Z\s]{3,}$" >
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_LoadFrequency">clt_LoadFrequency:</label>
              <input type="text" class="form-control" id="clt_LoadFrequency" name="clt_LoadFrequency" pattern="^[a-zA-Z\s]{3,}$" >
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_WFilePath">clt_WFilePath:</label>
              <input type="text" class="form-control" id="clt_WFilePath" name="clt_WFilePath" pattern="^[a-zA-Z\s]{3,}$" >
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_SFilePath">clt_SFilePath:</label>
              <input type="text" class="form-control" id="clt_SFilePath" name="clt_SFilePath" pattern="^[a-zA-Z\s]{3,}$" >
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_filetype">clt_filetype:</label>
              <input type="text" class="form-control" id="clt_filetype" name="clt_filetype" pattern="^[a-zA-Z\s]{3,}$" >
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_FolderShortName">clt_FolderShortName:</label>
              <input type="text" class="form-control" id="clt_FolderShortName" name="clt_FolderShortName" pattern="^[a-zA-Z\s]{3,}$" >
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_ClientLoadPriority">clt_ClientLoadPriority:</label>
              <input type="number" class="form-control" id="clt_ClientLoadPriority" name="clt_ClientLoadPriority" pattern="^[a-zA-Z\s]{3,}$" min="0" max="99999999999">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_FileLoadPriority">clt_FileLoadPriority:</label>
              <input type="number" class="form-control" id="clt_FileLoadPriority" name="clt_FileLoadPriority" pattern="^[a-zA-Z\s]{3,}$" min="0" max="99999999999">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_TableName">clt_TableName:</label>
              <input type="text" class="form-control" id="clt_TableName" name="clt_TableName" pattern="^[a-zA-Z\s]{3,}$" >
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_DataBaseName">clt_DataBaseName:</label>
              <input type="text" class="form-control" id="clt_DataBaseName" name="clt_DataBaseName" pattern="^[a-zA-Z\s]{3,}$" >
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_DBServerName">clt_DBServerName:</label>
              <input type="text" class="form-control" id="clt_DBServerName" name="clt_DBServerName" pattern="^[a-zA-Z\s]{3,}$" >
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_RenameString">clt_RenameString:</label>
              <input type="text" class="form-control" id="clt_RenameString" name="clt_RenameString" pattern="^[a-zA-Z\s]{3,}$" >
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_FileEncoding">clt_FileEncoding:</label>
              <input type="text" class="form-control" id="clt_FileEncoding" name="clt_FileEncoding" pattern="^[a-zA-Z\s]{3,}$">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_LRFilePath">clt_LRFilePath:</label>
              <input type="text" class="form-control" id="clt_LRFilePath" name="clt_LRFilePath" pattern="^[a-zA-Z\s]{3,}$">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_EffectiveDate">clt_EffectiveDate:</label>
              <input type="text" class="form-control" id="clt_EffectiveDate" name="clt_EffectiveDate" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_EndDate">clt_EndDate:</label>
              <input type="text" class="form-control" id="clt_EndDate" name="clt_EndDate" pattern="^[a-zA-Z\s]{3,}$">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_CreateDate">clt_CreateDate:</label>
              <input type="text" class="form-control" id="clt_CreateDate" name="clt_CreateDate" pattern="^[a-zA-Z\s]{3,}$">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_isActive">clt_isActive:</label>
              <input type="number" class="form-control" id="clt_isActive" name="clt_isActive" pattern="[0-1]{1}" title="Please enter either 0 or 1" placeholder="Enter either 0 or 1 only">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_ViewName">clt_ViewName:</label>
              <input type="text" class="form-control" id="clt_ViewName" name="clt_ViewName" pattern="^[a-zA-Z\s]{3,}$">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_Attribute2">clt_Attribute2:</label>
              <input type="text" class="form-control" id="clt_Attribute2" name="clt_Attribute2" pattern="^[a-zA-Z\s]{3,}$">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_Attribute3">clt_Attribute3:</label>
              <input type="number" class="form-control" id="clt_Attribute3" name="clt_Attribute3" pattern="^[a-zA-Z\s]{3,}$" min="0" max="99999999999">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_Attribute4">clt_Attribute4:</label>
              <input type="text" class="form-control" id="clt_Attribute4" name="clt_Attribute4" pattern="^[a-zA-Z\s]{3,}$" min="0" max="9">
              
        </div>
		
		
        <button type="submit" class="btn btn-default">Move to client_files_template</button>
	</div>
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
