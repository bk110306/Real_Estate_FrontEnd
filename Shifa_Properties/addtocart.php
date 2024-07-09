<?php
$id = isset($_POST['id']) ? $_POST['id'] : '';
$name = isset($_POST['name']) ? $_POST['name'] : '';
$plot = isset($_POST['plot']) ? $_POST['plot'] : '';
$size = isset($_POST['size']) ? $_POST['size'] : '';
$price = isset($_POST['price']) ? $_POST['price'] : '';
$image = isset($_POST['image']) ? $_POST['image'] : '';

// Database connection settings
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

// Handle form submission for email subscription
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['subscribe'])) {
    $email = $_POST['email'];

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid email format');</script>";
    } else {
        // Insert email into the database
        $sql = "INSERT INTO Subscribers (email) VALUES ('$email')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Congratulations, you have subscribed to Shifa Properties. For your queries, we will contact you soon.');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
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
  <?php include("footer.php"); ?>
 
  <script>
    function subscribeForm() {
      var email = document.getElementById('email').value;
      if(email) {
        return true;
      } else {
        alert('Please enter a valid email address.');
        return false;
      }
    }
  </script>
</body>
</html>
