/*
====================================================
* [Main Javascript]

  Theme Name :  Career System
  Version    :  1.0
  Author     :  Fortress Team
  Author URI :  https://github.com/FortressTeam
====================================================

   TOC:
  =======

  0. Run when the document ready
  1. Mouse Scroll Smoothy
  2. Scroll Top Menu Bar
  3. MorissJS Chart
  .
  n. Other functions

===================================================== */

/* --------------------------------- */
/* 0. Run when the document ready
 ----------------------------------- */
$(document).ready(function(){

    // MorrisJS Chart
    $('#lineChart').drawLineChart({during: '90'});
    $('#donutChart').drawDonutChart();

    // Select input
    $('select.findable').select2();

    $('#usabilla-feedback-bar').on('click', function(){
        $.ajax({
            url: $(this).data('url'),
            context: document.body
        }).done(function(data){
            $('#contentFeedback').html(data);
        });
    });

    // Home page
    $('.public-search').find('[class$="search-item"]').click(function(){
        $(this).parent().parent().prev('button')
            .html($(this).text() + ' <i class="fa fa-caret-down"></i>')
            .data({'id': $(this).data('id')});
        $(this).parent().parent().next().val($(this).data('id'));
    });
});

/* --------------------------------- */
/* 1. Mouse Scroll Smoothy
 ----------------------------------- */
//!function(t){jQuery.scrollSpeed=function(e,n,o){var i,l,r,u=t(document),h=t(window),a=t("html, body"),c=o||"default",d=0,s=!1;return window.navigator.msPointerEnabled?!1:void h.on("mousewheel DOMMouseScroll",function(t){var o=t.originalEvent.wheelDeltaY,f=t.originalEvent.detail;return i=u.height()>h.height(),l=u.width()>h.width(),s=!0,i&&(r=h.height(),(0>o||f>0)&&(d=d+r>=u.height()?d:d+=e),(o>0||0>f)&&(d=0>=d?0:d-=e),a.stop().animate({scrollTop:d},n,c,function(){s=!1})),l&&(r=h.width(),(0>o||f>0)&&(d=d+r>=u.width()?d:d+=e),(o>0||0>f)&&(d=0>=d?0:d-=e),a.stop().animate({scrollLeft:d},n,c,function(){s=!1})),!1}).on("scroll",function(){i&&!s&&(d=h.scrollTop()),l&&!s&&(d=h.scrollLeft())}).on("resize",function(){i&&!s&&(r=h.height()),l&&!s&&(r=h.width())})},jQuery.easing["default"]=function(t,e,n,o,i){return-o*((e=e/i-1)*e*e*e-1)+n}}(jQuery);


/* --------------------------------- */
/* 2. Scroll Top Menu Bar
 ----------------------------------- */
    var lastScrollTop = 0;
    $(window).scroll(function(event){
        var st = $(this).scrollTop();
        if (st > lastScrollTop && st > 400){
            $('.non-side-bar>#header').css('top', '-70px');
        } else{
            $('.non-side-bar>#header').css('top', '0px');
        }
        lastScrollTop = st;
    });


/* --------------------------------- *
 * 3. MorrisJS Chart
 ----------------------------------- */
    /*
     * @param: input{element, data}
     */
    var renderLineChart = function(input){
        new Morris.Line({
            element: input.element,
            data: input.data,
            xkey: 'label',
            xLabelFormat: function (x){ 
                var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
                return months[x.getMonth()] + ' ' + x.getDate();
            },
            hoverCallback: function (index, options, content, row){
                var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
                var x = new Date(row.label);
                var out = '<div class="morris-hover-row-label">'
                            + x.getDate() + '-' + months[x.getMonth()] + '-' + x.getFullYear()
                            + '</div><div class="morris-hover-point" style="color: #1178AB">Value:'
                            + row.value
                            + '</div>'
                return out;
            },
            xLabels: 'day',
            ykeys: ['value'],
            labels: ['Value'],
            lineWidth: '2px',
            lineColors: ['#1178AB'],
            pointFillColors: ['#FFFFFF'],
            pointStrokeColors: ['#1178AB'],
            resize: true,
            smooth: false
        });
    };

    /*
     * @param: input{element, data}
     */
    var renderDonutChart = function(input){
        new Morris.Donut({
            element: input.element,
            data: input.data,
            colors: ['#1178AB', '#ff9800', '#9c27b0', '#4caf50', '#f44336', '#96999c'],
            resize: true
        });
    };



