<?php session_start();
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
    <title>CarDotCom</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poetsen One", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: white;
        }

        .menu-and-logo {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 175px;
        }

        .nav-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #2405F2;
            color: white;
            padding: 10px 20px;
        }

        .nav-bar h1 {
            font-size: 1.5rem;
        }

        .nav-bar ul {
            display: flex;
            justify-content: space-between;
            list-style: none;
            width: 50%;
        }

        .nav-bar li {
            position: relative;
        }

        .nav-bar li a {
            text-decoration: none;
            font-weight: 700;
            color: white;
            position: relative;
            display: block;
            padding: 0 15px;
            font-size:1.3rem;
        }

        .nav-bar li a:hover {
            color: #0D0D0D;
        }

        .nav-bar li .dropdown-content {
            display: none;
            position: absolute;
            background-color: black;
            min-width: 160px;
            z-index: 2;
            margin-top: 0px;
        }

        .nav-bar li:hover .dropdown-content {
            display: block;
        }

        .nav-bar li .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .nav-bar li .dropdown-content a:hover {
            background-color: #0D0D0D;
        }

        .menu-bar {
            order: -1;
            cursor: pointer;
        }

        .logo-2 {
            width: 75px;
            height: 75px;
            border-radius: 50%;
        }

        .slide-nav-bar {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            background-color: #2405F2;
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: -250px;
            transition: left 0.5s ease;
        }

        .slide-nav-bar h1 {
            font-size: 2rem;
            margin: 20px;
        }

        .slide-nav-bar ul {
            list-style: none;
            padding: 0px 50px;
            width: 100%;
        }

        .slide-nav-bar li {
            display: block;
            padding: 10px 0;
            position: relative;
        }

        .slide-nav-bar li a {
            color: white;
            text-decoration: none;
            font-size: 1.5rem;
        }

        .slide-nav-bar li a:hover {
            color: #0D0D0D;
        }

        .slide-nav-bar li .dropdown-content {
            display: none;
            position: absolute;
            background-color: black;
            min-width: 160px;
            left: 100%;
            top: 0;
            z-index: 1;
        }

        .slide-nav-bar li:hover .dropdown-content {
            display: block;
        }

        .slide-nav-bar li .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .slide-nav-bar li .dropdown-content a:hover {
            background-color: #0D0D0D;
        }

        .material-symbols-outlined {
            font-variation-settings:
                'FILL' 0,
                'wght' 400,
                'GRAD' 0,
                'opsz' 24;
        }

        .toggle-bar {
            font-size: 2rem;
            cursor: pointer;
            color: #034AA6;
            padding: 10px 20px;
            background-color: white;
            border-radius: 2px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .toggle-bar:hover {
            background-color: #0583F2;
            color: white;
        }

        button {
            background-color: #ffffff;
            color: #0048F0;
            font-weight: 700;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 20px;
        }

        button:hover {
            background-color: black;
            color: white;
            transition: 0.5 ease-in-out;
        }

        .car-container {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .car {
            width: 25%;
            margin: 10px;
            background-color: #f4f4f4;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
        }

        .car:hover {
            transform: scale(1.03);
        }

        .car img {
            width: 100%;
            height: auto;
        }

        .car-info {
            padding: 20px;
            text-align: center;
        }

        .car-info h2 {
            margin-bottom: 10px;
            font-size: 20px;
        }

        .car-info p {
            font-size: 18px;
            color: #333;
        }

        @media only screen and (max-width: 612px) {
            .nav-bar {
                display: flex;
            }

            .nav-bar ul {
                display: none;
            }

            .menu-bar {
                margin-right: 0;
            }

            .logo-2 {
                margin-left: 0;
            }

            button {
                margin-right: 0;
            }
        }
    </style>
</head>

<body>
    <div class="nav-bar">
        <div class="menu-and-logo">
            <span class="material-symbols-outlined toggle-bar menu-bar" onclick="toggleNav()">menu</span>
            <a href="index.php"><img class="logo-2" src="Images/cardotcomlogo1.jpeg" alt=""></a>
        </div>
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
        </ul> <?php
        if (isset($_SESSION['username'])) 
        { print '<a href="account.php"><button> ACCOUNT </button> </a> <a href="logout.php"><button> LOGOUT </button> </a>'; }
        else {print'<a href= "login.php"> <button> LOGIN </button> </a> <a href= "register.php"> <button> SIGN UP </button> </a>';}
        ?>
    </div>

    <div class="car-container">
        <div class="car">
            <a href="indexBMW.php"> <img src="Images\BMW.svg.png" alt="BMW"></a>
            <div class="car-info">
                <h2>BMW</h2>
            </div>
        </div>
        <div class="car">
            <a href="indexMerc.php"> <img src="Images\mercedes.jpeg" alt="Mercedes"></a>
            <div class="car-info">
                <h2>Mercedes</h2>
            </div>
        </div>
        
        <div class="car">
            <a href="indexAudi.php"> <img src="Images\audi.png" alt="Audi"></a>
            <div class="car-info">
                <h2>Audi</h2>
            </div>
        </div>
    </div>

    <nav class="slide-nav-bar" id="sidebar">
        <span class="material-symbols-outlined toggle-bar" onclick="toggleNav()">close</span>
        <h1><img style="width: 75px; height: 75px; border-radius:50%; margin: 10px 30px;"
                src="Images/cardotcomlogo1.jpeg" alt="LOGO"></h1>
        <ul>
            <li><a href="#">Home</a></li>
            <li>
                <a href="indexShop.php">Cars</a>
                <div class="dropdown-content">
                    <a href="indexBMW.php">BMW</a>
                    <a href="indexMerc.php">Mercedes</a>
                    <a href="indexAudi.phps">Audi</a>
                </div>
            </li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>


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


    </script>
</body>

</html>