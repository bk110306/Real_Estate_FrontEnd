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
// Close MySQL connection
$conn->close();
?>
