<?php
// Include necessary files
include("header.php");

// Database connection parameters
$host = "localhost";
$user = "root";
$password = "";
$db = "shifa_db";

// Get the ID from the URL parameter
$id = isset($_GET['id']) ? $_GET['id'] : '';

// Create connection
$conn = new mysqli($host, $user, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch existing data from cart based on ID
$sql = "SELECT * FROM cart WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

// Initialize variables with existing data
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $property_name = $row['property_name'];
    $plot = $row['plot'];
    $size = $row['size'];
    $price = $row['price'];
    $name = $row['name'];
    $contactnumber = $row['contactnumber'];
    $email = $row['email'];
} else {
    echo "No record found";
}

// Handle form submission for updating data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $property_name = isset($_POST['property_name']) ? $_POST['property_name'] : '';
    $plot = isset($_POST['plot']) ? $_POST['plot'] : '';
    $size = isset($_POST['size']) ? $_POST['size'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $contactnumber = isset($_POST['contactnumber']) ? $_POST['contactnumber'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    // Update query
    $sql_update = "UPDATE cart SET property_name=?, plot=?, size=?, price=?, name=?, contactnumber=?, email=? WHERE id=?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("sssssssi", $property_name, $plot, $size, $price, $name, $contactnumber, $email, $id);

    if ($stmt_update->execute()) {
        echo "<script>alert('Record updated successfully'); window.location.href='viewcart.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Cart</title>
    <link rel="icon" type="image/x-icon" href="./Images/logo.jpeg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./Style_sheets/styles.css">
    <style>
        /* Updated CSS styles */
        .container {
            padding-right: 15px;
            padding-left: 15px;
            padding-bottom: 12px;
            margin-left: 60px; /* Adjust margin as per your layout */
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
    <div class="container">
        <h2>Update Cart</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=" . $id); ?>">
            <fieldset>
                <legend>Edit Cart Entry</legend>
                <label for="property_name">Property Name:</label>
                <input type="text" id="property_name" name="property_name" value="<?php echo htmlspecialchars($property_name); ?>" required>

                <label for="plot">Plot Number :</label>
                <input type="text" id="plot" name="plot" value="<?php echo htmlspecialchars($plot); ?>" required>

                <label for="size">Size:</label>
                <input type="text" id="size" name="size" value="<?php echo htmlspecialchars($size); ?>" required>

                <label for="price">Price:</label>
                <input type="text" id="price" name="price" value="<?php echo htmlspecialchars($price); ?>" required>

                <label for="username">User Name:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>" required>

                <label for="contact_number">Contact Number:</label>
                <input type="text" id="contactnumber" name="contactnumber" value="<?php echo htmlspecialchars($contactnumber); ?>" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>

                <input type="submit" value="Update">
            </fieldset>
        </form>
    </div>
    <!-- Footer section -->
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
// Close MySQL connection
$conn->close();
?>
