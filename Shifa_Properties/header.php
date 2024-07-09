<?php
session_start();
?>

<header>
    <div class="main"> 
   <img src="./Images/logo.jpeg"><h1>Shifa Properties®</h1>
    </div>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="Properties.php">Properties</a></li>
            <li><a href="sell_property.php">Sell</a></li>
            <li><a href="About Us.php">About Us</a></li>
            <li><a href="contactus.php">Contact</a></li>
            <?php
            // Debugging: Display the status of the session variable
            if (isset($_SESSION['loggedin'])) {
                echo "<!-- Logged in status: " . $_SESSION['loggedin'] . " -->";
            } else {
                echo "<!-- Logged in status: not set -->";
            }

            
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
                <li><a href="logout.php">Log Out</a></li>
            <?php else: ?>
                <li><a href="Signin.php">Sign In</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
