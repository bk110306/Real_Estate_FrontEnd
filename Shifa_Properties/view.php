
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shifa Properties</title>
  <link rel="icon" type="image/x-icon" href="./Images/logo.jpeg">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./Style_sheets/styles.css">
      <style>
          table{
            width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
    background-color: transparent;
    border-collapse: collapse;
    border-spacing: 0;
          }  
          thead{
            display: table-header-group;
    vertical-align: middle;
    unicode-bidi: isolate;
    border-color: inherit;
          }  
          td{
            padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
    box-sizing: border-box;
    display: table-cell;
    unicode-bidi: isolate;

          } 
          tr{
            display: table-row;
    vertical-align: inherit;
    unicode-bidi: isolate;
    border-color: inherit;
}
          
          th{
            vertical-align: bottom;
            border-bottom: 2px solid #ddd;
            padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
    text-align: left;
    display: table-cell;
    font-weight: bold;
    unicode-bidi: isolate;
}
h2{
  font-size: 30px;
  margin-top: 20px;
    margin-bottom: 10px;
    font-family: inherit;
    font-weight: 500;
    line-height: 1.1;
    color: inherit;
}

.button-view{
  color: #fff;
    background-color: #5bc0de;
    border-color: #46b8da;
    display: inline-block;
    margin-bottom: 0;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    background-image: none;
    border: 1px solid transparent;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    border-radius: 4px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
.button-view a{
  text-decoration: none;
}
.button-delete{
  color: #fff;
    background-color: #d9534f;
    border-color: #d43f3a;
    display: inline-block;
    margin-bottom: 0;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    background-image: none;
    border: 1px solid transparent;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    border-radius: 4px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none; 
}

          .container{
            padding-right: 15px;
    padding-left: 15px;
    padding-bottom:12px;
    /* margin-right: auto; */
    margin-left: 60px;
          }
          /* @media (min-width: 768px) {
    .container {
        width: 750px;
    } */
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

    <?php
    include("header.php");
    ?>


<?php 

include "test.php";

$sql = "SELECT * FROM signup";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

    <title>View Page</title>

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
    
    <script>
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this record?")) {
                window.location.href = "delete.php?id=" + id;
            }
        }
    </script>
</head>

<body>

    <div class="container">

        <h2>Users</h2>
        <a class="button-view" href="allview.php">Click Here To View All Crud 
    Pages
</a>
&nbsp;
<a class="button-view" href="signup.php">Form</a>
&nbsp;
<a class="button-view" href="viewprop.php">Properties Data</a>&nbsp;
<a class="button-view" href="view.php">User Data</a>&nbsp;
<a class="button-view" href="viewcon.php">Contact US Data</a>&nbsp;
<a class="button-view" href="viewcart.php">Buyer's Data</a>&nbsp;
<a class="button-view" href="view_sub.php">Subscriber's Data</a>&nbsp;
<br><br>

        <table class="table">

            <thead>

                <tr>

                    <th>ID</th>

                    <th>User Name</th>

                    <th>Email</th>

                    <th>Action</th>

                </tr>

            </thead>

            <tbody> 

                <?php

                    if ($result->num_rows > 0) {

                        while ($row = $result->fetch_assoc()) {

                ?>

                            <tr>

                            <td><?php echo $row['id']; ?></td>

                            <td><?php echo $row['user_name']; ?></td>

                            <td><?php echo $row['email']; ?></td>

                            <td>
                                <a class="button-view" href="update.php?id=<?php echo $row['id']; ?>">Edit</a>
                                &nbsp;
                                <a class="button-delete" href="javascript:void(0);" onclick="confirmDelete(<?php echo $row['id']; ?>)">Delete</a>
                            </td>

                            </tr>                       

                <?php       }

                    }

                ?>                

            </tbody>

        </table>

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
