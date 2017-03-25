<?php 
include("header.php");
set_header_focus(1);
	
error_reporting(0);
extract($_POST);

//echo "ac".$_SESSION['add_clients_flag']."clt".$_SESSION['clt_flag']."cft".$_SESSION['cft_flag'];
 /*   $q="select clt_no from client_load_template where clt_id=".$_SESSION['clt_id'].",c_ShortName=".$_SESSION['c_ShortName'];
	$c=mysql_query($q);
	$row=mysql_fetch_array($c);
	$x=$row['clt_no'];
	 */
	$a=$_SESSION['c_ShortName'];
	$b=$_SESSION['clt_id'];
	
	/*$q="select clt_no from client_load_template where clt_id='".$b."' AND c_ShortName='".$a."'";
	
	$c=mysql_query($q);
	$row=mysql_fetch_array($c);
	$x=$row['clt_no'];
	echo "aditya".$_SESSION['clt_id']." ".$x; */
	
	
	
if(isset($filesubmit))
{
	$_SESSION['cft_flag']=1;
	$_SESSION['clt_flag']=1;
	$_SESSION['add_clients_flag']=1;
	
$_SESSION['cft_id']= $cft_id;
$_SESSION['clt_no']= $clt_no;
$_SESSION['cft_FileConvention']= $cft_FileConvention;
$_SESSION['cft_Description']= $cft_Description;
$_SESSION['cft_DataItem']= $cft_DataItem;
$_SESSION['cft_TalendSupport']= $cft_TalendSupport;
$_SESSION['cft_LoadType']= $cft_LoadType;
$_SESSION['cft_ReceiveFrequency']= $cft_ReceiveFrequency;
$_SESSION['cft_IsMultiSchema']= $cft_IsMultiSchema;
$_SESSION['cft_IsDelimited']= $cft_IsDelimited;
$_SESSION['cft_Delimiter']= $cft_Delimiter;
$_SESSION['cft_DefaultDelCount']= $cft_DefaultDelCount;
$_SESSION['cft_TextQualifier']= $cft_TextQualifier;
$_SESSION['cft_RecordSeparator']= $cft_RecordSeparator;
$_SESSION['cft_IsPositional']= $cft_IsPositional;
$_SESSION['cft_IsEBCDIC']= $cft_IsEBCDIC;
$_SESSION['cft_RecordLength']= $cft_RecordLength;
$_SESSION['cft_IsOracleDMP']= $cft_IsOracleDMP;
$_SESSION['cft_OracleDMPType']= $cft_OracleDMPTyp;
$_SESSION['cft_IsReportImage']= $cft_IsReportImage;
$_SESSION['cft_IsX12']= $cft_IsX12;
$_SESSION['cft_IsEDIFACT']= $cft_IsEDIFACT;
$_SESSION['cft_Foxpro']= $cft_Foxpro;
$_SESSION['cft_SaveFile']= $cft_SaveFile;
$_SESSION['cft_TableName']= $cft_TableName;
$_SESSION['cft_EffectiveDate']= $cft_EffectiveDate;
$_SESSION['cft_EndDate']= $cft_EndDate;
$_SESSION['cft_IsActive']= $cft_IsActive;
$_SESSION['cft_Attribute1']= $cft_Attribute1;
$_SESSION['cft_Attribute2']= $cft_Attribute2;
$_SESSION['cft_Attribute3']= $cft_Attribute3;
$_SESSION['cft_Attribute4']= $cft_Attribute4;
//$_SESSION['clt_id']= $clt_id;
	
	
$query1="insert into client_info(c_Client,c_ClientType,c_Description,c_ShortName,c_Country,c_Location,c_OtherDetails,c_EffectiveDate,c_EndDate,c_CreateDate,c_ActiveFlag) values('".$_SESSION['c_Client']."','".$_SESSION['c_ClientType']."','".$_SESSION['c_Description']."','".$_SESSION['c_ShortName']."','".$_SESSION['c_Country']."','".$_SESSION['c_Location']."','".$_SESSION['c_OtherDetails']."','".$_SESSION['c_EffectiveDate']." 00:00:00','".$_SESSION['c_EndDate']." 00:00:00','".$_SESSION['c_CreateDate']." 00:00:00','".$_SESSION['c_ActiveFlag']."')";

$check=mysql_query($query1)or die(mysql_error());	


	$d=$_SESSION['c_Client'];
	$e=$_SESSION['c_Country'];

	$t="select c_id from client_info where c_Client='".$d."' AND c_Country='".$e."'";
	
	$m=mysql_query($t);
	$row=mysql_fetch_array($m);
	$z=$row['c_id'];

	
	
$query2="insert into client_load_template(clt_id,c_id,c_ShortName,clt_FileConvention,clt_FileDescription,clt_LoadType,clt_CDMSBatch,clt_ReceiveFrequency,clt_LoadFrequency,clt_WFilePath,clt_SFilePath,clt_filetype,clt_FolderShortName,clt_ClientLoadPriority,clt_FileLoadPriority,clt_TableName,clt_DataBaseName,clt_DBServerName,clt_RenameString,clt_FileEncoding,clt_LRFilePath,clt_EffectiveDate,clt_EndDate,clt_CreateDate,clt_IsActive,clt_ViewName,clt_Attribute2,clt_Attribute3,clt_Attribute4) values('".$_SESSION['clt_id']."','".$z."','".$_SESSION['c_ShortName']."','".$_SESSION['clt_FileConvention']."','".$_SESSION['clt_FileDescription']."','".$_SESSION['clt_LoadType']."','".$_SESSION['clt_CDMSBatch']."','".$_SESSION['clt_ReceiveFrequency']."','".$_SESSION['clt_LoadFrequency']."','".$_SESSION['clt_WFilePath']."','".$_SESSION['clt_SFilePath']."','".$_SESSION['clt_filetype']."','".$_SESSION['clt_FolderShortName']."','".$_SESSION['clt_ClientLoadPriority']."','".$_SESSION['clt_FileLoadPriority']."','".$_SESSION['clt_TableName']."','".$_SESSION['clt_DataBaseName']."','".$_SESSION['clt_DBServerName']."','".$_SESSION['clt_RenameString']."','".$_SESSION['clt_FileEncoding']."','".$_SESSION['clt_LRFilePath']."','".$_SESSION['clt_EffectiveDate']." 00:00:00','".$_SESSION['clt_EndDate']." 00:00:00','".$_SESSION['clt_CreateDate']." 00:00:00','".$_SESSION['clt_IsActive']."','".$_SESSION['clt_ViewName']."','".$_SESSION['clt_Attribute2']."','".$_SESSION['clt_Attribute3']."','".$_SESSION['clt_Attribute4']."')"; 
	$check=mysql_query($query2)or die(mysql_error());	
	//get clt_no from client_load_template
	
	$q="select clt_no from client_load_template where clt_id='".$b."' AND c_ShortName='".$a."'";
	
	$c=mysql_query($q);
	$row=mysql_fetch_array($c);
	$x=$row['clt_no'];
//	echo "sanglikar".$_SESSION['clt_id']." ".$x;
	
	
$query3 = "insert into client_files_template(clt_no,cft_FileConvention,cft_Description,cft_DataItem,cft_TalendSupport,cft_LoadType,cft_ReceiveFrequency,cft_IsMultiSchema,cft_IsDelimited,cft_Delimiter,cft_DefaultDelCount,cft_TextQualifier,cft_RecordSeparator,cft_IsPositional,cft_IsEBCDIC,cft_RecordLength,cft_IsOracleDMP,cft_OracleDMPType,cft_IsReportImage,cft_IsX12,cft_IsEDIFACT,cft_IsFoxpro,cft_IsSaveFile,cft_TableName,cft_EffectiveDate,cft_EndDate,cft_IsActive,cft_Attribute1,cft_Attribute2,cft_Attribute3,cft_Attribute4,clt_id) values('".$x."','$cft_FileConvention','$cft_Description','$cft_DataItem','$cft_TalendSupport','$cft_LoadType','$cft_ReceiveFrequency','$cft_IsMultiSchema','$cft_IsDelimited','$cft_Delimiter','$cft_DefaultDelCount','$cft_TextQualifier','$cft_RecordSeparator','$cft_IsPositional','$cft_IsEBCDIC','$cft_RecordLength','$cft_IsOracleDMP','$cft_OracleDMPType','$cft_IsReportImage','$cft_IsX12','$cft_IsEDIFACT','$cft_IsFoxpro','$cft_IsSaveFile','$cft_TableName','$cft_EffectiveDate','$cft_EndDate','$cft_IsActive','$cft_Attribute2','$cft_Attribute2','$cft_Attribute3','$cft_Attribute4','".$_SESSION['clt_id']."')"; 
	
	$check=mysql_query($query3)or die(mysql_error());
	
	//echo "<div class='container'><div class='card col-md-4 success_msg_div'>Client Added Successfully</div></div>";
	//echo "<br><br><br><div> Client succesfully added</div>";

	header("Location:add_clients.php");
//echo "hello".$x;
//echo "hi".$row['clt_no'];
$_SESSION['cft_flag']=1;
}

