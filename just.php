
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>PRGX</title>
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
    <!-- Bootsrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/add-clients.css">
		<link rel="stylesheet" href="css/materialize.min.css">
		
	
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/function.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>

</head>
<body onload = "display()">

<script>
function display(){
	
		$.ajax({
			url: 'yoo.php',
			type: 'POST',
			success:function(d){
				var al=jQuery.parseJSON(d);
				alert(al.data[0].label);
				
			}
		});
}
	</script>
</body>
</html>


