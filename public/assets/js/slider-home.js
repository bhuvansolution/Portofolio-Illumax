 const swiper = new Swiper('.swiper-container', {
    loop: true,
    autoplay: {
      delay: 3000, // waktu dalam ms (3000 = 3 detik)
      disableOnInteraction: false, // tetap autoplay meski user klik tombol
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    }
  });