<?php 
include "test.php";

if (isset($_POST['submit'])) {
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        echo '<script type="text/javascript">
                window.onload = function () { alert("Passwords do not match!"); }
              </script>';
    } else {
        // Hashing the password for security
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        
        // Using prepared statements to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO signup (user_name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $user_name, $email, $hashed_password);

        if ($stmt->execute()) {
            echo '<script type="text/javascript">
                    window.onload = function () { alert("Record Added Successfully!"); }
                  </script>';
            header("Location: signin.php");
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link rel="icon" type="image/x-icon" href="./Images/logo.jpeg">
    <link rel="stylesheet" href="./Style_sheets/signup.css">

</head>

<body>
    
       <div class="container">
        <div class="header">
            <h2>CREATE ACCOUNT</h2>
        </div>
        <form  action="signup.php" method="POST" class="form" id="form">
            <div class="form-control ">
                <label>Username</label>
                <input type="user_name" name="user_name" placeholder="user123" id="username">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error Message</small>
            </div>
            <div class="form-control ">
                <label>Email</label>
                <input type="email" name="email" placeholder="abc@gmail.com" id="email">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error Message</small>
            </div>
            
            <div class="form-control">
                <label>Password</label>
                <input type="password" name="password" placeholder="paasword" id="password">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error Message</small>
            </div>
            <div class="form-control">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" placeholder="password " id="confirm">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error Message</small>
            </div>
            <button type="submit" name="submit">Submit</button>
            <hr>
            <center><a href="Signin.php">Already Exsit Click Here</a></center>
            <center><a href="index.php">Click For The Home Page </a></center>
        </form>
    </div>
</body>
</html>
