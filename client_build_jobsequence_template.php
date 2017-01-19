<?php 
include("header.php");
set_header_focus(2);

error_reporting(0);
extract($_POST);
if(isset($submit))
{
	//echo $cjt_SequenceId;
	//echo $cjt_ScriptName;
	//echo $build_name_select;
	//echo $client_select;
	$query="INSERT into client_build_jobsequence_template( cbi_id , c_id , cjt_SequenceId , cjt_ScriptName , cjt_EffectiveDate , cjt_CancelDate) values('$build_name_select' , '$client_select' , '$cjt_SequenceId' , '$cjt_ScriptName' , '$cjt_EffectiveDate' , '$cjt_CancelDate')";
	$a=mysql_query($query);
	if($a)
		echo "<div class='container'><div class='card col-md-12 success_msg_div'>JobSquence Added Successfully</div></div>";
}
?>



<!DOCTYPE html>

<body>
<div class="container-fluid">
	
		<div class="col-md-3 side-menu"><!-- ***************side-menu***************** -->
			
				<ul class="collapsible" data-collapsible="accordion">
					<li>
						<div class="collapsible-header">
							<h4 ><a href="client_build_jobsequence_template.php">Add Jobsequence template scripts</a></h4>
						</div>
						
					</li>
					
					<li>
						<div class="collapsible-header">
							<h4 ><a href="client_build_jobsequence.php">Jobsequence</a></h4>
						</div>
						
					</li>
					
					
				</ul>
			
		</div>
		<div class="col-md-9 ">
<div class="container-fluid">
  <div class="panel panel-default">
    <div class="panel-heading">
	<h3 >Build Job Sequence Template</h3>
      <a href="http://1000hz.github.io/bootstrap-validator/" target="_blank"></a>
    </div>
    <div class="panel-body">
    						
			
			<form id="form" name="form" method="post">
			<div class="container-fluid">
	 			 
     
			             	<div class="col-md-6">
					 		<label for="Client">Client:</label>
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
					 		<label for="build_name_select">Build_ID-Build_name:</label>
									<select id='build_name_select' name='build_name_select' class='browser-default'>
						</select>
							</div>
        	
	
	
			<div  class="form-group input-field col-md-4 ">
              <label for="cjt_SequenceId">Script Sequence:</label>
              <input type="number" class="form-control" id="cjt_SequenceId" name="cjt_SequenceId"> 
              
			</div>
	  
		
			<div  class="form-group input-field col-md-4 ">
              <label for="cjt_ScriptName">Script Name:</label>
              <input type="text" class="form-control" id="cjt_ScriptName" name="cjt_ScriptName"> 
              
			</div>
			
			<div  class="form-group input-field col-md-4 ">
              <label for="cjt_EffectiveDate">Effective Date:</label>
              <input type="text" class="form-control" id="cjt_EffectiveDate" name="cjt_EffectiveDate" pattern="(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31)-?:(?:0[1-9]|1[0-2])-(?:19|20)[0-9]{2}" title="Enter in dd-mm-yy format (1990's or 2000's)"> 
              
			</div>
	  
	  
			<div  class="form-group input-field col-md-4 ">
              <label for="cjt_CancelDate">Cancel Date:</label>
              <input type="text" class="form-control" id="cjt_CancelDate" name="cjt_CancelDate" pattern="(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31)-?:(?:0[1-9]|1[0-2])-(?:19|20)[0-9]{2}" title="Enter in dd-mm-yy format (1990's or 2000's)"> 
              
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
</body>


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
		//	alert(data);
		var arr = jQuery.parseJSON(data);
		//alert(arr);
		var al = arr.length;
			//alert(al);
			var i=0;
			for(i = 0 ;i<al ; i++){
					$('#build_name_select').append("<option value='"+arr[i]['cbi_id']+"'>"+arr[i]['cbi_id']+' - '+arr[i]['cbi_build_name']+"</option>");
				
			}
			
			//var sel=$('#build_name_select').find('option:selected').attr('value');
			//alert(sel);
		}
	});
	
}

</script>

