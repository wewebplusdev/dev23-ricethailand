var path = $("base").attr("href");
$(document).ready(function () {
    $('.nav-contact').addClass('active');

    $('#btn-submit').click(function() {
        $('.contact-form .submit').addClass('active');
        $('.contact-form .form-default').removeClass('active');
    });
    $('#btn-back').click(function() {
        // window.location.href = window.location.pathname;
        $('.contact-form .form-default').addClass('active');
        $('.contact-form .submit').removeClass('active');
    });
    // console.log(path);
});

grecaptcha.ready(function() {
    // do request for recaptcha token
    // response is promise with passed token
        grecaptcha.execute($('#g-recaptcha-response').data('secret'), {action:'validate_captcha'})
                  .then(function(token) {
            // add token value to form
            document.getElementById('g-recaptcha-response').value = token;
        });
    });

// recapcha img
function loadNewCaptchaFit() {
    jQuery("#captcha").load(path+"/front/controller/script/contact/captcha/captchaShow.php?" + new Date().getTime());
}
// recapcha img



// $('.menu-mobile-btn').hide();
// $('nav.menu').hide();
// $('.site-footer').hide();

var action = $('.action').data('id');
// console.log(action);
if(action == 'submit'){
    $('.contact-form .submit').addClass('active');
    $('.contact-form .form-default').removeClass('active');
}
