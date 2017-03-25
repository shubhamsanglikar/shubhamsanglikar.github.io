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
	//(letters);
	 $.ajax({
				url: 'ajax/ajax_get_arraylist_from_database.php',
				type: 'POST',
				data: {'query': "SELECT c_Client from Client_Info",'val':'c_Client'},
				success:function(data){
					
					var arr = jQuery.parseJSON(data);
					
					var al = arr.length;
					var i=0;
					//if(arr[1].substring(0,1)==letters){alert("yes")};
					$("#client_display_div").html("<ul id='client_ul' class='hide-on-med-and-down'></ul>");
				
					for(i = 0 ;i < arr.length ; i++){	
						
						if(arr[i].substring(0,1) == letters || arr[i].substring(0,1) == letterl )
						{
							
							$("#client_ul").append("<li><a href='dashboard_build.php?client_name="+arr[i]+"'>"+arr[i].fontcolor("#008000").fontsize("4")+"</a></li>");  
							$('#client_div').css('visibility','visible');
						}
					}
					
					
				}
			});
		
}

	
</script>



	<div class = "container-fluid">
		<div class="col-md-3 side-menu"><!-- ***************side-menu***************** -->
		
			<ul class="collapsible" data-collapsible="accordion">
					<li>
						<div class="collapsible-header">
							<h3>Dashboard</h3>
						</div>
						
					</li>
					
					
					
			</ul>
		
		</div>
		
		<div class="col-md-9">
	
				<nav>
			
								
					<div class="nav-wrapper green darken-2">
								
										<a href="#" class="brand-logo right"></a>
										<ul id="nav" class="left hide-on-med-and-down">
										<li class="alphabet_list a"><a onclick="display_clients('a','A')" >A</a></li>
										<li class="alphabet_list b"><a onclick="display_clients('b','B')">B</a></li>
										<li class="alphabet_list c"><a onclick="display_clients('c','C')">C</a></li>
										<li class="alphabet_list d"><a onclick="display_clients('d','D')">D</a></li>
										<li class="alphabet_list e"><a onclick="display_clients('e','E')">E</a></li>
										<li class="alphabet_list f"><a onclick="display_clients('f','F')">F</a></li>
										<li class="alphabet_list g"><a onclick="display_clients('g','G')">G</a></li>
										<li class="alphabet_list h"><a onclick="display_clients('h','H')">H</a></li>
										<li class="alphabet_list i"><a onclick="display_clients('i','I')">I</a></li>
										<li class="alphabet_list j"><a onclick="display_clients('j','J')">J</a></li>
										<li class="alphabet_list k"><a onclick="display_clients('k','K')">K</a></li>
										<li class="alphabet_list l"><a onclick="display_clients('l','L')">L</a></li>
										<li class="alphabet_list m"><a onclick="display_clients('m','M')">M</a></li>
										<li class="alphabet_list n"><a onclick="display_clients('n','N')">N</a></li>
										<li class="alphabet_list o"><a onclick="display_clients('o','O')">O</a></li>
										<li class="alphabet_list p"><a onclick="display_clients('p','P')">P</a></li>
										<li class="alphabet_list q"><a onclick="display_clients('q','Q')">Q</a></li>
										<li class="alphabet_list r"><a onclick="display_clients('r','R')">R</a></li>
										<li class="alphabet_list s"><a onclick="display_clients('s','S')">S</a></li>
										<li class="alphabet_list t"><a onclick="display_clients('t','T')">T</a></li>
										<li class="alphabet_list u"><a onclick="display_clients('u','U')">U</a></li>
										<li class="alphabet_list v"><a onclick="display_clients('v','V')">V</a></li>
										<li class="alphabet_list w"><a onclick="display_clients('w','W')">W</a></li>
										<li class="alphabet_list x"><a onclick="display_clients('x','X')">X</a></li>
										<li class="alphabet_list y"><a onclick="display_clients('y','Y')">Y</a></li>
										<li class="alphabet_list z"><a onclick="display_clients('z','Z')">Z</a></li>
										</ul>
					</div>
								
				</nav>
				
				
			
				
				
				
				<!--<div class = "container-fluid">-->
					<div class="col-md-6" id="client_div" style = "visibility: hidden;padding-top:10px;padding-left:0px;">
						
								
									
									<div class="panel panel-default card">
									
										<div class="panel-heading" >
									
											<h3 >Clients</h3>
										</div>
											
										<div class="panel-body" >
											
											<div id = "client_display_div">
											</div>
								
								
										</div>
									</div>
									 
								
					</div>
					
					<!--<div class="col-md-6">
						<div class = "container-fluid">-->
							<div class="col-md-3" style="padding-top:10px;padding-right:0px;">
								<div class="card1">
									<div class="col s12 m6">
										<div class="card brown">
											<div class="card-content white-text text-center">
												<span class="card-title">Scripts</span>
						  
											</div>
									
											<div class="card-action white-text text-center"><font size="4"><b>
											
												<?php 
													$a = mysql_query("SELECT COUNT(distinct cbj_script_name) FROM Client_Build_JobSequence");
													$row=mysql_fetch_array($a);
													echo $row['0'];
												?>
													
											</font>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3" style="padding-top:10px;padding-right:0px;">
								<div class="card1">
									<div class="col s12 m6">
										<div class="card blue ">
											<div class="card-content white-text text-center">
												<span class="card-title">Builds</span>
				  
											</div>
							
											<div class="card-action white-text text-center"><font size="4"><b>
									
												<?php 
													$a = mysql_query("SELECT COUNT(*) FROM Client_Build_Info");
													$row=mysql_fetch_array($a);
													echo $row['0'];
												?>
									
											</font>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-3"></div>
							<div class="col-md-3"></div>
							<div class="col-md-3" style="align-top:0px;padding-right:0px;">
								<div class="card1">
									<div class="col s12 m6">
										<div class="card red ">
											<div class="card-content white-text text-center">
												<span class="card-title">Clients</span>
					  
											</div>
								
											<div class="card-action white-text text-center"><font size="4"><b>
										
												<?php 
													$a = mysql_query("SELECT COUNT(*) FROM Client_Info");
													$row=mysql_fetch_array($a);
													echo $row['0'];
												?>
										
											</font>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-md-3" style="align-top:0px;padding-right:0px;">
								<div class="card1">
									<div class="col s12 m6">
										<div class="card orange ">
											<div class="card-content white-text text-center">
												<span class="card-title">Files</span>
				  
											</div>
							
											<div class="card-action white-text text-center"><font size="4"><b>
									
												<?php 
													$a = mysql_query("SELECT COUNT(*) FROM Client_Inventory_Details");
													$row=mysql_fetch_array($a);
													echo $row['0'];
												?>
									
											</font>
											</div>
										</div>
									</div>
								</div>
							
							</div>
					<!--	</div>
					</div>
				
		
				</div>-->
		</div>
		
	</div>
		
		
		
</body>	
		
</html>		
		
		
		
		