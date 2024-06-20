<?php
session_start();
//check login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();}
    include 'db_config.php';
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
$username = $_SESSION['username'];
$sql = "SELECT * FROM purchased_cars WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

mysqli_close($conn);
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
    <title>Inventory</title>
    
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
    <main style="background-image:url('Images/MainPage2.jpg')">
        < class="sar">
            <div class="inv">
               

                
                <table>
                <thead>
                    <tr>
                        <?php  echo '<th class="invh" colspan="3" style="font-size:28px; color:aliceblue;">' .$username . "'".  "s Garage</th>" ?>
                    </tr>
            </thead> 
                <tbody>
                <?php
                        if (mysqli_num_rows($result) > 0) {
                            
                            $imgl = "";
                            $count = 0;
                            
                            while ($row = mysqli_fetch_assoc($result)) {
                                if ($count %3 == 0) {
                                    echo "<tr>";}
                               
                                if($row["model"] == "etron" && $row["color"] == "blue")//korkunc kod
                                {$imgl= "Images/etronblue.jpg";}
                                else if($row["model"] == "etron" && $row["color"] == "black")
                                {$imgl= "Images/etronblack.jpg";}
                                else if($row["model"] == "etron" && $row["color"] == "red")
                                {$imgl= "Images/etronred.jpg";}
                                else if($row["model"] == "R8" && $row["color"] == "blue")
                                {$imgl= "Images/r8blue.jpg";}
                                else if($row["model"] == "R8" && $row["color"] == "black")
                                {$imgl= "Images/r8black.jpg";}
                                else if($row["model"] == "R8" && $row["color"] == "red")
                                {$imgl= "Images/r8red.jpg";}
                                else if($row["model"] == "Q3" && $row["color"] == "blue")
                                {$imgl= "Images/q3blue.jpg";}
                                else if($row["model"] == "Q3" && $row["color"] == "black")
                                {$imgl= "Images/q3black.jpg";}
                                else if($row["model"] == "Q3" && $row["color"] == "red")
                                {$imgl= "Images/q3red.jpg";}
                                else if($row["model"] == "A7" && $row["color"] == "blue")
                                {$imgl= "Images/a7blue.jpg";}
                                else if($row["model"] == "A7" && $row["color"] == "black")
                                {$imgl= "Images/a7black.jpg";}
                                else if($row["model"] == "A7" && $row["color"] == "red")
                                {$imgl= "Images/a7red.jpg";}
                                else if($row["model"] == "G" && $row["color"] == "black")
                                {$imgl= "Images/blackg1.jpg";}
                                else if($row["model"] == "G" && $row["color"] == "blue")
                                {$imgl= "Images/blueg1.jpg";}
                                else if($row["model"] == "G" && $row["color"] == "red")
                                {$imgl= "Images/redg.jpg";}
                                else if($row["model"] == "SL" && $row["color"] == "blue")
                                {$imgl= "Images/slblue.png";}
                                else if($row["model"] == "SL" && $row["color"] == "black")
                                {$imgl= "Images/slblack.png";}
                                else if($row["model"] == "SL" && $row["color"] == "red")
                                {$imgl= "Images/slred1.png";}
                                else if($row["model"] == "GTS" && $row["color"] == "blue")
                                {$imgl= "Images/gtsblue.png";}
                                else if($row["model"] == "GTS" && $row["color"] == "black")
                                {$imgl= "Images/gtsblack.png";}
                                else if($row["model"] == "GTS" && $row["color"] == "red")
                                {$imgl= "Images/gtsred.png";}
                                else if($row["model"] == "CLA" && $row["color"] == "blue")
                                {$imgl= "Images/clablue.png";}
                                else if($row["model"] == "CLA" && $row["color"] == "black")
                                {$imgl= "Images/clablack.png";}
                                else if($row["model"] == "CLA" && $row["color"] == "red")
                                {$imgl= "Images/clared.png";}
                                else if($row["model"] == "i5" && $row["color"] == "black")
                                {$imgl= "Images/i5black.jpg";}
                                else if($row["model"] == "i5" && $row["color"] == "blue")
                                {$imgl= "Images/i5blue.jpg";}
                                else if($row["model"] == "i5" && $row["color"] == "red")
                                {$imgl= "Images/i5red.jpg";}
                                else if($row["model"] == "x7" && $row["color"] == "blue")
                                {$imgl= "Images/x7blue.jpg";}
                                else if($row["model"] == "x7" && $row["color"] == "black")
                                {$imgl= "Images/x7black.jpg";}
                                else if($row["model"] == "x7" && $row["color"] == "red")
                                {$imgl= "Images/x7red.jpg";}
                                else if($row["model"] == "i4" && $row["color"] == "blue")
                                {$imgl= "Images/i4blue.jpg";}
                                else if($row["model"] == "i4" && $row["color"] == "black")
                                {$imgl= "Images/i4black.jpg";}
                                else if($row["model"] == "i4" && $row["color"] == "red")
                                {$imgl= "Images/i4red.jpg";}
                                else if($row["model"] == "430i" && $row["color"] == "black")
                                {$imgl= "Images/430black.jpg";}
                                else if($row["model"] == "430i" && $row["color"] == "blue")
                                {$imgl= "Images/430blue.jpg";}
                                else if($row["model"] == "430i" && $row["color"] == "red")
                                {$imgl= "Images/430red.jpg";}
                                //echo "<td> <img src='$imgl' style='width: 120px; height: auto;'></td>";
                                echo "<td> <img src='$imgl' style='width: 290px; height: auto;'>" . "<br>" . $row["brand"] . " " . $row["model"] . "</td>";
                                if ($count %3 == 2) {
                                    echo("</tr>");
                                }
                                $count = $count+1;
                            }
                            
                            
                            }
                         else {
                            echo "<tr><td>No cars found in inventory.</td></tr>";
                        } ?>
                </tbody>
                </table>
            
            </div>
            
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