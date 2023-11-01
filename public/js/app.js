document.addEventListener('DOMContentLoaded', function() {
    const searchButton = document.getElementById('search-button');
    const hideSearchInput = document.getElementById('hide-search-input-container');
    const searchInputContainer = document.getElementById('search-input-container');

    searchButton.addEventListener('click', function(e) {
        if (searchInputContainer.classList.contains('hdn')) {
            e.preventDefault();
            searchInputContainer.classList.remove('hdn');
        }
    });

    hideSearchInput.addEventListener('click', function(e) {
        e.preventDefault();
        searchInputContainer.classList.add('hdn');
    });
});


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

document.addEventListener('DOMContentLoaded', function() {
    const swiperAbout = new Swiper('.swiper_about', {
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

    let swiperSlider = new Swiper(".mySwiper_slider", {
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
});

function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

