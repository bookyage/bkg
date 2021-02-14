jQuery(document).ready(function($) {
    'use strict';

    if(gridview_ajax_object.secondary_menu_active){

        $(".gridview-nav-secondary .gridview-secondary-nav-menu").addClass("gridview-secondary-responsive-menu");

        $(".gridview-secondary-responsive-menu-icon").click(function(){
            $(this).next(".gridview-nav-secondary .gridview-secondary-nav-menu").slideToggle();
        });

        $(window).resize(function(){
            if(window.innerWidth > 1112) {
                $(".gridview-nav-secondary .gridview-secondary-nav-menu, nav .sub-menu, nav .children").removeAttr("style");
                $(".gridview-secondary-responsive-menu > li").removeClass("gridview-secondary-menu-open");
            }
        });

        $(".gridview-secondary-responsive-menu > li").click(function(event){
            if (event.target !== this)
            return;
            $(this).find(".sub-menu:first").toggleClass('gridview-submenu-toggle').parent().toggleClass("gridview-secondary-menu-open");
            $(this).find(".children:first").toggleClass('gridview-submenu-toggle').parent().toggleClass("gridview-secondary-menu-open");
        });

        $("div.gridview-secondary-responsive-menu > ul > li").click(function(event) {
            if (event.target !== this)
                return;
            $(this).find("ul:first").toggleClass('gridview-submenu-toggle').parent().toggleClass("gridview-secondary-menu-open");
        });

    }

    if(gridview_ajax_object.primary_menu_active){

        $(".gridview-nav-primary .gridview-primary-nav-menu").addClass("gridview-primary-responsive-menu");

        $(".gridview-primary-responsive-menu-icon").click(function(){
            $(this).next(".gridview-nav-primary .gridview-primary-nav-menu").slideToggle();
        });

        $(window).resize(function(){
            if(window.innerWidth > 1112) {
                $(".gridview-nav-primary .gridview-primary-nav-menu, nav .sub-menu, nav .children").removeAttr("style");
                $(".gridview-primary-responsive-menu > li").removeClass("gridview-primary-menu-open");
            }
        });

        $(".gridview-primary-responsive-menu > li").click(function(event){
            if (event.target !== this)
            return;
            $(this).find(".sub-menu:first").toggleClass('gridview-submenu-toggle').parent().toggleClass("gridview-primary-menu-open");
            $(this).find(".children:first").toggleClass('gridview-submenu-toggle').parent().toggleClass("gridview-primary-menu-open");
        });

        $("div.gridview-primary-responsive-menu > ul > li").click(function(event) {
            if (event.target !== this)
                return;
            $(this).find("ul:first").toggleClass('gridview-submenu-toggle').parent().toggleClass("gridview-primary-menu-open");
        });

    }

    if($(".gridview-sticky-social-icon-search").length){
        $(".gridview-sticky-social-icon-search").on('click', function (e) {
            e.preventDefault();
            document.getElementById("gridview-search-overlay-wrap").style.display = "block";
            const gridview_focusableelements = 'button, [href], input';
            const gridview_search_modal = document.querySelector('#gridview-search-overlay-wrap');
            const gridview_firstfocusableelement = gridview_search_modal.querySelectorAll(gridview_focusableelements)[0];
            const gridview_focusablecontent = gridview_search_modal.querySelectorAll(gridview_focusableelements);
            const gridview_lastfocusableelement = gridview_focusablecontent[gridview_focusablecontent.length - 1];
            document.addEventListener('keydown', function(e) {
              let isTabPressed = e.key === 'Tab' || e.keyCode === 9;
              if (!isTabPressed) {
                return;
              }
              if (e.shiftKey) {
                if (document.activeElement === gridview_firstfocusableelement) {
                  gridview_lastfocusableelement.focus();
                  e.preventDefault();
                }
              } else {
                if (document.activeElement === gridview_lastfocusableelement) {
                  gridview_firstfocusableelement.focus();
                  e.preventDefault();
                }
              }
            });
            gridview_firstfocusableelement.focus();
        });
    }

    if($(".gridview-search-closebtn").length){
        $(".gridview-search-closebtn").on('click', function (e) {
            e.preventDefault();
            document.getElementById("gridview-search-overlay-wrap").style.display = "none";
        });
    }

    if($(".gridview-sidebar-one-wrapper").length){
    $(".gridview-main-wrapper").before($(".gridview-sidebar-one-wrapper"));
    $(window).resize(function(){
        if(window.innerWidth > 960) {
            $(".gridview-main-wrapper").before($(".gridview-sidebar-one-wrapper"));
        } else {
            $(".gridview-main-wrapper").after($(".gridview-sidebar-one-wrapper"));
        }
    });
    }

    $(".entry-content, .widget").fitVids({ customSelector: "iframe[src*='dailymotion.com'], iframe[src*='facebook.com'], iframe[src*='videopress.com']" });

    if($(".gridview-scroll-top").length){
        var gridview_scroll_button = $( '.gridview-scroll-top' );
        gridview_scroll_button.hide();

        $( window ).scroll( function () {
            if ( $( window ).scrollTop() < 20 ) {
                $( '.gridview-scroll-top' ).fadeOut();
            } else {
                $( '.gridview-scroll-top' ).fadeIn();
            }
        } );

        gridview_scroll_button.click( function () {
            $( "html, body" ).animate( { scrollTop: 0 }, 300 );
            return false;
        } );
    }

    var gridview_grid_post_details = $('.gridview-grid-posts-widget .gridview-grid-post .gridview-grid-post-details');
    if (gridview_grid_post_details.length) {
        gridview_grid_post_details.each(function() {
            if (!($(this).children().length) && $.trim($(this).text()) === '') {
                $(this).css('margin-bottom', '-1px');
            }
        });
    }

    var gridview_post_singular_header = $('.gridview-post-singular .entry-header');
    if (!gridview_post_singular_header.length) {
        $('.gridview-post-singular .entry-content').css('margin-top', '0');
    }

    if(gridview_ajax_object.sticky_header_active){

    // grab the initial top offset of the navigation 
    var gridviewstickyheadertop = $('#gridview-header-end').offset().top;
    
    // our function that decides weather the navigation bar should have "fixed" css position or not.
    var gridviewstickyheader = function(){
        var gridviewscrolltop = $(window).scrollTop(); // our current vertical position from the top
             
        // if we've scrolled more than the navigation, change its position to fixed to stick to top,
        // otherwise change it back to relative

        if(gridview_ajax_object.sticky_header_mobile_active){
            if (gridviewscrolltop > gridviewstickyheadertop) {
                $('.gridview-site-header').addClass('gridview-fixed');
            } else {
                $('.gridview-site-header').removeClass('gridview-fixed');
            }
        } else {
            if(window.innerWidth > 1112) {
                if (gridviewscrolltop > gridviewstickyheadertop) {
                    $('.gridview-site-header').addClass('gridview-fixed');
                } else {
                    $('.gridview-site-header').removeClass('gridview-fixed');
                }
            }
        }
    };

    gridviewstickyheader();
    // and run it again every time you scroll
    $(window).scroll(function() {
        gridviewstickyheader();
    });

    }

    if(gridview_ajax_object.sticky_sidebar_active){
        $('.gridview-main-wrapper, .gridview-sidebar-one-wrapper, .gridview-sidebar-two-wrapper').theiaStickySidebar({
            containerSelector: ".gridview-content-wrapper",
            additionalMarginTop: 0,
            additionalMarginBottom: 0,
            minWidth: 960,
        });

        $(window).resize(function(){
            $('.gridview-main-wrapper, .gridview-sidebar-one-wrapper, .gridview-sidebar-two-wrapper').theiaStickySidebar({
                containerSelector: ".gridview-content-wrapper",
                additionalMarginTop: 0,
                additionalMarginBottom: 0,
                minWidth: 960,
            });
        });
    }

    // init Masonry
    var $gridview_grid = $('.gridview-posts-grid').masonry({
      itemSelector: '.gridview-grid-post',
      columnWidth: gridview_ajax_object.columnwidth,
      gutter: gridview_ajax_object.gutter,
      percentPosition: true,
      transitionDuration: '0.4s'
    });
    // layout Masonry after each image loads
    $gridview_grid.imagesLoaded().progress( function() {
      $gridview_grid.masonry('layout');
    });

});