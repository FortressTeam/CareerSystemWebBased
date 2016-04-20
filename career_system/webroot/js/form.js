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
	2. Applicant
		2.1. Applicant: About Me
		2.2. Applicant: Personal information
		2.3. Applicant: Skills



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
$('#buttonFollowApplicant').click(function(){
	var applicantId = $(this).data('applicantid');
	var hiringManagerID = $(this).data('hiringmanagerid');
	var value = $(this).data('value');
	var data = {
	    "applicant_id": applicantId,
	    "hiring_manager_id": hiringManagerID,
	    "follow_applicant": value
	};
	var dataJSON = JSON.stringify(data);
	$.ajax({
		type: 'POST',
		url: $('#webInfo').data('url') + '/api/follow' ,
		contentType: 'application/json',
		dataType: 'json',
		data: dataJSON,
		success: function(data){
			if(data['message'] == 'Saved'){
				if(data['follow']['follow_applicant']){
					$('#buttonFollowApplicant')
						.html('UNFOLLOW')
						.data('value', '0')
						.removeClass('btn-default-light')
						.addClass('btn-primary');
				}
				else{
					$('#buttonFollowApplicant')
						.html('FOLLOW')
						.data('value', '1')
						.removeClass('btn-primary')
						.addClass('btn-default-light');
				}
			}
		},
		error: function(message){
			console.log(message);
		}
	});
});
$('#buttonFollowHiringManager').click(function(){
	var applicantId = $(this).data('applicantid');
	var hiringManagerID = $(this).data('hiringmanagerid');
	var value = $(this).data('value');
	var data = {
	    "applicant_id": applicantId,
	    "hiring_manager_id": hiringManagerID,
	    "follow_hiring_manager": value
	};
	var dataJSON = JSON.stringify(data);
	$.ajax({
		type: 'POST',
		url: $('#webInfo').data('url') + '/api/follow' ,
		contentType: 'application/json',
		dataType: 'json',
		data: dataJSON,
		success: function(data){
			if(data['message'] == 'Saved'){
				if(data['follow']['follow_hiring_manager']){
					$('#buttonFollowHiringManager')
						.html('UNFOLLOW')
						.data('value', '0')
						.removeClass('btn-default-light')
						.addClass('btn-primary');
				}
				else{
					$('#buttonFollowHiringManager')
						.html('FOLLOW')
						.data('value', '1')
						.removeClass('btn-primary')
						.addClass('btn-default-light');
				}
			}
		},
		error: function(message){
			console.log(message);
		}
	});
});
$('#buttonFollowPost').click(function(){
	var applicantId = $(this).data('applicantid');
	var postId = $(this).data('postid');
	var value = $(this).data('value');
	var data = {
	    "applicant_id": applicantId,
	    "post_id": postId,
	    "follow_status": value
	};
	var dataJSON = JSON.stringify(data);
	$.ajax({
		type: 'POST',
		url: $('#webInfo').data('url') + '/api/applicants_follow_posts',
		contentType: 'application/json',
		dataType: 'json',
		data: dataJSON,
		success: function(data){
			if(data['message'] == 'Saved'){
				if(data['applicantsFollowPost']['follow_status']){
					$('#buttonFollowPost')
						.html('UNFOLLOW')
						.data('value', '0')
						.removeClass('btn-default-light')
						.addClass('btn-primary');
				}
				else{
					$('#buttonFollowPost')
						.html('FOLLOW')
						.data('value', '1')
						.removeClass('btn-primary')
						.addClass('btn-default-light');
				}
			}
		},
		error: function(message){
			console.log(message);
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
		"hiring_manager_name": $('#inputManagerName').val(),
		"hiring_manager_phone_number": $('#inputManagerPhone').val(),
		"company_name": $('#inputName').val(),
		"company_size": $('#inputSize').val(),
		"company_address": $('#inputAddress').val(),
		"company_email": $('#inputEmail').val()
	};
	var hiringManagerId = $(this).data('id');
	var formName = $(this).data('form');
	var dataJSON = JSON.stringify(data);
	$.ajax({
	    type: 'PUT',
	    url: $('#webInfo').data('url') + '/api' + '/hiring_managers' + '/' + hiringManagerId,
	    contentType: 'application/json',
	    dataType: 'json',
	    data: dataJSON,
	    success: function(response){
	        if(response['message'] == 'Saved'){
	        	$('#textManagerName').text(response['hiringManager']['hiring_manager_name']);
	        	$('#textManagerPhone').text(response['hiringManager']['hiring_manager_phone_number']);
	        	$('#textName').text(response['hiringManager']['company_name']);
	        	$('#textSize').text(response['hiringManager']['company_size'] + ' people');
	        	$('#textAddress').text(response['hiringManager']['company_address']);
	        	$('#textEmail').text(response['hiringManager']['company_email']);
	        	closeForm(formName);
	        }
	    } 
	});
});
/* ------------------------------------------- */
/* 1.2. Hiring manager: Company About
 --------------------------------------------- */
$('.editable').find('#buttonEditCompanyAbout').click(function(){
	var data ={
	    "company_about": $('#inputAbout').val()
	};
	var hiringManagerId = $(this).data('id');
	var formName = $(this).data('form');
	var dataJSON = JSON.stringify(data);
	$.ajax({
	    type: 'PUT',
	    url: $('#webInfo').data('url') + '/api' + '/hiring_managers' + '/' + hiringManagerId,
	    contentType: 'application/json',
	    dataType: 'json',
	    data: dataJSON,
	    success: function(response){
	        if(response['message'] == 'Saved'){
	        	$('#textAbout').text(response['hiringManager']['company_about']);
	        	closeForm(formName);
	        }
	    }
	});
});
/* ------------------------------------------- */
/* 1.3. Hiring manager: Company Image
 --------------------------------------------- */
$('#buttonCompanyImage').click(function(){
	$('#imputCompanyImage').click();
});
$('#imputCompanyImage').change(function(){
	if (this.files && this.files[0]){
        var reader = new FileReader();
        reader.onload = function (e){
            $('#companyImage').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    }
})

/* ------------------------------------------- */
/* 2. Applicant
 --------------------------------------------- */
/* ------------------------------------------- */
/* 2.1. Applicant: About Me
 --------------------------------------------- */
$('.editable').find('#buttonEditAboutMe').click(function(){
	var data ={
	    "applicant_name": $('#inputName').val(),
	    "applicant_about": $('#inputAbout').val(),
	    "applicant_objective": $('#inputObjective').val(),
	    "major_id": $('#inputMajor').val(),
	};
	var applicantId = $(this).data('id');
	var formName = $(this).data('form');
	var dataJSON = JSON.stringify(data);
	$.ajax({
	    type: 'PUT',
	    url: $('#webInfo').data('url') + '/api' + '/applicants' + '/' + applicantId,
	    contentType: 'application/json',
	    dataType: 'json',
	    data: dataJSON,
	    success: function(response){
	        if(response['message'] == 'Saved'){
	        	$('#textName').text(response['applicant']['applicant_name']);
	        	$('#textMajor').text(response['applicant']['major']['major_name']);
	        	$('#textAbout').text(response['applicant']['applicant_about']);
	        	$('#textObjective').text(response['applicant']['applicant_objective']);
	        	closeForm(formName);
	        }
	    }
	});
});

/* ------------------------------------------- */
/* 2.2. Applicant: Personal information
 --------------------------------------------- */
$('.editable').find('#buttonEditPersonalInfo').click(function(){
	var data ={
		"applicant_date_of_birth": 	$('#inputBirthDay').val(),
		"applicant_address": 		$('#inputAddress').val(),
		"applicant_phone_number": 	$('#inputPhone').val(),
		"applicant_website": 		$('#inputWebsite').val(),
		"applicant_sex": 			$('#inputSex').is(':checked'),
		"applicant_marital_status": $('#inputMarital').is(':checked'),
	};
	var applicantId = $(this).data('id');
	var formName = $(this).data('form');
	var dataJSON = JSON.stringify(data);
	$.ajax({
		type: 'PUT',
		url: $('#webInfo').data('url') + '/api' + '/applicants' + '/' + applicantId,
		contentType: 'application/json',
		dataType: 'json',
		data: dataJSON,
		success: function(response){
			if(response['message'] == 'Saved'){
				var d = new Date(response['applicant']['applicant_date_of_birth']).getYear();
				var c = new Date().getYear();
				$('#textAge').text((c - d) + ' Years');
				$('#textAddress').text(response['applicant']['applicant_address']);
				$('#textPhone').text(response['applicant']['applicant_phone_number']);
				$('#textWebsite').text(response['applicant']['applicant_website']);
				$('#textSex').text(response['applicant']['applicant_sex'] ? 'Male' : 'Female');
				$('#textMarital').text(response['applicant']['applicant_marital_status'] ? 'Married' : 'Single');
				closeForm(formName);
			}
		}
	});
});


/* ------------------------------------------- */
/* 2.3. Applicant: Skills
 --------------------------------------------- */
$(document).ready(function(){
    loadSkills($('#skillSlider'));
    $(window).scroll(function(event){
        if(($('#skillSlider').length) && ($(this).scrollTop() > $('#skillSlider').offset().top - 400)){
            $('#skillSlider').find('.skill-inner').height(function(){
                return $(this).data('level') * 200 / 5;
            });
        }
    });
});
function loadSkills(parent){
    $.ajax({
        type: 'GET',
        url: $('#webInfo').data('url')
        			+ '/api'
        			+ '/applicants_has_skills' 
                    + '?applicant_id='
                    + parent.data('id'),
        dataType: 'json',
        success: function(response){
            $.each(response.applicantsHasSkills, function(index, value){
                $(parent).addSkillColumn({
                    id: value.skill.id,
                    name: value.skill.skill_name,
                    level: value.skill_level,
                    applicant: parent.data('id')
                });
            });
        },
        error: function(message){
        	console.log(message);
        }
    });
}
$('.btn-OpenChangeChart').click(function(){
	$('#skillSlider>.single-skill>.skill-inner').addClass('heightEditable');
	$('#skillSlider>.single-skill>.skill-inner>.btn-remove').show();
    $('#skillSlider').find('.skill-inner').height(function(){
        $('.editable').find('#inputSkillId>option[value="' + $(this).data('id') + '"]').remove();
    });
});
$('.btn-CloseChangeChart').click(function(){
	$('#skillSlider>.single-skill>.skill-inner').removeClass('heightEditable');
	$('#skillSlider>.single-skill>.skill-inner>.btn-remove').hide();
});
$('.editable').find('#buttonAddSkills').click(function(){
    $('#skillSlider').addSkillColumn({
        id: $('#inputSkillId').val(),
        name: $('#inputSkillId>option[value="' + $('#inputSkillId').val() + '"]').text(),
        level: $('#inputSkillLevel').val(),
        edit: 'heightEditable',
        applicant: $(this).data('id')
    });
    //$('.editable').find('#inputSkillId>option[value="' + $('#inputSkillId').val() + '"]').remove();

    $('#skillSlider').find('.skill-inner').height(function(){
        return $(this).data('level') * 200 / 5;
    });
});

/* ------------------------------------------- */
/* 2.4. Applicant: Hobbies
 --------------------------------------------- */
$(document).ready(function(){
    loadHobbies($('#listHobbies'));
});
function loadHobbies(parent){
    $.ajax({
        type: 'GET',
        url: $('#webInfo').data('url')
        			+ '/api'
        			+ '/applicants_has_hobbies' 
                    + '?applicant_id='
                    + parent.data('id'),
        dataType: 'json',
        success: function(response){
            $.each(response.applicantsHasHobbies, function(index, value){
                $(parent).addHobbiesLabel({
                    id: value.hobby.id,
                    name: value.hobby.hobby_name,
                    applicant: parent.data('id')
                });
            });
        },
        error: function(message){
        	console.log(message);
        }
    });
};
$('.btn-OpenLabel').click(function(){
	$('#listHobbies>span>i').css('display', 'inherit');
});
$('.btn-CloseLabel').click(function(){
	$('#listHobbies>span>i').css('display', 'none');
});
$('.editable').find('#buttonAddHobbies').click(function(){
    $('#listHobbies').addHobbiesLabel({
        id: $('#inputHobbyId').val(),
        name: $('#inputHobbyId>option[value="' + $('#inputHobbyId').val() + '"]').text(),
        applicant: $(this).data('id'),
        edit: true
    });
    
    var data = {
        "applicant_id": $(this).data('id'),
        "hobby_id": $('#inputHobbyId').val()
    };
    var dataJSON = JSON.stringify(data);
    $.ajax({
        type: 'POST',
        url: $('#webInfo').data('url')
        		+ '/api' 
        		+ '/applicants_has_hobbies',
        contentType: 'application/json',
        dataType: 'json',
        data: dataJSON,
        error: function(error){
            alert('Error when change skill level. Please try again!')
        }
    });
});