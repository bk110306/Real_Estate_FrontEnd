<?php
include("header.php");

include "test.php";

if (isset($_POST['update'])) {
    $id= $_POST['id'];
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $sql = "UPDATE `signup` SET `user_name`='$user_name', `email`='$email', `password`='$password', `confirm_password`='$confirm_password' WHERE `id`='$id'"; 

    $result = $conn->query($sql); 

    if ($result == TRUE) {
        echo '<script type="text/javascript">
                window.onload = function () { alert( "Record updated successfully."); }
              </script>';
        header("Location: view.php");
        exit();
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
} 

if (isset($_GET['id'])) {
    $id = $_GET['id']; 
    $sql = "SELECT * FROM `signup` WHERE `id`='$id'";
    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        
        while ($row = $result->fetch_assoc()) {
            $user_name = $row['user_name'];
            $email = $row['email'];
            $password = $row['password'];
            $confirm_password = $row['confirm_password'];
            $id= $row['id'];
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
        <link rel="icon" type="image/x-icon" href="./Images/logo.jpeg">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./Style_sheets/styles.css">
        <title>User Update Form</title>
        <style>
            /* Insert provided CSS styles here */
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
                margin-bottom: 20px; /* Added for spacing */
            }
            legend {
                font-size: 20px;
                margin-bottom: 10px;
            }
            input[type="text"], input[type="email"], input[type="password"] {
                width: 100%;
                padding: 10px;
                margin: 5px 0 20px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                font-size: 16px; /* Adjusted font size */
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
            <h2>User Update Form</h2>
            <form action="" method="post">
                <fieldset>
                    <legend>Personal information:</legend>
                    User Name:<br>
                    <input type="text" name="user_name" value="<?php echo $user_name; ?>">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <br>
                    Email:<br>
                    <input type="text" name="email" value="<?php echo $email; ?>">
                    <br>
                    Password:<br>
                    <input type="password" name="password" value="<?php echo $password; ?>">
                    <br>
                    Confirm Password:<br>
                    <input type="password" name="confirm_password" value="<?php echo $confirm_password; ?>">
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
        header('Location: view.php');
    } 
}
?>
