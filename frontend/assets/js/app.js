
/*! Scroll Smoothy v1.5.2 by @mathias */
// (function(a,c){var b=(function(){var d=c(a.documentElement),f=c(a.body),e;if(d.scrollTop()){return d}else{e=f.scrollTop();if(f.scrollTop(e+1).scrollTop()==e){return d}else{return f.scrollTop(e)}}}());c.fn.smoothScroll=function(d){d=~~d||400;return this.find( 'a[href*="#"]' ).click(function(f){var g=this.hash,e=c(g);if(location.pathname.replace(/^\//,'' )===this.pathname.replace(/^\//,'' )&&location.hostname===this.hostname){if(e.length){f.preventDefault();b.stop().animate({scrollTop:e.offset().top},d,function(){location.hash=g})}}}).end()}}(document,jQuery));

/*! Mouse Scroll Smoothy v1.5.2 by @mathias */
!function(t){jQuery.scrollSpeed=function(e,n,o){var i,l,r,u=t(document),h=t(window),a=t("html, body"),c=o||"default",d=0,s=!1;return window.navigator.msPointerEnabled?!1:void h.on("mousewheel DOMMouseScroll",function(t){var o=t.originalEvent.wheelDeltaY,f=t.originalEvent.detail;return i=u.height()>h.height(),l=u.width()>h.width(),s=!0,i&&(r=h.height(),(0>o||f>0)&&(d=d+r>=u.height()?d:d+=e),(o>0||0>f)&&(d=0>=d?0:d-=e),a.stop().animate({scrollTop:d},n,c,function(){s=!1})),l&&(r=h.width(),(0>o||f>0)&&(d=d+r>=u.width()?d:d+=e),(o>0||0>f)&&(d=0>=d?0:d-=e),a.stop().animate({scrollLeft:d},n,c,function(){s=!1})),!1}).on("scroll",function(){i&&!s&&(d=h.scrollTop()),l&&!s&&(d=h.scrollLeft())}).on("resize",function(){i&&!s&&(r=h.height()),l&&!s&&(r=h.width())})},jQuery.easing["default"]=function(t,e,n,o,i){return-o*((e=e/i-1)*e*e*e-1)+n}}(jQuery);


//var lastScrollTop = 0;$( window ).scroll(function(event){var st = $( this ).scrollTop();if (st > lastScrollTop && st > 350){$( '#header' ).css( 'top','-70px' );} else {$( '#header' ).css( 'top','0px' );}lastScrollTop = st;});

$( document).ready(function(){
    $.scrollSpeed(100, 500);

    $( '#signinButton' ).on( 'click', function(){

        // Zoom out elements
        $( '#signupButton' ).addClass( 'animated zoomOut' );
        $( '#hiringmanagerButton' ).addClass( 'animated zoomOut' );
        $( '#signinButton' ).addClass( 'animated zoomOut' );
        $( '#home' ).addClass( 'animated fadeOut' );
        $( '#searchCard' ).addClass( 'animated zoomOut' );

        setTimeout(function() {
            if($( window ).width() >= 1024){
                $( 'body' ).addClass( 'menubar-pin menubar-visible' );
            }

            $( '#menubar' ).removeClass( 'hidden' )
            if($( window ).width() >= 768){
                $( '#menubar' ).addClass( 'animated fadeInLeft' );
                setTimeout(function() {
                    $( '#menubar' ).removeClass( 'animated' );
                }, 750);
            }

            // Hidden elements
            $( '#signupButton' ).remove();
            $( '#hiringmanagerButton' ).remove();
            $( '#signinButton' ).remove();
            $( '#home' ).remove();

            // Show elements
            $( '#menubarToggleButton' ).removeClass( 'hidden' ).addClass( 'animated fadeInLeft' );;


            /*! Add Profile Panel elements */
            if( !$( '#headerProfile>li').length ){
                $( '#headerProfile' ).addProfilePanel({name: "Vien"});
            }

            $( "#content" ).empty();

            $.ajax({ type: "GET",   
                url: "notifications.html",   
                async: false,
                success : function( result )
                {
                        $( "#content" ).append( result );
                }
            });

            $.ajax({ type: "GET",   
                url: "companies.html",   
                async: false,
                success : function( result )
                {
                        $( "#content" ).append( result );
                }
            });

            $.ajax({ type: "GET",   
                url: "newsfeed.html",   
                async: false,
                success : function( result )
                {
                        $( "#content" ).append( result );
                }
            });


            //window.history.pushState("a", "Applicant Page", "applicant.html");
        }, 750);
    });
});


(function( $ ) {

    /*! Create Profile Panel elements */
    $.fn.addProfilePanel = function( data ) {

        var infomation = $.extend({
            id: "1",
            name: "Vic",
            jobTitle: "Developer",
            image: "assets/img/avatar.jpg"
        }, data );

        var titleProfilePanel = $( "<a></a>", {
                "href": "javascript:void(0);",
                "class": "dropdown-toggle ink-reaction",
                "data-toggle": "dropdown"
            })
            .append($( "<img></img>", { "src": infomation.image, "alt": infomation.name}))
            .append($( "<span></span>", { "class": "profile-info", "text": infomation.name}).append("<small>" + infomation.jobTitle + "</small>" ));

        var bodyProfilePanel = $( "<ul></ul>", {
                "class": "dropdown-menu animation-dock"
            })
                .append($( "<li></li>" ).html($( "<a></a>",{"href": "#", "text": "My profile"})))
                .append($( "<li></li>" ).html($( "<a></a>",{"href": "#", "text": "My appointments"})))
                .append($( "<li></li>", {"class": "divider"}))
                .append($( "<li></li>" ).html($("<a></a>",{"href": "#", "text": "Logout"}).prepend($( "<i></i>", { "class": "fa fa-fw fa-power-off text-danger"}))));
        
        $( "<li></li>" )
            .addClass( "dropdown animated fadeInRight" )
            .append(titleProfilePanel)
            .append(bodyProfilePanel)
            .appendTo(this);

        return this;
    };
}( jQuery ));