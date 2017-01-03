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
	<div class="container-fluid">
	
		<div class="col-md-3 side-menu"><!-- ***************side-menu***************** -->
			
				<ul class="collapsible" data-collapsible="accordion">
					<li>
						<div class="collapsible-header">
							<h4 ><a href='dashboard.php'>Dashboard</a></h4>
						</div>
						
					</li>
					
					<li>
						<div class="collapsible-header">
							<h4 >Saved Reports<h4>
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
		
		<div class="col-md-9">
		
			<div class="card main">
			<h4><div id='report_title' class='text-center'></div></h4>
				<div class="embedPowerBi" id="report_display" align="center">
					  <iframe width="1000" height="800" src="https://app.powerbi.com/view?r=eyJrIjoiZmYzMjQwM2MtZWMyMi00ODY2LWJjMzgtNDMzZDVkODVjMWJkIiwidCI6IjM3MmNiMWY2LWQzMWQtNDhmMS1iMDBjLTA0ZGRiM2ZmMTg5ZCIsImMiOjEwfQ%3D%3D" frameborder="0" allowFullScreen="true"></iframe>	
				</div>
			</div>
		</div>			
	</div>
	
	 
	
	</div>
	
	
	<script type="text/javascript">
		function change_report(param){
			$.ajax({
				url: 'update_report.php',
				type: 'POST',
				data: {'keyword':param.innerHTML},
				success:function(data){
					$('#report_title').html(param.innerHTML);
					 $('#report_title').attr('style',"padding-top:7px");
					$('#report_display').html(data);
					
				}
			});
			
		}
	</script>
	
</body>

   

    <!-- Bootsrap javascript file -->
    <script src="assets/js/bootstrap.min.js"></script>
    

</html>