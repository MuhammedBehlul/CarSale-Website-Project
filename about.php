<?php 
session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>About CarDotCom</title>
</head>

<body>
    <div class="nav-bar">
        <div class="menu-and-logo">
            <span class="material-symbols-outlined toggle-bar menu-bar" onclick="toggleNav()">
                menu
            </span>
            <a href="index.php"><img class="logo-2" src="Images/cardotcomlogo1.jpeg" alt=""></a>
        </div>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li>
                <a href="#" onclick="toggleCarsDisplay()">Cars</a>
                <div class="dropdown-content">
                    <a href="indexBMW.php">BMW</a>
                    <a href="indexMerc.php">Mercedes</a>
                    <a href="indexAudi.php">Audi</a>
                </div>
            </li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <?php
        if (isset($_SESSION['username'])) 
        { print '<a href="accountdetails.php"><button> ACCOUNT </button> </a> <a href="logout.php"><button> LOGOUT </button> </a>'; }
        else {print'<a href= "login.php"> <button> LOGIN </button> </a> <a href= "register.php"> <button> SIGN UP </button> </a>';}
        ?>
    </div>
    <nav class="slide-nav-bar" id="sidebar">
        <span class="material-symbols-outlined toggle-bar" onclick="toggleNav()">
            close
        </span>
        <h1><img style="width: 75px; height: 75px; border-radius:50%; margin: 10px 30px;"
                src="Images/cardotcomlogo1.jpeg" alt="LOGO"></h1>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li>
                <a href="indexShop.php">Cars</a>
                <div class="dropdown-content">
                    <a href="indexBMW.php">BMW</a>
                    <a href="indexMerc.php">Mercedes</a>
                    <a href="indexAudi.php">Audi</a>
                </div>
            </li>
            <li><a href="aboutt.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>
    <main>
        <section class="about-section">
            <h2>About CarDotCom</h2>
            <p>Welcome to CarDotCom, your ultimate destination for premium automotive experiences. At CarDotCom, we
                believe in providing not just cars, but dreams on wheels. Our journey began with a passion for
                automobiles, and it has evolved into a commitment to delivering excellence in every aspect of the car
                buying process.</p>
            <p>With a curated selection of the finest vehicles from renowned brands like BMW, Mercedes, and Audi, we
                cater to the discerning tastes of our esteemed clientele. Whether you're seeking luxury, performance,
                or innovation, we have the perfect car to complement your lifestyle.</p>
            <p>What sets us apart is our dedication to personalized service. Our team of automotive experts is
                committed to understanding your unique preferences and guiding you towards the car of your dreams. From
                the moment you step into our showroom to the exhilarating first drive in your new vehicle, we ensure a
                seamless and unforgettable experience.</p>
            <p>At CarDotCom, we don't just sell cars; we foster lasting relationships built on trust, integrity, and
                a shared passion for automotive excellence. Join us on this journey as we redefine the art of car
                ownership and make your automotive dreams a reality.</p>
        </section>
    </main>
    <footer>
        <div class="footer-container">
            <div class="footer-info">
                <h3>Contact Us</h3>
                <p>123 Car Street, City Name</p>
                <p>Email: info@cardotcom.com</p>
                <p>Phone: +1 234 567 890</p>
            </div>
            <div class="footer-info">
                <h3>Follow Us</h3>
                <ul class="social-links">
                    <li><a href="#"><img src="Images/facebook-icon.png" alt="Facebook"></a></li>
                    <li><a href="#"><img src="Images/twitter-icon.png" alt="Twitter"></a></li>
                    <li><a href="#"><img src="Images/instagram-icon.jpeg" alt="Instagram"></a></li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2024 CarDotCom. All rights reserved.</p>
        </div>
    </footer>

    <script>
        function toggleNav() {
            var sidebar = document.getElementById("sidebar");
            var menuButton = document.querySelector('.toggle-bar');
            var navBar = document.querySelector('.nav-bar');

            if (sidebar.style.left === "-250px") {
                sidebar.style.left = "0";
                menuButton.textContent = "close";
                navBar.style.display = "none"; // Hide the navigation bar
            } else {
                sidebar.style.left = "-250px";
                menuButton.textContent = "menu";
                navBar.style.display = "flex"; // Ensure the navigation bar remains visible
            }
        }
    </script>
</body>

</html>