<?php
include "header.php";

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PRGX</title>
<link rel="stylesheet" href="css/style.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>

<style>
	.listbox-selected{
		background-color: #d6f5f5!important;;
	}
</style>
</head>

<body onload="onload()">
<script type="text/javascript">

	var keys;
	var operator;
	var values;
	var conjunctions;
	var prev_space = 0,status = 0;
	var temp;
	var tempendptr;
	var traversed_str="";
	var cnt=0;
	var min_length=1;
	var partial_str="";
	var current_word="";
	var status=0;
	var andorflag=0;
	var operatorflag=0;
	var current_selection = -1;//starting from 0
	var kuflag=0;
	var kdflag=0;
	
	
	var main_query = "select distinct	ci.c_id as ClientId,	ci.c_Client as Client,	ci.c_ShortName as ClientShortName,	ci.c_Country as Country,	ci.c_Location as Location,	ci.c_ActiveFlag as ClientActiveStatus,	clt.clt_no as ClientLoadTemplateNo,	clt.clt_id as ClientLoadTemplateId,	clt_FileConvention as LoadTemplateFileConvention,	clt_FileDescription as LoadTemplateFileDescription,	clt_CDMSBatch as CDMSBatch,	clt_ReceiveFrequency as FileReceiveFrequency,	clt_LoadFrequency as LoadFrequency,	clt_WFilePath as LoadTemplateWorkingFilePath,	clt_SFilePath as LoadTemplateStagingFilePath,	clt_filetype as LoadTemplateFileType,	clt_TableName as LoadTemplateTableNamingConvention,	clt_DataBaseName as LoadTemplateDataBaseNamingConvention,	clt_FileEncoding as LoadTemplateFileEncoding,	clt_LRFilePath as LoadReadyFilePath,	clt_IsActive as LoadTemplateActiveStatus,	clt_ViewName as LoadTemplateViewNamingConvention,	cft.cft_id as ClientFilesTemplateId,	cft_FileConvention as FilesTemplateConvention,	cft_DataItem as FilesTemplateDataItemName, case when cft.cft_IsPositional = 1 then 'Positional' when cft.cft_IsEBCDIC then 'EBCDIC' when cft.cft_IsOracleDMP = 1 then cft.cft_OracleDMPType when cft.cft_IsMultiSchema = 1 then 'MultiSchemaFile' when cft.cft_IsDelimited = 1 then concat('Delimited - ',  cft.cft_Delimiter)  when cft.cft_IsReportImage = 1 then 'ReportImage' when cft.cft_IsX12 = 1 then 'X12' when cft.cft_IsEDIFACT = 1 then 'EDIFACT' when cft.cft_IsFoxpro = 1 then 'FOXPRO'when cft.cft_IsSaveFile = 1 then 'SAVEFILE'end as FileType ,	cft_RecordLength as EBCDICRecordLength,	cft_TableName as FilesTemplateTableNamingConvention,	cft_IsActive as FilesTemplateActiveStatus,	cfi.cfi_id as ClientFilesInventoryId,	cfi_FileName as InventoryFileName,	cfi_type as InventoryType,	cfi_SFilePath as InventoryStagingPath,	cfi_WFilePath as InventoryWorkingPath,	cfi_IsEncrypted as InventoryEncrypted,	cfi_IsCcompressed as InventoryCompressed,	cfi_AfterDecryptName ,	cfi_AfterExtractedName,	cfi_filedate as InventoryFileDate,	cfi_LastLoadDate as LastLoadDate,	cfi_FileSize as FileSize,	cfi_IsActive as InventoryActiveStatus,	ind_id as InventoryDetailId,	ind_FileName as InventoryDetailFileName,	ind_Type as InventoryDetailType,	ind_WFilePath as InventoryDetailWorkingFilePath,	ind_Status as InventoryDetailStatus,	ind_filedate as InventoryDetailFileDate,	ind_FileSize as InventoryDetailFileSize,	ind_DataBaseName as InventoryDetailDatabaseName,	ind_TableName as InventoryDetailTableName,	ind_LoadDate as InventoryDetailLoadDate,	ind_TotalRecords as TotalRecords,	ind_RecordsProcessed as TotalRecordsProcessed,	ind_RecordsLoaded as TotalRecordsLoaded,	ind_RejectedFilePath as RejectedFilePath,	ind_ViewName as ViewName,	ind_IsActive as InventoryDetailActiveStatus,	ind_RecordsRejected as TotalRecordsRejected,   cbi.cbi_id as BuildId,   cbi.cbi_build_name as BuildName,   cbi.cbi_build_frequency as BuildFrequency,   cbti.cbt_BuildRequestId as RequestId,   cbti.cbt_Run_id as RunId,   cbti.cbt_TableName as BuildTableName,   cbti.cbt_TableType as BuildTableType,   cbti.cbt_RecordCount as BuildTableRecordCount,   cbti.cbt_DatabaseName as BuildDatabaseName,   cbid.cbd_ScriptStart_TimeStamp as ScriptStartTime,   cbid.cbd_ScriptEnd_TimeStamp as ScriptEndTime,   cbid.cbl_ScriptName as ScriptName,   cbid.cbl_LogFileLoc as LogFileLocation,   cbid.cbl_ServiceId as UserId,   cbid.cbl_Error_cd as ErrorCode,   cbid.cbl_Error_msg as ErrorMessage from 	Client_Info ci	left join Client_Load_Template clt on clt.c_id=ci.c_id	left join Client_Files_Template cft on cft.clt_id = clt.clt_id and cft.clt_no = clt.clt_no	left join Client_Files_Inventory cfi on cfi.clt_id = clt.clt_id and cfi.clt_no=cft.clt_no	left join Client_Inventory_Details cid on cid.clt_id = clt.clt_id and cid.cft_id=cft.cft_id and cid.cfi_id=cfi.cfi_id and cid.clt_no=cfi.clt_no	left join Client_Build_Info cbi on cbi.c_id = ci.c_id	left join Client_Build_Table_Info cbti on cbti.cbi_id = cbi.cbi_id	left join Client_Build_Info_Detail cbid on cbid.cbi_id = cbi.cbi_id 	and cbti.cbt_Run_Id = cbid.cbj_RunId	left join Client_Build_File_Xref cbfx on cbfx.cbi_id = cbi.cbi_id and cbfx.cft_id = cft.cft_id where ";
	
	
	
