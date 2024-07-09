<?php 
session_start(); // Start the session

include "test.php";

if (isset($_POST['submit'])) {
    $Full_Name = $_POST['Full_Name'];
    $Email = $_POST['Email'];
    $Massage = $_POST['Massage'];

    $sql = "INSERT INTO contactus (Full_Name, Email, Massage) VALUES ('$Full_Name','$Email','$Massage')";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo '<script type="text/javascript">
                window.onload = function () { 
                    alert("Thanks For Contacting Shifa Properties. Your Message Has Been Sent Successfully!"); 
                }
              </script>';
        // header("Location: viewcon.php");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./Style_sheets/styles.css">
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
        .checkout-form {
            background-color: black;
            max-width: 700px;
            margin: auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 5px;
            margin-top: 70px;
            margin-bottom: 20px;
        }
        .checkout-form h2{
            color: white;
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
        .container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 10px;
        }
        .text-content {
            flex: 1;
            padding-right: 10px;
        }
        .image-content {
            flex: 1;
            text-align: center;
        }
        .image-content img {
            max-width: 70%;
            height: auto;
            border-radius: 10px;
        }
        .contact-info address p {
            color: black;
            font-size: 1.3rem;
        }
        .contact-info address strong {
            color: #790e0e;
        }
        .contact-info address a {
            color: black;
            text-decoration: none;
        }
        .contact-info address a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<?php include("header.php"); ?>

<section id="contact">
    <div class="container">
        <div class="text-content">
            <h2>Contact Us</h2>
            <p class="paragraph">
                At Shifa Properties®, we understand that buying, selling, or investing in real estate can be a significant life decision. Whether you're a first-time homebuyer, a seasoned investor, or someone looking to make a move within the Lahore area, our team of dedicated real estate professionals is here to guide you every step of the way.
            </p>
            <p class="paragraph">
                Our agents are highly knowledgeable about the local market, possess strong negotiation skills, and are committed to personalized service. We take the time to understand your unique needs and goals, work tirelessly to find the perfect property for you, or ensure a smooth and successful sale of your existing one.
            </p>
            <p class="paragraph">
                Don't hesitate to contact Shifa Properties® today. We offer a variety of communication options to suit your convenience. Call us to speak directly with an agent, send an email with your inquiries, or visit our office to discuss your real estate journey in a friendly and welcoming environment.
            </p>
            <div class="contact-info">
                <address>
                    <p><strong>Address:</strong> Phase 1, DHA Lahore, Pakistan</p>
                    <p><strong>Email:</strong> <a href="mailto:shifapropertiesdhalahore@gmail.com">shifapropertiesdhalahore@gmail.com</a></p>
                    <p><strong>Phone:</strong> <a href="tel:+92 321 9477568">+92 321 9477568</a></p>
                </address>
            </div>
        </div>
        <div class="image-content">
            <img src="./Images/Designer.jpg" alt="Real Estate">
        </div>
    </div>
    <form action="" method="POST" class="checkout-form">
        <h2 style="color: white;">Contact US Form</h2>
        <div class="form-group">
            <label for="name" style="color: #fff;">Full Name:</label>
            <input type="text" name="Full_Name" id="name" required>
        </div>
        <div class="form-group">
            <label for="email" style="color: #fff;">Email:</label>
            <input type="email" name="Email" id="email" required>
        </div>
        <div class="form-group">
            <label for="message" style="color: #fff;">Message:</label>
            <textarea name="Massage" required></textarea>
        </div>
        <div class="form-group">
            <button type="submit" name="submit" id="submit-btn">Submit</button>
        </div>
    </form>
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
