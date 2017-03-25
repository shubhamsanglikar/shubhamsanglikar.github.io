<?php 
include("header.php");
include("fusionCharts/fusionChartsIncludes.php");

set_header_focus(3);

error_reporting(0);
extract($_POST);

?>



<!DOCTYPE html>



<script type="text/javascript">
var bm_arr;
var bm_traverse_int = 0;
var cnt;

$(document).ready(function() {
    $('select').material_select();
  });


function addTableName(d){
	//alert(d.value);

	$('#table_select').html("");
	$.ajax({
		url: 'ajax/ajax_get_arraylist_from_database.php',
		type: 'POST',
		data: {'query': "SELECT Distinct TableName from prgstats WHERE DatabaseName='"+d.value+"'" , 'val':'TableName'},
		success:function(data){
			//alert(data);
			var arr = jQuery.parseJSON(data);
			var al = arr.length;
			var i=0;
			var htmltext1="<option value=''>Select Table Name</option>";
			$('#table_select').html(htmltext1);
			for(i = 0 ;i < al ; i++){	
				$('#table_select').append("<option value='"+arr[i]+"'>"+arr[i]+"</option>");
			}
			//alert($("#load_select option:selected").val());
		}
	});
	
}

function addFieldsName(d){
	//alert(d.value);

	$('#field_select').html("");
	$.ajax({
		url: 'ajax/ajax_get_arraylist_from_database.php',
		type: 'POST',
		data: {'query': "SELECT Distinct Field from prgstats WHERE TableName='"+d.value+"'" , 'val':'Field'},
		success:function(data){
			//alert(data);
			var arr = jQuery.parseJSON(data);
			var al = arr.length;
			var i=0;
			var htmltext1="<option value=''>Select Field Name</option>";
			$('#field_select').html(htmltext1);
			for(i = 0 ;i < al ; i++){	
				//alert("<option value='"+arr[i]+"'>"+arr[i]+"</option>");
				$('#field_select').append("<option value='"+arr[i]+"'>"+arr[i]+"</option>");
			}
			$('select').material_select();
			//alert($("#load_select option:selected").val());
		}
	});
	
}


function select_columns(){
	
	//$('#columns_select').html("");
	$.ajax({
		url: 'ajax/ajax_get_arraylist_from_database.php',
		type: 'POST',
		data: {'query': "select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME = 'prgstats'" , 'val':'COLUMN_NAME'},
		success:function(data){
			//alert(data);
			var arr = jQuery.parseJSON(data);
			var al = arr.length;
			var i=0;
			var htmltext1="<option value=''>Select Columns</option>";
 			$('#columns_select').html(htmltext1);
			for(i = 4 ;i < al-6 ; i++){	
				$('#columns_select').append("<option value='"+arr[i]+"'>"+arr[i]+"</option>");
			}
			 $('select').material_select();
			
		}
	});
	
}
var string1="";
var string3="";
function select_date(){
	//select Field,PerPop from prgstats where TableName = 'c_xyz_na_dist_invoice_items' and ( Field = 'inv_list_price' or Field = 'inv_list_price_fc' )
	//select CreateDate from prgstats where TableName = 'c_xyz_na_dist_invoice_items' and ( Field = 'inv_list_price' or Field = 'inv_list_price_fc' )
	string1="select distinct CreateDate from prgstats where DatabaseName='"+$('#database_select option:selected').val()+"' and TableName='"+$('#table_select option:selected').val()+"' and ( ";
	$('#field_select option').each(function() {
		if($(this).is(':selected')){
			string1=string1+ "Field = '" + $(this).val() + "' or ";
		}
	});
	var string2 = string1.substr(0,string1.length-4);
	string2= string2+")";
	alert(string2);
	$.ajax({
		url: 'ajax/ajax_get_arraylist_from_database.php',
		type: 'POST',
		data: {'query': string2 , 'val':'CreateDate'},
		success:function(data){
			alert(data);
			var arr = jQuery.parseJSON(data);
			var al = arr.length;
			var i=0;

			for(i = 0 ;i < al ; i++){	
				$('#date_select').append("<option value='"+arr[i]+"'>"+arr[i]+"</option>");
			}
			
			
		}
	});
	
}


