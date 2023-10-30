import './bootstrap';
import '../css/app.css';

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

window.onscroll = function() {
    var backButton = document.getElementById('back-to-top-button');
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        backButton.style.display = 'block';
    } else {
        backButton.style.display = 'none';
    }
};

function playVideo() {
    let video = document.getElementById("custom-video");
    let playButton = document.getElementById("play-button");

    video.play();
    playButton.style.display = "none";
    video.addEventListener("ended", function() {
        playButton.style.display = "block";
    });
}

const swiper = new Swiper('.swiper_about', {
    direction: 'vertical',
    loop: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    pagination: {
        el: '.swiper-pagination',
    },
});

