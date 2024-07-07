<?php 
include "test.php";

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $owner_name = $_POST['owner_name'];
    $owner_email = $_POST['owner_email'];
    $property_type = $_POST['property_type'];
    $property_area = $_POST['property_area'];
    $property_size = $_POST['property_size'];
    $property_location = $_POST['property_location'];
    $property_price = $_POST['property_price'];
    $property_description = $_POST['property_description'];
    $property_condition = $_POST['property_condition'];

    // Use prepared statements to update the record
    $sql = "UPDATE `properties` SET 
            `owner_name` = ?, 
            `owner_email` = ?, 
            `property_type` = ?, 
            `property_area` = ?, 
            `property_size` = ?, 
            `property_location` = ?, 
            `property_price` = ?, 
            `property_description` = ?, 
            `property_condition` = ? 
            WHERE `id` = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssssssssi', 
        $owner_name, 
        $owner_email, 
        $property_type, 
        $property_area, 
        $property_size, 
        $property_location, 
        $property_price, 
        $property_description, 
        $property_condition, 
        $id
    );

    if ($stmt->execute() === TRUE) {
        echo '<script type="text/javascript">
            window.onload = function () { alert("Record updated successfully."); }
            </script>';
        header("Location: viewprop.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
} 

if (isset($_GET['id'])) {
    $id = $_GET['id']; 
    $sql = "SELECT * FROM `properties` WHERE `id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {        
        while ($row = $result->fetch_assoc()) {
            $owner_name = $row['owner_name'];
            $owner_email = $row['owner_email'];
            $property_type = $row['property_type'];
            $property_area = $row['property_area'];
            $property_size = $row['property_size'];
            $property_location = $row['property_location'];
            $property_price = $row['property_price'];
            $property_description = $row['property_description'];
            $property_condition = $row['property_condition'];
            $id = $row['id'];
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
            }
            legend {
                font-size: 20px;
                margin-bottom: 10px;
            }
            input[type="text"], input[type="email"], textarea {
                width: 100%;
                padding: 10px;
                margin: 5px 0 20px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
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
        <header>
            <div class="main">
                <img src="./Images/logo.jpeg"> <h1>Shifa Properties®</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="Properties.php">Properties</a></li>
                    <li><a href="sell_property.php">Sell</a></li>
                    <li><a href="About Us.php">About Us</a></li>
                    <li><a href="contactus.php">Contact</a></li>
                    <li><a href="Signin.php">Sign In</a></li>
                </ul>
            </nav>
        </header>
        <div class="container">
            <h2>Property Update Form</h2>
            <form action="" method="post">
                <fieldset>
                    <legend>Property information:</legend>
                    Owner Name:<br>
                    <input type="text" name="owner_name" value="<?php echo htmlspecialchars($owner_name); ?>">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                    <br>
                    Owner Email:<br>
                    <input type="email" name="owner_email" value="<?php echo htmlspecialchars($owner_email); ?>">
                    <br>
                    Property Type:<br>
                    <input type="text" name="property_type" value="<?php echo htmlspecialchars($property_type); ?>">
                    <br>
                    Property Area:<br>
                    <input type="text" name="property_area" value="<?php echo htmlspecialchars($property_area); ?>">
                    <br>
                    Property Size:<br>
                    <input type="text" name="property_size" value="<?php echo htmlspecialchars($property_size); ?>">
                    <br>
                    Property Location:<br>
                    <input type="text" name="property_location" value="<?php echo htmlspecialchars($property_location); ?>">
                    <br>
                    Property Price:<br>
                    <input type="text" name="property_price" value="<?php echo htmlspecialchars($property_price); ?>">
                    <br>
                    Property Description:<br>
                    <textarea name="property_description"><?php echo htmlspecialchars($property_description); ?></textarea>
                    <br>
                    Property Condition:<br>
                    <input type="text" name="property_condition" value="<?php echo htmlspecialchars($property_condition); ?>">
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
        header('Location: viewprop.php');
    }
    $stmt->close();
}
?>