function show(){
	
	//alert($(".appended_columns option:selected").val());
	//alert($(".appended_columns").is(':selected').val());
	$('#columns_select option').each(function() {
		if($(this).is(':selected')){
			alert($(this).val());
		}
	});
	
}


function display_stats(){
	if($("#view_select option:selected").val() == "graphical"){
		display_stats_graphs();
	}
	else{
		display_stats_table();
	}
}

function display_stats_graphs(){
	var htmlstr = "";
	$('#columns_select option').each(function() {
		if($(this).is(':selected')){
			alert($(this).val());
			htmlstr = htmlstr+ "<button onclick='show_graph("+$(this).val()+")' value="+$(this).val()+" class='btn btn-primary' id='"+$(this).val()+"'>"+$(this).val()+"</button>";
		}
	});
	alert(htmlstr);
	$("#display_stats_toggle_div").html(htmlstr);
	
	
}


function show_graph(d){
	alert(d.value);
	//select Field,PerPop from prgstats where TableName = 'c_xyz_na_dist_invoice_items' and ( Field = 'inv_list_price' or Field = 'inv_list_price_fc' )and CreateDate= '2013-10-15 08:14:00' 
	string1="select Field , "+d.value+" from prgstats where DatabaseName='"+$('#database_select option:selected').val()+"' and TableName='"+$('#table_select option:selected').val()+"' and CreateDate= '"+$('#date_select option:selected').val()+"' and ( ";
	string3="select Field , "+d.value+" from bm_prgstats where DatabaseName='"+$('#database_select option:selected').val()+"' and TableName='"+$('#table_select option:selected').val()+"' and CreateDate= '"+$('#date_select option:selected').val()+"' and ( ";
	
	$('#field_select option').each(function() {
		if($(this).is(':selected')){
			string1=string1+ "Field = '" + $(this).val() + "' or ";
			string3=string3+ "Field = '" + $(this).val() + "' or ";
		}
	});
	var string2 = string1.substr(0,string1.length-4);
	string2= string2+")";
	var string4 = string3.substr(0,string3.length-4);
	string4= string4+")";
	alert(string4);
	
	$.ajax({
		url: 'fusionCharts/get_mscolumn2d_chart.php',
		type: 'POST',
		data: {'query':string2,"query_bm":string4},
		success:function(data){
		//alert(data);
		var main_arr = jQuery.parseJSON(data);
		alert(main_arr.length+" len");
		alert(main_arr[2]);

		var fusioncharts = new FusionCharts({
		    type: 'mscolumn2d',
		    renderAt: 'display_stats_div',
		    width: '600',
		    height: '600',
		    dataFormat: 'json',
		    dataSource: {
		        "chart": {
		            "caption": "Benchmark Comparison",
		            "xAxisname": "Date",
		            "yAxisName": "Values",
		            "numberPrefix": "",
		            "plotFillAlpha": "80",

		            //Cosmetics
		            "paletteColors": "#0075c2,#1aaf5d",
		            "baseFontColor": "#333333",
		            "baseFont": "Helvetica Neue,Arial",
		            "captionFontSize": "14",
		            "subcaptionFontSize": "14",
		            "subcaptionFontBold": "0",
		            "showBorder": "0",
		            "bgColor": "#ffffff",
		            "showShadow": "0",
		            "canvasBgColor": "#ffffff",
		            "canvasBorderAlpha": "0",
		            "divlineAlpha": "100",
		            "divlineColor": "#999999",
		            "divlineThickness": "1",
		            "divLineIsDashed": "1",
		            "divLineDashLen": "1",
		            "divLineGapLen": "1",
		            "usePlotGradientColor": "0",
		            "showplotborder": "0",
		            "valueFontColor": "#ffffff",
		            "placeValuesInside": "1",
		            "showHoverEffect": "1",
		            "rotateValues": "1",
		            "showXAxisLine": "1",
		            "xAxisLineThickness": "1",
		            "xAxisLineColor": "#999999",
		            "showAlternateHGridColor": "0",
		            "legendBgAlpha": "0",
		            "legendBorderAlpha": "0",
		            "legendShadow": "0",
		            "legendItemFontSize": "10",
		            "legendItemFontColor": "#666666"
		        },
		        "categories": [{
		            "category": main_arr[0]
		        }],
		        "dataset": [{
		            "seriesname": "Selected Date",
		            "data": main_arr[1]
		        }, {
		            "seriesname": "Benchmarked",
		            "data": main_arr[2]
		        }],
		        
		    }
		}
		);
		    fusioncharts.render();

		
			
		}
	});
	
	
}



