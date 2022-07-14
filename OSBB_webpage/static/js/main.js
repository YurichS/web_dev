$(document).ready(function () {
    //Плавний перехід по якорям
    $("a").click(function () {
        $("html, body").animate({
            scrollTop: $($(this).attr("href")).offset().top - 100
        }, {
            duration: 50,
            easing: "swing"
        });
        return false;
    });
    //Функція, яка відповідає за зникнення кнопки "Вгору" на початку сторінки
    $(window).scroll(function () {
        if($(this).scrollTop() > 40){
            $('#ScrTopBtn').fadeIn();
        } else{
            $('#ScrTopBtn').fadeOut();
        }
    });
    //Функція для переходу на початок сторінки
    $('#ScrTopBtn').click(function () {
        $('html,body').animate({scrollTop:0}, 80);
    });
})