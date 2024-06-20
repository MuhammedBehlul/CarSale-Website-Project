<?php
session_start();
include 'db_config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['purchase'])) {
   
    
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    $username = $_SESSION['username'];
    $color = $_POST['color'];
    $engine = $_POST['engine'];
    $seat = $_POST['seats'];
    $carbonfiber = $_POST['cc'];
    $wheels = $_POST['sport'];
    $time = date('Y-m-d H:i:s');

    $sql = "INSERT INTO purchased_cars (username, color, engine, seat, carbonfiber, wheels, purchasedate, brand, model) 
            VALUES ('$username', '$color', '$engine', '$seat', '$carbonfiber', '$wheels', '$time', 'BMW', 'i5')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php");
        exit();}
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
    <title>CarDotCom</title>
    <link rel="stylesheet" href="style1.css" />

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
            font-size:1.3rem;
            display: block;
            padding: 0 15px;
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
            <li><a href="#">Home</a></li>
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

    <div class="container">
        <div class="car-picture" id="car-picture">
           
            <img src="Images/i5blue.jpg" alt="Car Image">
        </div>
        <div class="customization-form">
            <h2>Customize Your Car</h2>
            <form method="post" action="carsbmw1.php">
                <label for="color">Choose a Color:</label>
                <select id="color" name="color">
                    <option value="blue">Blue</option>
                    <option value="red">Red</option>
                    <option value="black">Black</option>
                   
                </select>
                <label>Choose Engine:</label>
                <label for="v6"><input type="radio" id="v6" name="engine" value="v6" checked> V6</label>
                <label for="v8"><input type="radio" id="v8" name="engine" value="v8"> V8 (+$20,000)</label>

                <label for="seats"><input type="checkbox" id="seats" name="seats" value="seats"> Massaging Seats (+$2,000)</label>
                <label for="Sport"><input type="checkbox" id="sport" name="sport" value="sport"> Sport Wheels (+$1,000 per wheel)</label>
                <label for="cc"><input type="checkbox" id="cc" name="cc" value="cc">Carbon Fiber ($10,000) </label>
                <input type="submit" value="Purchase" name="purchase">


            </form>

            <div id="price-tag">Base Price: $70,000</div>
        </div>
    </div>

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

        document.addEventListener('DOMContentLoaded', function() {
    const carPicture = document.getElementById('car-picture');
    const colorSelect = document.getElementById('color');
    const engineV8 = document.getElementById('v8');
  
    const massagingSeats = document.getElementById('seats');
    const sportWheels = document.getElementById('sport');
    const priceTag = document.getElementById('price-tag');
    const cc = document.getElementById('cc');

   
    function changeCarPicture() {
        const selectedColor = colorSelect.value;
        let carImageSrc = "";

       
        if (selectedColor === "red") {
            carImageSrc ="Images/i5red.jpg" ;
        } else if (selectedColor === "blue") {
            carImageSrc = "Images/i5blue.jpg" ;
        } else if (selectedColor === "black") {
            carImageSrc = "Images/i5black.jpg" ;
        }
        
        
        carPicture.innerHTML = `<img src="${carImageSrc}" alt="Car Image">`;
    }

    
    colorSelect.addEventListener('change', changeCarPicture);

    let basePrice = 70000;

function calculatePrice() {
    let totalPrice = basePrice;


    if (engineV8.checked) {
        totalPrice += 20000;
    }
   

    

    
    if (massagingSeats.checked) {
        totalPrice += 2000;
    }

    
    if (sportWheels.checked) {
        totalPrice += 4000; 
    }

    if(cc.checked){
        totalPrice+=10000;
    }

  
    priceTag.textContent = `Total Price: $${totalPrice}`;
}


engineV8.addEventListener('change', calculatePrice);



massagingSeats.addEventListener('change', calculatePrice);
sportWheels.addEventListener('change', calculatePrice);
cc.addEventListener('change',calculatePrice);


calculatePrice();
});


        
    </script>
</body>

</html>