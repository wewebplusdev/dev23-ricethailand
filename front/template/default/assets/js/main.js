window.onload = function() {
    $(".preload").delay(400).fadeOut("200", function () {
        $('#preload').addClass('move');
        $('#preload').fadeOut(200);
    });
};

$(document).ready(function () {
    new WOW().init();

    $(function() {
        AOS.init({
            duration: 2000,
            once: true,
  	        offset: 0,
        });
    });

    $('.select-control').select2({
        minimumResultsForSearch: 3 ,
        placeholder: "Select"
    });
    
    $('.select-control.has-search').select2({
        placeholder: "Select"
    });

    $("[data-fancybox]").fancybox({
        thumbs     : false,
        slideShow  : false,
        fullScreen : false
    });

    $(".mcscroll").mCustomScrollbar({
       axis : "y",
       scrollButtons: {
           enable: true
       }
    });
    $(".mcscrollX").mCustomScrollbar({
       axis : "x",
       scrollButtons: {
           enable: true
       }
    });

    var lazyLoadInstance = new LazyLoad({
        elements_selector: ".lazy"
    });

    $('.overflow-line-1').trunk8({
       lines: 1,
       tooltip : false
    });
    $('.overflow-line-2').trunk8({
       lines: 2,
       tooltip : false
    });
    $('.overflow-line-3').trunk8({
       lines: 3,
       tooltip : false
    });

    var topbar = $('.site-header').height();
    $(window).scroll(function() {
        if ($(window).scrollTop() > topbar) {
            $(".site-header").addClass("tiny");
        } else {
            $(".site-header").removeClass("tiny");
        }
    });

    $('[data-toggle="menu-mobile"]').click(function(){
        $(this).toggleClass('close');
        $('.global-container').toggleClass('sidebar-open');
        $('nav.menu').toggleClass('open');
    });
    $('[data-toggle="menu-overlay"]').click(function(){
        $('[data-toggle="menu-mobile"]').removeClass('close');
        $('.global-container').removeClass('sidebar-open');
        $('nav.menu').removeClass('open');
    });

    $('.nav-search .search-form .link').click(function(){
        $('.nav-search').addClass('open');
    });
    $('.nav-search .search-form .close').click(function(){
        $('.nav-search').removeClass('open');
    });

    $('.intro-img .slider').slick({
        prevArrow:"<div class='slick-prev'><span class='feather icon-chevron-left'></span></div>",
        nextArrow:"<div class='slick-next'><span class='feather icon-chevron-right'></span></div>",
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 1500,
        autoplay: true,
        autoplaySpeed: 5000,
        dots: true,
        arrows: false,
        responsive: [
            {
                breakpoint: 1366,
                settings: {
                    speed: 600
                }
            }
        ]
    });
    
    $('.btn-sitemap').click(function() {
        $('.nav-sitemap').toggleClass('open');
        $(this).toggleClass('active');
    });

    $('.filter-box .filter-search').click(function() {
        $('.-search-filter').toggleClass('open');
        $(this).toggleClass('active');
    });


   // $('.datepicker').datepicker();
});