?>



<!DOCTYPE html>

<body>

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
	<h3 >Client Files Template</h3>
      <a href="http://1000hz.github.io/bootstrap-validator/" target="_blank"></a>
    </div>
    <div class="panel-body">
    <!--  <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        
      </div>							-->
      <form role="form" id="form" name="form" method="post"   >
	  <div class="container-fluid">
	  
        <!-- <div class="form-group input-field col-md-4">
              <label for="clt_id">clt_id:</label>
              <input type="number" class="form-control" id="clt_id" name="clt_id" pattern="[0-9]{0,}$" >
              
        </div> -->
		
		
		
		<div class="form-group input-field col-md-4">
              <label for="clt_no">clt_no:</label>
              <input type="number" class="form-control" id="clt_no" name="clt_no" pattern="[0-9]" value="<?php if($_SESSION['cft_flag']==0){echo htmlspecialchars($_SESSION['clt_no']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_FileConvention">cft_FileConvention:</label>
              <input type="text" class="form-control" id="cft_FileConvention" name="cft_FileConvention" pattern="[a-z\_s]{0,}$" title="Lowercase only e.g abc" value="<?php if($_SESSION['cft_flag']==0){echo htmlspecialchars($_SESSION['cft_FileConvention']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_Description">cft_Description:</label>
              <input type="text" class="form-control" id="cft_Description" name="cft_Description" pattern="[a-zA-Z_\s]{0,}$" value="<?php if($_SESSION['cft_flag']==0){echo htmlspecialchars($_SESSION['cft_Description']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_DataItem">cft_DataItem:</label>
              <input type="text" class="form-control" id="cft_DataItem" name="cft_DataItem" pattern="[A-Z_\s]{0,}$" required title="Uppercase only e.g ABC" value="<?php if($_SESSION['cft_flag']==0){echo htmlspecialchars($_SESSION['cft_DataItem']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
             <select name="cft_TalendSupport" value="<?php if($_SESSION['cft_flag']==0){echo htmlspecialchars($_SESSION['cft_TalendSupport']);}else{echo '';}?>">
				<option <?php if($_SESSION['cft_TalendSupport']=='1') {echo "selected='selected'";} ?> value="1">Y</option  >
				<option <?php if($_SESSION['cft_TalendSupport']=='0') {echo "selected='selected'";} ?> value="0">N</option  >
			</select>
			<label for="cft_TalendSupport">cft_TalendSupport:</label>
		</div>
		
		<div class="form-group input-field col-md-4">
             <select name="cft_LoadType" required value="<?php if($_SESSION['cft_flag']==0){echo htmlspecialchars($_SESSION['cft_LoadType']);}else{echo '';}?>">
				<option value="" >Choose your option</option>
				<option <?php if($_SESSION['cft_LoadType']=="HadoopLoad" && $_SESSION['cft_flag']==0) {echo "selected='selected'";} ?> value="HadoopLoad">HadoopLoad</option  required>
				<option <?php if($_SESSION['cft_LoadType']=="TalendLoad" && $_SESSION['cft_flag']==0) {echo "selected='selected'";} ?> value="TalendLoad">TalendLoad</option  required>
				<option <?php if($_SESSION['cft_LoadType']=="Manual" && $_SESSION['cft_flag']==0) {echo "selected='selected'";} ?> value="Manual">Manual</option required >
			</select>
			<label for="cft_LoadType">cft_LoadType:</label>
		</div>
		
		<div class="form-group input-field col-md-4">
             <select name="cft_ReceiveFrequency"  required value="<?php if($_SESSION['cft_flag']==0){echo htmlspecialchars($_SESSION['cft_ReceiveFrequency']);}else{echo '';}?>">
				<option value="" >Choose your option</option>
				<option <?php if($_SESSION['cft_ReceiveFrequency']=="Daily" && $_SESSION['cft_flag']==0) {echo "selected='selected'";} ?> value="Daily">Daily</option  required>
				<option <?php if($_SESSION['cft_ReceiveFrequency']=="Weekly" && $_SESSION['cft_flag']==0) {echo "selected='selected'";} ?> value="Weekly" >Weekly</option  required>
				<option <?php if($_SESSION['cft_ReceiveFrequency']=="Monthly" && $_SESSION['cft_flag']==0) {echo "selected='selected'";} ?> value="Monthly" >Monthly</option required >
				<option <?php if($_SESSION['cft_ReceiveFrequency']=="Quarterly" && $_SESSION['cft_flag']==0) {echo "selected='selected'";} ?> value="Quarterly" >Quarterly</option required >
				<option <?php if($_SESSION['cft_ReceiveFrequency']=="BiAnnually" && $_SESSION['cft_flag']==0) {echo "selected='selected'";} ?> value="BiAnnually" >BiAnnually</option required >
				<option <?php if($_SESSION['cft_ReceiveFrequency']=="Annually" && $_SESSION['cft_flag']==0) {echo "selected='selected'";} ?> value="Annually" >Annually</option required >
				<option <?php if($_SESSION['cft_ReceiveFrequency']=="AdHoc" && $_SESSION['cft_flag']==0) {echo "selected='selected'";} ?> value="AdHoc" >AdHoc</option required >
			</select>
			<label>cft_ReceiveFrequency</label>
		</div>
		
		<div class="form-group input-field col-md-4">
             <select name="cft_IsMultiSchema" value="<?php if($_SESSION['cft_flag']==0){echo htmlspecialchars($_SESSION['cft_IsMultiSchema']);}else{echo '';}?>">
				<option value="">Choose your option</option  >
				<option <?php if($_SESSION['cft_IsMultiSchema']=='1' && $_SESSION['cft_flag']==0) {echo "selected='selected'";} ?> value="1">Y</option  >
				<option <?php if($_SESSION['cft_IsMultiSchema']=='0' && $_SESSION['cft_flag']==0) {echo "selected='selected'";} ?> value="0">N</option >
			</select>
			<label>cft_IsMultiSchema</label>
		</div>
		
		<div class="form-group input-field col-md-4">
             <select name="cft_IsDelimited" value="<?php if($_SESSION['cft_flag']==0){echo htmlspecialchars($_SESSION['cft_IsDelimited']);}else{echo '';}?>">
				<option value="">Choose your option</option  >
				<option <?php if($_SESSION['cft_IsDelimited']=='1' && $_SESSION['cft_flag']==0) {echo "selected='selected'";} ?> value=1>Y</option >
				<option <?php if($_SESSION['cft_IsDelimited']=='0' && $_SESSION['cft_flag']==0) {echo "selected='selected'";} ?> value=0>N</option >
			</select>
			<label>cft_IsDelimited</label>
		</div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_Delimeter">cft_Delimeter:</label>
              <input type="text" class="form-control" id="cft_Delimeter" name="cft_Delimeter" pattern="[a-zA-Z_\s]{0,}$" value="<?php if($_SESSION['cft_flag']==0){echo htmlspecialchars($_SESSION['cft_Delimeter']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_DefaultDelCount">cft_DefaultDelCount:</label>
              <input type="text" class="form-control" id="cft_DefaultDelCount" name="cft_DefaultDelCount" pattern="[a-zA-Z_\s]{0,}$" value="<?php if($_SESSION['cft_flag']==0){echo htmlspecialchars($_SESSION['cft_DefaultDelCount']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_TextQualifier">cft_TextQualifier:</label>
              <input type="text" class="form-control" id="cft_TextQualifier" name="cft_TextQualifier" pattern="[a-zA-Z_\s]{0,}$" value="<?php if($_SESSION['cft_flag']==0){echo htmlspecialchars($_SESSION['cft_TextQualifier']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_RecordSeparator">cft_RecordSeparator:</label>
              <input type="text" class="form-control" value="
			  " id="cft_RecordSeparator" name="cft_RecordSeparator" pattern="[a-zA-Z_\s]{0,}$" value="<?php if($_SESSION['cft_flag']==0){echo htmlspecialchars($_SESSION['cft_RecordSeparator']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
             <select name="cft_IsPositional" value="<?php if($_SESSION['cft_flag']==0){echo htmlspecialchars($_SESSION['cft_IsPositional']);}else{echo '';}?>">
				<option value="">Choose your option</option  >
				<option <?php if($_SESSION['cft_IsPositional']=='1' && $_SESSION['cft_flag']==0) {echo "selected='selected'";} ?> value="1">Y</option  >
				<option <?php if($_SESSION['cft_IsPositional']=='0' && $_SESSION['cft_flag']==0) {echo "selected='selected'";} ?> value="0">N</option  >
			</select>
			<label>cft_IsPositional</label>
		</div>
		
		<div class="form-group input-field col-md-4">
             <select name="cft_IsEBCDIC" value="<?php if($_SESSION['cft_flag']==0){echo htmlspecialchars($_SESSION['cft_IsEBCDIC']);}else{echo '';}?>">
				<option value="">Choose your option</option >
				<option <?php if($_SESSION['cft_IsEBCDIC']=='1' && $_SESSION['cft_flag']==0) {echo "selected='selected'";} ?> value="1">Y</option >
				<option <?php if($_SESSION['cft_IsEBCDIC']=='0' && $_SESSION['cft_flag']==0) {echo "selected='selected'";} ?> value="0">N</option >
			</select>
			<label>cft_IsEBCDIC</label>
		</div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_RecordLength">cft_RecordLength:</label>
              <input type="number" class="form-control" id="cft_RecordLength" name="cft_RecordLength" pattern="[a-zA-Z_\s]{0,}$" required title="Mandatory for EBCDIC" value="<?php if($_SESSION['cft_flag']==0){echo htmlspecialchars($_SESSION['cft_RecordLength']);}else{echo '';}?>">
              
        </div>
		
		
		
		<div class="form-group input-field col-md-4">
             <select name="cft_IsOracleDMP" value="<?php if($_SESSION['cft_flag']==0){echo htmlspecialchars($_SESSION['cft_IsOracleDMP']);}else{echo '';}?>">
				<option value="">Choose your option</option  >
				<option <?php if($_SESSION['cft_IsOracleDMP']=='1' && $_SESSION['cft_flag']==0) {echo "selected='selected'";} ?> value="1">Y</option  >
				<option <?php if($_SESSION['cft_IsOracleDMP']=='0' && $_SESSION['cft_flag']==0) {echo "selected='selected'";} ?> value="0">N</option  >
			</select>
			<label>cft_IsOracleDMP</label>
		</div>
		
		<div class="form-group input-field col-md-4">
             <select name="cft_OracleDMPType" required value="<?php if($_SESSION['cft_flag']==0){echo htmlspecialchars($_SESSION['cft_OracleDMPType']);}else{echo '';}?>">
				<option value="" >Choose your option</option>
				<option <?php if($_SESSION['cft_OracleDMPType']=="Dump" && $_SESSION['cft_flag']==0) {echo "selected='selected'";} ?> value="Dump">Dump</option  required>
				<option <?php if($_SESSION['cft_OracleDMPType']=="Pump" && $_SESSION['cft_flag']==0) {echo "selected='selected'";} ?> value="Pump">Pump</option  required>
			</select>
			<label for="cft_OracleDMPType">cft_OracleDMPType:</label>
		</div>
		
		<div class="form-group input-field col-md-4">
             <select name="cft_IsReportImage" value="<?php if($_SESSION['cft_flag']==0){echo htmlspecialchars($_SESSION['cft_IsReportImage']);}else{echo '';}?>">
				<option value="">Choose your option</option  >
				<option <?php if($_SESSION['cft_IsReportImage']=='1' && $_SESSION['cft_flag']==0) {echo "selected='selected'";} ?> value="1">Y</option  >
				<option <?php if($_SESSION['cft_IsReportImage']=='0' && $_SESSION['cft_flag']==0) {echo "selected='selected'";} ?> value="0">N</option  >
			</select>
			<label>cft_IsReportImage</label>
		</div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_IsX12">cft_IsX12:</label>
              <input type="text" class="form-control" id="cft_IsX12" name="cft_IsX12" pattern="[0-1]{1}" title="Please enter either 0 or 1" placeholder="Enter either 0 or 1 only" value="<?php if($_SESSION['cft_flag']==0){echo htmlspecialchars($_SESSION['cft_IsX12']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_IsEDIFACT">cft_IsEDIFACT:</label>
              <input type="text" class="form-control" id="cft_IsEDIFACT" name="cft_IsEDIFACT" pattern="[0-1]{1}" title="Please enter either 0 or 1" placeholder="Enter either 0 or 1 only" value="<?php if($_SESSION['cft_flag']==0){echo htmlspecialchars($_SESSION['cft_IsEDIFACT']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_IsFoxpro">cft_IsFoxpro:</label>
              <input type="text" class="form-control" id="cft_IsFoxpro" name="cft_IsFoxpro" pattern="^[0-1]{1}$" title="Please enter either 0 or 1" placeholder="Enter either 0 or 1 only" value="<?php if($_SESSION['cft_flag']==0){echo htmlspecialchars($_SESSION['cft_IsFoxpro']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_IsSaveFile">cft_IsSaveFile:</label>
              <input type="text" class="form-control" id="cft_IsSaveFile" name="cft_IsSaveFile" pattern="^[0-1]{1}$" title="Please enter either 0 or 1" placeholder="Enter either 0 or 1 only" value="<?php if($_SESSION['cft_flag']==0){echo htmlspecialchars($_SESSION['cft_IsSaveFile']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_TableName">cft_TableName:</label>
              <input type="text" class="form-control" id="cft_TableName" name="cft_TableName" pattern="[a-zA-Z_\s]{0,}$" value="<?php if($_SESSION['cft_flag']==0){echo htmlspecialchars($_SESSION['cft_TableName']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_EffectiveDate">cft_EffectiveDate:</label>
              <input type="text" class="form-control" id="cft_EffectiveDate" name="cft_EffectiveDate" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" title="Enter in yyyy-mm-dd format (1990's or 2000's)" value="<?php if($_SESSION['cft_flag']==0){echo htmlspecialchars($_SESSION['cft_EffectiveDate']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_EndDate">cft_EndDate:</label>
              <input type="text" class="form-control" id="cft_EndDate" name="cft_EndDate" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" title="Enter in yyyy-mm-dd format (1990's or 2000's)" value="<?php if($_SESSION['cft_flag']==0){echo htmlspecialchars($_SESSION['cft_EndDate']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
             <select name="cft_IsActive" required value="<?php if($_SESSION['cft_flag']==0){echo htmlspecialchars($_SESSION['cft_IsActive']);}else{echo '';}?>">
				<option value="" >Choose your option</option required>
				<option <?php if($_SESSION['cft_IsActive']=='1' && $_SESSION['cft_flag']==0) {echo "selected='selected'";} ?> value="1">Y</option  required>
				<option <?php if($_SESSION['cft_IsActive']=='0' && $_SESSION['cft_flag']==0) {echo "selected='selected'";} ?> value="0">N</option  required>
			</select>
			<label>cft_IsActive</label>
		</div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_Attribute1">cft_Attribute1:</label>
              <input type="text" class="form-control" id="cft_Attribute1" name="cft_Attribute1" pattern="[a-zA-Z_\s]{0,}$" value="<?php if($_SESSION['cft_flag']==0){echo htmlspecialchars($_SESSION['cft_Attribute1']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_Attribute2">cft_Attribute2:</label>
              <input type="text" class="form-control" id="cft_Attribute2" name="cft_Attribute2" pattern="[a-zA-Z_\s]{0,}$" value="<?php if($_SESSION['cft_flag']==0){echo htmlspecialchars($_SESSION['cft_Attribute2']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_Attribute3">cft_Attribute3:</label>
              <input type="text" class="form-control" id="cft_Attribute3" name="cft_Attribute3" pattern="[a-zA-Z_\s]{0,}$" value="<?php if($_SESSION['cft_flag']==0){echo htmlspecialchars($_SESSION['cft_Attribute3']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_Attribute4">cft_Attribute4:</label>
              <input type="text" class="form-control" id="cft_Attribute4" name="cft_Attribute4" pattern="[0-1]{1}" title="Please enter either 0 or 1" placeholder="Enter either 0 or 1 only" value="<?php if($_SESSION['cft_flag']==0){echo htmlspecialchars($_SESSION['cft_Attribute4']);}else{echo '';}?>">
              
        </div>
      
	</div>
	<button type="submit" name="filesubmit" class="btn btn-default" >SUBMIT DETAILS</button>
	 <button type="button" name="submit" class="btn btn-default" onclick="goBack()">BACK TO client_load_template</button>
	 <br><br><br>
	 
	
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.2/js/materialize.min.js"></script>
<script>
    $(document).ready(function() {
        $('select').material_select();
    });
</script>	

<script >

function goBack() {
	
    window.location.href= "client_load_template.php";
}

</script>
	
	
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
