<?php
$id = isset($_POST['id']) ? $_POST['id'] : '';
$name = isset($_POST['name']) ? $_POST['name'] : '';
$plot = isset($_POST['plot']) ? $_POST['plot'] : '';
$size = isset($_POST['size']) ? $_POST['size'] : '';
$price = isset($_POST['price']) ? $_POST['price'] : '';
$image = isset($_POST['image']) ? $_POST['image'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="./Images/logo.jpeg">
  <title>Cart</title>
  <link rel="stylesheet" href="./Style_sheets/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    .checkout-form {
      background-color: black;
      max-width: 600px;
      margin: auto;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      border-radius: 5px;
      margin-top: 70px;
      margin-bottom: 20px;
    }
    .checkout-form h2 {
      text-align: center;
      margin-bottom: 20px;
      color: white;
    }
    .checkout-form label {
      display: block;
      margin-bottom: 10px;
      color: white;
    }
    .checkout-form input[type="text"],
    .checkout-form input[type="email"] {
      width: calc(100% - 20px);
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
    }
    .checkout-form input[type="submit"] {
      background-color: #790e0e;
      color: #fff;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      border-radius: 5px;
      transition: background-color 0.3s ease;
      font-size: 16px;
    }
    .checkout-form input[type="submit"]:hover {
      background-color: #621010;
    }
  </style>
  <script>
    window.onload = function() {
      const urlParams = new URLSearchParams(window.location.search);
      if (urlParams.has('success')) {
        alert("Your details have been saved. We will contact you soon.");
        window.location.href = 'index.php';
      }
    }
  </script>
</head>
<body>
  <?php include("header.php"); ?>
  <div class="heading">
    <h1>Your Cart</h1>
  </div>
  <div class="addtocartmain">
    <center>
      <section class="cart-details">
        <div class="property">
          <img src="<?php echo htmlspecialchars($image); ?>" alt="Property Image">
          <h6><?php echo htmlspecialchars($name); ?></h6>
          Plot #<?php echo htmlspecialchars($plot); ?><br>
          <?php echo htmlspecialchars($size); ?><br>
          <span>Rs <?php echo htmlspecialchars($price); ?></span><br>
        </div>
      </section>
    </center>
    <section class="checkout-form">
      <h2>Checkout Form</h2>
      <form action="submit_order.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="contactnumber">Contact Number:</label>
        <input type="text" id="contactnumber" name="contactnumber" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <input type="hidden" name="property_name" value="<?php echo htmlspecialchars($name); ?>">
        <input type="hidden" name="plot" value="<?php echo htmlspecialchars($plot); ?>">
        <input type="hidden" name="size" value="<?php echo htmlspecialchars($size); ?>">
        <input type="hidden" name="price" value="<?php echo htmlspecialchars($price); ?>">
        <input type="submit" value="Submit Order">
      </form>
    </section>
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
