const productContainers = [...document.querySelectorAll('.productContainer')];
const nxtBtn = [...document.querySelectorAll('.nxtBtn')];
const preBtn = [...document.querySelectorAll('.preBtn')];



productContainers.forEach((item, i)=>{
    let containerDimensions = item.getBoundingClientRect();
    let containerWidth = containerDimensions.width;

    nxtBtn[i].addEventListener('click', () => {
        item.scrollLeft += containerWidth;
    })
    preBtn[i].addEventListener('click', () => {
        item.scrollLeft -= containerWidth;
    })
})

document.addEventListener("DOMContentLoaded", function() {
    var slides = document.querySelectorAll('.slider img');
    var currentIndex = 0;

    function showSlide(index) {
        slides.forEach(function(slide) {
            slide.style.display = 'none';
        });
        
        slides[index].style.display = 'block';
        
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % slides.length;
        showSlide(currentIndex);
    }

    setInterval(nextSlide, 5000);
});

