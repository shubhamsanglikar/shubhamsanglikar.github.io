<?php
include("header.php");
set_header_focus(0);
?>	

<!DOCTYPE html>
<head>

<link href = "css/jquery-ui.min.css" rel = "stylesheet">
<script src = "js/jquery-ui.min.js"></script>
</head>
<body >
<script type="text/javascript">

function display_clients(letters,letterl)
{
	$(".alphabet_list").removeClass("active");
	$('.'+letters).addClass("active");
	(letters);
	 $.ajax({
				url: 'ajax/ajax_get_arraylist_from_database.php',
				type: 'POST',
				data: {'query': "SELECT c_Client from client_info",'val':'c_Client'},
				success:function(data){
					
					var arr = jQuery.parseJSON(data);
					var al = arr.length;
					var i=0;
					//if(arr[1].substring(0,1)==letters){alert("yes")};
					$("#client_display_div").html("<ul id='client_ul' class='hide-on-med-and-down'></ul>");
				
					for(i = 0 ;i < arr.length ; i++){	
						
						if(arr[i].substring(0,1) == letters || arr[i].substring(0,1) == letterl )
						{
							
							$("#client_ul").append("<li><a href='dashboard_build.php?client_name="+arr[i]+"'>"+arr[i]+"</a></li>");  
							$('#client_div').css('visibility','visible');
						}
					}
					
					
				}
			});
		
}

	
</script>

	
	<div class="container-fluid">
	
		<div class="col-md-3 side-menu"><!-- ***************side-menu***************** -->
			
				<ul class="collapsible" data-collapsible="accordion">
					<li>
						<div class="collapsible-header">
							<h4 >Dashboard</h4>
						</div>
						
					</li>
					
					
					
				</ul>
			
		</div>	
		
		<div class="col-md-9">
		  
		  
			<nav >
    
			
				<div class="nav-wrapper green darken-2">
					
						<a href="#" class="brand-logo right"></a>
						<ul id="nav-mobile" class="left hide-on-med-and-down">
						<li class="alphabet_list a"><a onclick="display_clients('a','A');" >A</a></li>
						<li class="alphabet_list b"><a onclick="display_clients('b','B')">B</a></li>
						<li><a onclick="display_clients('c','C')">C</a></li>
						<li><a onclick="display_clients('d','D')">D</a></li>
						<li><a onclick="display_clients('e','E')">E</a></li>
						<li><a onclick="display_clients('f','F')">F</a></li>
						<li><a onclick="display_clients('g','G')">G</a></li>
						<li><a onclick="display_clients('h','H')">H</a></li>
						<li><a onclick="display_clients('i','I')">I</a></li>
						<li><a onclick="display_clients('j','J')">J</a></li>
						<li><a onclick="display_clients('k','K')">K</a></li>
						<li><a onclick="display_clients('l','L')">L</a></li>
						<li><a onclick="display_clients('m','M')">M</a></li>
						<li><a onclick="display_clients('n','N')">N</a></li>
						<li><a onclick="display_clients('o','O')">O</a></li>
						<li><a onclick="display_clients('p','P')">P</a></li>
						<li><a onclick="display_clients('q','Q')">Q</a></li>
						<li><a onclick="display_clients('r','R')">R</a></li>
						<li><a onclick="display_clients('s','S')">S</a></li>
						<li><a onclick="display_clients('t','T')">T</a></li>
						<li><a onclick="display_clients('u','U')">U</a></li>
						<li><a onclick="display_clients('v','V')">V</a></li>
						<li><a onclick="display_clients('w','W')">W</a></li>
						<li><a onclick="display_clients('x','X')">X</a></li>
						<li><a onclick="display_clients('y','Y')">Y</a></li>
						<li><a onclick="display_clients('z','Z')">Z</a></li>
						</ul>
				</div>
			</nav>
			
			
		</div>
		
		
		
		
		<div class="col-md-5" id="client_div" style = "visibility: hidden">
		<div class="panel panel-default card">
		<div class="panel-heading" >
			
		<h3 >Clients</h3>
		</div>
		<div class="panel-body" >
		
		<div id = "client_display_div" ></div>
		</div>
		
		
		</div>
		</div>
		
		
	
		
		
	
		
	
		<div class="col-md-4 ">
		</div>
		<div class="col-md-4 ">
		</div>
	
	
		<div class="col-md-2 ">
			
					<div class="card1">
					<div class="col s12 m6">
					<div class="card brown">
					<div class="card-content white-text">
					<span class="card-title">Total Scripts</span>
      
					</div>
				
					<div class="card-action">
						<a href="#">
						<?php 
							$a = mysql_query("SELECT COUNT(distinct cbj_script_name) FROM client_build_jobsequence");
							$row=mysql_fetch_array($a);
							echo $row['0'];
						?>
						</a>
						
					</div>
					</div>
					</div>
					</div>
				
		</div>
			
			
			
	    <div class="col-md-2 ">
			
					<div class="card1">
					<div class="col s12 m6">
					<div class="card blue ">
					<div class="card-content white-text">
					<span class="card-title">Total Builds</span>
      
					</div>
				
					<div class="card-action">
						<a href="#">
						<?php 
							$a = mysql_query("SELECT COUNT(*) FROM client_build_info");
							$row=mysql_fetch_array($a);
							echo $row['0'];
						?>
						</a>
						
					</div>
					</div>
					</div>
					</div>
            
			
			
			
		</div>
			
			
			
			
			
	
	
	
	 
	 
	 
	
	
		<div class="col-md-4 ">
		</div>
	
		<div class="col-md-4 ">
		</div>
	
	
		<div class="col-md-2 ">
			
					<div class="card1">
					<div class="col s12 m6">
					<div class="card red ">
					<div class="card-content white-text">
					<span class="card-title">Total Clients</span>
      
					</div>
				
					<div class="card-action white-text">
						<a href="#">
						<?php 
							$a = mysql_query("SELECT COUNT(*) FROM client_info");
							$row=mysql_fetch_array($a);
							echo $row['0'];
						?>
						</a>
						
					</div>
					</div>
					</div>
					</div>
			
			
			
			
		</div>
			
			
			<div class="col-md-2 ">
			
					<div class="card1">
					<div class="col s12 m6">
					<div class="card orange ">
					<div class="card-content white-text">
					<span class="card-title">Total Files</span>
      
					</div>
				
					<div class="card-action white-text">
						<a href="#">
						<?php 
							$a = mysql_query("SELECT COUNT(*) FROM client_inventory_details");
							$row=mysql_fetch_array($a);
							echo $row['0'];
						?>
						</a>
						
					</div>
					</div>
					</div>
					</div>
            
			
			
			
			</div>
			
			
			
			
			
	
	
	
	
	
	</div>	
	 
	

	
</body>

    

</html>