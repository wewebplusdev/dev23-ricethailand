$(document).ready(function () {
    /* START SETAIL #1 */
    $('.nav-news').addClass('active');
    $('.nav-newsI').addClass('active');
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
    
    $('.wg-book-slide').slick({
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
    /* END SETAIL #1 */
});


