<?php
session_start();

include 'database.php';


echo "<script type='text/javascript'>
		$('.3').addClass('current-menu-item');
		</script>";
extract($_POST);

include 'header.php';
		
			
?>


<html>
<body>
<div  class='card container-fluid'>
 <select class='browser-default col-md-2' name ="column" id="column">
    	<?php 
    	
    	$a= "select COLUMN_NAME from INFORMATION_SCHEMA.COLUMNS where TABLE_NAME = 'prgstats'";
    	$b=mysql_query($a);
    	while($row=mysql_fetch_array($b))
    	{
    		//echo $row['COLUMN_NAME'];
    		echo "<option value=".$row['COLUMN_NAME'].">".$row['COLUMN_NAME']."</option>"	;
    		
    	}
    	 
    	?>	
    </select>
	
<select class='browser-default col-md-2' name="database" id = "database">
    	<?php 
    	
    	$q="select distinct DatabaseName from prgstats";
    	$c=mysql_query($q);
    	while($row=mysql_fetch_array($c))
    	{
    		//echo $row['COLUMN_NAME'];
    		echo "<option onclick='addTableName(this,\"table\")' value=".$row['DatabaseName'].">".$row['DatabaseName']."</option>"	;
    		
    	}
    	 
    	?>	
    	
    </select>    
     <select class='browser-default col-md-2' name ="table" id="table">
    	<label>jjsf</label>
    </select>
     
     <select class='browser-default col-md-2' name ="field" id="field">
    	
    </select>
    <select class='browser-default col-md-2' name ="plot" id="plot">
    	<option value='monthly'>Monthly</option>
    	<option value='yearly'>Yearly</option>
    </select>
    <div class='col-md-2'><input class="input-field" placeholder='Threshold (Percentage)'/></div>
</div>
    <br>
    <div class='container-fluid' id='content'>
    
    </div>
    <div class='container' id='button-div'>
    
    </div>
   
	
	
</body>
<script type="text/javascript">
function addTableName(d,field){
	//alert(d.value);


	$.ajax({
		url: 'update_select.php',
		type: 'POST',
		data: {'field':field, 'value':d.value},
		success:function(data){
			//$('#country_list_id').show();
		var arr = jQuery.parseJSON(data);
			var al = arr.length;
			//alert(al);
			var i=0;
			for(i = 0 ;i<al ; i++){
				if(field=="table")
					$('#table').append("<option onclick='addTableName(this,\"field\")' value='"+arr[i]+"'>"+arr[i]+"</option>");
				if(field=="field")
					$('#field').append("<option onclick='show_graph()' value='"+arr[i]+"'>"+arr[i]+"</option>");
				
			}
		
		}
	});
	
}


function show_graph(){
	
	//$('#content').html("Working...")	
	dbname=$('#database').val();
	tblname=$('#table').val();
	fldname=$('#field').val();
	colname=$('#column').val();
	
	$.ajax({
		url: 'get_report.php',
		type: 'POST',
		data: {'dbname':dbname, 'tblname':tblname, 'fldname':fldname, 'colname':colname},
		success:function(data){
			var arr = jQuery.parseJSON(data);
var htmldata= "<div  class='card col-md-8 text-center'>"+arr+"</div>"+

"<div style='margin-left:50px' class='card col-md-3 text-right' >"+
"<table><tr><td>Month</td><td>Null Value</td><td>Null Value (Benchmarked)</td></tr><tr><td>February</td><td class='color-red'>23</td><td>18</td></tr></table>"+
"</div>";

			
			$('#content').html(htmldata);	
			$('#button-div').html("<button class='btn col-md-3'>Set benchmark</button><br><br>")
		}
	});
}


    	</script>
</html>
