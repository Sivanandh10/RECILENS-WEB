<?php
session_start(); 

if (isset($_GET['logout'])) {
    $_SESSION = array();

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    session_destroy();

    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECILENS CORPORATION</title>
    <link rel="stylesheet" href="loader.css">
    <style>
       body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.hero {
    display: flex;
    margin-top: 5%;
    justify-content: space-between;
    align-items: center;
    padding: 100px 30px;
    opacity: 0;
    transition: opacity 1s;
    animation: fadeIn 1s forwards;
    background-color: rgb(255, 255, 255);
    background-image: url("hero/bg.png");
    background-size: 500px;
    background-repeat: no-repeat;
}

.hero img {
    max-width: 0%; 
    height: auto;
    margin-top: -30px;
    margin-right: 0;
    opacity: 0;
    transition: opacity 1s;
    animation: fadeIn 1s forwards;
    animation-delay: 0.5s; 
}

.herop {
    color: rgb(0, 145, 255);
    padding: 0;
    margin: 0;
}

.slogan {
    max-width: 600px;
    padding: 0;
    margin: 0;
    margin-top: 80px;
    margin-left: 60px;
}

.slogan .animated {
    display: inline-block;
    color: rgb(255, 13, 0);
}

@keyframes fadeIn {
    to {
        opacity: 1;
    }
}

.small-paragraph {
    margin-top: 20px;
    color: rgb(94, 207, 115);
    font-size: 20px;
    margin-left: 10px;
    text-align: justify;
    opacity: 0;
    animation: fadeIn 1s forwards;
    animation-delay: 1s; 
}

@media (max-width: 400px) {
    .nav-links {
        display: none;
    }
    .navbar i {
        display: block; 
    }
}

.about-us {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 100px 30px;
    background-color: rgb(255, 255, 255);
    opacity: 0;
    transition: opacity 1s;
    animation: fadeIn 1s forwards; 
}

.about-container {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 90%; 
    max-width: 1200px; 
    position: relative;
}

.image-wrapper {
    width: 700px; 
    height: 400px; 
    overflow: hidden;
    position: relative;
    transition: transform 0.5s;
}

.image {
    position: absolute;
    width: 100%;
    height: 100%;
    transition: opacity 0.5s;
}

.description {
    display: none; 
    font-family: 'Courier New', Courier, monospace;
    text-align: left;
    padding: 100px; 
    font-size: 17px;
    opacity: 0; 
    transition: opacity 0.5s;
}

.ab {
    color: rgb(222, 206, 28);
    margin-bottom: 50px;
}

.image-wrapper:hover {
    transform: translateX(-20px);
}

.products-section {
    padding: 50px 30px;
    background-color: white;
    text-align: center; 
}

.products-header {
    font-size: 2em;
    margin-bottom: 80px;
    color: #2546cc; 
}

.products-header1 {
    font-size: 2em;
    margin-bottom: 80px;
    color: #25cc6b; 
}

.products {
    display: flex;
    justify-content: space-around;
    align-items: flex-start;
    margin-bottom: 30px; 
}

.product-card {
    width: 300px; 
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    overflow: hidden; 
    transition: transform 0.3s, box-shadow 0.3s;
    position: relative;
}

.product-card img {
    width: 100%; 
    height: 200px; 
    object-fit: cover; 
}

.product-card h3 {
    margin: 15px 0;
}

.product-card p {
    padding: 0 15px;
    margin-bottom: 15px;
}

.know-more-btn, .view-all-btn {
    background-color: #007bff; color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.3s;
    margin-top: 10px; 
}

.know-more-btn:hover, .view-all-btn:hover {
    background-color: #0056b3; 
    transform: scale(1.05); 
}

.product-card:hover {
    transform: scale(1.05); 
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); 
}

.view-all-btn {
    margin-top: 20px; 
    font-size: 1.2em; 
}

.careers {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 80px 30px;
    background-color: #ffffff; 
    opacity: 0;
    animation: fadeIn 1s forwards; 
}

