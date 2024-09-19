// slider
let currentIndex = 0;
const slides = document.querySelectorAll('.slide');
const totalSlides = slides.length;
let slideInterval = setInterval(nextSlide, 3000);

function nextSlide() {
    currentIndex = (currentIndex + 1) % totalSlides;
    updateSlidePosition();
}

function changeSlide(direction) {
    currentIndex = (currentIndex + direction + totalSlides) % totalSlides;
    updateSlidePosition();
    resetInterval();
}

function updateSlidePosition() {
    const offset = -currentIndex * 100;
    document.querySelector('.slides').style.transform = `translateX(${offset}%)`;
}

function resetInterval() {
    clearInterval(slideInterval);
    slideInterval = setInterval(nextSlide, 3000);
}

// description
const description = document.getElementById('description');

window.onscroll = function() {
    let scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
    
    if (scrollTop > 200) {
        description.classList.add('visible');
    }
}