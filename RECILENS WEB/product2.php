<!DOCTYPE html>
<html>
<head>
    <title>Product Page</title>
    <link rel="stylesheet" href="product1.css">
    <link rel="stylesheet" href="loader.css">
</head>
<body class="loading">
    <?php include 'loader.php'; ?>
    <?php include 'nav.php'; ?>
    <main>
        <div class="product">
            <img src="product1.webp" alt="Product Image">
            <div class="product-info">
                <h2>PRODUCT NAME</h2>
                <p><strong>Type:</strong> Software</p>
                <p><strong>Used To:</strong> To Avoid Malware</p>
                <button>GET NOW!</button>
                <div class="rating">
                    <span class="star" data-rating="1">&#9734;</span>
                    <span class="star" data-rating="2">&#9734;</span>
                    <span class="star" data-rating="3">&#9734;</span>
                    <span class="star" data-rating="4">&#9734;</span>
                    <span class="star" data-rating="5">&#9734;</span>
                </div>
                <div class="description">
                    <p><strong>Description:</strong></p>
                    <p>About the above product few lines about the product.</p>
                    <p>Please provide more information about the product so I can write a better description!</p>
                    <div class="feedback">
                        <textarea placeholder="Leave your feedback here..."></textarea><br>
                        <button>Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="footer" id="contact">
        <div class="footer-left">
            <div>
                <h3 style="display: flex; float: right; margin-right: 70%; background: linear-gradient(to right, red, blue, green, yellow); width: 100px; text-align: center;">RECILENS</h3>
                <img src="RECILENS LOGO 500 X 500  - Copy.png" class="logo" alt="Company Logo" height="50">
            </div>
            <div>
                <h3 style="margin-top: 80px;">Contact Us</h3>
                <form class="contact-form" action="mailto:recilenscorporation@gmail.com" method="post" enctype="text/plain">
                    <input type="email" name="email" placeholder="E-mail" required>
                    <input type="text" name="subject" placeholder="Subject" required>
                    <textarea name="body" placeholder="Body" rows="4" required></textarea>
                    <button type="submit">Submit</button>
                </form>
            </div>
            < <h1 style="font-size: 15px; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; margin-left: 10%; margin-top: 10%;">E-mail: recilens@gmail.com&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; Mobile: +91 0000000000</h1>
            </div>
            <div class="footer-right">
                <h3 style="text-align: center;">Quick Links</h3>
                <div class="foo">
                    <a href="./#products">Products</a>
                    <a>|</a><a href="./#services">Services</a>
                    <a>|</a><a href="./#about">About</a>
                    <a>|</a><a href="./#careers">Careers</a>
                    <a>|</a><a href="./#contact">Contact</a>
                    <a>|</a><a href="./#terms">Terms & Conditions</a>
                </div>
                <div>
                    <h3 style="text-align: center;">Our Products</h3>
                    <div style="display: flex; flex-wrap: wrap; margin-left: 150px;">
                        <div style="width: 50%;">
                            <a href="./product1.html">Product 1</a>
                            <a href="./product2.html">Product 2</a>
                            <a href="./product3.html">Product 3</a>
                            <a href="./product4.html">Product 4</a>
                            <a href="./product5.html">Product 5</a>
                            <a href="./product6.html">Product 6</a>
                        </div>
                        <div style="width: 50%;">
                            <a href="./product7.html">Product 7</a>
                            <a href="./product8.html">Product 8</a>
                            <a href="./product9.html">Product 9</a>
                            <a href="./product10.html">Product 10</a>
                            <a href="./product11.html">Product 11</a>
                            <a href="./product12.html">Product 12</a>
                        </div>
                    </div>
                </div>
                <div>
                    <h3 style="text-align: center;">Our Services</h3>
                    <div style="display: flex; flex-wrap: wrap; margin-left: 150px;">
                        <div style="width: 50%;">
                            <a href="./service1.html">Service 1</a>
                            <a href="./service2.html">Service 2</a>
                            <a href="./service3.html">Service 3</a>
                            <a href="./service4.html">Service 4</a>
                        </div>
                        <div style="width: 50%;">
                            <a href="./service5.html">Service 5</a>
                            <a href="./service6.html">Service 6</a>
                            <a href="./service7.html">Service 7</a>
                            <a href="./service8.html">Service 8</a>
                        </div>
                    </div>
                </div>
                <h3 style="color: rgb(0, 0, 0); margin-left: 38%;">Follow Us On :</h3>
                <div class="social-icons" style="margin-top: 15px; margin-left: 180px; display: flex; flex-direction: row;">
                    <a href="https://wa.me" target="_blank"><img src="whatsapp-icon.png" alt="WhatsApp Icon"></a> 
                    <a href="https://instagram.com" target="_blank"><img src="instagram-icon.png" alt="Instagram Icon"></a>
                    <a href="https://twitter.com" target="_blank"><img src="twitter-icon.png" alt="Twitter Icon"></a>
                    <a href="https://linkedin.com" target="_blank"><img src="linkedin-icon.png" alt="LinkedIn Icon"></a>
                    <a href="https://facebook.com" target="_blank"><img src="facebook-icon.png" alt="Facebook Icon"></a>
                    <a href="https://pinterest.com" target="_blank"><img src="pinterest-icon.png" alt="Pinterest Icon"></a>
                </div>
            </div>
        </div>
        <script> window.addEventListener('load', function() {
            document.body.classList.remove('loading');
            document.getElementById('loader').style.display = 'none';
        });</script>
        <script src="product1.js"></script>
    </body>
</html>