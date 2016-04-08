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
		tmp = tmp.replace('{{id}}', value.id);
		tmp = tmp.replace('{{status}}', 'open');
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
		tmp = tmp.replace('{{id}}', value.id);
		tmp = tmp.replace('{{status}}', 'open');
		tmp = tmp.replace('{{name}}', value.skill_name);
		tmp = tmp.replace('{{level}}', value._joinData.skill_level * 100 / 5);
		$('#applicantSkill').append(tmp);
	});
	$.each(input.applicant.hobbies, function(index, value){
		var tmp = _hobbyPattern;
		tmp = tmp.replace('{{id}}', value.id);
		tmp = tmp.replace('{{status}}', 'open');
		tmp = tmp.replace('{{name}}', value.hobby_name);
		$('#applicantHobby').append(tmp);
	});
}

function CVError(message){
	$('#templateCV').css({'display': 'none'});
	$('#loadingCV').css({'display': 'inherit'}).html('<header>Error while loading. Please try again!</header>');
}

function genButton(){
	$('<div/>', {
		'text': 'Hide',
		'class': 'btn btn-raise btn-danger btn-xs btn-hide cv-button',
		click: function(){
			if($(this).parent().attr('history-status') === 'open'){
				$(this).parent()
					.attr({'history-status': 'hide'})
					.addClass('text-default-light')
					.find('h4').css({'text-decoration': 'line-through'});
				$(this).parent().find('.detail').css({'display': 'none'});
				$(this).text('Add').addClass('btn-success').removeClass('btn-danger');
			}
			else{
				$(this).parent()
					.attr({'history-status': 'open'})
					.removeClass('text-default-light')
					.find('h4').css({'text-decoration': 'inherit'});
				$(this).parent().find('.detail').css({'display': 'inherit'});
				$(this).text('Hide').addClass('btn-danger').removeClass('btn-success');
			}
		}
	}).appendTo($('.history-block'));


	$('<div/>', {
		'text': 'Hide',
		'class': 'btn btn-raise btn-danger btn-xs btn-hide cv-button',
		click: function(){
			if($(this).parent().attr('skill-status') === 'open'){
				$(this).parent()
					.attr({'skill-status': 'hide'})
					.addClass('text-default-light')
					.find('h4').css({'text-decoration': 'line-through'});
				$(this).prev().find('.line').css({'display': 'none'});
				$(this).text('Add').addClass('btn-success').removeClass('btn-danger');
			}
			else{
				$(this).parent()
					.attr({'skill-status': 'open'})
					.removeClass('text-default-light')
					.find('h4').css({'text-decoration': 'inherit'});
				$(this).prev().find('.line').css({'display': 'inherit'});
				$(this).text('Hide').addClass('btn-danger').removeClass('btn-success');
			}
		}
	}).appendTo($('.skill-block'));

	$('<div/>', {
		'text': 'Hide',
		'class': 'btn btn-raise btn-danger btn-xs btn-hide cv-button',
		click: function(){
			if($(this).parent().attr('hobby-status') === 'open'){
				$(this).parent()
					.attr({'hobby-status': 'hide'})
					.css({'text-decoration': 'line-through'})
					.addClass('text-default-light');
				$(this).text('Add').addClass('btn-success').removeClass('btn-danger');
			}
			else{
				$(this).parent()
					.attr({'hobby-status': 'open'})
					.css({'text-decoration': 'inherit'})
					.removeClass('text-default-light');
				$(this).text('Hide').addClass('btn-danger').removeClass('btn-success');
			}
		}
	}).appendTo($('.hobby-block'));
}

$(document).ready(function(){
	$('#cv-content').load("<?= $this->Url->build('/template/' . 'template.cvtp'); ?>");
    $.ajax({
        'type': 'GET',
        'url': "<?= $this->Url->build('/api/applicants/' . '4'); ?>",
        'contentType': 'application/json',
        'dataType': 'json',
        success: function(responce){
			CVPut(responce);
			genButton();
			$('#templateCV').css({'display': 'inherit'});
			$('#loadingCV').css({'display': 'none'});
        },
        error: CVError
    });
});

</script>