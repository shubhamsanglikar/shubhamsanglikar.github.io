
<?php 
	include("header.php");
	set_header_focus(0);
?>
<!DOCTYPE html>
<link href = "css/jquery-ui.min.css" rel = "stylesheet">
<script src = "js/jquery-ui.min.js"></script>
<body onload="set_client_select()">

	<div class="container-fluid">
	
		<div class="col-md-3 side-menu"><!-- ***************side-menu***************** -->
			
				<ul class="collapsible" data-collapsible="accordion">
					<li>
						<div class="collapsible-header">
							<h4 ><a href="dashboard.php">Dashboard</a></h4>
						</div>
						
					</li>
					
					
				</ul>
			
		</div>	
		
		<div class="col-md-9 text-left">
			
		<div class="container-fluid">
			<div class="panel panel-default card">
    			<div class="panel-heading">
					<h3 >Client Build Info</h3>
					<a href="http://1000hz.github.io/bootstrap-validator/" target="_blank"></a>
    			</div>
   				 <div class="panel-body"><br>
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
						echo "</select><br>";
					?>
			</div>
			
			<div id='build_select_div' class = "col-md-6">
			</div>
			
			<div id='button_div' class = "col-md-12 hidden text-left">
					<button class="btn btn-primary" onclick="display_info()">Get Latest Build Info</button>
				    <button class="btn btn-primary" onclick="display_files()">Get Files Info</button><br><br>
			</div>
				
			<div id='display_div' class = "col-md-12">
			</div>
				</div><!--panel-body  --> 
				
			</div>	
			
		</div><!--container-fluid --> 
		
		
	</div>
	
	 
	
	<script src="js/jquery-ui.min.js"></script>
	
	<script type="text/javascript">

	var get_params = function(search_string) {

		  var parse = function(params, pairs) {
		    var pair = pairs[0];
		    var parts = pair.split('=');
		    var key = decodeURIComponent(parts[0]);
		    var value = decodeURIComponent(parts.slice(1).join('='));

		    // Handle multiple parameters of the same name
		    if (typeof params[key] === "undefined") {
		      params[key] = value;
		    } else {
		      params[key] = [].concat(params[key], value);
		    }

		    return pairs.length == 1 ? params : parse(params, pairs.slice(1))
		  }

		  // Get rid of leading ?
		  return search_string.length == 0 ? {} : parse({}, search_string.substr(1).split('&'));
		}

		
		function set_client_select()
		{
			
			var params = get_params(location.search);
			//alert(params['client_name']);
			//$("#client_select option[value=" + params['client_name'] + "]").prop("selected",true);
			$("select option").filter(function() {
			    return $(this).text() == params['client_name']; 
			}).prop('selected', true);
			show_build_info();
		}
	
	
	</script>
	
</body>

    

</html>