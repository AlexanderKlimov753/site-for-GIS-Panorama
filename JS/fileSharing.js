function displayImage(inputElement) {
  const file = inputElement.files[0];
  const fileName = file.name;
  document.getElementById('fileName')
  const imageURL = URL.createObjectURL(file);
  document.getElementById('preview').src = imageURL;
  document.getElementById('preview').onload = () => URL.revokeObjectURL(imageURL);
}

/*слайдер с файлами*/

const fileSharingSlides = document.querySelectorAll(".fileSharingFileSlide");
const fileSharingDots = document.querySelectorAll(".fileSharingFileSliderDot");
let fileSharingIndex = 0;

const activeFileSharingSlide = n => {
    for (SharingFileSlide of fileSharingSlides) {
      SharingFileSlide.classList.remove("active");
    }
    fileSharingSlides[n].classList.add("active");
};

const activeFileSharingDot = n => {
    for (SharingFileSliderDot of fileSharingDots) {
      SharingFileSliderDot.classList.remove("active");
    }
    fileSharingDots[n].classList.add("active");
};

const prepareCurrentFileSharingSlide = ind => {
  activeFileSharingSlide(ind);
  activeFileSharingDot(ind);
};

const currentFileSharingSlide = n => {
  fileSharingIndex = n;
    prepareCurrentFileSharingSlide(fileSharingIndex);
};

const nextFileSharingSlide = () => {
    if (fileSharingIndex === fileSharingSlides.length - 1) {
      fileSharingIndex = 0;
    } else {
      fileSharingIndex++;
    }
    prepareCurrentFileSharingSlide(fileSharingIndex);
};

const prevFileSharingSlide = () => {
    if (fileSharingIndex === 0) {
      fileSharingIndex = fileSharingSlides.length - 1;
    } else {
      fileSharingIndex--;
    }
    prepareCurrentFileSharingSlide(fileSharingIndex);
};

fileSharingDots.forEach((SharingFileSliderDot, i) => {
  SharingFileSliderDot.addEventListener("click", () => {
    currentFileSharingSlide(i);
    });
});

document.getElementById("fileSharingBtnNext").addEventListener("click", nextFileSharingSlide);
document.getElementById("fileSharingBtnPrev").addEventListener("click", prevFileSharingSlide);