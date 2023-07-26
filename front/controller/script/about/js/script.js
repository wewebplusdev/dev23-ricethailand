$(document).ready(function () {
    var active_nav = $('.active-nav').data('id');
    $('.nav-about').addClass('active');

    var width = $(window).width();
    if (width > 767) {
        $(function() {
            $('.about-menu-slide').slick({
                prevArrow:"<div class='slick-prev'><span class='feather icon-arrow-left'></span></div>",
                nextArrow:"<div class='slick-next'><span class='feather icon-arrow-right'></span></div>",
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 4,
                dots: false,
                arrows: true,
                focusOnSelect: true,
                responsive: [
                    {
                        breakpoint: 991,
                        settings: {
                            dots: true,
                            arrows: false,
                            slidesToShow: 3,
                            slidesToScroll: 3
                        }
                    }
                ]
            });
            $('.about-menu-slide').slick('slickGoTo', 0);
        });
    }
    $('.about-menu-slide .nav-item'+active_nav).addClass('current');
    $('.nav-about'+active_nav).addClass('active');
    $('.btn-about').click(function() {
        $('.about-menu-slide').toggleClass('open');
        $(this).toggleClass('active');
    });

    $('.gallery-slide').slick({
        prevArrow:"<div class='slick-prev'><span class='feather icon-arrow-left'></span></div>",
        nextArrow:"<div class='slick-next'><span class='feather icon-arrow-right'></span></div>",
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4,
        dots: true,
        arrows: true,
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 767,
                settings: {
                    dots: true,
                    arrows: false,
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 1200,
                settings: {
                    dots: true,
                    arrows: false
                }
            }
        ]
    });
    $('.download-slide').slick({
        prevArrow:"<div class='slick-prev'><span class='feather icon-arrow-left'></span></div>",
        nextArrow:"<div class='slick-next'><span class='feather icon-arrow-right'></span></div>",
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 2,
        dots: true,
        arrows: true,
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 991,
                settings: {
                    dots: true,
                    arrows: false,
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 1200,
                settings: {
                    dots: true,
                    arrows: false
                }
            }
        ]
    });
});