function onload()
{

	//document.getElementById("debug").innerHTML=temp;

		document.onkeydown = checkKey;
		document.onkeyup = resumeKey;


}

function manage_suggestions_list(){
	alert("managing suggestions list");
	var listboxes= document.getElementsByClassName('listbox');
	for (var i = 0; i < listboxes.length; ++i) {
		var item = listboxes[i];  
		item.innerHTML = 'this is value';
	}
	
	
}

function get_selection(){
	$('.listbox').each(function(i) {
		if($(this).hasClass('listbox-selected')){
			current_selection=i;
		}
		else
		{
			current_selection=-1;
		}
	});
}

function set_selection(no){
//alert("safda");
//$(".listbox-selected").removeClass('listbox-selected');
	$('.listbox').each(function(i,obj) {
	//alert("inside"+i+" "+no);
		if(i==no){
			var self = $(this);
			//alert("iii");
			current_selection=no;
			$(self).addClass('listbox-selected');
			//alert($(this).text());
		}
	});
}


function checkKey(e) {

    e = e || window.event;

    if (e.keyCode == '38' && $("#input_text").is(':focus') && kuflag==0) {
        // up arrow
		//alert("upkey");
		//get_selection();
		setTimeout(function(){ set_selection(current_selection-1);}, 300);
		kuflag=1;
		
    }
    else if (e.keyCode == '40' && $("#input_text").is(':focus') && kdflag==0) {
        // down arrow
		//alert("dkey"+ current_selection);
		//get_selection();
		setTimeout(function(){ set_selection(current_selection+1);}, 300);
		kdflag=1;
		
    }
    else if (e.keyCode == '37' && $("#input_text").is(':focus')) {
       // left arrow
	   //alert("lkey");
    }
    else if (e.keyCode == '39' && $("#input_text").is(':focus')) {
       // right arrow
	   //alert("rkey");
    }
	 else if (e.keyCode == '13' && $("#input_text").is(':focus')) {
       // right arrow
	   //alert("rkey");
	   set_item($(".listbox-selected").text());
    }
	else if ($("#input_text").is(':focus')) {
      current_selection=0;
    }
	

}



