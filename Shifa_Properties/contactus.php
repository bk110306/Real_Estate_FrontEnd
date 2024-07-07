<?php 
session_start(); // Start the session

include "test.php";

if (isset($_POST['submit'])) {
    $Full_Name = $_POST['Full_Name'];
    $Email = $_POST['Email'];
    $Massage = $_POST['Massage'];

    $sql = "INSERT INTO contactus (Full_Name, Email, Massage) VALUES ('$Full_Name','$Email','$Massage')";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo '<script type="text/javascript">
                window.onload = function () { 
                    alert("Thanks For Contacting Shifa Properties. Your Message Has Been Sent Successfully!"); 
                }
              </script>';
        // header("Location: viewcon.php");
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
        .checkout-form {
      background-color: black;
      max-width: 700px;
      margin: auto;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      border-radius: 5px;
      margin-top: 70px;
      margin-bottom: 20px;
    }
    .checkout-form h2{
        color:white;
    }
    /* .form-group{
        background-color:white;
        padding:0px 80px 0px 80px;
        margin:0px 0px 0px 0px; 
    } */
    /* .form-group label{
        padding:20px 0px 20px 0px;
        background-color:white; 
        font-weight:bolder;
        font-size:20px;
        color:white;
        margin:0px 40px 0px 40px;
    } */
    </style>
</head>
<body>
<?php include("header.php"); ?>

<section id="contact" >
    <div class="container">
        <h2>Contact Us</h2>
        <p class="paragraph">
            At Shifa Properties®, we understand that buying, selling, or investing in real estate can be a significant life decision. Whether you're a first-time homebuyer, a seasoned investor, or someone looking to make a move within the Lahore area, our team of dedicated real estate professionals is here to guide you every step of the way.
        </p> 
        <p class="paragraph">
            Our agents are highly knowledgeable about the local market, possess strong negotiation skills, and are committed to personalized service. We take the time to understand your unique needs and goals, work tirelessly to find the perfect property for you, or ensure a smooth and successful sale of your existing one.
        </p>
        <p class="paragraph">
            Don't hesitate to contact Shifa Properties® today. We offer a variety of communication options to suit your convenience. Call us to speak directly with an agent, send an email with your inquiries, or visit our office to discuss your real estate journey in a friendly and welcoming environment.
        </p>
        <div class="contact-info">
            <address>
            <p style="color: black; font-size:1.3rem"><strong style="color: #790e0e;">Address:</strong> Phase 1, DHA Lahore, Pakistan</p>
            <p style="color: black; font-size:1.3rem"><strong style="color: #790e0e;">Email:</strong> <a style="color: black; text-decoration:none;" href="mailto:shifapropertiesdhalahore@gmail.com">shifapropertiesdhalahore@gmail.com</a></p>
            <p style="color: black; font-size:1.3rem"><strong style="color: #790e0e;">Phone:</strong> <a style="color: black; text-decoration:none;" href="tel:+92 321 9477568">+92 321 9477568</a></p>
            </address>
        </div>
    </div>
    <form action="" method="POST" class="checkout-form">
        <h2 style="color: white;">Contact US Form</h2>
        <div class="form-group">
            <label for="name" style="color: #fff;">Full Name:</label>
            <input type="text" name="Full_Name" id="name" required>
        </div>
        <div class="form-group">
            <label for="email" style="color: #fff;">Email:</label>
            <input type="email" name="Email" id="email" required>
        </div>
        <div class="form-group">
            <label for="message" style="color: #fff;">Message:</label>
            <textarea name="Massage" required></textarea>
        </div>
        <div class="form-group">
            <button type="submit" name="submit" id="submit-btn">Submit</button>
        </div>
    </form>
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
</body>
</html>
