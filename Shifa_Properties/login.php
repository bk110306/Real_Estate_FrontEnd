<?php
session_start();
include 'test.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $loginemail = $_POST['loginemail'];
    $loginpass = $_POST['loginpass'];

    // Prepare the select statement
    $sql = "SELECT * FROM signup WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        // Verify the password
        if (password_verify($mypassword, $user['mypassword'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['user_name'];

            // Check if it's the admin login (adjust this condition as per your admin user check)
            if ($email === 'admin123@gmail.com') {
                // Redirect to admin panel
                header("Location: allview.php");
                exit;
            } else {
                // Redirect to index.php for normal users with a success message
                $_SESSION['login_success'] = "Successfully logged in as " . $user['user_name'];
                header("Location: index.php");
                exit;
            }
        } else {
            echo "Invalid email or password!";
        }
    } else {
        echo "Invalid email or password!";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request!";
    exit;
}
?>