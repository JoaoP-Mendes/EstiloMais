let currentSlide = 0;
let slideInterval;

function showSlide(index) {
    const slides = document.querySelectorAll('.slide_carrossel');
    const totalSlides = slides.length;
    
    if (index >= totalSlides) currentSlide = 0;
    else if (index < 0) currentSlide = totalSlides - 1;
    else currentSlide = index;
    
    const carrossel = document.querySelector('.slide_div');
    carrossel.style.transform = `translateX(-${currentSlide * 100}%)`;
}

function nextSlide() {
    showSlide(currentSlide + 1);
    resetInterval();
}

function prevSlide() {
    showSlide(currentSlide - 1);
    resetInterval();
}

function resetInterval() {
    clearInterval(slideInterval);
    slideInterval = setInterval(() => {
        showSlide(currentSlide + 1);
    }, 5000);
}





document.addEventListener('DOMContentLoaded', () => {
    showSlide(0);
    slideInterval = setInterval(() => {
        showSlide(currentSlide + 1);
    }, 5000);
});