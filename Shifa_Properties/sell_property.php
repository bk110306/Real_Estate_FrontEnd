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
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit();
    }

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Shifa_db";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert email into the database
    $sql = "INSERT INTO Subscribers (email) VALUES ('$email')";

    if ($conn->query($sql) === TRUE) {
      //  echo "Congratulations, you have subscribed to Shifa Properties. For your queries, we will contact you soon.";
    } else {
      //  echo "Error: " . $sql . "<br>" . $conn->error;
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
        .subscription-form {
      margin-top: 10px;
    }

    .subscription-form input[type="email"] {
      padding: 5px;
      margin-right: 5px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    .subscription-form button {
      padding: 5px 10px ;
      background-color: #790e0e;
      margin:5px;
      color: white;
      border: none;
      border-radius: 3px;
      cursor: pointer;
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
    <script>
  function subscribeForm() {
    var email = document.getElementById('email').value;
    if(email) {
      alert('Congratulations, you have subscribed to Shifa Properties. For your queries, we will contact you soon.');
      return true;
    } else {
      alert('Please enter a valid email address.');
      return false;
    }
  }
</script>
    <?php
  include("footer.php");
  ?>  
</body>
</html>
