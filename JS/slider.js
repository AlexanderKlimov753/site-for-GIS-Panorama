const slides = document.querySelectorAll(".slide");
const dots = document.querySelectorAll(".sliderDot");
let index = 0;

const activeSlide = n => {
    for (slide of slides) {
        slide.classList.remove("active");
    }
    slides[n].classList.add("active");
};

const activeDot = n => {
    for (dot of dots) {
        dot.classList.remove("active");
    }
    dots[n].classList.add("active");
};

const prepareCurrentSlide = ind => {
    activeSlide(ind);
    activeDot(ind);
};

const currentSlide = n => {
    index = n;
    prepareCurrentSlide(index);
};

const nextSlide = () => {
    if (index === slides.length - 1) {
        index = 0;
    } else {
        index++;
    }
    prepareCurrentSlide(index);
};

const prevSlide = () => {
    if (index === 0) {
        index = slides.length - 1;
    } else {
        index--;
    }
    prepareCurrentSlide(index);
};

dots.forEach((dot, i) => {
    dot.addEventListener("click", () => {
        currentSlide(i);
    });
});

document.getElementById("btnNext").addEventListener("click", nextSlide);
document.getElementById("btnPrev").addEventListener("click", prevSlide);