<?php
session_start();

include("database.php");


?>
<!DOCTYPE html>

<?php 
include 'header.php';
echo "<script type='text/javascript'>
		$('.0').addClass('current-menu-item');
		</script>";
?>	

	<div class="container-fluid">
	
		<div class="col-md-3 side-menu">
			
				<ul class="collapsible" data-collapsible="accordion">
					<li>
						<div class="collapsible-header">
							<h4 >menu item</h4>
						</div>
						<div class="collapsible-body">
							<ul>
								<li><a href="#">sub item</a></li>
								<li><a href="#">sub item</a></li>
								<li><a href="#">sub item</a></li>
							</ul>
						</div>
					</li>
					
					<li>
						<div class="collapsible-header">
							<h4 >menu item<h4>
						</div>
						<div class="collapsible-body">
							<ul>
								<li><a href="#">sub item</a></li>
								<li><a href="#">sub item</a></li>
								<li><a href="#">sub item</a></li>
							</ul>
						</div>
					</li>
					<li>
						<div class="collapsible-header">
							<h4 >menu item</h4>
						</div>
						<div class="collapsible-body">
							<ul>
								<li><a href="#">sub item</a></li>
								<li><a href="#">sub item</a></li>
								<li><a href="#">sub item</a></li>
							</ul>
						</div>
					</li>
				</ul>
			
		</div>	
		
		<div class="col-md-9">
		
			<div class="card main">
				<div class="embedPowerBi" align="center">
					<iframe width="1000" height="800" src="https://app.powerbi.com/view?r=eyJrIjoiZGIzNjZmZTktOTQxMi00M2FhLTlmOGEtNWJmMjI2MTBmMTY3IiwidCI6IjM3MmNiMWY2LWQzMWQtNDhmMS1iMDBjLTA0ZGRiM2ZmMTg5ZCIsImMiOjEwfQ%3D%3D" frameborder="0" allowFullScreen="true"></iframe>
				</div>
			</div>
		</div>			
	</div>
	
	 
	
	</div>
</body>




   

    <!-- Bootsrap javascript file -->
    <script src="assets/js/bootstrap.min.js"></script>
    

</html>