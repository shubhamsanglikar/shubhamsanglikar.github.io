
<?php
$cn=mysql_connect("localhost","root","") or die("Could not Connect MySql");
mysql_select_db("property",$cn)  or die("Could connect to Database");

extract($_POST);
echo $selected_city;
$price = array();
$quarter =  array();
$query = "select price, quarter from sample_dataset where area = 'kothrud'";
$a=mysql_query($query);

$ans=array();
while($row=mysql_fetch_array($a))
	{
		array_push($price, $row['price']);
		array_push($quarter, $row['quarter']);
	}
	//echo $price[0]." ".$quarter[0]." <br>";
	//echo array_sum($price);
$ans = linear_regression($quarter,$price);
echo "Slope".$ans['m']."<br>int";
echo $ans['b'];




function linear_regression($x, $y) {

  $n = count($x);
  if ($n != count($y)) {
    trigger_error("linear_regression(): Number of elements in coordinate arrays do not match.", E_USER_ERROR);
  }
  $x_sum = array_sum($x);
  $y_sum = array_sum($y);
  $xx_sum = 0;
  $xy_sum = 0;
  
  for($i = 0; $i < $n; $i++) {
  
    $xy_sum+=($x[$i]*$y[$i]);
    $xx_sum+=($x[$i]*$x[$i]);
    
  }
  
  $m = (($n * $xy_sum) - ($x_sum * $y_sum)) / (($n * $xx_sum) - ($x_sum * $x_sum));

  $b = ($y_sum - ($m * $x_sum)) / $n;

  return array("m"=>$m, "b"=>$b);

}

//var_dump(linear_regression(array(1, 2, 3, 4), array(3187,3230,3315,3442)))  ;

?>




<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script type="text/javascript" src="js/fusionCharts/fusioncharts.js"></script>
<script type="text/javascript" src="js/fusionCharts/fusioncharts.charts.js"></script>

<script type="text/javascript" src="js/fusionCharts/fusioncharts.theme.zune.js"></script>
<script type="text/javascript" src="js/fusionCharts/fusioncharts.theme.fusioncharts.theme.carbon.js"></script>

<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/function.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>


<script type="text/javascript">


var price,quarter;
function display(){
	var str = "select price from sample_dataset where area = 'kothrud'";
	$.ajax({
		url: 'get_line.php',
		type: 'POST',
		data: {'q':str,'val':'price'},
		success:function(d){
			var parsedData = jQuery.parseJSON(d);
			//alert(parsedData);
			//var pa=jQuery.parseJSON(d);
			
			price = parsedData;
			alert(price);

			}
		});
		str = "select quarter from sample_dataset where area = 'kothrud'";
		$.ajax({
		url: 'get_line.php',
		type: 'POST',
		data: {'q':str,'val':'quarter'},
		success:function(d){
			var parsedData = jQuery.parseJSON(d);
			//alert(parsedData);
			//var pa=jQuery.parseJSON(d);
			
			quarter = parsedData;
			alert(quarter);
			var qstr="",pstr="",rlstr="";
			var m,c;
			m= <?php echo $ans['m']; ?>;
			c = <?php echo $ans['b']; ?>;
			//alert(temp);
			for(var i=0;i<quarter.length;i++){
				if(i==quarter.length-1)
				{
					rlstr+= ""+(m*quarter[i] + c);
					qstr+=quarter[i];
					pstr+=price[i];
				}
				else
				{
					rlstr+= ""+(m*quarter[i] + c)+"|";
					qstr+=quarter[i]+"|";
					pstr+=price[i]+"|";
					
				}
			}
			alert(qstr+"     "+pstr);
					
					var fusioncharts = new FusionCharts({
	    type: 'zoomline',
	    renderAt: 'container01',
	    width: '600',
	    height: '400',
	    dataFormat: 'json',
	    dataSource: {
	        "chart": {
	        	"caption": "aaaUnique Website Visitors",
	            "subcaption": "Last year",
	            "yaxisname": "Unique Visitors",
	            "xaxisname": "Date",
	            "yaxisminValue": "800",
	            "yaxismaxValue": "1400",
	            "pixelsPerPoint": "0",
	            "pixelsPerLabel": "30",
	            "lineThickness": "1",
	            "compactdatamode": "1",
	            "dataseparator": "|",
	            "labelHeight": "30",
	            "theme": "fint"
	        },
	        "categories": [{
	            "category": qstr,
		      }],
	        "dataset": [{
	            "seriesname": "myData",
	            "data": pstr,
	        },
	        {
	            "seriesname": "regression line",
	            "data": rlstr
	        }]
	    }
	});
	fusioncharts.render();
			
			
			
			
			}
		});
		
		
		
		
		
	}



FusionCharts.ready(function(){
	
})



	
	
	
	
	
</script>
<body onload="display()">
<form role="form" id="form" name="form" method="post">
<select name='selected_city'>
	<option value='pune' >Pune</option>
</select>
<select name='selected_area'>
	<option value='kothrud' >Kothrud</option>
</select>
</form>
<div class="container-fluid">
	<div id="container00" class="col-md-4">Loading...</div>
	<div id="container01" class="col-md-4" >Loading...</div>
</div>
</body>
</html>