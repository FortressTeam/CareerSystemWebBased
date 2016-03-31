/*
====================================================
* [Resume Javascript]

  Name 		 :  Career System
  Version    :  1.0
  Author     :  Fortress Team
  Author URI :  https://github.com/FortressTeam
====================================================

   TOC:
  =======
  	1. Applicant Skill


===================================================== */

function loadSkills( parent ) {
    $.ajax({
        type: 'GET',
        url: $('#webInfo').data('url') + '/api' + '/applicants_has_skills' 
                    + '?applicant_id=' + parent.data('id'),
        dataType: 'json',
        success: function(response) {
            $.each(response.applicantsHasSkills, function(index, value){
                $('#skillSlider').addSkillColumn({
                    id: value.skill.id,
                    name: value.skill.skill_name,
                    level: value.skill_level
                });
            });
            
        }
    });
}


$( document).ready(function(){

    loadSkills($('#skillSlider'));

    $(window).scroll(function(event) {
        if($(this).scrollTop() > $('#skillSlider').offset().top - 400) {
            $('#skillSlider').find('.skill-inner').height(function() {
                return $(this).data('level') * 200 / 5;
            });
        }
    });
});


