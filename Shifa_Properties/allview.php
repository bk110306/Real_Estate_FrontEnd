<?php
session_start();

if(!isset($_SESSION["email"])){
    header("location:Signin.php");
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
  <style>
    header {
        background-color: #790e0e;
        padding: 10px;
        display: flex;
        color: #fff;
        justify-content: space-between;
        align-items: center;
    }
    header img {
        max-width: 100%;
        max-height: 100%;
        width: 9%;
        padding-right: 20px;
        height: 4%;
    }
    header .main {
        display: flex;
        align-items: center;
    }
    header h1 {
        margin: 0;
        font-family: 'Times New Roman', Times, serif;
        color: white;
    }
    nav ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }
    nav ul li {
        display: inline;
    }
    nav ul li a {
        text-decoration: none;
        color: white;
        font-weight: bolder;
        padding: 0px 10px 0px 10px;
    }
    nav ul li a:hover {
        text-decoration: underline;
    }
    nav ul li a img {
        width: 30px;
        height: 30px;
    }
    .button-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 80px;
        margin-bottom: 140px;
        
    }
    button {
        background-color: black;
        border: none;
        padding: 15px;
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        margin: 0 50px;
    }
    a {
        color: white;
        text-decoration: none;
    }
    .footer {
        background-color: #790e0e;
        padding: 20px 0;
    }
    .container-footer {
        max-width: 1100px;
        margin: auto;
        padding: 0 20px;
    }
    .row {
        display: flex;
        justify-content: space-evenly;
        align-items: flex-start;
        flex-wrap: nowrap;
    }
    .footer-col {
        flex: 1;
        min-width: 0;
        margin: 0 5px;
        color: white;
        padding-right: 20px;
    }
    .footer-col img {
        margin-top: 50px;
        margin-right: 500px;
        max-width: 100%;
        max-height: 100%;
        width: 60%;
        height: 60%;
    }
    ul {
        color: white;
    }
    .footer-col h4 {
        font-size: 18px;
        color: white;
        text-transform: capitalize;
        margin-bottom: 30px;
        font-weight: 500;
        position: relative;
    }
    .footer-col ul {
        padding: 0;
        list-style: none;
    }
    .footer-col ul li {
        margin-bottom: 10px;
    }
    .footer-col ul li a {
        font-size: small;
        text-decoration: none;
        color: white;
        text-transform: capitalize;
        font-weight: 300;
        transition: all 0.4s ease;
    }
    .footer-col ul li a:hover {
        padding-left: 10px;
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
        padding: 5px 10px;
        background-color: #790e0e;
        margin: 5px;
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
<div class="button-container">
  <button><a href="viewprop.php">Properties Data</a></button>
  <button><a href="view.php">User Data</a></button>
  <button><a href="viewcon.php">Contact US Data</a></button>
  <button><a href="viewcart.php">Buyer's Data</a></button>
  <button><a href="view_sub.php">Subscriber's Data</a></button>
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