function display_stats_table(){
	cnt = 0;
	$.ajax({
		url: 'ajax/ajax_get_single_row_from_database.php',
		type: 'POST',
		data: {'query': "select * from prgstats"},
		success:function(data){
			var arr = jQuery.parseJSON(data);
			//alert(arr);

			$.ajax({
				url: 'ajax/ajax_get_single_row_from_database.php',
				type: 'POST',
				data: {'query': "select * from bm_prgstats"},
				success:function(data){
					
					bm_arr = jQuery.parseJSON(data);
					
					//alert(bm_arr[bm_traverse_int]['PerPop']);					
				}
			});


			setTimeout(function(){
				
			htmlstr="<div class='2t btn green' onclick='toggle_column(2)'>PerPop</div>"+
			"<div class='4t btn green' onclick='toggle_column(4)'>Zeros</div>"+
			"<div class='6t btn green' onclick='toggle_column(6)'>CreateDate</div>"+
			"<table id='stats_table' class='display dataTable' width='100%' cellspacing='10'>"+
			"<thead><tr><th class='highlight'>Field</th><th>PerPop</th><th>BM PerPop</th><th>Zeros</th><th>BM Zeros</th><th>CreateDate</th><th>BM CreateDate</th></tr></thead>"+
			"<tfoot><tr><th>Field</th><th>PerPop</th><th>BM PerPop</th><th>Zeros</th><th>BM Zeros</th><th>CreateDate</th><th>BM CreateDate</th></tr></tfoot></tr><tbody>";

			htmlstr = htmlstr+"</tbody></table>";
			$("#display_stats_div").html(htmlstr);
			
			
			arr.forEach(traverse_rows);
			//alert(dashboard_build_variable_values);
			$('#stats_table').DataTable({                           
			       "bJQueryUI": true,
			       "sPaginationType": "full_numbers",
			       "bSort": true,
			       "bFilter": true,
			       
			    });
			//$('div.dataTables_filter input').addClass('browser-default');
			$(".dataTables_length select").addClass("browser-default");
			for(var i =2;i<=6;i+=2)
			{
				var col = $("#stats_table").DataTable().column(i);
				$("#stats_table thead th:eq("+i+")").addClass("grey");
				
				
			}
			for(var i =2;i<=6;i+=2)
			{
				var col = $("#stats_table").DataTable().column(i);
				col.visible(!col.visible());
				
			}

			},100);//timeout	
			
		}
	});

}

function toggle_column(column_no){
	if($("."+column_no+"t").hasClass("green")){
		//alert("hasclass");
		$("."+column_no+"t").removeClass("green");
	}
	else
	{
		$("."+column_no+"t").addClass("green");
	}	
	var col = $("#stats_table").DataTable().column(column_no);
	col.visible(!col.visible());
	
}

