<?php
include "test.php";
session_start(); // Start the session
$host = "localhost";
$user = "root";
$password = "";
$db = "shifa_db";

$data = mysqli_connect($host, $user, $password, $db);
if ($data === false) {
    die("Connection error: " . mysqli_connect_error());
}

$login_error = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM signup WHERE email = ? AND password = ?";
    $stmt = mysqli_prepare($data, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_array($result)) {
        $_SESSION["loggedin"] = true; // Set the session variable
        $_SESSION["email"] = $email;
        if ($row["usertype"] == "user") {
            header("Location: index.php");
            exit();
        } else if ($row["usertype"] == "admin") {
            header("Location: allview.php");
            exit();
        }
    } else {
        $login_error = true;
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($data);
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

 <?php
session_start();

if(isset($_SESSION["email"])){
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shifa Properties</title>
  <link rel="icon" type="image/x-icon" href="./Images/logo.jpeg">
  <link rel="stylesheet" href="./Style_sheets/stylesignin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script>
    function showAlert() {
        alert("User not found. Please sign up first.");
        window.location.href = 'signup.php';
    }
  </script>
  <style>
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
  <div class="container" style="background-image: url(./Images/Designer.jpg);">
    <div class="facebook-page">
        <div class="text">
            <h1>Shifa Properties</h1>
            <p>Where Dreams Come True.</p>
        </div>
        <div class="signin_form">
        <form action="#" method="post">
          <div>
            <input name="email" type="email" placeholder="Email address" required>
            <!-- <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i> -->
                <!-- <small>Error Message</small> -->
                </div>
                <div>      
            <input name="password" type="password" placeholder="Password" required>
            <!-- <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i> -->
                <!-- <small>Error Message</small> -->
                </div>    
            <button name="submit" class="login" type="submit">Log In</button>
            <br><br><hr>
            <button class="create-account" ><a href="signup.php" target="_blank"> Create new account</a></button>
        </form>
        </div>
        <?php
        if ($login_error) {
            echo '<script type="text/javascript">',
                 'showAlert();',
                 '</script>';
        }
        ?>
    </div>
</div>
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
