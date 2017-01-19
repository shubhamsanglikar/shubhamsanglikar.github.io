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
	$query="insert into client_fies_template(c_id,cft_id,clt_no,cft_FileConversion,cft_Description,cft_DataItem,cft_TalendSupport,cft_LoadType,cft_ReceiveFrequency,cft_IsMultiSchema,cft_IsDelimited,cft_Delimiter,cft_DefaultDelCount,cft_TextQualifier,cft_RecordSeparator,cft_IsPositional,cft_IsEBCDIC,cft_RecordLength,cft_IsOracleDMP,cft_OracleDMPType,cft_IsReportImage,cft_IsX12,cft_IsEDIFACT,cft_Foxpro,cft_SaveFile,cft_TableName,cft_EffectiveDate,cft_EndDate,cft_IsActive,cft_Attribute1,cft_Attribute2,cft_Attribute3,cft_Attribute4) values('$c_id','$clt_id','$clt_no','$cft_FileConversion','$cft_Description','$cft_DataItem','$cft_TalendSupport','$cft_LoadType','$clt_ReceiveFrequency','$cft_IsMultiSchema','$cft_IsDelimited','$cft_Delimiter','$cft_DefaultDelCount','$cft_TextQualifier','$cft_RecordSeparator','$cft_IsPositional','$cft_IsEBCDIC','$cft_RecordLength','$cft_IsOracleDMP','$cft_OracleDMPType','$cft_IsReportImage','$cft_IsX12','$cft_IsEDIFACT','$cft_Foxpro','$cft_SaveFile','$cft_TableName','$cft_EffectiveDate','$cft_EndDate',$cft_IsActive','$clt_Attribute2','$clt_Attribute2','$clt_Attribute3','$clt_Attribute4')"; 
	$check=mysql_query($query)or die(mysql_error());
	echo "<br><br><br><div> Client succesfully added</div>";
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
      <form role="form">
	  <div class="container-fluid">
	  
        <!-- <div class="form-group input-field col-md-4">
              <label for="c_id">c_id:</label>
              <input type="number" class="form-control" id="c_id" name="c_id" pattern="^[a-zA-Z\s]{3,}$" >
              
        </div> -->
		
		<div class="form-group input-field col-md-4">
              <label for="cft_id">cft_id:</label>
              <input type="number" class="form-control" id="cft_id" name="cft_id" pattern="[0-9]" >
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="clt_no">clt_no:</label>
              <input type="number" class="form-control" id="clt_no" name="clt_no" pattern="[0-9]" required>
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_FileConvension">cft_FileConvension:</label>
              <input type="text" class="form-control" id="cft_FileConvension" name="cft_FileConvension" pattern="^[a-zA-Z\s]{3,}$" >
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_Description">cft_Description:</label>
              <input type="text" class="form-control" id="cft_Description" name="cft_Description" pattern="^[a-zA-Z\s]{3,}$" >
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_DataItem">cft_DataItem:</label>
              <input type="text" class="form-control" id="cft_DataItem" name="cft_DataItem" pattern="^[a-zA-Z\s]{3,}$" >
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_TalendSupport">cft_TalendSupport:</label>
              <input type="text" class="form-control" id="cft_TalendSupport" name="cft_TalendSupport" pattern="[0-1]{1}" title="Please enter either 0 or 1" placeholder="Enter either 0 or 1 only">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_LoadType">cft_LoadType:</label>
              <input type="text" class="form-control" id="cft_LoadType" name="cft_LoadType" pattern="^[a-zA-Z\s]{3,}$" >
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_ReceiveFrequency">cft_ReceiveFrequency:</label>
              <input type="text" class="form-control" id="cft_ReceiveFrequency" name="cft_ReceiveFrequency" pattern="^[a-zA-Z\s]{3,}$" >
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_IsMultiSchema">cft_IsMultiSchema:</label>
              <input type="text" class="form-control" id="cft_IsMultiSchema" name="cft_IsMultiSchema" pattern="[0-1]{1}" title="Please enter either 0 or 1" placeholder="Enter either 0 or 1 only">
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_IsDelimited">cft_IsDelimited:</label>
              <input type="text" class="form-control" id="cft_IsDelimited" name="cft_IsDelimited" pattern="[0-1]{1}" title="Please enter either 0 or 1" placeholder="Enter either 0 or 1 only">
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_Delimeter">cft_Delimeter:</label>
              <input type="text" class="form-control" id="cft_Delimeter" name="cft_Delimeter" pattern="^[a-zA-Z\s]{3,}$" >
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_DefaultDelCount">cft_DefaultDelCount:</label>
              <input type="text" class="form-control" id="cft_DefaultDelCount" name="cft_DefaultDelCount" pattern="^[a-zA-Z\s]{3,}$" >
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_TextQualifier">cft_TextQualifier:</label>
              <input type="text" class="form-control" id="cft_TextQualifier" name="cft_TextQualifier" pattern="^[a-zA-Z\s]{3,}$" >
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_RecordSeparator">cft_RecordSeparator:</label>
              <input type="text" class="form-control" id="cft_RecordSeparator" name="cft_RecordSeparator" pattern="^[a-zA-Z\s]{3,}$" >
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_IsPositional">cft_IsPositional:</label>
              <input type="text" class="form-control" id="cft_IsPositional" name="cft_IsPositional" pattern="[0-1]{1}" title="Please enter either 0 or 1" placeholder="Enter either 0 or 1 only">
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_EBCDIC">cft_EBCDIC:</label>
              <input type="text" class="form-control" id="cft_EBCDIC" name="cft_EBCDIC" pattern="[0-1]{1}" title="Please enter either 0 or 1" placeholder="Enter either 0 or 1 only">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_RecordLength">cft_RecordLength:</label>
              <input type="text" class="form-control" id="cft_RecordLength" name="cft_RecordLength" pattern="^[a-zA-Z\s]{3,}$" >
              
        </div>
		
		
		
		<div class="form-group input-field col-md-4">
              <label for="cft_IsOracleDMP">cft_IsOracleDMP:</label>
              <input type="text" class="form-control" id="cft_IsOracleDMP" name="cft_IsOracleDMP" pattern="[0-1]{1}" title="Please enter either 0 or 1" placeholder="Enter either 0 or 1 only">
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_OracleDMPType">cft_OracleDMPType:</label>
              <input type="text" class="form-control" id="cft_OracleDMPType" name="cft_OracleDMPType" pattern="^[a-zA-Z\s]{3,}$" >
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_IsReportImage">cft_IsReportImage:</label>
              <input type="text" class="form-control" id="cft_IsReportImage" name="cft_IsReportImage" pattern="[0-1]{1}" title="Please enter either 0 or 1" placeholder="Enter either 0 or 1 only">
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_IsX12">cft_IsX12:</label>
              <input type="text" class="form-control" id="cft_IsX12" name="cft_IsX12" pattern="[0-1]{1}" title="Please enter either 0 or 1" placeholder="Enter either 0 or 1 only">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_IsEDIFACT">cft_IsEDIFACT:</label>
              <input type="text" class="form-control" id="cft_IsEDIFACT" name="cft_IsEDIFACT" pattern="[0-1]{1}" title="Please enter either 0 or 1" placeholder="Enter either 0 or 1 only">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_IsFoxpro">cft_IsFoxpro:</label>
              <input type="text" class="form-control" id="cft_IsFoxpro" name="cft_IsFoxpro" pattern="[0-1]{1}" title="Please enter either 0 or 1" placeholder="Enter either 0 or 1 only">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_IsSaveFile">cft_IsSaveFile:</label>
              <input type="text" class="form-control" id="cft_IsSaveFile" name="cft_IsSaveFile" pattern="[0-1]{1}" title="Please enter either 0 or 1" placeholder="Enter either 0 or 1 only">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_TableName">cft_TableName:</label>
              <input type="text" class="form-control" id="cft_TableName" name="cft_TableName" pattern="^[a-zA-Z\s]{3,}$" >
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_EffectiveDate">cft_EffectiveDate:</label>
              <input type="text" class="form-control" id="cft_EffectiveDate" name="cft_EffectiveDate" pattern="^[a-zA-Z\s]{3,}$" >
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_EndDate">cft_EndDate:</label>
              <input type="text" class="form-control" id="cft_EndDate" name="cft_EndDate" pattern="^[a-zA-Z\s]{3,}$" >
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_IsActive">cft_IsActive:</label>
              <input type="text" class="form-control" id="cft_IsActive" name="cft_IsActive" pattern="[0-1]{1}" title="Please enter either 0 or 1" placeholder="Enter either 0 or 1 only">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_Attribute1">cft_Attribute1:</label>
              <input type="text" class="form-control" id="cft_Attribute1" name="cft_Attribute1" pattern="^[a-zA-Z\s]{3,}$" >
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_Attribute2">cft_Attribute2:</label>
              <input type="text" class="form-control" id="cft_Attribute2" name="cft_Attribute2" pattern="^[a-zA-Z\s]{3,}$" >
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_Attribute3">cft_Attribute3:</label>
              <input type="text" class="form-control" id="cft_Attribute3" name="cft_Attribute3" pattern="^[a-zA-Z\s]{3,}$" >
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="cft_Attribute4">cft_Attribute4:</label>
              <input type="text" class="form-control" id="cft_Attribute4" name="cft_Attribute4" pattern="[0-1]{1}" title="Please enter either 0 or 1" placeholder="Enter either 0 or 1 only">
              
        </div>
		
		
		
        
	</div>
	<button type="submit" class="btn btn-default">Submit</button>
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
