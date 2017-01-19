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
<script type="text/javascript">
var htmlstr,arr,query;

	function display_scripts(){
		//alert($('#build_name_select').find(':selected').attr('value'));
		htmlstr="<table id='table' class='display dataTable' width='100%' cellspacing='10'>"+
		"<thead><tr><th></th><th>cjt_SequenceId</th><th>cjt_ScriptName</th></tr></thead>"+
		"<tfoot><tr><th></th><th>cjt_SequenceId</th><th>cjt_ScriptName</th></tr></tfoot><tbody>";
		htmlstr = htmlstr + "</tbody></table>";
		$("#checkboxes_div").html(htmlstr);
		$.ajax({
			url: 'ajax/ajax_get_single_row_from_database.php',
			type: 'POST',
			data: {query:"select cjt_SequenceId, cjt_ScriptName from client_build_jobsequence_template where cbi_id = "+$('#build_name_select').find(':selected').attr('value')+" and c_id = "+$('#client_select').find(':selected').attr('value')},
			success:function(data){
				 arr = jQuery.parseJSON(data);
				//alert(arr.length);
				var i =0;
				for(i=0; i<arr.length;i++){
					//alert(htmlstr);
					$('#table').append("<tr><td><input type='checkbox' id='"+arr[i][1]+"' /><label for='"+arr[i][1]+"'></label></td><td>"+arr[i][0]+"</td><td>"+arr[i][1]+"</td></tr>");
				}
				$('#build_info_table').DataTable({                           
				       "bJQueryUI": true,
				       "sPaginationType": "full_numbers",
				       "bpaging": false,
				       "bSort": true,
				       "bFilter": true,
				    });
				$(".dataTables_length select").addClass("browser-default");
				$('#button_div').html("<button type='button' class='btn btn-default' onclick='insert_scripts()'>Add Scripts</button>");
			}
		});
		
	}

	function insert_scripts(){
		query = "insert into client_build_jobsequence ( cbi_id, cjt_SequenceId, cbj_script_name ) values ";
		//alert($("#build_name_select").find(":selected").attr('value'));
		var bid=  $("#build_name_select").find(":selected").attr('value');
		var comma_flag=0;
		//alert(arr.length);
		for(i=0;i<arr.length;i++){
			//alert(arr[i][1]);
			if($('#'+arr[i][1]).prop("checked") == true){
				if(comma_flag==1){ query = query + " , "; }
				query = query + "( "+bid+" , "+arr[i][0]+" , '"+arr[i][1]+"' )";
				comma_flag=1;
				//alert("yoo");
			}
			//alert(query);
		}
		alert(query);
		$.ajax({
			url: 'ajax/insert_into_database.php',	
			type: 'POST',
			data: {'query':query},
			success:function(data){
				alert(data);
				$('#success_message_div').html("Scripts added successfully");
			}
		});
	}
	
</script>

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
	<h3 >Build Job Sequence</h3>
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
        	

			<div  class="form-group input-field col-md-12">
				<button type="button" name="submit1" onclick="display_scripts()" class="btn btn-default">View Scripts</button>
			</div>
				
			<hr>
			<div  class="col-md-12" id="checkboxes_div"></div>
			<div  class="col-md-12" id="button_div"></div>
			<div  class="col-md-12" id="success_message_div"></div>
				
			
	   
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
					$('#build_name_select').append("<option value='"+arr[i]['cbi_id']+"'>"+arr[i]['cbi_id']+" - "+arr[i]['cbi_build_name']+"</option>");
				
			}
			
		}
	});
	
}


</script>

