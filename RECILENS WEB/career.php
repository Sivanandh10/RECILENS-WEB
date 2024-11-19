
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>RECILENS Careers</title>
    <link rel="stylesheet" href="career.css">
    <link rel="stylesheet" href="loader.css">
</head>
<body class="loading" >
    <?php include 'loader.php'; ?>
    <?php include 'nav.php'; ?>
    
    <section id="hero" class="hero-section">
        <h1 style="color: rgb(255, 56, 56);">Unlock Your Potential at RECILENS</h1>
        <p style="color: blue;">Building Tomorrow's Solutions Today</p>
        <p style="color: rgb(104, 109, 65);">At RECILENS, we believe that the future is built on innovation, passion, and collaboration. We’re looking for talented individuals to create cutting-edge solutions.</p>
    </section>

    <section id="careers" class="careers-section">
        <div class="career-card">
            <img src="product.jpg" alt="Career Opportunities">
            <h2>Get Hired</h2>
            <p>RECILENS training and certification platform gives you access to specialized programs to enhance your product knowledge.</p>
            <button>Apply Now</button>
        </div>

        <div class="career-card">
            <img src="service (3).jpg" alt="Get Skilled, Trained, Certified">
            <h2>Get Skilled – Trained – Certified</h2>
            <p>Our platform provides specialized programs and certifications that set you apart from the competition.</p>
            <button><a href="interenship.html"target="_blank" style="text-decoration: none; color: rgb(9, 9, 9);">Kick Start</a></button>
        </div>
    </section>
      <script>
         window.addEventListener('load', function() {
            document.body.classList.remove('loading');
            document.getElementById('loader').style.display = 'none';
        });
      </script>
    <script src="career.js"></script>
</body>
</html>
