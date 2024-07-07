<?php
include "test.php";
session_start(); // Start the session
$host = "localhost";
$user = "root";
$password = "";
$db = "shifa_db";

$data = mysqli_connect($host, $user, $password, $db);
if ($data === false) {
    die("Connection error: " . mysqli_connect_error());
}

$login_error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM signup WHERE email = ? AND password = ?";
    $stmt = mysqli_prepare($data, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_array($result)) {
        $_SESSION["loggedin"] = true; // Set the session variable
        $_SESSION["email"] = $email;
        if ($row["usertype"] == "user") {
            header("Location: index.php");
            exit();
        } else if ($row["usertype"] == "admin") {
            header("Location: allview.php");
            exit();
        }
    } else {
        $login_error = true;
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($data);
?>
 <?php
session_start();

if(isset($_SESSION["email"])){
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shifa Properties</title>
  <link rel="icon" type="image/x-icon" href="./Images/logo.jpeg">
  <link rel="stylesheet" href="./Style_sheets/stylesignin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script>
    function showAlert() {
        alert("User not found. Please sign up first.");
        window.location.href = 'signup.php';
    }
  </script>
</head>
<body>
<?php 
  include("header.php");
  ?>
  <div class="container" style="background-image: url(./Images/Designer.jpg);">
    <div class="facebook-page">
        <div class="text">
            <h1>Shifa Properties</h1>
            <p>Where Dreams Come True.</p>
        </div>
        <form action="#" method="post">
          <div>
            <input name="email" type="email" placeholder="Email address" required>
            <!-- <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i> -->
                <!-- <small>Error Message</small> -->
                </div>
                <div>      
            <input name="password" type="password" placeholder="Password" required>
            <!-- <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i> -->
                <!-- <small>Error Message</small> -->
                </div>    
            <button name="submit" class="login" type="submit">Log In</button>
            <br><br><br><hr>
            <button class="create-account" ><a href="signup.php" target="_blank"> Create new account</a></button>
        </form>
        <?php
        if ($login_error) {
            echo '<script type="text/javascript">',
                 'showAlert();',
                 '</script>';
        }
        ?>
    </div>
</div>

<footer class="footer">
    <div class="container-footer">
        <div class="row"> 
            <div class="footer-col">
                <img src="./Images/logo.jpeg" alt="">
            </div>
            <div class="footer-col">
                <h4>Contact US</h4>
                <ul>
                    <li>Dear Valued Customers for your Complaints & Suggestions Reach Us at Our Following Contact Details</li>
                    <li><i class="fa fa-phone" style="padding-right:5px"></i><a href="tel:+92 321 9477568"></a> +92 321 9477568 </li>
                    <li><i class="fa fa-envelope" style="padding-right:5px"></i><a  href="mailto:shifapropertiesdhalahore@gmail.com">shifapropertiesdhalahore@gmail.com</a></li>                        
                </ul>
            </div>     
            <div class="footer-col">
                <h4>Company</h4>
                <ul>
                    <li><a href="index.php" target="_blank">Home</a></li>
                    <li><a href="Properties.php" target="_blank">Properties</a></li>
                    <li><a href="About Us.php" target="_blank">About Us</a></li>
                    <li><a href="contactus.php" target="_blank">Contact</a></li>
                    <li><a href="Signin.php" target="_blank">Sign In</a></li>
                    <li><a href="termsandconditions.php" target="_blank">Terms and Conditions</a></li>
                    <li><a href="privacypolicy.php" target="_blank">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Follow US</h4>
                <ul>
                    <li><i class="fa fa-facebook-f" style="padding-right:5px"></i><a href="https://www.facebook.com/Shifaproperties?mibextid=ZbWKwL" target="_blank">Facebook</a></li>
                    <li><i class="fa fa-twitter" style="padding-right:5px"></i><a href="#">Twitter</a></li>
                    <li><i class="fa fa-instagram" style="padding-right:5px"></i><a href="https://www.instagram.com/dhalahoreshifa?igsh=dnJ5cWE1eWptazl3" target="_blank">Instagram</a></li>
                    <li><i class="fa fa-linkedin-square" style="padding-right:5px"></i><a href="https://www.linkedin.com/in/shifa-properties-94356a27a?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank">LinkedIn</a></li>
                </ul>    
            </div>
        </div>
        <center>
            <p style="color:white;">&copy; 2024 Shifa Properties. All rights reserved.</p>
        </center>
    </footer>
</body>
</html>
