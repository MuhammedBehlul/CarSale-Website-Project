<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db_config.php';
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $username = $_POST["username"];
    $password= $_POST["password"];
    $sql = "SELECT * FROM users WHERE username= '".$username."' AND password = '".$password."' ";

    $result = mysqli_query($conn,$sql);

    if (mysqli_num_rows($result) > 0)
    {   session_start(); // if rows match start session
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit();}
    else
    {header("Refresh:0");}
    $conn->close();
    }

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
    <title>Login</title>
</head>

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
        function makeLogin(){
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            if (username !== "" && password !== "")
            {
                document.getElementById("logform").submit();
            }
            else{alert("Please enter username and password")}
        }
         //check if password is okay
         function validate() {
            var a = document.getElementById('password').value;
            var b = document.getElementById('repeat').value;
            if (a !== b) {
                document.getElementById('ismatching').innerText = "Passwords do not match";
            }
            else if (a.length < 8)
            {document.getElementById('ismatching').innerText = "Password must be at least 8 characters";}
            else {
                document.getElementById('ismatching').innerText = "";
               
            }
        }
    </script>
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
                <a href="indexShop.php">Cars</a>
                <div class="dropdown-content">
                    <a href="#">BMW</a>
                    <a href="#">Mercedes</a>
                    <a href="#">Audi</a>
                    <!-- Add more car brands here -->
                </div>
            </li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        
    </div>
    <nav class="slide-nav-bar" id="sidebar">
        <span class="material-symbols-outlined toggle-bar" onclick="toggleNav()">
            close
        </span>
        <h1><img style="width: 75px; height: 75px; border-radius:50%; margin: 10px 30px;"
                src="Images/cardotcomlogo1.jpeg" alt="LOGO"></h1>
        <ul>
            <li><a href="#">Home</a></li>
            <li>
                <a href="indexShop.php">Cars</a>
                <div class="dropdown-content">
                    <a href="#">BMW</a>
                    <a href="#">Mercedes</a>
                    <a href="#">Audi</a>
                    <!-- Add more car brands here -->
                </div>
            </li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>
    <main>
        <div class="wrap">
            <h2 style="color:whitesmoke"> LOG IN</h2>
            <form action="login.php" id="logform" method="post">
                <div class="formstuff">
                    <input type="text" name="username" id="username" placeholder="Username">
                </div>
                <div class="formstuff">
      <input type="password" id="password" name="password" placeholder="Password">
                </div> 
                <div class="formstuff">
                    <button type="button" onclick="makeLogin()">Log in</button>
                </div> 
            </form>
            <div class="formstuff" style="color:aliceblue">
               Don't have an account? <a style="text-decoration:none; color:blueviolet; font-size:18px" href="register.php"> Register</a> </div>
        </div>
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

</body>
</html>

