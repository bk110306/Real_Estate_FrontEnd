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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
  <!-- <a href="addtocart.php" id="floating-button" class="floating-button">
<h6>cart</h6>    
</a> -->
    <script src="script.js"></script>
<main>

<br><br>
  <center></section id="Massage">
    <div class="container">
    <div class="heading1">
      <h2>CEO's Massage</h2>
    </div>
    <div class="para2">
      <img src="./Images/profile4.jpeg" alt="">
      <p>
        Dear Valued Clients,
      </p>
        <p>
          I am thrilled to extend a warm welcome to you on behalf of the entire team at Shifa Properties. As the CEO, I take great pride in leading a company that is dedicated to serving your real estate needs with utmost care and professionalism.
        </p>
        <p>
          At Shifa Properties, we understand that buying or selling a property is not just a transaction; it's a significant milestone in your life. That's why our mission is centered around you - our valued client. We are committed to providing you with exceptional service, tailored solutions, and unwavering support throughout your real estate journey.
        </p>
        <p>
          Our team of experienced professionals is here to listen, understand, and guide you every step of the way. Whether you're searching for your dream home, looking to invest, or selling your property, we are here to make the process seamless and stress-free for you.
        </p>
        <p>
          As your trusted partner in real estate, we prioritize transparency, integrity, and excellence in everything we do. Your satisfaction is our top priority, and we will go above and beyond to ensure that your experience with Shifa Properties exceeds your expectations.
        </p>
        <p>
          Thank you for choosing Shifa Properties for your real estate needs. We are honored to be a part of your journey and look forward to helping you achieve your goals
        </p>
        <p>Best Regards,</p>
        <p>Muhammad Tanveer Khan</p>
        <p>CEO, Shifa Properties</p>
    </div>
  </div>
</section></center>
<section id="about">
    <div class="container">
      <div class="heading1">
      <h1>About Us</h1>
    </div>
    <div class="para">
      <p>Welcome to Shifa Properties, we believe in more than just buying and selling properties; we believe in fulfilling dreams and building lasting relationships. With a wealth of experience in the real estate industry, our team is dedicated to providing unparalleled service and expertise to our clients.</p>
      <p>Founded on the principles of integrity, transparency, and professionalism, Shifa Properties strives to exceed expectations at every turn. Whether you're a first-time homebuyer, a seasoned investor, or looking to sell your property, we are committed to guiding you through every step of the process with care and diligence.</p>
      <p>Our mission is simple: to help you find the perfect property that not only meets your needs but also exceeds your expectations. We understand that each client is unique, which is why we take the time to listen to your goals and tailor our services to suit your individual requirements.</p>
      <p>
        With Shifa Properties, you can trust that you're in good hands. Let us be your partner in achieving your real estate goals and turning your dreams into reality. Welcome to Shifa Properties, where your journey to finding your ideal home begins.
      </p>
    </div>
    </div>
  <section>
</main>
<!-- -------- R E V I E W   S E C T I O N ---------- -->
<section class="review" id="review">
  <h1 class="heading"> Customer's Review</h1>
  <div class="box-container">

      <div class="box">
          <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
           <p>Shifa Properties provided exceptional service from start to finish. Their team was attentive, knowledgeable, and dedicated to helping us find the perfect property. We appreciated their transparency and efficiency throughout the process. Thanks to their expertise, we are now happily settled in our new home. Highly recommend Shifa Properties for anyone seeking a smooth and professional real estate experience.</p>
          <div class="user">
              <img src="./Images/profile1.jpg" alt="">
              <div class="user-info">
                  <h3>Sikandar</h3>
                  <span>happy customer</span>
              </div>
          </div>  
          <div class="fas fa-quote-right"></div>    
      </div>

      <div class="box">
          <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
           <p>Shifa Properties exceeded our expectations in helping us find our dream home. Their team was efficient, communicative, and genuinely committed to understanding our needs. We were impressed by their attention to detail and ability to tailor their services to suit our preferences. Thanks to their expertise, we are now settled in a property that meets all our requirements. We couldn't be happier with the service provided by Shifa Properties.</p>
          <div class="user">
              <img src="./Images/profile3.jpg" alt="">
              <div class="user-info">
                  <h3>Waheed</h3>
                  <span>happy customer</span>
              </div>
          </div>  
          <div class="fas fa-quote-right"></div>    
      </div>

      <div class="box">
          <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>

           <p>
            Our experience with Shifa Properties was satisfactory overall. Despite encountering some minor delays, their team was responsive and proactive in addressing our concerns. We found their agents to be knowledgeable and helpful, guiding us through the buying process with professionalism. While there were a few bumps along the way, we are ultimately satisfied with the outcome and grateful for their assistance.
              </p>

          <div class="user">
              <img src="./Images/profile2.jpg" alt="">
              <div class="user-info">
                  <h3>Waqar</h3>
                  <span>Satisfactory</span>
              </div>
          </div>  
          <div class="fas fa-quote-right"></div>    
      </div>
  </div>


</section> <br><br><br>
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