/* --------------------------------- */
/* n. Other functions
 ----------------------------------- */
    (function($){
        
        $.fn.drawLineChart = function(input){
            var postData = '{"during":' + input.during + '}';
            var elementId = $(this).attr('id');
            $.ajax({
                type: 'POST',
                url: $(this).data('url'),
                contentType: 'application/json',
                dataType: 'json',
                data: postData,
                success: function(response){
                    renderLineChart({
                        element: elementId,
                        data: response.days
                    });
                },
                error: function(){
                    $(this).html('<p class="text-danger">Error</p>');
                }
            });
        };

        $.fn.drawDonutChart = function(input){
            var elementId = $(this).attr('id');
            $.ajax({
                type: 'GET',
                url: $(this).data('url'),
                contentType: 'application/json',
                dataType: 'json',
                success: function(response){
                    renderDonutChart({
                        element: elementId,
                        data: response.data
                    });
                },
                error: function(){
                    $(this).html('<p class="text-danger">Error</p>');
                }
            });
        };

        /* Check if element empty */
        $.fn.isEmpty = function(){
            return this.html() === "";
        };

        /* Create Profile Panel elements */
        $.fn.addProfilePanel = function(data){

            var infomation = $.extend({
                    id: "1",
                    name: "Vic",
                    major: "Developer",
                    image: "img/avatar.jpg"
                }, data);

            var titleProfilePanel = $("<a/>",{
                    "href": "javascript:void(0);",
                    "class": "dropdown-toggle ink-reaction",
                    "data-toggle": "dropdown"
                }).append($("<img></img>",{
                    "src": infomation.image,
                    "alt": infomation.name
                })).append($("<span></span>",{
                    "class": "profile-info",
                    "text": infomation.name
                }).append("<small>" + infomation.major + "</small>"));

            var bodyProfilePanel = $("<ul/>",{
                    "class": "dropdown-menu animation-dock"
                }).append($("<li/>").html($("<a/>",{
                    "href": "#", "text":
                    "My profile"
                }))).append($("<li/>").html($("<a/>",{
                    "href": "#",
                    "text": "My appointments"
                }))).append($("<li/>",{
                    "class": "divider"
                })).append($("<li/>").html($("<a/>",{
                    "href": "#",
                    "text": "Logout"
                }).prepend($("<i></i>",{
                    "class": "fa fa-fw fa-power-off text-danger"
                }))));
            
            $("<li/>")
                .addClass("dropdown animated fadeInRight")
                .append(titleProfilePanel)
                .append(bodyProfilePanel)
                .appendTo(this);

            return this;
        };

        /* Create Skill Column elements */
        $.fn.addSkillColumn = function(data){

            var skill = $.extend({
                    id: '1',
                    name: 'CakePHP 3',
                    level: '5',
                    applicant: null,
                    edit: null
                }, data);

            var inner = $('<div/>',{
                    'class': 'skill-inner ' + skill.edit,
                    'data-level': skill.level,
                    'data-id': skill.id,
                    click: function(){
                        if($(this).hasClass('heightEditable')){
                            var nextLevel = $(this).data('level') % 5 + 1;
                            $(this)
                                .data('level', nextLevel)
                                .height(nextLevel * 200 / 5)
                                .next().text(nextLevel + ' star(s)');
                            if(skill.applicant != null){
                                var data = {
                                    "applicant_id": skill.applicant,
                                    "skill_id": skill.id,
                                    "skill_level": nextLevel
                                };
                                var dataJSON = JSON.stringify(data);
                                $.ajax({
                                    type: 'POST',
                                    url: $('#webInfo').data('url') + '/api' + '/applicants_has_skills',
                                    contentType: 'application/json',
                                    dataType: 'json',
                                    data: dataJSON,
                                    error: function(error){
                                        flat = false;
                                        alert('Error when change skill level. Please try again!')
                                    }
                                });
                            }

                        }
                    }
                }).append($('<div/>',{
                    'class': 'skill-visiable'
                }).append($('<span/>',{
                    'class': 'skill-title',
                    'text': skill.name
                })).append($('<div class="hr-wrap"><div class="hrc"></div></div>'))).append($('<div/>',{
                    'class': 'btn btn-flat btn-danger btn-sx btn-block btn-remove no-padding',
                    'style': (skill.edit == null) ? 'display: none' : '',
                    click: function(){
                        $(this).parent().parent().remove();
                        if(skill.applicant != null){
                            $.ajax({
                                type: 'DELETE',
                                url: $('#webInfo').data('url') 
                                        + '/api' 
                                        + '/applicants_has_skills'
                                        + '?applicant_id=' + skill.applicant
                                        + '&skill_id=' + skill.id,
                                contentType: 'application/json',
                                dataType: 'json',
                                error: function(error){
                                    flat = false;
                                    alert('Error when delete skill level. Please try again!')
                                }
                            });
                        }
                    }
                }).append($('<i/>',{
                    'class': 'fa fa-remove'
                })));
            var count = $('<div/>',{
                    'class': 'skill-count',
                    'text': skill.level + ' star(s)'
                });

            $('<li/>',{
                'class': 'single-skill'
            }).append(inner).append(count).appendTo(this);
            return this;
        }; // End Create Skill Column elements

        $.fn.addHobbiesLabel = function(data){

            var hobby = $.extend({
                    id: '1',
                    name: 'CakePHP 3',
                    applicant: null,
                    edit: false
                }, data);

            var inner = $('<i/>',{
                    'class': 'fa fa-remove text-danger btn-remove',
                    'style': hobby.edit ? '' : 'display: none',
                    'data-id': hobby.id,
                    click: function(){
                        $(this).parent().remove();
                        if(hobby.applicant != null){
                            $.ajax({
                                type: 'DELETE',
                                url: $('#webInfo').data('url') 
                                        + '/api' 
                                        + '/applicants_has_hobbies'
                                        + '?applicant_id=' + hobby.applicant
                                        + '&hobby_id=' + hobby.id,
                                contentType: 'application/json',
                                dataType: 'json',
                                error: function(error){
                                    flat = false;
                                    alert('Error when delete hobby level. Please try again!')
                                }
                            });
                        }
                    }
                });
            var label = $('<span/>',{
                'class': 'tag label label-primary text-fit marg-2',
                'text': hobby.name + ' '
                }).append(inner).appendTo(this);
        };
    }(jQuery));




