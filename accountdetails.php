<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "group4");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $email = $row['email'];
    $current_password_db = $row['password'];
} else {
    echo "User not found.";
    exit();
}

$error_message = "";
$success_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update_general'])) {
        $newUsername = $_POST['new_username'];
        $newEmail = $_POST['new_email'];

        if ($newUsername == $username && $newEmail == $email) {
            
            $success_message = "";
        } else {
            $update_query = "UPDATE users SET username = '$newUsername', email = '$newEmail' WHERE username = '$username'";
            if (mysqli_query($conn, $update_query)) {
                $_SESSION['username'] = $newUsername;
                $success_message = "Account details updated successfully.";
            } else {
                $error_message = "Error updating account details.";
            }
        }
    } elseif (isset($_POST['update_password'])) {
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $repeat_new_password = $_POST['repeat_new_password'];

        if ($current_password == $current_password_db) {
            if (strlen($new_password) < 8) {
                $error_message = "New password must be at least 8 characters.";
            } elseif ($new_password !== $repeat_new_password) {
                $error_message = "New passwords do not match.";
            } else {
                $hashed_password = $new_password;

                $update_query = "UPDATE users SET password = '$hashed_password' WHERE username = '$username'";
                if (mysqli_query($conn, $update_query)) {
                    $success_message = "Password updated successfully.";
                } else {
                    $error_message = "Error updating password.";
                }
            }
        } elseif($current_password==null){
            $error_message="Please enter current password";
        }
        else {
            $error_message = "Current password is incorrect.";
        }
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
<title>Account Details</title>
<script>
    function toggleNav() {
        var sidebar = document.getElementById("sidebar");
        var menuButton = document.querySelector('.toggle-bar');
        if (sidebar.style.left === "-250px") {
            sidebar.style.left = "0";
            menuButton.textContent = "close";
        } else {
            sidebar.style.left = "-250px";
            menuButton.textContent = "menu";
        }
    }
</script>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poetsen One", sans-serif;
    font-weight: 400;
    font-style: normal;
}
h2{
    color:aliceblue;
}


body {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    background-color: white;
}

main {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100vw;
    min-height: calc(135vh - 160px); 
    padding: 80px 0; 
    background-color: #f0f0f0;
}

.bigdiv {
    width: 50%; 
    background: rgba(60,60,60,0.7);
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.nav-bar {
    display: flex;
    position: fixed;
    width: 100%;
    align-items: center;
    justify-content: space-between;
    background-color: rgba(36, 5, 242);
    backdrop-filter: blur(10px);
    color: white;
    padding: 10px 20px;
    z-index: 1001;
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
}

.nav-bar li a:hover {
    color: #0D0D0D;
}

.menu-bar {
    order: -1;
    cursor: pointer;
}

.slide-nav-bar {
    display: none;
    position: fixed;
    left: -250px;
    top: 0;
    width: 250px;
    height: 100%;
    background-color: rgba(36, 5, 242);
    z-index: 1002;
    transition: left 0.3s ease;
    padding: 10px 20px;
}

.account-details {
    display: flex;
    flex-direction: column;
    margin:1px;
    gap: 20px;
}

.details-section {
    background: #f9f9f9;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
    background-color:rgb(76,88,125);
    color:rgb(200,230,255);
}

.details-section h2 {
    margin-bottom: 10px;
    
}

.details-section p {
    
    margin: 5px 0;
}

button {
    background-color: #0048F0;
    color: white;
    font-weight: 700;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #0036c4;
}

@media (max-width: 768px) {
    .nav-bar ul {
        display: none;
    }

    .menu-bar {
        display: block;
    }

    .slide-nav-bar {
        display: flex;
        left: -250px;
    }

    .nav-bar.active .slide-nav-bar {
        left: 0;
    }
    

    
}
</style>
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
                <a href="indexShop.php">Cars</a>
                <div class="dropdown-content">
                    <a href="#">BMW</a>
                    <a href="#">Mercedes</a>
                    <a href="#">Audi</a>
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
        <h1><img style="width: 75px; height: 75px; border-radius:50%; margin: 10px 30px;" src="Images/cardotcomlogo1.jpeg" alt="LOGO"></h1>
        <ul>
            <li><a href="#">Home</a></li>
            <li>
                <a href="indexShop.php">Cars</a>
                <div class="dropdown-content">
                    <a href="#">BMW</a>
                    <a href="#">Mercedes</a>
                    <a href="#">Audi</a>
                </div>
            </li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>
<main style="background-image: url('Images/MainPage2.jpg')">
    
        <div class="bigdiv">
            <h2 class="account">
                <p style="text-align:justify">Account settings</p>
            </h2>
            <?php if (!empty($error_message)) { ?>
                <div class="alert alert-danger"><?php echo $error_message; ?></div>
            <?php } ?>
            <?php if (!empty($success_message)) { ?>
                <div class="alert alert-success"><?php echo $success_message; ?></div>
            <?php } ?>
            <form method="POST" action="accountdetails.php">
                <div class="account-details">
                    <div class="details-section">
                        <h2>General</h2>
                        <div class="form-group">
                            <label for="new_username" class="form-label">Name</label>
                            <input type="text" class="form-control" id="username" name="new_username" value="<?php echo $username; ?>">
                        </div>
                        <div class="form-group">
                            <label for="new_email" class="form-label">E-mail</label>
                            <input type="email" class="form-control mb-1" id="email" name="new_email" value="<?php echo $email; ?>">
                        </div>
                        <button type="submit" name="update_general" class="btn btn-primary">Save changes</button>
                        <button type="button" onclick="window.location.href='inventory.php'" class="btn btn-primary">See Inventory</button>
                    </div>
                </div>
            </form>
            <form method="POST" action="accountdetails.php">
                <div class="account-details">
                    <div class="details-section">
                        <h2>Change password</h2>
                        <div class="form-group">
                            <label for="current_password" class="form-label">Current password</label>
                            <input type="password" name="current_password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="new_password" class="form-label">New password</label>
                            <input type="password" name="new_password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="repeat_new_password" class="form-label">Repeat new password</label>
                            <input type="password" name="repeat_new_password" class="form-control">
                        </div>
                        <button type="submit" name="update_password" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
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
