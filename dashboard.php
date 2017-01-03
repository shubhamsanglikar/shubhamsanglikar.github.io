<?php
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

<body>
<script type="text/javascript">
$(document).ready(function() {
    $('select').material_select();
  });

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
			<div class="container ">
				<div class=" col-md-12">
					<label  for="client_select">Client</label>
					<?php 
						$q="select distinct c_id, c_Client from client_info";
						$c=mysql_query($q);
			
						echo "<select id='client_select' class='browser-default'>";
						while($row=mysql_fetch_array($c))
						{
				
					
							echo "<option onclick='show_build_info();' value=".$row['c_id']." >".$row['c_Client']."</option>";

						}
						echo "</select>";
					?>
				</div><br>
				<div id='build_select_div' class = "col-md-10">
				</div>
			</div>	
		</div>
		
		
	</div>
	
	 
	
	<script src="assets/js/bootstrap.min.js"></script>
	
	<script type="text/javascript">
	

		function show_build_info(){
			//alert($('#client_select').find('option:selected').attr("value"));
			$.ajax({
				url: 'dashboard_show_build.php',
				type: 'POST',
				data: {'keyword':$('#client_select').find('option:selected').attr("value")},
				success:function(data){
					//alert(data);
					var st="<select class='browser-default col-md-2' id='build_select'></select>";
					$('#build_select_div').html(st);
					var arr = jQuery.parseJSON(data);
					var al = arr.length;
					//alert(al);
					var i=0;
					for(i = 0 ;i < al ; i++){	
						$('#build_select').append("<option value='"+arr[i]+"'>"+arr[i]+"</option>");
					}
					
					
				}
			});
			}
	</script>
	
</body>

    

</html>