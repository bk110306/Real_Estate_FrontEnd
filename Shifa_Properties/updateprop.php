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
        <?php
  include("footer.php");
  ?>  
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
    </body>
    </html>
    <?php
    } else { 
        header('Location: viewprop.php');
    }
    $stmt->close();
}
?>
