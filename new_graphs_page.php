<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script type="text/javascript" src="js/fusionCharts/fusioncharts.js"></script>
<script type="text/javascript" src="js/fusionCharts/fusioncharts.charts.js"></script>

<script type="text/javascript" src="js/fusionCharts/fusioncharts.theme.zune.js"></script>

<script type="text/javascript" src="js/jquery.js"></script>
	


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
					"caption": "No. of zeros",
		            "subCaption": "prgStats",
		            "xAxisName": "Field",
		            "yAxisName": "Zeros",
		            "theme": "zune"
				      };
		      
			var apiChart = new FusionCharts({
				        type: 'column2d',
				        renderAt: 'container00',
				        width: '600',
				        height: '400',
				        dataFormat: 'json',
				        dataSource: {
				          "chart": chartProperties,
				          "data": parsedData
				        }
				      });
		      
				      apiChart.render();
			
		}
	});
}



FusionCharts.ready(function(){
    var revenueChart = new FusionCharts({
      "type": "column2d",
      "renderAt": "container01",
      "width": "500",
      "height": "300",
      "dataFormat": "json",
      "dataSource": {
        "chart": {
            "caption": "Monthly revenue for last year",
            "subCaption": "Harry's SuperMart",
            "xAxisName": "Month",
            "yAxisName": "Revenues (In USD)",
            "theme": "fint"
         },
        "data": [
            {
               "label": "Jan",
               "value": "420000"
            },
            {
               "label": "Feb",
               "value": "810000"
            },
            {
               "label": "Mar",
               "value": "720000"
            },
            {
               "label": "Apr",
               "value": "550000"
            },
            {
               "label": "May",
               "value": "910000"
            },
            {
               "label": "Jun",
               "value": "510000"
            },
            {
               "label": "Jul",
               "value": "680000"
            },
            {
               "label": "Aug",
               "value": "620000"
            },
            {
               "label": "Sep",
               "value": "610000"
            },
            {
               "label": "Oct",
               "value": "490000"
            },
            {
               "label": "Nov",
               "value": "900000"
            },
            {
               "label": "Dec",
               "value": "730000"
            }
         ]
      }
  });

  revenueChart.render();
})



	
	
	
	
	
</script>
<body onload="display()">

	<div id="container00" >Loading...</div>
	<div id="container01"  >Loading...</div>

</body>
</html>