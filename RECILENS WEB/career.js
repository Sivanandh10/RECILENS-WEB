window.addEventListener('scroll', function () {
    const heroSection = document.querySelector('.hero-section');
    const careersSection = document.querySelector('.careers-section');

    if (window.scrollY > 150) {
        heroSection.style.opacity = '0.5';
    } else {
        heroSection.style.opacity = '1';
    }

    if (window.scrollY > 500) {
        careersSection.style.opacity = '1';
        careersSection.style.transform = 'translateY(0)';
    }
});
