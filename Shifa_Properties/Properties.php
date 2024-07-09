<?php
session_start();
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
    .signin-prompt {
      color: red;
      font-weight: bold;
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
  <div class="heading">
    <h1>Property For Sale</h1>
  </div>
  <div class="property-start">
    <center><h2>Featured Properties</h2></center>
  </div>
  <section id="menu" class="properties">
    <?php
    $properties = [
      ["img" => "./Images/p2.jpeg", "name" => "Phase-6 CCA-2", "plot" => "279", "size" => "4 Marla", "price" => "625000", "id" => 1],
      ["img" => "./Images/p3.jpeg", "name" => "Phase-5 CCA-1", "plot" => "102", "size" => "5 Marla", "price" => "550000", "id" => 2],
      ["img" => "./Images/p4.jpeg", "name" => "Phase-7 CCA-3", "plot" => "57", "size" => "8 Marla", "price" => "750000", "id" => 3],
      ["img" => "./Images/p5.jpeg", "name" => "Phase-8 CCA-4", "plot" => "88", "size" => "10 Marla", "price" => "850000", "id" => 4],
      ["img" => "./Images/p6.jpeg", "name" => "Phase-9 CCA-5", "plot" => "200", "size" => "12 Marla", "price" => "950000", "id" => 5],
      ["img" => "./Images/p7.jpeg", "name" => "Phase-10 CCA-6", "plot" => "300", "size" => "15 Marla", "price" => "1050000", "id" => 6]
    ];

    foreach ($properties as $property) {
        echo '<div class="property">';
        echo '<img src="' . $property["img"] . '" alt="Property">';
        echo '<h6>' . $property["name"] . '</h6>';
        echo 'Plot #' . $property["plot"] . '<br>';
        echo $property["size"] . '<br>';
        // echo 'Near To Park<br>';
        echo '<span>Rs ' . $property["price"] . '</span><br>';
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
            echo '<button data-id="' . $property["id"] . '" data-name="' . $property["name"] . '" data-plot="' . $property["plot"] . '" data-size="' . $property["size"] . '" data-price="' . $property["price"] . '" data-image="' . $property["img"] . '">Buy Now</button>';
        } else {
            echo '<p class="signin-prompt">Please sign in first to buy this property.</p>';
        }
        echo '</div>';
    }
    ?>
  </section>
  <?php
  include("footer.php");
  ?>  
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const buyNowButtons = document.querySelectorAll("button");

      buyNowButtons.forEach(button => {
        button.addEventListener("click", (event) => {
          const property = event.target;
          const id = property.dataset.id;
          const name = property.dataset.name;
          const plot = property.dataset.plot;
          const size = property.dataset.size;
          const price = property.dataset.price;
          const image = property.dataset.image;

          const form = document.createElement('form');
          form.method = 'POST';
          form.action = 'addtocart.php';

          form.appendChild(createHiddenInput('id', id));
          form.appendChild(createHiddenInput('name', name));
          form.appendChild(createHiddenInput('plot', plot));
          form.appendChild(createHiddenInput('size', size));
          form.appendChild(createHiddenInput('price', price));
          form.appendChild(createHiddenInput('image', image));

          document.body.appendChild(form);
          form.submit();
        });
      });

      function createHiddenInput(name, value) {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = name;
        input.value = value;
        return input;
      }
    });
  </script>
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
