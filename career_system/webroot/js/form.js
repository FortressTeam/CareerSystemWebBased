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
  	1. Hiring manager
		1.1. Hiring manager: Company Infomation
		1.2. Hiring manager: Company About
		1.3. Hiring manager: Company Iamge


===================================================== */

function openForm( id ) {
	// Load the first time (ajax load)
	if(!$( '#' + id + 'Form' ).length) {

	}
	// Load the second time
	else if($( '#' + id + 'Form' ).css('display') == 'none') {
		$( '#' + id + 'Form').css('display', 'inherit');
	}
	if($( '#' + id + 'Panel' ).css('display') != 'none') {
		$( '#' + id + 'Panel' ).css('display', 'none');
	}
}
function closeForm( id ) {
	if($( '#' + id + 'Form' ).css('display') != 'none') {
		$( '#' + id + 'Form' ).css('display', 'none');
	}
	if($( '#' + id + 'Panel' ).css('display') == 'none') {
		$( '#' + id + 'Panel' ).css('display', 'inherit');
	}
}

$('.editable').find('.btn-OpenForm').click(function(){
	var formName = $(this).data('form');
	openForm(formName);
	console.log($(this).parent());
});
$('.editable').find('.btn-CloseForm').click(function(){
	var formName = $(this).data('form');
	closeForm(formName);
});
$('#buttonChangeStatus').click(function() {
	var controller = $(this).data('controller');
	var id = $(this).data('id');
	var field = $(this).data('field');
	var value = $(this).data('value');
	var data = {}; data[field] = value;
	var dataJSON = JSON.stringify(data);
	$.ajax({
	    type: 'PUT',
	    url: $('#webInfo').data('url') + '/api' + '/' + controller + '/' + id,
	    contentType: 'application/json',
	    dataType: 'json',
	    data: dataJSON,
	    success: function(data) {
	        if( data["message"] == 'Saved') {
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

/* ------------------------------------------- */
/* 1. Hiring manager
 --------------------------------------------- */
/* ------------------------------------------- */
/* 1.1. Hiring manager: Company Infomation
 --------------------------------------------- */
$('.editable').find('#buttonEditCompanyInfo').click(function(){
	var data = {
		"hiring_manager_name": $("#inputManagerName").val(),
		"hiring_manager_phone_number": $("#inputManagerPhone").val(),
		"company_name": $("#inputName").val(),
		"company_size": $("#inputSize").val(),
		"company_address": $("#inputAddress").val(),
		"company_email": $("#inputEmail").val()
	};
	var idHiringManager = $(this).data('id');
	var formName = $(this).data('form');
	var dataJSON = JSON.stringify(data);
	$.ajax({
	    type: 'PUT',
	    url: $('#webInfo').data('url') + '/api' + '/hiring_managers' + '/' + idHiringManager,
	    contentType: 'application/json',
	    dataType: 'json',
	    data: dataJSON,
	    success: function(response) {
	        if( response["message"] == 'Saved') {
	        	$('#textManagerName').text( response["hiringManager"]["hiring_manager_name"] );
	        	$('#textManagerPhone').text( response["hiringManager"]["hiring_manager_phone_number"]);
	        	$('#textName').text( response["hiringManager"]["company_name"] );
	        	$('#textSize').text( response["hiringManager"]["company_size"] + ' people');
	        	$('#textAddress').text( response["hiringManager"]["company_address"] );
	        	$('#textEmail').text( response["hiringManager"]["company_email"] );
	        	closeForm(formName);
	        }
	    } 
	});
});
/* ------------------------------------------- */
/* 1.2. Hiring manager: Company About
 --------------------------------------------- */
$('.editable').find('#buttonEditCompanyAbout').click(function(){
	var data = {
	    "company_about": $("#inputAbout").val()
	};
	var idHiringManager = $(this).data('id');
	var formName = $(this).data('form');
	var dataJSON = JSON.stringify(data);
	$.ajax({
	    type: 'PUT',
	    url: $('#webInfo').data('url') + '/api' + '/hiring_managers' + '/' + idHiringManager,
	    contentType: 'application/json',
	    dataType: 'json',
	    data: dataJSON,
	    success: function(response) {
	        if( response["message"] == 'Saved') {
	        	$('#textAbout').text( response["hiringManager"]["company_about"] );
	        	closeForm(formName);
	        }
	    }
	});
});
/* ------------------------------------------- */
/* 1.3. Hiring manager: Company Image
 --------------------------------------------- */
$('#buttonCompanyImage').click(function() {
	$('#imputCompanyImage').click();
});
$('#imputCompanyImage').change(function() {
	if (this.files && this.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#companyImage').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    }
})

/* ------------------------------------------- */
/* 1. App;icant
 --------------------------------------------- */
/* ------------------------------------------- */
/* 1.1. App;icant: About Me
 --------------------------------------------- */
$('.editable').find('#buttonEditAboutMe').click(function(){
	var data = {
	    "applicant_name": $("#inputName").val(),
	    //"applicant_career_path": $("#inputCareerPath").val(),
	    "applicant_about": $("#inputAbout").val(),
	    "applicant_future_goals": $("#inputFutureGoals").val(),
	};
	var idApplicant = $(this).data('id');
	var formName = $(this).data('form');
	var dataJSON = JSON.stringify(data);
	$.ajax({
	    type: 'PUT',
	    url: $('#webInfo').data('url') + '/api' + '/applicants' + '/' + idApplicant,
	    contentType: 'application/json',
	    dataType: 'json',
	    data: dataJSON,
	    success: function(response) {
	        if( response["message"] == 'Saved') {
	        	$("#textName").text( response["applicant"]["applicant_name"] );
	        	//$("#inputName").text( response["applicant"]["applicant_career_path"] );
	        	$("#textAbout").text( response["applicant"]["applicant_about"] );
	        	$("#textFutureGoals").text( response["applicant"]["applicant_future_goals"] );
	        	closeForm(formName);
	        }
	    }
	});
});