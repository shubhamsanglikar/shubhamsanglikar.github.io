// autocomplet : this function will be executed every time we change the text


var username="not assigned";
function autocomplet() {
	var min_length = 0; // min caracters to display the autocomplete
	var keyword = $('#country_id').val();
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'auto_suggest_search.php',
			type: 'POST',
			data: {'keyword':keyword},
			success:function(data){
				$('#country_list_id').show();
				$('#country_list_id').html(data);
			}
		});
	} else {
		$('#country_list_id').hide();
	}
}

// set_item : this function will be executed when we select an item
function set_item(item) {
	// change input value
	$('#country_id').val(item);
	// hide proposition list
	//$('#country_list_id').hide();
	
	$.ajax({
		url: 'select_user.php',
		type: 'POST',
		data: {'keyword':item},
		success:function(data){
			//$('#country_list_id').show();
			$('#country_list_id').html(data);
		}
	});
	
}


function update_user(){
	alert("sdfdfs");
	var htmldata= "<div>sdsf </div>";
	$('#testdiv').html(htmldata);
	
	
}

