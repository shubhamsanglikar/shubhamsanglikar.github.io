// autocomplet : this function will be executed every time we change the text


var username="not assigned";
function autocomplet(temp) {
	var min_length = 0; // min caracters to display the autocomplete
	var keyword = $('#country_id').val();
	if (keyword.length >= min_length) {
		$.ajax({
			url: 'auto_suggest_search.php',	
			type: 'POST',
			data: {'keyword':keyword, 'temp':temp},
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
		"<input type='text' id = 'nameid'></input>" +
		"</b></div>" +
		"<div class='col-md-4'><select id='selectname' class='browser-default' name='selectname'><option value='admin'>admin</option><option value='technical' >technical</option><option value='business'>business</option></select></div>"+
		"<div class='text-center col-md-2' ><button class='btn' id='editbtn'><i class='fa fa-pencil' aria-hidden='true'> </i> Update</button></div>" +
		"<div class='text-center col-md-2' ><button class='btn' id='deletebtn'><i class='fa fa-times' aria-hidden='true'> </i> Delete</button></div>" +
		"</div>" +
		"</div>" +
		"<br></div>";
		
		var des= arr['u_designation'];
			$('#country_list_id').html(htmltext);
			$('#selectname').find("option[value="+des+"]").prop('selected', true); 
			$( "#editbtn" ).click(function() {
				 update_user(arr);//fire mysql query and update the current values
			});
			$("#nameid").val(arr['username']);
			$( "#deletebtn" ).click(function() {
				 delete_user(arr);//fire mysql query and update the current values
			});
		}
	});
	
}


function update_user(arr){
	
	arr['u_desingation']=$("#selectname option:selected").text();
	arr['username']=$("#nameid").val();
	$.ajax({
		url: 'update_user.php',
		type: 'POST',
		data: {'id': arr['user_id'], 'username': arr['username'], 'u_designation': $("#selectname option:selected").text()},
		success:function(data){
			
			var htmltext="<div class='card col-md-12'> " +
			"<div class='col-md-11' style='margin:10px'>" +
			"<div>User information updated Sucessfully!</div>"+
			"</div>"+
			"</div>";
			$('#country_list_id').html(htmltext);
		
		}
	});
}
	
	function delete_user(arr){
		
	
		$.ajax({
			url: 'delete_user.php',
			type: 'POST',
			data: {'id': arr['user_id']},
			success:function(data){
				var htmltext="<div class='card col-md-12'> " +
				"<div class='col-md-11' style='margin:10px'>" +
				"<div>User Deleted Sucessfully!</div>"+
				"</div>"+
				"</div>";
				$('#country_list_id').html(htmltext);
			}
		});
	
	
	
	
	
}


