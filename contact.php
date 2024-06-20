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
    <title>CarDotCom</title>

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
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>
    <main>
        <section class="contact-section">
            <div class="container">
                <h2>Contact Us</h2>
                <p>If you have any questions, feedback, or inquiries, feel free to get in touch with us using the
                    contact form below or through our contact details.</p>

                <form action="#" method="POST" class="contact-form">
                    <input type="text" name="name" placeholder="Your Name" required>
                    <input type="email" name="email" placeholder="Your Email"required>
                    <textarea name="message" placeholder="Your Message" required></textarea>
                    <button type="submit">Send Message</button>
                </form>
            </div>
        </section>
    </main>





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

</body>

</html>