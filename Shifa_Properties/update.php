<?php
include("header.php");

include "test.php";

if (isset($_POST['update'])) {
    $id= $_POST['id'];
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $sql = "UPDATE `signup` SET `user_name`='$user_name', `email`='$email', `password`='$password', `confirm_password`='$confirm_password' WHERE `id`='$id'"; 

    $result = $conn->query($sql); 

    if ($result == TRUE) {
        echo '<script type="text/javascript">
                window.onload = function () { alert( "Record updated successfully."); }
              </script>';
        header("Location: view.php");
        exit();
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
} 

if (isset($_GET['id'])) {
    $id = $_GET['id']; 
    $sql = "SELECT * FROM `signup` WHERE `id`='$id'";
    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        
        while ($row = $result->fetch_assoc()) {
            $user_name = $row['user_name'];
            $email = $row['email'];
            $password = $row['password'];
            $confirm_password = $row['confirm_password'];
            $id= $row['id'];
        } 
    ?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/x-icon" href="./Images/logo.jpeg">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./Style_sheets/styles.css">
        <title>User Update Form</title>
        <style>
            /* Insert provided CSS styles here */
            .container {
                padding-right: 15px;
                padding-left: 15px;
                padding-bottom: 12px;
                margin-left: 60px;
            }
            form {
                max-width: 600px;
                margin: auto;
            }
            fieldset {
                border: 1px solid #ddd;
                padding: 20px;
                border-radius: 5px;
                margin-bottom: 20px; /* Added for spacing */
            }
            legend {
                font-size: 20px;
                margin-bottom: 10px;
            }
            input[type="text"], input[type="email"], input[type="password"] {
                width: 100%;
                padding: 10px;
                margin: 5px 0 20px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                font-size: 16px; /* Adjusted font size */
            }
            input[type="submit"] {
                width: 100%;
                background-color: #4CAF50;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            input[type="submit"]:hover {
                background-color: #45a049;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>User Update Form</h2>
            <form action="" method="post">
                <fieldset>
                    <legend>Personal information:</legend>
                    User Name:<br>
                    <input type="text" name="user_name" value="<?php echo $user_name; ?>">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <br>
                    Email:<br>
                    <input type="text" name="email" value="<?php echo $email; ?>">
                    <br>
                    Password:<br>
                    <input type="password" name="password" value="<?php echo $password; ?>">
                    <br>
                    Confirm Password:<br>
                    <input type="password" name="confirm_password" value="<?php echo $confirm_password; ?>">
                    <br><br>
                    <input type="submit" value="Update" name="update">
                </fieldset>
            </form>
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

<?php
    } else {
        header('Location: view.php');
    } 
}
?>
