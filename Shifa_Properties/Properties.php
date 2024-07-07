<?php
session_start();
?>

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
    .signin-prompt {
      color: red;
      font-weight: bold;
    }
  </style>
</head>
<body>
<?php 
  include("header.php");
  ?>
  <div class="heading">
    <h1>Property For Sale</h1>
  </div>
  <div class="property-start">
    <center><h2>Featured Properties</h2></center>
  </div>
  <section id="menu" class="properties">
    <?php
    $properties = [
      ["img" => "./Images/p2.jpeg", "name" => "Phase-6 CCA-2", "plot" => "279", "size" => "4 Marla", "price" => "625000", "id" => 1],
      ["img" => "./Images/p3.jpeg", "name" => "Phase-5 CCA-1", "plot" => "102", "size" => "5 Marla", "price" => "550000", "id" => 2],
      ["img" => "./Images/p4.jpeg", "name" => "Phase-7 CCA-3", "plot" => "57", "size" => "8 Marla", "price" => "750000", "id" => 3],
      ["img" => "./Images/p5.jpeg", "name" => "Phase-8 CCA-4", "plot" => "88", "size" => "10 Marla", "price" => "850000", "id" => 4],
      ["img" => "./Images/p6.jpeg", "name" => "Phase-9 CCA-5", "plot" => "200", "size" => "12 Marla", "price" => "950000", "id" => 5],
      ["img" => "./Images/p7.jpeg", "name" => "Phase-10 CCA-6", "plot" => "300", "size" => "15 Marla", "price" => "1050000", "id" => 6]
    ];

    foreach ($properties as $property) {
        echo '<div class="property">';
        echo '<img src="' . $property["img"] . '" alt="Property">';
        echo '<h6>' . $property["name"] . '</h6>';
        echo 'Plot #' . $property["plot"] . '<br>';
        echo $property["size"] . '<br>';
        // echo 'Near To Park<br>';
        echo '<span>Rs ' . $property["price"] . '</span><br>';
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            echo '<button data-id="' . $property["id"] . '" data-name="' . $property["name"] . '" data-plot="' . $property["plot"] . '" data-size="' . $property["size"] . '" data-price="' . $property["price"] . '" data-image="' . $property["img"] . '">Buy Now</button>';
        } else {
            echo '<p class="signin-prompt">Please sign in first to buy this property.</p>';
        }
        echo '</div>';
    }
    ?>
  </section>
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
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const buyNowButtons = document.querySelectorAll("button");

      buyNowButtons.forEach(button => {
        button.addEventListener("click", (event) => {
          const property = event.target;
          const id = property.dataset.id;
          const name = property.dataset.name;
          const plot = property.dataset.plot;
          const size = property.dataset.size;
          const price = property.dataset.price;
          const image = property.dataset.image;

          const form = document.createElement('form');
          form.method = 'POST';
          form.action = 'addtocart.php';

          form.appendChild(createHiddenInput('id', id));
          form.appendChild(createHiddenInput('name', name));
          form.appendChild(createHiddenInput('plot', plot));
          form.appendChild(createHiddenInput('size', size));
          form.appendChild(createHiddenInput('price', price));
          form.appendChild(createHiddenInput('image', image));

          document.body.appendChild(form);
          form.submit();
        });
      });

      function createHiddenInput(name, value) {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = name;
        input.value = value;
        return input;
      }
    });
  </script>
</body>
</html>
