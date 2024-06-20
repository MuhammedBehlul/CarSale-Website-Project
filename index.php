<?php 
session_start();
?>
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
        <div class="welcome-page">
            <div class="left-content">
                <div class="brand-main-h1">
                    <h1>CarDotCom</h1>
                    <p>Find the best cars here</p>
                </div>
            </div>
            <div class="right-content">
                <div class="brand-container">
                    <div class="brand">
                        <img src="Images/BMW.svg.png" alt="">
                        <h2>BMW</h2>
                    </div>
                    <div class="brand">
                        <img src="Images/mercedes.jpeg" alt="">
                        <h2>Mercedes</h2>
                    </div>
                    <div class="brand">
                        <img src="Images/audi.png" alt="">
                        <h2>Audi</h2>
                    </div>
                </div>
                <div class="shop-button">
                    <a href="indexShop.php"><button>Shop Now</button></a>
                </div>
            </div>
        </div>
    </main>

    <section class="info-section">
        <div class="info-container">
            <div class="info-text">
                <h2>BMW</h2>
                <p>BMW, Bayerische Motoren Werke AG, is a German multinational company which produces luxury vehicles
                    and motorcycles. BMW is headquartered in Munich, Bavaria, Germany.</p>
                <p>The company was founded in 1916 as a manufacturer of aircraft engines, which it produced from 1917
                    until 1918 and again from 1933 to 1945.</p>
            </div>

            <div class="info-image">
                <img src="Images/bmwexample.jpg" alt="BMW Example Image">
            </div>
        </div>
    </section>

    <section class="info-section">
        <div class="info-container">
            <div class="info-image">
                <img src="Images/mercedesexample.jpg" alt="">
            </div>
            <div class="info-text">
                <h2>Mercedes-Benz</h2>
                <p>Mercedes-Benz is a German global automobile marque and a division of Daimler AG. The brand is known
                    for luxury vehicles, buses, coaches, and trucks.</p>
                <p>The headquarters is in Stuttgart, Baden-Württemberg. The name first appeared in 1926 under
                    Daimler-Benz.</p>
            </div>

        </div>
    </section>

    <section class="info-section">
        <div class="info-container">
            <div class="info-text">
                <h2>Audi</h2>
                <p>Audi AG is a German automobile manufacturer that designs, engineers, produces, markets, and
                    distributes luxury vehicles. Audi is a member of the Volkswagen Group and has its roots at
                    Ingolstadt, Bavaria, Germany.</p>
                <p>Audi-branded vehicles are produced in nine production facilities worldwide.</p>
            </div>

            <div class="info-image">
                <img src="Images/audiexample.webp" alt="Audi Example IMAGE">
            </div>
        </div>
    </section>




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
        navBar.style.display = "flex"; 
    }
}

        function toggleCarsDisplay() {
            var carContainer = document.querySelector('.car-container');
            carContainer.classList.toggle('active');
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