function resumeKey(e) {
	
    e = e || window.event;

    if (e.keyCode == '38' && $("#input_text").is(':focus')) {
        kuflag=0;
		//alert("RESUMEu");
		
    }
    else if (e.keyCode == '40' && $("#input_text").is(':focus')) {
        kdflag=0;		
		//alert("RESUMEd");
    }
    else if (e.keyCode == '37' && $("#input_text").is(':focus')) {
       // left arrow
	   //alert("lkey");
    }
    else if (e.keyCode == '39' && $("#input_text").is(':focus')) {
       // right arrow
	   //alert("rkey");
	   
    }
	

}


function get_values(){
	keys = new Array();
	operator = new Array();
	 values = new Array();
	 conjunctions = new Array();
	status = 0;
	var keyword = $('#input_text').val();
	prev_space=0;
	alert(keyword);
	for(var i = 0; i< keyword.length; i++){
	traversed_str = keyword.substring(0,i);
		if((keyword[i]== '=' || keyword[i]== '>' || keyword[i]== '<') && status==0){
			while(traversed_str[prev_space] == ' ')
			{
				prev_space++;
			}
			tempendptr = i;
			while(traversed_str[tempendptr-1] == ' ')
			{
				tempendptr--;
			}
			keys.push(traversed_str.substring(prev_space,tempendptr));
			if(keyword[i+1]=='='){
				prev_space=i+1;
			}
			else{
				prev_space=i;
			}
			status = 1;
		}
		if(keyword[i]== ' ' && status == 1){
			
			if(traversed_str.lastIndexOf(" or") == i-3)
			{
				
				while(traversed_str[prev_space+1] == ' ')
				{
					prev_space++;
				}
				tempendptr = traversed_str.lastIndexOf(" or");
				temp = tempendptr;
				while(traversed_str[tempendptr-1] == ' ')
				{
					tempendptr--;
				}
				values.push(traversed_str.substring(prev_space+1,tempendptr));
				conjunctions.push("or");
				prev_space = temp+3;
				status = 0;
			}
			if(traversed_str.lastIndexOf(" and") == i-4)
			{
			
			
			
				while(traversed_str[prev_space+1] == ' ')
				{
					prev_space++;
				}
				tempendptr = traversed_str.lastIndexOf(" and");
				temp = tempendptr;
				while(traversed_str[tempendptr-1] == ' ')
				{
					tempendptr--;
				}
				values.push(traversed_str.substring(prev_space+1,tempendptr));
				conjunctions.push("and");
				prev_space = temp+4;
				status = 0;
				
			}
			
		}
		
		/*
		alert(keyword[i]+"       prev_space="+prev_space+"\n|"+keys[0]+"|   |"+values[0]+"|   |"+conjunctions[0]+"| >> status="+status+"\n"+"|"+keys[1]+"|   |"+values[1]+"|   |"+conjunctions[1]+"| >> status="+status+"\n"+"|"+keys[2]+"|   |"+values[2]+"|   |"+conjunctions[2]+"| >> status="+status+"\n");
		*/
			
	}
		if(status == 1){
			while(traversed_str[prev_space+1] == ' ')
				{
					prev_space++;
				}
			values.push(keyword.substring(prev_space+1));
			prev_space=i;
		}
		if(status==0){
			
		}
		
	alert(keys.length);
	for(var i = 0; i< keys.length; i++){
		//alert("|"+keys[i]+"|   |"+values[i]+"|   |"+conjunctions[i]+"|");
	}
	
	/*alert(keyword[i]+"       prev_space="+prev_space+"\n|"+keys[0]+"|   |"+values[0]+"|   |"+conjunctions[0]+"| >> status="+status+"\n"+"|"+keys[1]+"|   |"+values[1]+"|   |"+conjunctions[1]+"| >> status="+status+"\n"+"|"+keys[2]+"|   |"+values[2]+"|   |"+conjunctions[2]+"| >> status="+status+"\n");*/
	var database_hits = 0;
	for(var i = 0; i< keys.length; i++){// to replace the alias names from the query with actual database names from lookup table.

		$.ajax({
			url: 'ajax/ajax_query_lookup.php',
			type: 'POST',
			data: {'query':" SELECT name from autocomplete_custom_query where alias_name = '"+keys[i]+"'",'val':keys[i]},
			success:function(data){
				var arr = jQuery.parseJSON(data);
				
				alert(arr[0]);
				
				keyword = keyword.replace(arr[1],arr[0]);
				var final_query = main_query.concat(keyword);
				alert(++database_hits);
				if(database_hits==keys.length){
					
					$.ajax({//firing final_query here...
						url: 'ajax/ajax_get_single_row_from_database.php',
						type: 'POST',
						data: {'query':final_query},
						success:function(data){
							alert("<br>"+data+"<br>");//final data to be displayed in datatable..
						
						}
					});
				}
				
			}
		});
	}
	

}

