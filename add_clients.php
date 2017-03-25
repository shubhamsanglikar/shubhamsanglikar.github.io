<?php 
include("header.php");
set_header_focus(1);
extract($_POST);
error_reporting(0);

if(isset($submit))
{
	
$_SESSION['c_Client']=$c_Client;
$_SESSION['c_ClientType']= $c_ClientType ;
$_SESSION['c_Description']= $c_Description ;
$_SESSION['c_ShortName']= $c_ShortName ;
$_SESSION['c_Country']= $c_Country ;
$_SESSION['c_Location']= $c_Location ;
$_SESSION['c_OtherDetails']= $c_OtherDetails ;
$_SESSION['c_EffectiveDate']= $c_EffectiveDate ;
$_SESSION['c_EndDate']= $c_EndDate ;
$_SESSION['c_CreateDate']= $c_CreateDate ;
$_SESSION['c_CreateDate']= $c_CreateDate ;

$_SESSION['add_clients_flag']=0;


header("Location:client_load_template.php");
}

?>
<!DOCTYPE html>

<body>

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
	<h3 >Client Info</h3>
      <a href="http://1000hz.github.io/bootstrap-validator/" target="_blank"></a>
    </div>
    <div class="panel-body">
    <!--  <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
         action='client_load_template.php'
      </div>							-->
      <form role="form" id="form" name="form" method="post"   >
	  <div class="container-fluid">
	  
     <!--   <div class="form-group input-field col-md-4">
              <label for="c_id">c_id:</label>
              <input type="number" class="form-control" id="c_id" name="c_id" pattern="^[a-zA-Z0-9\s]{3,}$" required title="Enter integer values">
              value=" // if($_SESSION['res'] == 1){echo htmlspecialchars($_SESSION['c_Client']);}else{echo"AaaaaAssss";}?> "
        </div>	-->
		
		<div class="form-group input-field col-md-4">
              <label for="c_Client">c_Client:</label>
              <input type="text" class="form-control" id="c_Client" name="c_Client" pattern="[A-Z]([A-Z0-9]*[a-z][a-z0-9]*[A-Z]|[a-z0-9]*[A-Z][A-Z0-9]*[a-z])[A-Za-z0-9]*" value="<?php if($_SESSION['add_clients_flag']==0){echo htmlspecialchars($_SESSION['c_Client']);}else{echo '';}?>" title="Enter in CamelCase e.g SouthAmerica">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="c_ClientType">c_ClientType:</label>
              <input type="text" class="form-control" id="c_ClientType" name="c_ClientType" pattern="[a-zA-Z0-9_\s]{0,}$" value="<?php if($_SESSION['add_clients_flag']==0){echo htmlspecialchars($_SESSION['c_ClientType']);}else{echo '';}?>" >
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="c_Description">c_Description:</label>
              <input type="text" class="form-control" id="c_Description" name="c_Description" pattern="[a-zA-Z0-9_\s]{0,}$" value="<?php if($_SESSION['add_clients_flag']==0){echo htmlspecialchars($_SESSION['c_Description']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="c_ShortName">c_ShortName:</label>
              <input type="text" class="form-control" id="c_ShortName" name="c_ShortName" patternn="^[A-Z]{3}$" title="Uppercase only without spaces, LIMIT 3 CHARACTERS e.g ABC" title="Uppercase only e.g ABC" value="<?php if($_SESSION['add_clients_flag']==0){echo htmlspecialchars($_SESSION['c_ShortName']);}else{echo '';}?>">
              
        </div>
			
		<div class="form-group input-field col-md-4">
              <label for="c_Country">c_Country:</label>
              <input type="text" class="form-control" id="c_Country" name="c_Country" pattern="[A-Z\_s]{0,}" title="Uppercase only e.g ABC" value="<?php if($_SESSION['add_clients_flag']==0){echo htmlspecialchars($_SESSION['c_Country']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="c_Location">c_Location:</label>
              <input type="text" class="form-control" id="c_Location" name="c_Location" pattern="[A-Z\_s]{0,}" title="Uppercase only e.g ABC" value="<?php if($_SESSION['add_clients_flag']==0){echo htmlspecialchars($_SESSION['c_Location']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="c_OtherDetails">c_OtherDetails:</label>
              <input type="text" class="form-control" id="c_OtherDetails" name="c_OtherDetails" pattern="[a-zA-Z0-9_\s]{0,}" value="<?php if($_SESSION['add_clients_flag']==0){echo htmlspecialchars($_SESSION['c_OtherDetails']);}else{echo '';}?>">
           
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="c_EffectiveDate">c_EffectiveDate:</label>
              <input type="text" class="form-control" id="c_EffectiveDate" name="c_EffectiveDate" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" title="Enter in yyyy-mm-dd format (1990's or 2000's)" value="<?php if($_SESSION['add_clients_flag']==0){echo htmlspecialchars($_SESSION['c_EffectiveDate']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="c_EndDate">c_EndDate:</label>
              <input type="text" class="form-control" id="c_EndDate" name="c_EndDate" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" title="Enter in yyyy-mm-dd format (1990's or 2000's)" value="<?php if($_SESSION['add_clients_flag']==0){echo htmlspecialchars($_SESSION['c_EndDate']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="c_CreateDate">c_CreateDate:</label>
              <input type="text" class="form-control" id="c_CreateDate" name="c_CreateDate" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" title="Enter in yyyy-mm-dd format (1990's or 2000's)" value="<?php if($_SESSION['add_clients_flag']==0){echo htmlspecialchars($_SESSION['c_CreateDate']);}else{echo '';}?>">
              
        </div>
		
		<div class="form-group input-field col-md-4">
              <label for="c_ActiveFlag">c_ActiveFlag:</label>
              <input type="text" class="form-control" id="c_ActiveFlag" name="c_ActiveFlag" pattern="[0-1]{1}" title="Please enter either 0 or 1" value="1">
              
        </div>
		
		
		
        
	</div>
		<button type="submit" name="submit" class="btn btn-default">Move to client_load_template</button>
	<!-- <input type="submit" value="Add" name="submit" class="waves-effect waves-light btn" ></input> -->
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
