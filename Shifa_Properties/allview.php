<style>
    header {
  background-color: #790e0e;
  padding: 10px;
  display: flex;
  color: #fff;
  justify-content: space-between;
  align-items: center;

}
header img{
  max-width: 100%;
  max-height: 100%;
  width: 9%;
  padding-right: 20px;
  height: 4%;
}
header .main{
  display: flex;
  align-items: center;
}
header h1 {
  margin: 0;
  font-family: 'Times New Roman', Times, serif;
  color: white;
}

nav ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

nav ul li {
  display: inline;
  /* margin-right: 20px; */
}

nav ul li a {
  text-decoration: none;
  color: white;
  font-weight: bolder;
  padding: 0px 10px 0px 10px;
}
nav ul li a:hover {
  text-decoration: underline;
}
nav ul li a img{
  width: 30px;
  height: 30px;
}

    body{
        
    }
   button {
    margin-top:80px;
margin-left:150px;
margin-bottom:140px;
    justify-content: center;
        align-items: center;
  background-color: black;
  border: none;
  padding: 15px 15px 15px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
    a{
        color: white;

        text-decoration : none;
    }
    .footer {
  background-color: #790e0e;
  padding: 20px 0;
}

.container-footer {
  max-width: 1100px;
  margin: auto;
  padding: 0 20px;
}

.row {
  display: flex;
  justify-content: space-evenly;
  align-items: flex-start;
  flex-wrap: nowrap;
}

.footer-col {
  flex: 1;
  min-width: 0; /* Ensure flex items shrink if needed */
  margin: 0 5px; /* Adjust the margins as needed */
  color: white;
  padding-right: 20px;
}

.footer-col img {
  margin-top: 50px;
  margin-right: 500px;
  max-width: 100%;
  max-height: 100%;
  width: 60%;
  height: 60%;
}

ul {
  color: white;
}

.footer-col h4 {
  font-size: 18px;
  color: white;
  text-transform: capitalize;
  margin-bottom: 30px;
  font-weight: 500;
  position: relative;
}

.footer-col ul {
  padding: 0;
  list-style: none;
}

.footer-col ul li {
  margin-bottom: 10px;
}

.footer-col ul li a {
  font-size: small;
  text-decoration: none;
  color: white;
  text-transform: capitalize;
  font-weight: 300;
  transition: all 0.4s ease;
}

.footer-col ul li a:hover {
  padding-left: 10px;
}

</style>
<?php
session_start();

if(!isset($_SESSION["email"])){
    header("location:Signin.php");
}
?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shifa Properties</title>
  <link rel="icon" type="image/x-icon" href="./Images/logo.jpeg">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- <link rel="stylesheet" href="./Style_sheets/styles.css"> -->
</head>  
<?php
include("header.php");
?>
<body>
  <button><a href="viewprop.php">To View Sell Properties Data</a></button>
  <button><a href="view.php">To View User Data</a></button>
  <button><a href="viewcon.php">To View Contact US Data</a></button>
  <button><a href="viewcart.php">To View Buyer's Data</a></button>

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
