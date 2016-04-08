/*
====================================================
* [CV Javascript]

  Name 		 :  Career System
  Version    :  1.0
  Author     :  Fortress Team
  Author URI :  https://github.com/FortressTeam
====================================================

   TOC:
  =======


===================================================== */


function CVPut(input){
    //$('#applicantImage').attr({'src': _hostName + '/CareerSystemWebBased/career_system/img/user_img/' +input.applicant.user.user_avatar});
    //$('#applicantName').text(input.applicant.applicant_name);
    //$('#applicantAddress').text(input.applicant.applicant_address);
    //$('#applicantEmail').text(input.applicant.user.user_email);
    //$('#applicantPhone').text(input.applicant.applicant_phone_number);
    $('#applicantMajor').text(input.major);
    $('#applicantObjective').text(input.objective);
    $.each(input.personal_history, function(index, value){
        var tmp = _historyPattern;
        tmp = tmp.replace('{{education.start}}', convertDate({
            string: value.personal_history_start,
            message: 'Error'
        }));
        tmp = tmp.replace('{{education.title}}', value.personal_history_title);
        tmp = tmp.replace('{{education.detail}}', value.personal_history_detail);

        if(value.personal_history_type_id === 1){
            tmp = tmp.replace('{{education.end}}', convertDate({
                string: value.personal_history_end,
                message: 'Now'
            }));
            $('#applicantEducation').append(tmp);
        }
        else if(value.personal_history_type_id === 2){
            tmp = tmp.replace('{{education.end}}', convertDate({
                string: value.personal_history_end,
                message: 'Now'
            }));
            $('#applicantExperience').append(tmp);
        }
        else if(value.personal_history_type_id === 3){
            tmp = tmp.replace('{{education.end}}', convertDate({
                string: value.personal_history_end,
                message: 'Now'
            }));
            $('#applicantActivity').append(tmp);
        }
        else if(value.personal_history_type_id === 4){
            tmp = tmp.replace('{{education.end}}', '');
            $('#applicantActivity').append(tmp);
        }
    });
    $.each(input.skills, function(index, value){
        var tmp = _skillPattern;
        tmp = tmp.replace('{{skill.name}}', value.skill_name);
        tmp = tmp.replace('{{skill.level}}', value.skill_level);
        $('#applicantSkill').append(tmp);
    });
    $.each(input.hobbies, function(index, value){
        var tmp = _hobbyPattern;
        tmp = tmp.replace('{{hobby.name}}', value.hobby_name);
        $('#applicantHobby').append(tmp);
    });
}

function CVError(message){
    $('#templateCV').css({'display': 'none'});
    $('#loadingCV').css({'display': 'inherit'}).html('<header>Error while loading. Please try again!</header>');
}

function genEditor(){
    $('<div/>', {
        'text': 'Delete',
        'class': 'btn btn-raise btn-danger btn-xs btn-hide cvcs-button-delete',
        click: function(){
            $(this).parent().remove();
        }
    }).appendTo($('.cvcs-block'));
    $('.contenteditable').attr({
        'contenteditable': 'true'
    });
}