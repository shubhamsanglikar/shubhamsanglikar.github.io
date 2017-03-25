<?php 

include("header.php");
set_header_focus(1);

error_reporting(0);
extract($_POST);

//echo "acf".$_SESSION['add_clients_flag']."cltf".$_SESSION['clt_flag'];

if(isset($loadsubmit))
{
	
	$_SESSION['clt_flag']=0;
	$_SESSION['clt_id']= $clt_id ;
	$_SESSION['c_ShortName']= $c_ShortName ;
	$_SESSION['clt_FileConvention']= $clt_FileConvention ;
	$_SESSION['clt_FileDescription']= $clt_FileDescription ;
	$_SESSION['clt_LoadType']= $clt_LoadType ;
	$_SESSION['clt_CDMSBatch']= $clt_CDMSBatch ;
	$_SESSION['clt_ReceiveFrequency']= $clt_ReceiveFrequency ;
	$_SESSION['clt_LoadFrequency']= $clt_LoadFrequency ;
	$_SESSION['clt_WFilePath']= $clt_WFilePath ;
	$_SESSION['clt_SFilePath']= $clt_SFilePath ;
	$_SESSION['clt_filetype']= $clt_filetype ;
	$_SESSION['clt_FolderShortName']= $clt_FolderShortName ;
	$_SESSION['clt_ClientLoadPriority']= $clt_ClientLoadPriority ;
	$_SESSION['clt_FileLoadPriority']= $clt_FileLoadPriority ;
	$_SESSION['clt_TableName']= $clt_TableName ;
	$_SESSION['clt_DataBaseName']= $clt_DataBaseName ;
	$_SESSION['clt_DBServerName']= $clt_DBServerName ;
	$_SESSION['clt_RenameString']= $clt_RenameString ;
	$_SESSION['clt_FileEncoding']= $clt_FileEncoding ;
	$_SESSION['clt_LRFilePath']= $clt_LRFilePath ;
	$_SESSION['clt_EffectiveDate']= $clt_EffectiveDate ;
	$_SESSION['clt_EndDate']= $clt_EndDate ;
	$_SESSION['clt_CreateDate']= $clt_CreateDate ;
	$_SESSION['clt_IsActive']= $clt_IsActive ;
	$_SESSION['clt_ViewName']= $clt_ViewName ;
	$_SESSION['clt_Attribute2']= $clt_Attribute2 ;
	$_SESSION['clt_Attribute3']= $clt_Attribute3 ;
	$_SESSION['clt_Attribute4']= $clt_Attribute4 ;
	
	//echo $_SESSION['c_ShortName'];
	header("Location:client_files_template.php");
	
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
      <form role="form" id="form" name="form" method="post">
	  <div class="container-fluid">
	  
       
		
		<div class="form-group input-field col-md-4">
              <label for="clt_id">clt_id:</label>
              <input type="text" class="form-control" id="clt_id" name="clt_id" pattern="[a-zA-Z0-9_\s]{0,}$" maxlength="10" value="<?php if($_SESSION['clt_flag']==0){echo htmlspecialchars($_SESSION['clt_id']);}else{echo '';}?>">
              
        </div>
		
		<!-- <div class="form-group input-field col-md-4">
              <label for="c_id">c_id:</label>
              <input type="number" class="form-control" id="c_id" name="c_id" pattern="[0-9]" min="0" max="99999999999">
              
        </div> -->
		
		<div class="form-group input-field col-md-4">
              <label for="c_ShortName">c_ShortName:</label>
              <input type="text" class="form-control" id="c_ShortName" name="c_ShortName" patternn="^[A-Z]{3}$" title="Uppercase only without spaces, LIMIT 3 CHARACTERS e.g ABC" value="<?php echo htmlspecialchars($_SESSION['c_ShortName'])?>">
              
        </div>
		
		<div class="form-group input-field col-md-4" >
              <label for="clt_FileConvention">clt_FileConvention:</label>
              <input type="text" class="form-control" id="clt_FileConvention" name="clt_FileConvention" pattern="[a-zA-Z_\s]{0,}$" value="<?php if($_SESSION['clt_flag']==0){echo htmlspecialchars($_SESSION['clt_FileConvention']);}else{echo '';}?>">
              
        </div>
		
		
		<div class="form-group input-field col-md-4 input-field col s12" >
              <label for="clt_FileDescription">clt_FileDescription:</label>
              <input type="text" class="form-control" id="clt_FileDescription" name="clt_FileDescription" pattern="[A-Z_\s]{0,}"title="Uppercase only e.g ABC" value="<?php if($_SESSION['clt_flag']==0){echo htmlspecialchars($_SESSION['clt_FileDescription']);}else{echo '';}?>">	
            
       </div>
		
		<div class="form-group input-field col-md-4">
             <select name="clt_LoadType" value="<?php if($_SESSION['clt_flag']==0){echo htmlspecialchars($_SESSION['clt_LoadType']);}else{echo '';}?>" required>
				<option value="" >Choose your option</option>
				<option <?php if($_SESSION['clt_LoadType']=="HadoopLoad" && $_SESSION['clt_flag']==0) {echo "selected='selected'";} ?> value="HadoopLoad">HadoopLoad</option  required>
				<option <?php if($_SESSION['clt_LoadType']=="TalendLoad"  && $_SESSION['clt_flag']==0) {echo "selected='selected'";} ?> value="TalendLoad" >TalendLoad</option  required>
				<option <?php if($_SESSION['clt_LoadType']=="Manual"  && $_SESSION['clt_flag']==0) {echo "selected='selected'";} ?> value="Manual" >Manual</option required >
			</select>
			<label>clt_LoadType</label>
		</div>     
		
		<div class="form-group input-field col-md-4">
              <label for="clt_CDMSBatch">clt_CDMSBatch:</label>
              <input type="text" class="form-control" id="clt_CDMSBatch" name="clt_CDMSBatch" pattern="[A-Z]{0,}" title="Uppercase only without spaces e.g ABC" value="<?php if($_SESSION['clt_flag']==0){echo htmlspecialchars($_SESSION['clt_CDMSBatch']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
             <select name="clt_ReceiveFrequency" value="<?php if($_SESSION['clt_flag']==0){echo htmlspecialchars($_SESSION['clt_ReceiveFrequency']);}else{echo '';}?>"  required >
				<option value="" >Choose your option</option>
				<option <?php if($_SESSION['clt_ReceiveFrequency']=="Daily" && $_SESSION['clt_flag']==0) {echo "selected='selected'";} ?> value="Daily">Daily</option  required>
				<option <?php if($_SESSION['clt_ReceiveFrequency']=="Weekly" && $_SESSION['clt_flag']==0) {echo "selected='selected'";} ?> value="Weekly" >Weekly</option  required>
				<option <?php if($_SESSION['clt_ReceiveFrequency']=="Monthly" && $_SESSION['clt_flag']==0) {echo "selected='selected'";} ?> value="Monthly" >Monthly</option required >
				<option <?php if($_SESSION['clt_ReceiveFrequency']=="Quarterly" && $_SESSION['clt_flag']==0) {echo "selected='selected'";} ?> value="Quarterly" >Quarterly</option required >
				<option <?php if($_SESSION['clt_ReceiveFrequency']=="BiAnnually" && $_SESSION['clt_flag']==0) {echo "selected='selected'";} ?> value="BiAnnually" >BiAnnually</option required >
				<option <?php if($_SESSION['clt_ReceiveFrequency']=="Annually" && $_SESSION['clt_flag']==0) {echo "selected='selected'";} ?> value="Annually" >Annually</option required >
				<option <?php if($_SESSION['clt_ReceiveFrequency']=="AdHoc" && $_SESSION['clt_flag']==0) {echo "selected='selected'";} ?> value="AdHoc" >AdHoc</option required >
			</select>
			<label>clt_ReceiveFrequency</label>
		</div>
		
		
		<div class="form-group input-field col-md-4">
             <select name="clt_LoadFrequency"  required value="<?php if($_SESSION['clt_flag']==0){echo htmlspecialchars($_SESSION['clt_LoadFrequency']);}else{echo '';}?>">
				<option value="" >Choose your option</option>
				<option <?php if($_SESSION['clt_LoadFrequency']=="Daily" && $_SESSION['clt_flag']==0) {echo "selected='selected'";} ?> value="Daily">Daily</option  required>
				<option <?php if($_SESSION['clt_LoadFrequency']=="Weekly" && $_SESSION['clt_flag']==0) {echo "selected='selected'";} ?> value="Weekly" >Weekly</option  required>
				<option <?php if($_SESSION['clt_LoadFrequency']=="Monthly" && $_SESSION['clt_flag']==0) {echo "selected='selected'";} ?> value="Monthly" >Monthly</option required >
				<option <?php if($_SESSION['clt_LoadFrequency']=="Quarterly" && $_SESSION['clt_flag']==0) {echo "selected='selected'";} ?> value="Quarterly" >Quarterly</option required >
				<option <?php if($_SESSION['clt_LoadFrequency']=="BiAnnually" && $_SESSION['clt_flag']==0) {echo "selected='selected'";} ?> value="BiAnnually" >BiAnnually</option required >
				<option <?php if($_SESSION['clt_LoadFrequency']=="Annually" && $_SESSION['clt_flag']==0) {echo "selected='selected'";} ?> value="Annually" >Annually</option required >
				<option <?php if($_SESSION['clt_LoadFrequency']=="AdHoc" && $_SESSION['clt_flag']==0) {echo "selected='selected'";} ?> value="AdHoc" >AdHoc</option required >
			</select>
			<label>clt_LoadFrequency</label>
		</div>
		

		<div class="form-group input-field col-md-4">
              <label for="clt_WFilePath">clt_WFilePath:</label>
              <input type="text" class="form-control" id="clt_WFilePath" name="clt_WFilePath" pattern="[a-zA-Z/_.]{0,}$" title="Spaces Not Allowed" value="<?php if($_SESSION['clt_flag']==0){echo htmlspecialchars($_SESSION['clt_WFilePath']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_SFilePath">clt_SFilePath:</label>
              <input type="text" class="form-control" id="clt_SFilePath" name="clt_SFilePath" pattern="[a-zA-Z/_.]{0,}$" title="Spaces Not Allowed" value="<?php if($_SESSION['clt_flag']==0){echo htmlspecialchars($_SESSION['clt_SFilePath']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_filetype">clt_filetype:</label>
              <input type="text" class="form-control" id="clt_filetype" name="clt_filetype" pattern="[a-zA-Z_\s]{0,}$" value="<?php if($_SESSION['clt_flag']==0){echo htmlspecialchars($_SESSION['clt_filetype']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_FolderShortName">clt_FolderShortName:</label>
              <input type="text" class="form-control" id="clt_FolderShortName" name="clt_FolderShortName" pattern="[A-Z]{0,}" title="Uppercase only without spaces e.g ABC" value="<?php if($_SESSION['clt_flag']==0){echo htmlspecialchars($_SESSION['clt_FolderShortName']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_ClientLoadPriority">clt_ClientLoadPriority:</label>
              <input type="number" class="form-control" id="clt_ClientLoadPriority" name="clt_ClientLoadPriority" pattern="[a-zA-Z\s]{0,}$" min="0" max="99999999999" value="<?php if($_SESSION['clt_flag']==0){echo htmlspecialchars($_SESSION['clt_ClientLoadPriority']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_FileLoadPriority">clt_FileLoadPriority:</label>
              <input type="number" class="form-control" id="clt_FileLoadPriority" name="clt_FileLoadPriority" pattern="[a-zA-Z\s]{0,}$" min="0" max="99999999999" value="<?php if($_SESSION['clt_flag']==0){echo htmlspecialchars($_SESSION['clt_FileLoadPriority']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_TableName">clt_TableName:</label>
              <input type="text" class="form-control" id="clt_TableName" name="clt_TableName" pattern="[a-zA-Z_]{0,}$" title="No spaces allowed" value="<?php if($_SESSION['clt_flag']==0){echo htmlspecialchars($_SESSION['clt_TableName']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_DataBaseName">clt_DataBaseName:</label>
              <input type="text" class="form-control" id="clt_DataBaseName" name="clt_DataBaseName" pattern="[a-zA-Z_\s]{0,}$" value="<?php if($_SESSION['clt_flag']==0){echo htmlspecialchars($_SESSION['clt_DataBaseName']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_DBServerName">clt_DBServerName:</label>
              <input type="text" class="form-control" id="clt_DBServerName" name="clt_DBServerName" pattern="[a-zA-Z\_s]{0,}$" value="<?php if($_SESSION['clt_flag']==0){echo htmlspecialchars($_SESSION['clt_DBServerName']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_RenameString">clt_RenameString:</label>
              <input type="text" class="form-control" id="clt_RenameString" name="clt_RenameString" pattern="[a-z\_s]{0,}$" title="Lowercase only e.g abc" value="<?php if($_SESSION['clt_flag']==0){echo htmlspecialchars($_SESSION['clt_RenameString']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_FileEncoding">clt_FileEncoding:</label>
              <input type="text" class="form-control" id="clt_FileEncoding" name="clt_FileEncoding" pattern="[a-zA-Z_\s]{0,}$" required value="<?php if($_SESSION['clt_flag']==0){echo htmlspecialchars($_SESSION['clt_FileEncoding']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_LRFilePath">clt_LRFilePath:</label>
              <input type="text" class="form-control" id="clt_LRFilePath" name="clt_LRFilePath" pattern="[a-zA-Z_\s]{0,}$" value="<?php if($_SESSION['clt_flag']==0){echo htmlspecialchars($_SESSION['clt_LRFilePath']);}else{echo '';}?>">
              
        </div>
		

		<div class="form-group input-field col-md-4">
              <label for="clt_EffectiveDate">clt_EffectiveDate:</label>
              <input type="text" class="form-control" id="clt_EffectiveDate" name="clt_EffectiveDate" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" title="Enter in yyyy-mm-dd format (1990's or 2000's)" value="<?php if($_SESSION['clt_flag']==0){echo htmlspecialchars($_SESSION['clt_EffectiveDate']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_EndDate">clt_EndDate:</label>
              <input type="text" class="form-control" id="clt_EndDate" name="clt_EndDate" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" title="Enter in yyyy-mm-dd format (1990's or 2000's)" value="<?php if($_SESSION['clt_flag']==0){echo htmlspecialchars($_SESSION['clt_EndDate']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_CreateDate">clt_CreateDate:</label>
              <input type="text" class="form-control" id="clt_CreateDate" name="clt_CreateDate" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" title="Enter in yyyy-mm-dd format (1990's or 2000's)" value="<?php if($_SESSION['clt_flag']==0){echo htmlspecialchars($_SESSION['clt_CreateDate']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
             <select name="clt_IsActive" required value="<?php if($_SESSION['clt_flag']==0){echo htmlspecialchars($_SESSION['clt_IsActive']);}else{echo '';}?>">
				<option value="" >Choose your option</option required>
				<option <?php if($_SESSION['clt_IsActive']=='1' && $_SESSION['clt_flag']==0) {echo "selected='selected'";} ?> value="1">Y</option  required>
				<option <?php if($_SESSION['clt_IsActive']=='0' && $_SESSION['clt_flag']==0) {echo "selected='selected'";} ?> value="0">N</option  required>
			</select>
			<label>clt_IsActive</label>
		</div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_ViewName">clt_ViewName:</label>
              <input type="text" class="form-control" id="clt_ViewName" name="clt_ViewName" pattern="[A-Z_\s]{0,}$" required title="Uppercase only e.g ABC" value="<?php if($_SESSION['clt_flag']==0){echo htmlspecialchars($_SESSION['clt_ViewName']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_Attribute2">clt_Attribute2:</label>
              <input type="text" class="form-control" id="clt_Attribute2" name="clt_Attribute2" pattern="[a-zA-Z_\s]{0,}$" required value="<?php if($_SESSION['clt_flag']==0){echo htmlspecialchars($_SESSION['clt_Attribute2']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_Attribute3">clt_Attribute3:</label>
              <input type="number" class="form-control" id="clt_Attribute3" name="clt_Attribute3" pattern="[a-zA-Z_\s]{0,}$" min="0" max="99999999999" value="<?php if($_SESSION['clt_flag']==0){echo htmlspecialchars($_SESSION['clt_Attribute3']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_Attribute4">clt_Attribute4:</label>
              <input type="text" class="form-control" id="clt_Attribute4" name="clt_Attribute4" pattern="[a-zA-Z_\s]{0,}$" min="0" max="9" value="<?php if($_SESSION['clt_flag']==0){echo htmlspecialchars($_SESSION['clt_Attribute4']);}else{echo '';}?>">
              
        </div>		
		
	</div>
		<button type="submit" name="loadsubmit" class="btn btn-default" >MOVE TO client_files_template</button>
		<button type="button" class="btn btn-default" onclick="goBack()">BACK TO ADD CLIENTS</button>

	

<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.2/js/materialize.min.js"></script>
<script>
    $(document).ready(function() {
        $('select').material_select();
    });
</script>

<script>
function goBack() {
   // header("Location:add_clients.php");
	//window.history.back();
	window.location.href= "add_clients.php";
}
//
//function goForward() {
 //  window.location.href = "client_files_template.php";
//}

</script> 	
      </form>
	  
	  
	  <br><br><br>
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
