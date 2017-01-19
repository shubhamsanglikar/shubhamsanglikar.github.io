var dashboard_build_variable_names;
var dashboard_build_variable_values;


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
  
      
				
				//alert("dashboard_build_variable_names:"+dashboard_build_variable_names[1].COLUMN_NAME+"\ndashboard_build_variable_values"+dashboard_build_variable_values[0][0]);
				
				
				//htmlstr = htmlstr+"<tr><td>11</td><td>22</td><td>33</td></tr>";
				//htmlstr = htmlstr+"<tr><td>12</td><td>223</td><td>343</td></tr>";
				htmlstr = htmlstr+"</tbody></table>";
				$("#display_div").html(htmlstr);
				arr.forEach(files_function);
				//alert(dashboard_build_variable_values);
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
					dashboard_build_variable_values=arr;
					//alert("dashboard_build_variable_names:"+dashboard_build_variable_names[1].COLUMN_NAME+"\ndashboard_build_variable_values"+dashboard_build_variable_values[0][0]);
					
					htmlstr = htmlstr+"</tbody></table>";
					
					$("#display_div").html(htmlstr);
					dashboard_build_variable_names.forEach(func);
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
		var htmlstr ="<table style='width:100%'><th>Field</th><th> dashboard_build_variable_values</th>";
		function func(item)
		{
	
		  	//htmlstr = htmlstr+"<tr><td> "+item[0]+ " </td><td>"+dashboard_build_variable_values[0][i++]+"</td></tr>";
		  	$('#build_info_table').append("<tr><td> "+item[0]+ " </td><td>"+dashboard_build_variable_values[0][i++]+"</td></tr>");
			//alert(item[0]+ "   "+dashboard_build_variable_values[0][i++]);
		}
		function display_info(){
			//alert($('#client_select').find('option:selected').attr("value"));
					i=0;
			htmlstr ="<table id='build_info_table' class='display browser-default' style='width:100%'><thead><tr><th>Field</th><th> dashboard_build_variable_values</th></tr></thead><tfoot><tr><th>Field</th><th> dashboard_build_variable_values</th></tr></tfoot><tbody>";
			$.ajax({
				url: 'ajax/ajax_get_single_row_from_database.php',
				type: 'POST',
				data: {'query': "select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME = 'client_build_info_detail' "},
				success:function(data1){
					//alert(data1);
					
					var temp12 = jQuery.parseJSON(data1);
					dashboard_build_variable_names = temp12;
					//alert("got dashboard_build_variable_names");	
					display_info1();
					
				}
			});
			
			
			}