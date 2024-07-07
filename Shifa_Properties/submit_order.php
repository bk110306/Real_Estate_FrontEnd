<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shifa_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $contactnumber = isset($_POST['contactnumber']) ? $_POST['contactnumber'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $property_name = isset($_POST['property_name']) ? $_POST['property_name'] : '';
    $plot = isset($_POST['plot']) ? $_POST['plot'] : '';
    $size = isset($_POST['size']) ? $_POST['size'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : '';

    // Prepare SQL query to insert data into cart table
    $sql = "INSERT INTO cart (name, contactnumber, email, property_name, plot, size, price) VALUES (?, ?, ?, ?, ?, ?, ?)";

    // Prepare statement
    $stmt = $conn->prepare($sql);

    // Bind parameters and execute statement
    $stmt->bind_param("ssssssd", $name, $contactnumber, $email, $property_name, $plot, $size, $price);

    if ($stmt->execute()) {
        // Data inserted successfully, redirect to cart with success message
        header("Location: addtocart.php?success=true");
    } else {
        // Error inserting data
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
