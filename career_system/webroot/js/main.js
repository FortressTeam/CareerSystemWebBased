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

  1. Mouse Scroll Smoothy
  2. Scroll Top Menu Bar

===================================================== */


/* --------------------------------- */
/* 1. Mouse Scroll Smoothy
 ----------------------------------- */
//!function(t){jQuery.scrollSpeed=function(e,n,o){var i,l,r,u=t(document),h=t(window),a=t("html, body"),c=o||"default",d=0,s=!1;return window.navigator.msPointerEnabled?!1:void h.on("mousewheel DOMMouseScroll",function(t){var o=t.originalEvent.wheelDeltaY,f=t.originalEvent.detail;return i=u.height()>h.height(),l=u.width()>h.width(),s=!0,i&&(r=h.height(),(0>o||f>0)&&(d=d+r>=u.height()?d:d+=e),(o>0||0>f)&&(d=0>=d?0:d-=e),a.stop().animate({scrollTop:d},n,c,function(){s=!1})),l&&(r=h.width(),(0>o||f>0)&&(d=d+r>=u.width()?d:d+=e),(o>0||0>f)&&(d=0>=d?0:d-=e),a.stop().animate({scrollLeft:d},n,c,function(){s=!1})),!1}).on("scroll",function(){i&&!s&&(d=h.scrollTop()),l&&!s&&(d=h.scrollLeft())}).on("resize",function(){i&&!s&&(r=h.height()),l&&!s&&(r=h.width())})},jQuery.easing["default"]=function(t,e,n,o,i){return-o*((e=e/i-1)*e*e*e-1)+n}}(jQuery);


/* --------------------------------- */
/* 2. Scroll Top Menu Bar
 ----------------------------------- */
var lastScrollTop = 0;
$(window).scroll(function(event) {
    var st = $(this).scrollTop();
    if (st > lastScrollTop && st > 400) {
        $('.non-side-bar>#header').css('top', '-70px');
    } else {
        $('.non-side-bar>#header').css('top', '0px');
    }
    lastScrollTop = st;
});



$(document).ready(function(){

    $('#usabilla-feedback-bar').on('click', function() {
        $.ajax({
            url: $(this).data('url'),
            context: document.body
        }).done(function(data) {
            $('#contentFeedback').html(data);
        });
    });

    $('#signinButton').on('click', function() {

        // Zoom out elements
        $('#signupButton').addClass('animated zoomOut');
        $('#hiringmanagerButton').addClass('animated zoomOut');
        $('#signinButton').addClass('animated zoomOut');
        $('#home').addClass('animated fadeOut');
        $('#searchCard').addClass('animated zoomOut');

        setTimeout(function() {
            if($(window).width() >= 1024){
                $('body').addClass('menubar-pin menubar-visible');
            }

            $('#menubar').removeClass('hidden')
            if($(window).width() >= 768){
                $('#menubar').addClass('animated fadeInLeft');
                setTimeout(function() {
                    $('#menubar').removeClass('animated');
                }, 750);
            }

            // Hidden elements
            $('#signupButton').remove();
            $('#hiringmanagerButton').remove();
            $('#signinButton').remove();
            $('#home').remove();

            // Show elements
            $('#menubarToggleButton').removeClass('hidden').addClass('animated fadeInLeft');;


            /*! Add Profile Panel elements */
            if(!$('#headerProfile>li').length){
                $('#headerProfile').addProfilePanel({name: "Vien"});
            }

            $("#content").empty();

            $.ajax({ type: "GET",   
                url: "notifications.html",   
                async: false,
                success : function(result)
                {
                        $("#content").append(result);
                }
            });

        }, 750);
    });
});


(function($) {
    
    /*! Check if element empty */
    $.fn.isEmpty = function(){
        return this.html() === "";
    }

    /*! Create Profile Panel elements */
    $.fn.addProfilePanel = function(data) {

        var infomation = $.extend({
                id: "1",
                name: "Vic",
                major: "Developer",
                image: "img/avatar.jpg"
            }, data);

        var titleProfilePanel = $("<a/>", {
                "href": "javascript:void(0);",
                "class": "dropdown-toggle ink-reaction",
                "data-toggle": "dropdown"
            })
            .append($("<img></img>", { "src": infomation.image, "alt": infomation.name}))
            .append($("<span></span>", { "class": "profile-info", "text": infomation.name}).append("<small>" + infomation.major + "</small>"));

        var bodyProfilePanel = $("<ul/>", {
                "class": "dropdown-menu animation-dock"
            })
            .append($("<li/>").html($("<a/>",{"href": "#", "text": "My profile"})))
            .append($("<li/>").html($("<a/>",{"href": "#", "text": "My appointments"})))
            .append($("<li/>", {"class": "divider"}))
            .append($("<li/>").html($("<a/>",{"href": "#", "text": "Logout"}).prepend($("<i></i>", { "class": "fa fa-fw fa-power-off text-danger"}))));
        
        $("<li/>")
            .addClass("dropdown animated fadeInRight")
            .append(titleProfilePanel)
            .append(bodyProfilePanel)
            .appendTo(this);

        return this;
    };

    /*! Create Skill Column elements */
    $.fn.addSkillColumn = function(data) {

        var skill = $.extend({
                id: '1',
                name: 'CakePHP 3',
                level: '5',
            }, data);

        var inner = $('<div/>', {
                'class': 'skill-inner',
                'data-level': skill.level,
                'data-id': skill.id,
                click: function() {
                    if($(this).hasClass('heightEditable')) {
                        var nextLevel = $(this).data('level') % 5 + 1;
                        $(this)
                            .data('level', nextLevel)
                            .height(nextLevel * 200 / 5)
                            .next().text(nextLevel + ' star(s)');
                    }
                }
            })
            .append(
                $('<div/>', {'class': 'skill-visiable'})
                    .append($('<span/>', {'class': 'skill-title', 'text': skill.name}))
                    .append($('<div class="hr-wrap"><div class="hrc"></div></div>'))
            );
        var count = $('<div/>', {
                'class': 'skill-count',
                'text': skill.level + ' star(s)'
            });

        $('<li/>', {'class': 'single-skill'})
            .append(inner)
            .append(count)
            .appendTo(this);

        return this;
    };
}(jQuery));

$('select').select2();



