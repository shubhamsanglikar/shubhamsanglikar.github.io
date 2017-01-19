<?php
//query for loading files ...
//select cft.cft_id, cft.cft_Delimiter, cid.ind_FileName from client_files_template as cft inner join client_inventory_details as cid on cid.cft_id = cft.cft_id 

session_start();

include("database.php");
if(empty($_SESSION['username'])){
	header("Location:login.php?logout=success");
}

include 'header.php';
echo "<script type='text/javascript'>
		$('.0').addClass('current-menu-item');
		</script>";
$un = $_SESSION['username'];
?>	
<!DOCTYPE html>
<head>

<link href = "css/jquery-ui.min.css" rel = "stylesheet">
<script src = "js/jquery-ui.min.js"></script>
</head>
<body >
<script type="text/javascript">


 

</script>
	<div class="container-fluid">
	
		<div class="col-md-3 side-menu"><!-- ***************side-menu***************** -->
			
				<ul class="collapsible" data-collapsible="accordion">
					<li>
						<div class="collapsible-header">
							<h4 >Dashboard</h4>
						</div>
						
					</li>
					
					<li>
						<div class="collapsible-header">
							<h4>Saved Reports</h4>
						</div>
						<?php 
						$q="select report_name from reports where generated_by = '$un' ";
						$c=mysql_query($q);
							echo "<div class='collapsible-body'>
							<ul>";
						while($row=mysql_fetch_array($c))
						{
							//echo $row['report_name'];
							
							echo "<li><a href='#' onclick='change_report(this)'>".$row['report_name']."</a></li>";
									
								
						}
						echo "</ul>
							</div>
							";
						?>
						
					</li>
					
				</ul>
			
		</div>	
		<div class="col-md-9 text-left">
			<div class="container-fluid ">
				
			
				<div class=" col-md-6 ">
					<label  for="client_select">Client</label>
					<?php 
						$q="select distinct c_id, c_Client from client_info";
						$c=mysql_query($q);
			
						echo "<select id='client_select' class='browser-default' onchange='show_build_info()'>";
						while($row=mysql_fetch_array($c))
						{
				
							echo "<option onclick='show_build_info();' value=".$row['c_id']." >".$row['c_Client']."</option>";

						}
						echo "</select>";
					?>
				</div>
				<div id='build_select_div' class = "col-md-6">
					
				</div>
				<div id='button_div' class = "col-md-12 hidden text-left">
					<button class="btn btn-primary" onclick="display_info()">Get Latest Build Info</button>
				    <button class="btn btn-primary" onclick="display_files()">Get Files Info</button>
				</div>
				
				<div id='display_div' class = "col-md-12">
				</div>
				
			</div>	
		</div>
		
		
	</div>
	
	 
	
	<script src="assets/js/bootstrap.min.js"></script>
	
	<script type="text/javascript">
	var names;
	var values;


	function display_files(){
		$.ajax({
			url: 'ajax/ajax_get_single_row_from_database.php',
			type: 'POST',
			data: {'query': "select cft.cft_id, cft.cft_Delimiter, cid.ind_FileName from client_files_template as cft inner join client_inventory_details as cid on cid.cft_id = cft.cft_id and cid.cfi_id = ( select cfi_id from client_build_file_xref where cbi_id = "+ $('#build_select').find('option:selected').attr("value") + " )"},
			success:function(data){
				
				var arr = jQuery.parseJSON(data);
				
				htmlstr="<table id='table' class='display dataTable' width='100%' cellspacing='10'>"+
				"<thead><tr><th>cft_id</th><th>cft_Delimeter</th><th>ind_FileName</th></tr></thead>"+
				"<tfoot><tr><th>cft_id</th><th>cft_Delimeter</th><th>ind_FileName</th></tr></tfoot><tbody>";
  
      
				
				//alert("names:"+names[1].COLUMN_NAME+"\nvalues"+values[0][0]);
				
				
				//htmlstr = htmlstr+"<tr><td>11</td><td>22</td><td>33</td></tr>";
				//htmlstr = htmlstr+"<tr><td>12</td><td>223</td><td>343</td></tr>";
				htmlstr = htmlstr+"</tbody></table>";
				$("#display_div").html(htmlstr);
				arr.forEach(files_function);
				//alert(values);
				$('#table').DataTable({                           
				       "bJQueryUI": true,
				       "sPaginationType": "full_numbers",
				       "bSort": true,
				       "bFilter": true,
				    });
				$('div.dataTables_filter input').addClass('browser-default');
				$(".dataTables_length select").addClass("browser-default");
				
				
			}
		});
	
	}

	function files_function(item)
	{
		if(item['cft_Delimeter']== null){item['cft_Delimeter']="null";}
	  	//htmlstr = htmlstr+"<tr><td> "+item['cft_id']+ " </td><td>"+item['cft_Delimeter']+"<td><td>"+item['ind_FileName']+"<td></tr>";
		$('#table').append("<tr><td>"+item['cft_id']+ "</td><td>"+item['cft_Delimeter']+"</td><td>"+item['ind_FileName']+"</td></tr>");
	}
		function show_build_info(){
			//alert($('#client_select').find('option:selected').attr("value"));
			$.ajax({
				url: 'ajax/ajax_get_single_row_from_database.php',
				type: 'POST',
				data: {'query': "SELECT cbi_id , cbi_build_name from client_build_info where c_id = "+ $('#client_select').find('option:selected').attr("value"),'val': "cbi_build_name"},
				success:function(data){
					//alert(data);
					//var arr = jQuery.parseJSON(data);
					//alert(arr[0].cbi_id);

					var st="<label id='label_display_div' for ='build_select_div'>Build Name</label><select class='browser-default' id='build_select'></select>";
					//$("#label_build_select_div").css('visibility', 'visible');
					$('#build_select_div').html(st);
					var arr = jQuery.parseJSON(data);
					var al = arr.length;
					var i=0;
					//$('#build_select_div').append("<label id="label_build_select_div" style="visibility: visible;">Build Name</label>");
					
					for(i = 0 ;i < al ; i++){	
						//alert(arr[i].cbi_id);
						$('#build_select').append("<option value='"+arr[i].cbi_id+"' >"+arr[i].cbi_build_name+"</option>");
					}
					$("#button_div").removeClass("hidden").addClass("visible");
					
					
				}
			});
			}

		function display_info1(){
			//alert($('#build_select').find('option:selected').attr("value"));
			
			$.ajax({
				url: 'ajax/ajax_get_single_row_from_database.php',
				type: 'POST',
				data: {'query': "SELECT * from client_build_info_detail where cbi_id = "+ $('#build_select').find('option:selected').attr("value") +" ORDER by cbj_RunId DESC limit 1"},
				success:function(data){
					
					var arr = jQuery.parseJSON(data);
					values=arr;
					//alert("names:"+names[1].COLUMN_NAME+"\nvalues"+values[0][0]);
					
					htmlstr = htmlstr+"</tbody></table>";
					
					$("#display_div").html(htmlstr);
					names.forEach(func);
					$('#build_info_table').DataTable({                           
					       "bJQueryUI": true,
					       "sPaginationType": "full_numbers",
					       "bpaging": false,
					       "bSort": true,
					       "bFilter": true,
					    });
					$(".dataTables_length select").addClass("browser-default");
				}
			});
		}

		var i=0;
		var htmlstr ="<table style='width:100%'><th>Field</th><th> Values</th>";
		function func(item)
		{
	
		  	//htmlstr = htmlstr+"<tr><td> "+item[0]+ " </td><td>"+values[0][i++]+"</td></tr>";
		  	$('#build_info_table').append("<tr><td> "+item[0]+ " </td><td>"+values[0][i++]+"</td></tr>");
			//alert(item[0]+ "   "+values[0][i++]);
		}
		function display_info(){
			//alert($('#client_select').find('option:selected').attr("value"));
					i=0;
			htmlstr ="<table id='build_info_table' class='display browser-default' style='width:100%'><thead><tr><th>Field</th><th> Values</th></tr></thead><tbody>";
			$.ajax({
				url: 'ajax/ajax_get_single_row_from_database.php',
				type: 'POST',
				data: {'query': "select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME = 'client_build_info_detail' "},
				success:function(data1){
					//alert(data1);
					
					var temp12 = jQuery.parseJSON(data1);
					names = temp12;
					//alert("got names");	
					display_info1();
					
				}
			});
			
			
			}
	</script>
	
</body>

    

</html>