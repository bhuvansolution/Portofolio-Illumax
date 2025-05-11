document.querySelectorAll('.carousel').forEach((carousel) => {
    const carouselInner = carousel.querySelector('.carousel-inner');
    const nextButton = carousel.querySelector('.carousel-control-next');
    const prevButton = carousel.querySelector('.carousel-control-prev');

    if (window.matchMedia("(min-width:576px)").matches) {
        const items = carouselInner.querySelectorAll('.carousel-item');
        const cardWidth = items[0].offsetWidth;
        let scrollPosition = 0;

        // Clone semua item agar bisa nyambung terus
        items.forEach((item) => {
            const clone = item.cloneNode(true);
            carouselInner.appendChild(clone);
        });

        function slideNext() {
            scrollPosition += cardWidth;
            carouselInner.scrollTo({ left: scrollPosition, behavior: 'smooth' });

            // Reset posisi scroll agar kelihatan infinite
            if (scrollPosition >= carouselInner.scrollWidth / 2) {
                setTimeout(() => {
                    scrollPosition = 0;
                    carouselInner.scrollLeft = scrollPosition;
                }, 300); // tunggu scroll selesai
            }
        }

        function slidePrev() {
            if (scrollPosition <= 0) {
                scrollPosition = carouselInner.scrollWidth / 2;
                carouselInner.scrollLeft = scrollPosition;
            }
            scrollPosition -= cardWidth;
            carouselInner.scrollTo({ left: scrollPosition, behavior: 'smooth' });
        }

        nextButton.addEventListener('click', slideNext);
        prevButton.addEventListener('click', slidePrev);

        // Auto slide tiap 3 detik
        setInterval(slideNext, 3000);
    } else {
        carousel.classList.add('slide');
    }
});
