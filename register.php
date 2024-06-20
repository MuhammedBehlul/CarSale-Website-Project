<?php
include 'db_config.php';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['uname'];
    $password = $_POST['pword'];
    $email = $_POST['adress']; 
    
    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
    $result = mysqli_query($conn, $sql); 
    if ($result) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $sql . mysqli_error($conn);
    }
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
    <title>Register</title>
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
    
            function makeRegister() {
                    var username = document.getElementById('uname').value;
                    var password = document.getElementById('pword').value;
                    var email = document.getElementById('adress').value;
                    var confirm = document.getElementById('repeat').value;

                    if (document.getElementById('ismatching').innerText !== "") { //only if no error message
                        return;
                    }

                    if (username === "" || password === "" || email === "") { //fill all stuff
                        alert("Please fill all the forms.");
                        return;
                    } else {
                        document.getElementById('regform').submit();
                    }
                }
                function validate() {
                    var a = document.getElementById('pword').value;
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
            <h2 style="color:whitesmoke"> Sign Up</h2>
            <form action="register.php" id="regform" method="post">
            <div class="formstuff">
                <input type="text" name="uname" id="uname" placeholder="Username">
            </div>
            <div class="formstuff">
                <input type="email" name="adress" id="adress" placeholder="Email Adress" required>
            </div> 
            <div class="formstuff">
                <input type="password" id="pword" name="pword" placeholder="Password" oninput="validate()">
            </div> 
            <div class="formstuff">
                <input type="password" id="repeat" name="repeat"  placeholder="Confirm Password" oninput="validate()">
            </div>
            
            <div class="formstuff">
                <br>
                <button type="button" onclick="makeRegister()">Submit</button>
            </div> 

        </form>
        <span style="height:12px;"><p id="ismatching"> </p> </span>
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