function check_status(){
	var wordcnt = 0;
	var keyword = $('#input_text').val();
	for(var i = 0 ; i< keyword.length ; i++ ){
		if(keyword[i]==' '){
			wordcnt++;
		}
	}
	wordcnt = wordcnt%4;
	return wordcnt;
}

function suggest() {
	
//0 - search for keys
//1 - search for operators
//2 - search for values
//3 - search for and/or

	var min_length = 0; // min caracters to display the autocomplete
	var keyword = $('#input_text').val();
	var temp=keyword.lastIndexOf(" ");
	partial_str = keyword.substring(0,temp);
	current_word = keyword.substring(temp+1);
	status = check_status();
	$('#debug_div').html("status: "+status);
	if(status==0)
	{
		suggest_word(current_word,"alias_name");
	}
	if(status == 1)
	{
	//suggest operators
		suggest_word(current_word,"operator");
	
		/*alert("operators: "+current_word);
		if(operatorflag==0 && (current_word == "<" || current_word == "="  || current_word == ">" || current_word == "<=" || current_word == ">=")){
			operatorflag=1;
		}
		if(operatorflag==1 && keyword.lastIndexOf(" ")==keyword.length-1){
			status=2;
			operatorflag=0;
		}*/
		
	}
	if(status==2)
	{
		$('#suggestions_div').hide();
		/*if(current_word.length > 1)
		{
			status=3;
		}*/
	}
	if(status==3)
	{
		suggest_word(current_word,"andor");
		/*if(keyword.lastIndexOf(" ")==keyword.length-1)
		{
			andorflag=1;
			//suggest and/or
			alert("and or suggestion start " + current_word);	
		}
		if(andorflag==1){
			suggest_word(current_word,"andor");
		}*/
	}
		
			
	 
}


function suggest_word(keyword,parameter)
{

	if (keyword.length >= min_length) {
	$.ajax({
			url: 'query_suggest_search.php',	
			type: 'POST',
			data: {'entire_query':keyword,'parameter':parameter},
			success:function(data){
				//alert("ha");
				$('#suggestions_div').show();
				$('#suggestions_div').html(data);
				set_selection(current_selection);
			}
		});
	} else {
		$('#suggestions_div').hide();
	}
}




function set_item(str)
{
	//alert($("#input_text").val());
	$('#suggestions_div').hide();
	document.getElementById("input_text").focus();
	if(partial_str.length == 0)
	{
		$('#input_text').val(str + " ");
	}
	else
	{
		$('#input_text').val(partial_str + " " + str + " ");
	}
	
	if(andorflag==1)
	{
		andorflag=0;
		status=0;
		
	}
	else{
		status = 1;
	}
}

</script>
    <div class="container">
       
            <div class="input-field col-md-9">
				<input id="input_text" type="text" autocomplete="off" onkeyup="suggest()"></input>
				<label  for="input_text">Enter query</label>
			</div>
			<div class="col-md-3">
				<input type="button" class="btn" onclick="get_values()" value="Submit"></input>
			</div>
			<div class="col-md-12">
				<div id="suggestions_div"></div>
			</div>
			
			<div id="debug_div"></div>
			
						
    </div><!-- container -->
    
</body>
</html>
