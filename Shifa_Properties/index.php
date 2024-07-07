<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shifa Properties</title>
  <link rel="icon" type="image/x-icon" href="./Images/logo.jpeg">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./Style_sheets/styles.css">
  <style>
    /* floating button */
.floating-button {
  position: absolute;
  background-color: #790e0e;
  color: white;
  border: none;
  border-radius: 50%;
  width: 56px;
  height: 56px;
  font-size: 24px;
  display: flex;
  justify-content: center;
  align-items: center;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
  cursor: pointer;
  transition: transform 0.1s ease-out;
  text-decoration: none;
}
  </style>
</head>
<body>
  
  <?php 
  include("header.php");
  ?>
  <section id="home" class="hero">
    <div class="hero-content">
      <div class="text">
      <h1>Welcome to Shifa Properties ®</h1>
      <p>
        Find your dream Property with Shifa Properties®. <br>
        We specialize in helping you buy or sell property<br>in all Pakistan and surrounding areas.
      </p>
      </div>
      <img src="./Images/buliding.jpg">
    </div>
  </section>
  <section id="all" class="all-process">
    <div class="sell-property">
        <img src="./Images/buyproperty.jpg" alt="buy-house">
      <div class="heading-all">
        <h3>Buy a Property</h3>
      </div>
      <div class="parasell"> 
        <p>Invest in your happiness.</p>
        <p>Buy a property you love</p>
      </div>
      <div class="button-all">
        <a href="Properties.php">Find Properties</a>
      </div>
    </div>
    <div class="sell-property">
      <div class="Pic">
        <img src="./Images/selling.jpg" alt="sell-house">
      </div>
      <div class="heading-all">
        <h3>Sell a Property</h3>
      </div>
      <div class="parasell">
        <p>Get The Best Value</p>
        <p>For Your Property</p>
      </div>
      <div class="button-all">
        <a href="sell_property.php">Add Details</a>
      </div>
    </div>

  </section>
  <section style="background-color: #790e0e;" id="about" class="about-us">
    <h2>About Us</h2>
    <p>Welcome to Shifa Properties, your trusted partner in real estate. With a commitment to integrity and excellence, we specialize in helping clients find their ideal homes and investment properties. Our dedicated team of professionals combines expertise with personalized service to ensure a seamless and rewarding experience for every client. At Shifa Properties, we're here to turn your real estate goals into reality.</p><br>
    <center><a style="color: white;" href="About Us.php">Read More</a></center>
</section>
  <section class="contact-us">
    <h2>Contact Us</h2>
    <p>Have any questions about buying, selling, or investing in real estate? Our friendly and knowledgeable team at Shifa Properties® is here to help.  Contact us today to discuss your needs and get started on your real estate journey.</p>
    <center><a style=" color: white;" href="contactus.php">Futher Details</a></center>
  </section>
  <script src="script.js"></script>

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