.slogan1 {
    max-width: 500px; 
    text-align: justify;
    margin-top: -30px;
    margin-left: 10%;
}

.slogan1 h2 {
    font-size: 24px;
    color: #ccc42f; 
    animation: slideInLeft 1s forwards; 
    margin-bottom: 30px;
}

.ca {
    font-size: 2em;
    margin-bottom: 30px;
    text-align: center;
    margin-top: 60px;
    color: #ca3e1e;
}

@keyframes slideInLeft {
    from {
        transform: translateX(-100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

.career-description {
    font-size: 18px;
    color: #07a641; 
    margin: 10px 10;
    animation: slideInLeft 1s forwards; 
    animation-delay: 0.5s;
    margin-left: 12%; 
}

.button {
    padding: 10px 20px;
    background-color: #007bff; 
    color: white; 
    text-align: center;
    margin-left: 30%;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    animation: slideInLeft 1s forwards; 
    animation-delay: 1s; 
    transition: background 0.3s;
}

.button:hover {
    background-color: #0056b3; 
}

.image-container {
    width: 300px; 
    height: 300px; 
    position: relative; 
    margin-right: 10%;
    padding: 0;
}

.diamond-image {
    width: 100%;
    height: 100%;
    position: absolute; 
    clip-path: polygon(50% 0%, 100% 50%, 50% 100%, 0% 50%); 
    border: 5px solid transparent; 
    transition: transform 0.3s, box-shadow 0.3s; 
}

.diamond-image:hover {
    transform: scale(1.05); 
    box-shadow: 0 0 50px rgba(0, 64, 255, 0.7); 
    border-color: rgba(255, 0, 0, 0.7); 
}

.scroll-to-top {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 50px;
    height: 50px;
    background-color: transparent; 
    border: none; 
    cursor: pointer; 
    font-size: 30px; 
    color: whitesmoke;
    background: linear-gradient(to right, red, blue, green, yellow);
    border-radius: 80px;
    display: none; 
    transition: transform 0.3s;
    animation: glow 1.5s infinite alternate;
}

@keyframes glow {
    0% {
        text-shadow: 0 0 5px red, 0 0 10px green, 0 0 15px blue, 0 0 20px yellow;
    }
    100% {
        text-shadow: 0 0 10px red, 0 0 20px green, 0 0 30px blue, 0 0 40px yellow;
    }
}

.scroll-to-top:before {
    content: '↑'; 
    display: inline-block;
    line-height: 50px; 
    text-align: center; }

.hero video {
    width: 590px; 
    height: auto; 
    border-radius: 15px;
    margin-right: 5%;
    margin-top: 6%;
}

.abo {
    padding: 5%;
    margin-top: 5%;
    background-image: url("about/bg.png");
    background-repeat: no-repeat;
    background-size: 2000px;
}

@media (max-width: 1200px) {
    .hero {
        padding: 50px 20px;
        max-width: 1180px;
    }

    .slogan {
        margin-left: 30px;
    }

    .about-container {
        flex-direction: column;
        align-items: center;
    }

    .image-wrapper {
        width: 100%;
        height: auto;
    }

    .products {
        flex-direction: column;
        align-items: center;
    }

    .product-card {
        width: 90%;
        margin-bottom: 20px;
    }

    .slogan1 {
        margin-left: 5%;
    }

    .button {
        margin-left: 0;
    }

    .image-container {
        width: 90%;
        margin-right: 0;
    }
}

@media (max-width: 768px) {
    .hero {
        flex-direction: column;
        align-items: center;
        max-width: 750px;
    }

    .hero img {
        max-width: 100%;
        opacity: 1;
    }
    .hero video{
        max-width:100% ;
    }

    .slogan {
        margin-left: 0;
        text-align: center;
    }

    .about-us {
        padding: 50px 20px;
    }

    .products-header, .products-header1 {
        font-size: 1.5em;
    }

    .product-card {
        width: 100%;
    }

    .careers {
        flex-direction: column;
        align-items: center;
    }

    .career-description {
        margin-left: 0;
        text-align: center;
    }
}

@media (max-width: 480px) {
    *{
        margin: 0;
        padding: 0;
    }
    .hero {
        padding: 30px 10px;
        max-width: 450px;
    }
    .herop{
        font-size: 1.5rem;
        max-width: 99%;
    }
    .hero video{
        max-width:100% ;
    }

    .slogan {
        margin-top: 20px;
    }

    .products-header, .products-header1 {
        font-size: 1.2em;
    }
    .products .product-card{
        max-width: 100%;
        height: 360px;
    }
    .products img{
        max-width: 70%;
        max-height: 30%;
    }
    .products h3{
       font-size: 0.90rem;
       max-height: 15%;
       font-weight: 600px;
    }
    .products p{
        font-size: 0.80rem;
        max-width: 100%;
        max-height: 25%;
    }
    .products{
        display: flex;
        flex-direction: row;
        gap: 3%;
    }
    .know-more-btn{
        max-width: 80%;
        max-height: 10%;
        font-size: 11px;
    }

    .button {
        width: 100%;
        margin-left: 0;
    }

    .careers{
        display: flex;
        flex-direction: row;
        max-width: 100%;
        margin: 0;
        padding: 0;
    }
    .careers h2{
        max-width: 65%;
        font-size: 0.80rem;
    }
    .careers p{
        max-width: 80%;
        font-size: 0.78rem;
    }
    .careers button{
        max-width: 50%;
        font-size: 10px;
    }
    .careers img{
        margin-top: 30%;
        max-width: 120%;
        max-height: 60%;
    }
   
}
       
    </style>
</head>
<body class="loading">
    <?php include 'loader.php'; ?>
    <?php include 'nav.php'; ?>
    <div class="hero" id="home">
        <div class="slogan">
            <h1 class="herop">Your Gateway to<h2 class="herop">Innovative Software <span class="animated" id="animated-text"></span></h2></h1>
            <p class="small-paragraph">We are your trusted partner in driving digital transformation. Specializing in cutting-edge software solutions, we offer comprehensive services including website development, mobile app creation, and robust security measures. Our team of experts is dedicated to turning your vision into reality, ensuring your digital presence is not just secure, but also exceptional.</p>
        </div>
        <video autoplay muted loop>
            <source src="home.mp4" type="video/mp4">
        </video>
    </div>
    <div class="abo">
    <div class="about-us" id="about">
        <h2 class="ab">About Us</h2>
        <div class="about-container">
            <div class="image-wrapper" id="image-container">
                <img src="group.jpg" alt="Image 1" class="image" style="opacity: 1;">
                <img src="group1.jpg" alt="Image 2" class="image" style="opacity: 0;">
                <img src="group2.jpg" alt="Image 3" class="image" style="opacity: 0;">
                <img src="group3.jpg" alt="Image 4" class="image" style="opacity: 0;">
            </div>
            <div class="description" id="description">
                <p>We are your trusted partner in driving digital transformation. Specializing in cutting-edge software solutions</p>
            </div>
        </div>
    </div>
</div>
    <div class="products-section" id="products">
        <h2 class="products-header">OUR PRODUCTS</h2> 
        <div class="products">
            <div class="product-card">
                <img src="product1.webp" alt="Product 1">
                <h3>Product 1</h3>
                <p>This is a brief description of Product 1. It offers great features.</p>
                <button class="know-more-btn">Know More</button> 
            </div>
            <div class="product-card">
                <img src="product2.webp" alt="Product 2">
                <h3>Product 2</h3>
                <p>This is a brief description of Product 2. It is designed for efficiency.</p>
                <button class="know-more-btn">Know More</button> 
            </div>
            <div class="product-card">
                <img src="product3.webp" alt="Product 3">
                <h3>Product 3</h3>
                <p>This is a brief description of Product 3. It provides excellent performance.</p>
                <button class="know-more-btn">Know More</button> 
            </div>
        </div>
        <a href="products.php" style="text-decoration: none;color: whitesmoke;" target="_blank"><button class="view-all-btn">View All Products</button> </a>
    </div>
    <div class="products-section" id="services">
        <h2 class="products-header1">OUR SERVICES</h2> 
        <div class="products">
            <div class="product-card">
                <img src="service (1).jpg" alt="Product 1">
                <h3>IT SERVICE</h3>
                <p>This is a brief description of SERVICE 1. It offers great features.</p>
                <button class="know-more-btn">Know More</button> 
            </div>
            <div class="product-card">
                <img src="service (2).jpg" alt="Product 2">
                <h3>NETWORK SECURITY</h3>
                <p>This is a brief description of SERVICE 2. It is designed for efficiency.</p>
                <button class="know-more-btn">Know More</button> 
            </div>
            <div class="product-card">
                <img src="service (3).jpg" alt="Product 3">
                <h3>MAINTAINCE FOR COMPUTER IT SERVICE</h3>
                <p>This is a brief description of SERVICE 3. It provides excellent performance.</p>
                <button class="know-more-btn">Know More</button> 
            </div>
        </div>
        <a href="service.html" style="text-decoration: none; color: whitesmoke;" target="_blank"><button class="view-all-btn">View All Services</button></a> 
    </div>
    <h2 class="ca" id="careers">CAREERS</h2>
    <div class="careers" >
        <div class="slogan1">
            <h2>Join Our Team at RECILENS</h2>
            <p class="career-description">At RECILENS, we're always on the lookout for passionate individuals ready to make a difference. Whether you're looking for internships or full-time positions, we offer exciting opportunities to grow and innovate.</p>
            <button class="button"><a href="career.php" target="_blank" style="text-decoration: none; color: whitesmoke;">Let's Kick Start</a></button>
        </div>
        <div class="image-container">
            <img src="careerbg.png" alt="Career Image" class="diamond-image">
        </div>
    </div>
    <div id="contact">
        <?php include 'footer.php'; ?>
    </div>

    <button class="scroll-to-top" id="scrollToTopBtn" onclick="scrollToTop()"></button>


    <script>
        const scrollToTopBtn = document.getElementById('scrollToTopBtn');

window.onscroll = function() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        scrollToTopBtn.style.display = "block";
    } else {
        scrollToTopBtn.style.display = "none";
    }
};

function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth' 
    });
}
        const phrases = ["Solution!", "Creativity!"];
        let index = 0;

        function rotateWords() {
            const animatedText = document.getElementById('animated-text');
            animatedText.innerHTML = phrases[index];
            index = (index + 1) % phrases.length;
        }

        setInterval(rotateWords, 2000);
        rotateWords();
        const images = document.querySelectorAll('.image');
        const description = document.getElementById('description');
        const descriptions = [
            "We are your trusted partner in driving digital transformation. Specializing in cutting-edge software solutions",
            " we offer comprehensive services including website development, mobile app creation, and robust security measures",
            "We are your trusted partner in driving digital transformation. Specializing in cutting-edge software solutions",
            " we offer comprehensive services including website development, mobile app creation, and robust security measures"
        ];

        let currentIndex = 0;

        function updateDisplay() {
            for (let i = 0; i < images.length; i++) {
                images[i].style.opacity = (i === currentIndex) ? '1' : '0';
            }
            description.innerHTML = descriptions[currentIndex];
            description.style.opacity = '0';
            description.style.display = 'none'; 
        }

        function nextImage() {
            currentIndex = (currentIndex + 1) % images.length;
            updateDisplay();
        }

        setInterval(nextImage, 3000);
        updateDisplay();

        document.getElementById('image-container').addEventListener('mouseenter', function() {
            description.style.display = 'block'; 
            description.style.opacity = '1'; 
        });
        window.addEventListener('load', function() {
            document.body.classList.remove('loading');
            document.getElementById('loader').style.display = 'none';
        });
    </script>

</body>
</html>