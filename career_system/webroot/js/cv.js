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



/* --------------------------------------------------- */
/* --------------------------------------------------- */
/* 1. Insert data to html pattern
/* --------------------------------------------------- */
/* --------------------------------------------------- */
function bindDataEducation(input){
    var tmp = _educationPattern;
    tmp = tmp.replace('{{education.start}}', convertDate({
        string: input.start,
        message: 'Error'
    }));
    tmp = tmp.replace('{{education.end}}', convertDate({
        string: input.end,
        message: 'Error'
    }));
    tmp = tmp.replace('{{education.title}}', input.title);
    tmp = tmp.replace('{{education.detail}}', input.detail);
    return tmp;
}


function bindDataExperience(input){
    var tmp = _experiencePattern;
    tmp = tmp.replace('{{experience.start}}', convertDate({
        string: input.start,
        message: 'Error'
    }));
    tmp = tmp.replace('{{experience.end}}', convertDate({
        string: input.end,
        message: 'Now'
    }));
    tmp = tmp.replace('{{experience.title}}', input.title);
    tmp = tmp.replace('{{experience.detail}}', input.detail);
    return tmp;
}

function bindDataActivity(input){
    var tmp = _activityPattern;
    tmp = tmp.replace('{{activity.start}}', convertDate({
        string: input.start,
        message: 'Error'
    }));
    tmp = tmp.replace('{{activity.end}}', convertDate({
        string: input.end,
        message: 'Now'
    }));
    tmp = tmp.replace('{{activity.title}}', input.title);
    tmp = tmp.replace('{{activity.detail}}', input.detail);
    return tmp;
}

function bindDataAward(input){
    var tmp = _awardPattern;
    tmp = tmp.replace('{{award.date}}', convertDate({
        string: input.date,
        message: 'Error',
        format: 'd M Y'
    }));
    tmp = tmp.replace('{{award.title}}', input.title);
    tmp = tmp.replace('{{award.detail}}', input.detail);
    return tmp;
}

function bindDataSkill(input){
    var tmp = _skillPattern;
    tmp = tmp.replace('{{skill.name}}', input.name);
    tmp = tmp.replace('{{skill.level}}', input.level);
    return tmp;
}

function bindDataHobby(input){
    var tmp = _hobbyPattern;
    tmp = tmp.replace('{{hobby.name}}', input.name);
    return tmp;
}

/* --------------------------------------------------- */
/* --------------------------------------------------- */
/* 2. Put data into CV
/* --------------------------------------------------- */
/* --------------------------------------------------- */
function ApplicantPut(input){
    $('#applicantImage').attr({'src': window.location.origin + '/CareerSystemWebBased/career_system/img/user_img/' +input.applicant.applicantImage});
    $('#applicantName').text(input.applicant.applicantName);
    $('#applicantAddress').text(input.applicant.applicantAddress);
    $('#applicantEmail').text(input.applicant.applicantEmail);
    $('#applicantPhone').text(input.applicant.applicantPhone);
}

function CVPut(input){
    $('#applicantMajor').text(input.major);
    $('#applicantObjective').text(input.objective);

    $.each(input.educations, function(index, value){
        var tmp = bindDataEducation({
            start: value.education_start,
            end: value.education_end,
            title: value.education_title,
            detail: value.education_detail
        });
        $('#applicantEducations').append(tmp);
    });

    $.each(input.experiences, function(index, value){
        var tmp = bindDataExperience({
            start: value.experience_start,
            end: value.experience_end,
            title: value.experience_title,
            detail: value.experience_detail
        });
        $('#applicantExperiences').append(tmp);
    });
    $.each(input.activities, function(index, value){
        var tmp = bindDataActivity({
            start: value.activity_start,
            end: value.activity_end,
            title: value.activity_title,
            detail: value.activity_detail
        });
        $('#applicantActivities').append(tmp);
    });
    $.each(input.awards, function(index, value){
        var tmp = bindDataAward({
            date: value.award_date,
            title: value.award_title,
            detail: value.award_detail
        });
        $('#applicantAwards').append(tmp);
    });
    $.each(input.skills, function(index, value){
        var tmp = bindDataSkill({
            name: value.skill_name,
            level: value.skill_level
        });
        $('#applicantSkills').append(tmp);
    });
    $.each(input.hobbies, function(index, value){
        var tmp = bindDataHobby({
            name: value.hobby_name
        });
        $('#applicantHobbies').append(tmp);
    });

    $('.cvcs-block.skill-block').find('.level').width(function(){
        return ($(this).attr('skill-level') * 100 / 5) + '%';
    });
}

