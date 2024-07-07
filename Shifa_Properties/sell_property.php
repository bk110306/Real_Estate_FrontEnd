<?php
session_start(); // Start the session

include "test.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ownerName = $_POST['Owner_Name'];
    $ownerEmail = $_POST['Owner_email'];
    $propertyType = $_POST['property-type'];
    $propertyArea = $_POST['property-area'];
    $propertySize = $_POST['property-size'];
    $propertyLocation = $_POST['property-location'];
    $propertyPrice = $_POST['property-price'];
    $propertyDescription = $_POST['property-description'];
    $propertyCondition = $_POST['property-condition'];

    $sql = "INSERT INTO properties (owner_name, owner_email, property_type, property_area, property_size, property_location, property_price, property_description, property_condition) 
            VALUES ('$ownerName', '$ownerEmail', '$propertyType', '$propertyArea', '$propertySize', '$propertyLocation', '$propertyPrice', '$propertyDescription', '$propertyCondition')";

    if ($conn->query($sql) === TRUE) {
        echo '<script type="text/javascript">
                window.onload = function () { 
                    alert("Thanks For Contacting Shifa Properties! Your data is stored in our system. We will contact you soon.");
                    window.location.href = "index.php"; 
                }
              </script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shifa Properties</title>
    <link rel="icon" type="image/x-icon" href="./Images/logo.jpeg">
    <link rel="stylesheet" href="./Style_sheets/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    </style>
</head>
<body>
<?php 
include("header.php");
?>
    <div class="sell-hero">
        <h1>Upload Your Property Details Here.</h1>
        <h4>Get the best value for your property in a few steps.</h4>
    </div>
    <main>
        <form action="" method="post" class="property-form">
            <div class="form-group">
                <label for="Owner_Name">Owner Name:</label>
                <input type="text" id="Owner_Name" name="Owner_Name" placeholder="Name" required>
            </div>
            <div class="form-group">
                <label for="Owner_email">Owner Email Address :</label>
                <input type="text" id="Owner_email" name="Owner_email" placeholder="abc@gmail.com" required>
            </div>
            <div class="form-group">
                <label for="property-type">Property Type:</label>
                <select id="property-type" name="property-type" required>
                    <option value="">Select</option>
                    <option value="house">House</option>
                    <option value="apartment">Apartment</option>
                    <option value="commercial">Commercial</option>
                    <option value="land">Land</option>
                </select>
            </div>
            <div class="form-group">
                <label for="property-area">Which city is your property in? :</label>
                <select id="property-area" name="property-area" required>
                    <option value="">Select</option>
                    <option value="Lahore">Lahore</option>
                    <option value="Islamabad">Islamabad</option>
                    <option value="Karachi">Karachi</option>
                    <option value="Multan">Multan</option>
                    <option value="Quetta">Quetta</option>
                    <option value="Gujranwala">Gujranwala</option>
                </select>
            </div>
            <div class="form-group">
                <label for="property-size">What is the size of your property? :</label>
                <select id="property-size" name="property-size" required>
                    <option value="">Select</option>
                    <option value="2 Marla">2 Marla</option>
                    <option value="3 Marla">3 Marla</option>
                    <option value="5 Marla">5 Marla</option>
                    <option value="10 Marla">10 Marla</option>
                    <option value="1 Kanal">1 Kanal</option>
                    <option value="10 Kanal">10 Kanal</option>
                </select>
            </div>
            <div class="form-group">
                <label for="property-location">What is the location of your property? :</label>
                <input type="text" id="property-location" name="property-location" placeholder="Address, Block, Phase, City etc" required>
            </div>
            <div class="form-group">
                <label for="property-price">What is your asking Price? :</label>
                <input type="text" id="property-price" name="property-price" placeholder="Price RS" required>
            </div>
            <div class="form-group">
                <label for="property-description">Description:</label>
                <textarea id="property-description" name="property-description" rows="4" placeholder="Enter Your All Property Description in this such as (No of beds, Bathrooms, Dinnings etc)." required></textarea>
            </div>
            <div class="form-group">
                <label for="property-condition">What is the Condition of your property? :</label>
                <select id="property-condition" name="property-condition" required>
                    <option value="">Select The Condition</option>
                    <option value="Brand New">Brand New</option>
                    <option value="Excellent - in a good shape & well maintained">Excellent - in a good shape & well maintained</option>
                    <option value="Good - in a good shape need cosmetic updates">Good - in a good shape need cosmetic updates</option>
                    <option value="Need minor work - needs a few minor renovations">Need minor work - needs a few minor renovations</option>
                    <option value="Need major work - need major renovations inside and out">Need major work - need major renovations inside and out</option>
                </select>
            </div>
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
                <button type="submit" id="submit-btn">Submit</button>
            <?php } else { ?>
                <p>Please <a href="Signin.php">sign in</a> to submit your property details.</p>
            <?php } ?>
        </form>
    </main>
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
