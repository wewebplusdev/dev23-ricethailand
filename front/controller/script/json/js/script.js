$(document).ready(function () {
    $('.nav-news').addClass('active');
    
    let navbars = $('.navbars-active').data('id');
    $('.nav-news'+navbars).addClass('active');
});


