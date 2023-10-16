import './bootstrap';

(function ($) {

    $('#search-button').on('click', function (e) {
        if ($('#search-input-container').hasClass('hdn')) {
            e.preventDefault();
            $('#search-input-container').removeClass('hdn')
            return false;
        }
    });

    $('#hide-search-input-container').on('click', function (e) {
        e.preventDefault();
        $('#search-input-container').addClass('hdn')
        return false;
    });

})(jQuery);

let swiper = new Swiper(".mySwiper_slider", {
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
    },
    autoplay: {
        delay: 5000,
        disableOnInteraction: false
    }
});