function traverse_rows(item)
{
	//if(item['cft_Delimeter']== null){item['cft_Delimeter']="null";}
  	//htmlstr = htmlstr+"<tr><td> "+item['cft_id']+ " </td><td>"+item['cft_Delimeter']+"<td><td>"+item['ind_FileName']+"<td></tr>";
	
	//if((cnt)< bm_arr.length){
		$('#stats_table').append("<tr><td>"+item['Field']+ "</td><td>"+item['PerPop']+"</td><td>"+bm_arr[cnt]['PerPop']+"</td><td>"+item['Zeros']+"</td><td>"+bm_arr[cnt]['Zeros']+"</td><td>"+item['CreateDate']+"</td><td>"+bm_arr[cnt]['CreateDate']+"</td></tr>");
		cnt++;
	//}
}




</script>

<body onload="select_columns()">

<div class="container-fluid">
	
		
<div class="col-md-12 ">
<div class="container">
  <div class="panel panel-default card">
    <div class="panel-heading">
		<h3 >Compare prgStats</h3>
			<a href="http://1000hz.github.io/bootstrap-validator/" target="_blank"></a>
    </div>
    <div class="panel-body">
   		<div class="container-fluid">
			<div class="col-md-6">
	 			    <label for="database_select">Database:</label>          
              		<select id="database_select" class='browser-default' onchange="addTableName(this);$('#hid_div').addClass('hidden');" name="database_select" >
				    	<option value=''>Select Database</option>
				    	<?php 
				    	
				    	$q="select distinct DatabaseName from prgstats";
				    	$c=mysql_query($q);
				    	while($row=mysql_fetch_array($c))
				    	{
				    		//echo $row['COLUMN_NAME'];
				    		echo "<option value=".$row['DatabaseName'].">".$row['DatabaseName']."</option>"	;
				    		
				    	}
				    	 
				    	?>	
    	
   					</select>  
   					
		        </div>
		        <div class="col-md-6">
			 			    <label for="table_select">Table:</label>  
		              		<select id="table_select" class='browser-default' onchange="addFieldsName(this);$('#hid_div').addClass('hidden');" name="table_select" >
						    	<option value=''>Select Table Name</option>
		    	
		   					</select>  
		   					
		        </div>

		        <div class="col-md-5">
			 			    <label for="field_select">Fields:</label>  
		              		<select multiple='multiple' id="field_select" onchange="$('#hid_div').addClass('hidden');" name="field_select" >
						    <option value=''>Select Field Name</option>
		    	
		   					</select>  
		   					
		        </div>
		        
		        
		        <div class="col-md-7">
			 			    <label for="columns_select">Columns:</label>  
		              		<select multiple='multiple'  id="columns_select" name="columns_select" >
						   		
		   					</select>  
		   					
		        </div>
		        
		         <div class="col-md-12">
			 			   <button class="btn btn-primary" onclick="select_date();$('#hid_div').removeClass('hidden');">Show </button>
		        </div>
		        
		        <div class='hidden ' id='hid_div'>
		         <div class="col-md-6">
			 			    <label for="date_select">Date Select:</label>  
		              		<select id="date_select" class='browser-default' name="date_select" >
						    	<option value=''>Select Date</option>
		    	
		   					</select>  
		   					
		        </div>
		        
		        
		        <div class="col-md-5">
			 			    <label for="view_select">View</label>  
		              		<select id="view_select" class='browser-default' name="table_select" >
						    	<option value='graphical'>Graphical</option>
		    					<option value='Tabular'>Tabular</option>
		   					</select>  
		   					
		        </div>
		        <div class="col-md-6">
			 			   <button class="btn btn-primary" onclick="display_stats()">Show Stats</button>
		        </div>
		        
		       </div> 
		       </div>	
			
	  <hr>
		     
		  
   </div>
  
   
	  <div class="container-fluid">
	  <div id="display_stats_toggle_div"></div>
      <div class='text-center' id="display_stats_div">
      	
      </div> 
        
	   </div>
     
	
	</div>
		
</div>

</div>
</div>
</body>
