window.addEventListener('scroll', function() {
    const products = document.querySelectorAll('.service');
    products.forEach(product => {
        const rect = product.getBoundingClientRect();
        if (rect.top < window.innerHeight && rect.bottom >= 0) {
            product.style.opacity = 1;  
        }
    });
});
window.addEventListener('load', function() {
    document.body.classList.remove('loading');
    document.getElementById('loader').style.display = 'none';
});