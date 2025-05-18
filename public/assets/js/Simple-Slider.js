document.addEventListener("DOMContentLoaded", function () {
    // Initializing the swiper plugin for the slider with autoplay.
    var mySwiper = new Swiper('.swiper-container', {
        loop: true,
        autoplay: {
            delay: 3000, // 3 seconds
            disableOnInteraction: false // Autoplay continues even after interaction
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        }
    });
});
