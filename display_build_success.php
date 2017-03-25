<?php 
include("header.php");
set_header_focus(2);
extract($_POST);
$build_name=$_SESSION['cbi_build_name'];

?>
	<html>
	<script type="text/javascript">

	</script>
	<body>
	<?php 
	$q="select * from Client_Build_Info inner join Client_Info on Client_Info.c_id = Client_Build_Info.c_id where Client_Build_Info.cbi_build_name = '$build_name';";
	$c=mysql_query($q);
	$row=mysql_fetch_array($c);
	
	
	?>
	
	<div class="container">
		<div class="card col-md-12"><br>
			<div class="col-md-4">
				c_Client:<span><?php echo $row['c_Client']?></span>
			</div>		
			<div class="col-md-4">
				cbi_id:<span><?php echo $row['cbi_id']?></span>
			</div>	
			<div class="col-md-4">
				cbi_build_name:<span><?php echo $row['cbi_build_name']?></span>
			</div>	
			<div class="col-md-4">
				cbi_build_description:<span><?php echo $row['cbi_build_description']?></span>
			</div>	
			<div class="col-md-4">
				cbi_build_frequency:<span><?php echo $row['cbi_build_frequency']?></span>
			</div>	
			
			<br>
		
		</div>
	</div>
	
	
		
	</body>
	</html>