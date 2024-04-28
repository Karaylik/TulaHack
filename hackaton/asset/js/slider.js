let currentSlide = 0;
const slides = document.querySelectorAll('.slide');
const totalSlides = slides.length;

function nextSlide() {
    currentSlide++;
    if (currentSlide >= totalSlides-2) {
        currentSlide = 0;
    }
    updateSlidePosition();
}

function prevSlide() {
    currentSlide--;
    if (currentSlide < 0) {
        currentSlide = totalSlides - 3;
    }
    updateSlidePosition();
}

function updateSlidePosition() {
    const slideWidth = slides[0].clientWidth;
    const offset = -currentSlide * slideWidth;
    document.querySelector('.slides').style.transform = `translateX(${offset}px)`;
}

setInterval(nextSlide, 3000);