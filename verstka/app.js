const items = document.querySelectorAll('.accordion-item');

items.forEach(item => {
    const header = item.querySelector('.accordion-header');

    header.addEventListener('click', () => {
        const isActive = item.classList.contains('active');

        // закрываем все кроме текущего
        items.forEach(i => {
            i.classList.remove('active');
            i.querySelector('.accordion-content').style.maxHeight = null;
        });

        // если не был активен — открыть
        if (!isActive) {
            item.classList.add('active');
            const content = item.querySelector('.accordion-content');
            content.style.maxHeight = content.scrollHeight + 'px';
        }
    });
});




const sliderSection = document.querySelector(".parallax-slider");
const slideImages = document.querySelectorAll("[data-parallax] .slide-bg");

window.addEventListener("scroll", () => {
    const rect = sliderSection.getBoundingClientRect();
    const scrollOffset = rect.top; // позиция блока относительно окна
    slideImages.forEach(bg => {
        bg.style.transform = `translateY(${scrollOffset * 0.2}px)`;
    });
});


const header = document.querySelector(".site-header");

function checkHeader() {
    if (window.scrollY >= sliderSection.offsetHeight - 10) {
        header.classList.add("fixed");
    } else {
        header.classList.remove("fixed");
    }
}

window.addEventListener("scroll", checkHeader);
checkHeader();

