$(document).ready(function () {
    $('.nav-news').addClass('active');
    $('.nav-newsI').addClass('active');
});

$(".advance-search-txt").click(function() {
    if ($('#collapseExample').hasClass('show')) {
        $('input[name="typeSch"]').val('1');
    } else {
        $('input[name="typeSch"]').val('2');
    }
})

$('.search-click').on('click', function(){
    window.location.href = $(this).data('url');
    return false;
});