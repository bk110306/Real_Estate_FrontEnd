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
    /* floating button */
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

    /* Style for email subscription form */
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

<body>
  <?php 
  include("header.php");
  ?>
  <section id="home" class="hero">
    <div class="hero-content">
      <div class="text">
        <h1>Welcome to Shifa Properties ®</h1>
        <p>
          Find your dream Property with Shifa Properties®. <br>
          We specialize in helping you buy or sell property<br>in all Pakistan and surrounding areas.
        </p>
      </div>
      <img src="./Images/buliding.jpg" alt="Building">
    </div>
  </section>
  <section id="all" class="all-process">
    <div class="sell-property">
      <img src="./Images/buyproperty.jpg" alt="buy-house">
      <div class="heading-all">
        <h3>Buy a Property</h3>
      </div>
      <div class="parasell"> 
        <p>Invest in your happiness.</p>
        <p>Buy a property you love</p>
      </div>
      <div class="button-all">
        <a href="Properties.php">Find Properties</a>
      </div>
    </div>
    <div class="sell-property">
      <div class="Pic">
        <img src="./Images/selling.jpg" alt="sell-house">
      </div>
      <div class="heading-all">
        <h3>Sell a Property</h3>
      </div>
      <div class="parasell">
        <p>Get The Best Value</p>
        <p>For Your Property</p>
      </div>
      <div class="button-all">
        <a href="sell_property.php">Add Details</a>
      </div>
    </div>
  </section>
  <section style="background-color: #790e0e;" id="about" class="about-us">
    <h2>About Us</h2>
    <p>Welcome to Shifa Properties, your trusted partner in real estate. With a commitment to integrity and excellence, we specialize in helping clients find their ideal homes and investment properties. Our dedicated team of professionals combines expertise with personalized service to ensure a seamless and rewarding experience for every client. At Shifa Properties, we're here to turn your real estate goals into reality.</p><br>
    <center><a style="color: white;" href="About Us.php">Read More</a></center>
  </section>
  <section class="contact-us">
    <h2>Contact Us</h2>
    <p>Have any questions about buying, selling, or investing in real estate? Our friendly and knowledgeable team at Shifa Properties® is here to help.  Contact us today to discuss your needs and get started on your real estate journey.</p>
    <center><a style="color: white;" href="contactus.php">Further Details</a></center>
  </section>
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
