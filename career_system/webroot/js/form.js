/*
====================================================
* [Form Javascript]

  Name 		 :  Career System
  Version    :  1.0
  Author     :  Vic
  Author URI :  ...
====================================================

   TOC:
  =======
	1.1. Hiring manager: Company Infomation


===================================================== */


function openForm( id ) {
	if(!$( id + 'Form' ).length) {
		// Load the first time (ajax load)

	}
	else {
		// Load the second time
		if($( id + 'Form' ).css('display') == 'none') {
			$( id + 'Form').css('display', 'inherit');
		}
	}
	if($( id + 'Panel' ).css('display') != 'none') {
		$( id + 'Panel' ).css('display', 'none');
	}
	if($( id + 'Button' ).css('display') != 'none') {
		$( id + 'Button' ).css('display', 'none');
	}
}
function closeForm( id ) {
	if($( id+ 'Form' ).css('display') != 'none') {
		$( id+ 'Form' ).css('display', 'none');
	}
	if($( id + 'Panel' ).css('display') == 'none') {
		$( id + 'Panel' ).css('display', 'inherit');
	}
	if($( id + 'Button' ).css('display') == 'none') {
		$( id + 'Button' ).css('display', 'inherit');
	}
}

/* --------------------------------- */
/* 1.1. Hiring manager: Company Infomation
 ----------------------------------- */
function editCompanyInfo(id) {
    var data = {
    	"hiring_manager_name": $("#inputManagerName").val(),
    	"hiring_manager_phone_number": $("#inputManagerPhone").val(),
	    "company_name": $("#inputName").val(),
	    "company_size": $("#inputSize").val(),
	    "company_address": $("#inputAddress").val(),
	    "company_email": $("#inputEmail").val()
	}
	var dataJSON = JSON.stringify(data);
	$.ajax({
	    type: 'PUT',
	    url: $('#webInfo').data('url') + '/api' + '/hiring_managers' + '/' + id,
	    contentType: 'application/json',
	    dataType: 'json',
	    data: dataJSON,
	    success: function(data) {
	        if( data["message"] == 'Saved') {
	        	$("#textManagerName").text( data["hiringManager"]["hiring_manager_name"] );
	        	$("#textManagerPhone").text( data["hiringManager"]["hiring_manager_phone_number"]);
	        	$("#textName").text( data["hiringManager"]["company_name"] );
	        	$("#textSize").text( data["hiringManager"]["company_size"] + ' people');
	        	$("#textAddress").text( data["hiringManager"]["company_address"] );
	        	$("#textEmail").text( data["hiringManager"]["company_email"] );
	        	closeForm('#companyInfo');
	        }
	    } 
	});
}
/* --------------------------------- */
/* 1.2. Hiring manager: Company About
 ----------------------------------- */
function editCompanyAbout(id) {
    var data = {
	    "company_about": $("#inputAbout").val(),
	}
	var dataJSON = JSON.stringify(data);
	$.ajax({
	    type: 'PUT',
	    url: $('#webInfo').data('url') + '/api' + '/hiring_managers' + '/' + id,
	    contentType: 'application/json',
	    dataType: 'json',
	    data: dataJSON,
	    success: function(data) {
	        if( data["message"] == 'Saved') {
	        	$("#textAbout").text( data["hiringManager"]["company_about"] );
	        	closeForm('#companyAbout');
	        }
	    }
	});
}
/* --------------------------------- */
/* 1.3. Hiring manager: Company Iamge
 ----------------------------------- */
$('#buttonCompanyImage').on('click', function() {
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