function CVPutExample(){
    if($('#applicantEducations').children().length < 1){
        var tmp = bindDataEducation({
            start: 'Sep 2012',
            end: 'Jun 2016',
            title: 'Harvard University',
            detail: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.'
        });
        var element = $(tmp)
            .addClass('off')
            .append($('<div/>', {
                'class': 'over'
            }));
        $('#applicantEducations').append(element);
    }

    if($('#applicantExperiences').children().length < 1){
        var tmp = bindDataExperience({
            start: 'Jan 2014',
            end: 'Oct 2015',
            title: 'Microsoft',
            detail: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.'
        });
        var element = $(tmp)
            .addClass('off')
            .append($('<div/>', {
                'class': 'over'
            }));
        $('#applicantExperiences').append(element);
    }

    if($('#applicantActivities').children().length < 1){
        var tmp = bindDataActivity({
            start: 'Jan 2014',
            end: 'Jan 2015',
            title: 'Marketing Club',
            detail: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.'
        });
        var element = $(tmp)
            .addClass('off')
            .append($('<div/>', {
                'class': 'over'
            }));
        $('#applicantActivities').append(element);
    }

    if($('#applicantAwards').children().length < 1){
        var tmp = bindDataAward({
            date: '01 Jan 2014',
            title: 'Microsoft Certification',
            detail: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet.'
        });
        var element = $(tmp)
            .addClass('off')
            .append($('<div/>', {
                'class': 'over'
            }));
        $('#applicantAwards').append(element);
    }

    if($('#applicantSkills').children().length < 1){
        var tmp = bindDataSkill({
            name: 'Photoshop CC',
            level: '4'
        });
        var element = $(tmp)
            .addClass('off')
            .append($('<div/>', {
                'class': 'over'
            }));
        $('#applicantSkills').append(element);
    }

    if($('#applicantHobbies').children().length < 1){
        var tmp = bindDataHobby({
            name: 'Reading'
        });
        var element = $(tmp)
            .addClass('off')
            .append($('<div/>', {
                'class': 'over'
            }));
        $('#applicantHobbies').append(element);
    }
}

/* --------------------------------------------------- */
/* --------------------------------------------------- */
/* 3. Get data from CV form
/* --------------------------------------------------- */
/* --------------------------------------------------- */
function CVGet(){
    var saveData = {
        cvdata: {
            "major": $('#applicantMajor').text(),
            "objective": $('#applicantObjective').text(),
            "educations": [],
            "experiences": [],
            "activities": [],
            "awards": [],
            "skills": [],
            "hobbies": []
        }
    };

    $('#applicantEducations').children().each(function(index, element){
        if($(element).is(".off")) return;
        saveData.cvdata.educations.push({
            "education_title": $(element).find('#educationTitle').text(),
            "education_detail": $(element).find('#educationDetail').text(),
            "education_start": $(element).find('#educationStart').text(),
            "education_end": $(element).find('#educationEnd').text()
        });
    });
    $('#applicantExperiences').children().each(function(index, element){
        if($(element).is(".off")) return;
        saveData.cvdata.experiences.push({
            "experience_title": $(element).find('#experienceTitle').text(),
            "experience_detail": $(element).find('#experienceDetail').text(),
            "experience_start": $(element).find('#experienceStart').text(),
            "experience_end": $(element).find('#experienceEnd').text()
        });
    });
    $('#applicantActivities').children().each(function(index, element){
        if($(element).is(".off")) return;
        saveData.cvdata.activities.push({
            "activity_title": $(element).find('#activityTitle').text(),
            "activity_detail": $(element).find('#activityDetail').text(),
            "activity_start": $(element).find('#activityStart').text(),
            "activity_end": $(element).find('#activityEnd').text()
        });
    });
    $('#applicantAwards').children().each(function(index, element){
        if($(element).is(".off")) return;
        saveData.cvdata.awards.push({
            "award_title": $(element).find('#awardTitle').text(),
            "award_detail": $(element).find('#awardDetail').text(),
            "award_date": $(element).find('#awardDate').text()
        });
    });
    $('#applicantSkills').children().each(function(index, element){
        if($(element).is(".off")) return;
        saveData.cvdata.skills.push({
            "skill_name": $(element).find('#skillName').text(),
            "skill_level": $(element).find('#skillLevel').attr('skill-level')
        });
    });
    $('#applicantHobbies').children().each(function(index, element){
        if($(element).is(".off")) return;
        saveData.cvdata.hobbies.push({
            "hobby_name": $(element).find('#hobbyName').text(),
        });
    });

    return JSON.stringify(saveData);
}

/* --------------------------------------------------- */
/* --------------------------------------------------- */
/* 4. Add some tools for CV Editor
/* --------------------------------------------------- */
/* --------------------------------------------------- */
function addAddNewButton(element){
    $('<div/>', {
        'text': 'Add new',
        'class': 'btn btn-raise btn-success btn-xs btn-hide cvcs-button-add',
        click: function(){
            var children = $(this).parent().parent().children().length;
            if((children <= 1) && ($(this).parent().is('.off'))){
                $(this).parent().removeClass('off');
                $(this).parent().find('.over').remove();
            }
            else{
                var cvcsBlockb = $(this).parent().clone();
                cvcsBlockb.find('.cvcs-button-add').remove();
                cvcsBlockb.find('.cvcs-button-delete').remove();
                cvcsBlockb.insertAfter($(this).parent());
                addAddNewButton(cvcsBlockb);
                addDeleteButton(cvcsBlockb);
            }
        }
    }).appendTo(element);
}

function addDeleteButton(element){
    $('<div/>', {
        'text': 'Delete',
        'class': 'btn btn-raise btn-danger btn-xs btn-hide cvcs-button-delete',
        click: function(){
            var children = $(this).parent().parent().children().length;
            if(children <= 1){
                $(this).parent().addClass('off');
                $(this).parent().append($('<div/>', {
                    'class': 'over'
                }));
            }
            else {
                $(this).parent().remove();
            }
        }
    }).appendTo(element);
}

function genEditor(){
    addAddNewButton($('.cvcs-block'));
    addDeleteButton($('.cvcs-block'));

    $('.contenteditable')
        .attr({
            'contenteditable': 'true'
        })
        .change(function(){
            alert();
        });
}

function CVError(message){
    alert(message);
}