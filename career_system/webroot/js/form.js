/*
====================================================
* [Form Javascript]

  Name 		 :  Career System
  Version    :  1.0
  Author     :  Fortress Team
  Author URI :  https://github.com/FortressTeam
====================================================

   TOC:
  =======

===================================================== */

function openForm(id){
	// Load the first time (ajax load)
	if(!$('#' + id + 'Form').length){

	}
	// Load the second time
	else if($('#' + id + 'Form').css('display') == 'none'){
		$('#' + id + 'Form').css('display', 'inherit');
	}
	if($('#' + id + 'Panel').css('display') != 'none'){
		$('#' + id + 'Panel').css('display', 'none');
	}
}
function closeForm(id){
	if($('#' + id + 'Form').css('display') != 'none'){
		$('#' + id + 'Form').css('display', 'none');
	}
	if($('#' + id + 'Panel').css('display') == 'none'){
		$('#' + id + 'Panel').css('display', 'inherit');
	}
}

$('.editable').find('.btn-OpenForm').click(function(){
	var formName = $(this).data('form');
	openForm(formName);
});
$('.editable').find('.btn-CloseForm').click(function(){
	var formName = $(this).data('form');
	closeForm(formName);
});
$('#buttonChangeStatus').click(function(){
	var controller = $(this).data('controller');
	var id = $(this).data('id');
	var field = $(this).data('field');
	var value = $(this).data('value');
	var data ={}; data[field] = value;
	var dataJSON = JSON.stringify(data);
	$.ajax({
		type: 'PUT',
		url: $('#webInfo').data('url') + '/api' + '/' + controller + '/' + id,
		contentType: 'application/json',
		dataType: 'json',
		data: dataJSON,
		success: function(data){
			if(data['message'] == 'Saved'){
				if(value == '1'){
					$('#buttonChangeStatus')
						.html('ON')
						.data('value', '0')
						.removeClass('btn-default')
						.addClass('btn-primary');
				}
				else{
					$('#buttonChangeStatus')
						.html('OFF')
						.data('value', '1')
						.removeClass('btn-primary')
						.addClass('btn-default');
				}
			}
		}
	});
});