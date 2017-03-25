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



function display(){
	var str = "select Field , Zeros from prgstats where TableName = 'c_xyz_na_dist_invoice_items' limit 10";
	$.ajax({
		url: 'fusionCharts/get_bar_graph.php',
		type: 'POST',
		data: {'q':str},
		success:function(d){
			var parsedData = jQuery.parseJSON(d);
			//alert(parsedData);

		

			var chartProperties = {
					"caption": "Unique Website Visitors",
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
				      };
		      
			var apiChart = new FusionCharts({
				        type: 'zoomline',
				        renderAt: 'container00',
				        width: '600',
				        height: '400',
				        dataFormat: 'json',
				        dataSource: {
				          "chart": chartProperties,
	
				          "categories": [{
					            "category": "Jan 01|Jan 02|Jan 03|Jan 04"
						      }],
					        "dataset": [{
					            "seriesname": "myData",
					            "data": "3178|3230|3315|3442"
					        },
					        {
					            "seriesname": "regression line",
					            "data": "2000|3000|4000|5000"
					        }]
				        }
				      });
		      
				      apiChart.render();
			
		}
	});
}



FusionCharts.ready(function(){
	var fusioncharts = new FusionCharts({
	    type: 'zoomline',
	    renderAt: 'container01',
	    width: '600',
	    height: '400',
	    dataFormat: 'json',
	    dataSource: {
	        "chart": {
	        	"caption": "Unique Website Visitors",
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
	            "category": "Jan 01|Jan 02|Jan 03|Jan 04"
		      }],
	        "dataset": [{
	            "seriesname": "myData",
	            "data": "3178|3230|3315|3442"
	        },
	        {
	            "seriesname": "regression line",
	            "data": "2000|3000|4000|5000"
	        }]
	    }
	});
	fusioncharts.render();
})



	
	
	
	
	
</script>
<body onload="display()">
<div class="container-fluid">
	<div id="container00" class="col-md-4">Loading...</div>
	<div id="container01" class="col-md-4" >Loading...</div>
</div>
</body>
</html>