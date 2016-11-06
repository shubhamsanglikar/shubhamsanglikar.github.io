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
		var arr = jQuery.parseJSON(data);
		
		
		var htmltext="<div class='card col-md-12'> " +
		
		"<div class='col-md-11' style='padding:10px'>" +
		"<div class='text-center col-md-4' style='padding:10px'><b>" +
		arr['username'] +
		"</b></div>" +
		"<div class='text-center col-md-4' style='padding:10px'><b>" +
		arr['u_designation'] +
		"</b></div>" +
		"<select name='selectname'><option value='admin'>Admin</option><option value='viewer' >Viewer</option><option value='writer'>Writer</option></select>"+
		"<div class='text-center col-md-2' ><button class='btn' id='editbtn'><i class='fa fa-pencil' aria-hidden='true'> </i> Update</button></div>" +
		"<div class='text-center col-md-2' ><button class='btn' id='deletebtn'><i class='fa fa-times' aria-hidden='true'> </i> Delete</button></div>" +
		"</div>" +
		"</div>" +
		"<br></div>";
		
		
			$('#country_list_id').html(htmltext);
			$( "#editbtn" ).click(function() {
				 update_user(arr);
			});
		}
	});
	
}


function update_user(arr){
	alert(arr);
	var htmltext="<div class='card col-md-12'> " +
	"<div class='col-md-11' style='margin:10px'>" +
	$('#testdiv').html(htmltext);
	
	
}

