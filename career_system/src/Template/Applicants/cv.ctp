<div class="row">
	<div class="col-lg-2 col-md-12 visible-lg visible-md">
		<div class="card">
			<div class="card-body"></div>
		</div>
	</div> 
	<div class="col-lg-10 col-md-12 visible-lg visible-md" id="cv-content"></div>
	<div class="col-xs-12 hidden-lg hidden-md">
		<div class="alert alert-callout alert-danger">View CV is not support your screen size.</div>
	</div>
</div>

<script type="text/javascript">
function CVPut(input){
	$('#applicantImage').attr({'src': _hostName + '/CareerSystemWebBased/career_system/img/user_img/' +input.applicant.user.user_avatar});
	$('#applicantName').text(input.applicant.applicant_name);
	$('#applicantCareerPath').text(input.applicant.career_path.career_path_name);
	$('#applicantAddress').text(input.applicant.applicant_address);
	$('#applicantEmail').text(input.applicant.user.user_email);
	$('#applicantPhone').text(input.applicant.applicant_phone_number);
	$('#applicantPhone').text(input.applicant.applicant_phone_number);
	$('#applicantFutureGoal').text(input.applicant.applicant_future_goals);
	$.each(input.applicant.personal_history, function(index, value){
		var tmp = _historyPattern;
		tmp = tmp.replace('{{start}}', convertDate({
			string: value.personal_history_start,
			message: 'Error'
		}));
		tmp = tmp.replace('{{title}}', value.personal_history_title);
		tmp = tmp.replace('{{detail}}', value.personal_history_detail);

		if(value.personal_history_type_id === 1){
			tmp = tmp.replace('{{end}}', convertDate({
				string: value.personal_history_end,
				message: 'Now'
			}));
			$('#applicantEducation').append(tmp);
		}
		else if(value.personal_history_type_id === 2){
			tmp = tmp.replace('{{end}}', convertDate({
				string: value.personal_history_end,
				message: 'Now'
			}));
			$('#applicantExperience').append(tmp);
		}
		else if(value.personal_history_type_id === 3){
			tmp = tmp.replace('{{end}}', convertDate({
				string: value.personal_history_end,
				message: 'Now'
			}));
			$('#applicantActivity').append(tmp);
		}
		else if(value.personal_history_type_id === 4){
			tmp = tmp.replace('{{end}}', '');
			$('#applicantActivity').append(tmp);
		}
	});
	$.each(input.applicant.skills, function(index, value){
		var tmp = _skillPattern;
		tmp = tmp.replace('{{name}}', value.skill_name);
		tmp = tmp.replace('{{level}}', value._joinData.skill_level * 100 / 5);
		$('#applicantSkill').append(tmp);
	});
	$.each(input.applicant.hobbies, function(index, value){
		var tmp = _hobbyPattern;
		tmp = tmp.replace('{{name}}', value.hobby_name);
		$('#applicantHobby').append(tmp);
	});

	$('#templateCV').css({'display': 'inherit'});
	$('#loadingCV').css({'display': 'none'});
}

function CVError(message){
	$('#templateCV').css({'display': 'none'});
	$('#loadingCV').css({'display': 'inherit'}).text('<p class="text-dnager">Error while loading. Please try again!</p>');
}

$(document).ready(function(){
	$('#cv-content').load('http://localhost/CareerSystemWebBased/career_system/template/template.html');
    $.ajax({
        'type': 'GET',
        'url': 'http://localhost/CareerSystemWebBased/career_system/api/applicants/4.json',
        'contentType': 'application/json',
        'dataType': 'json',
        success: CVPut,
        error: CVError
    });
});

</script>