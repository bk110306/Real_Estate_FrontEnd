<!-- <style>
    .btn btn-info{
      background-color:#ADD8E6; 
    }
</style> -->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shifa Properties</title>
  <link rel="icon" type="image/x-icon" href="./Images/logo.jpeg">
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

      </style>
</head>
<header>
   <div class="main"> 
   <img src="./Images/logo.jpeg"> <h1>Shifa Properties®</h1>
  </div>
    <nav>
      <ul>
        <li></i><a href="index.php">Home</a></li>
        <li><a href="Properties.php">Properties</a></li>
        <li><a href="sell_property.php">Sell</a></li>
        <li><a href="About Us.php">About Us</a></li>
        <li><a href="contactus.php">Contact</a></li>
        <li><a href="Signin.php">Sign In</a></li>
      </ul>
    </nav>
  </header>


&nbsp;


<?php 

include "test.php";

$sql = "SELECT * FROM signin";

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
                window.location.href = "deletesignin.php?id=" + id;
            }
        }
    </script>

</head>

<body>

    <div class="container">
    <a class="button-view" href="allview.php">Click Here To View All Crud 
    Pages
</a>
&nbsp;
<a class="button-view" href="Signin.php">Form</a>

        <h2>users</h2>

<table class="table">

    <thead>

        <tr>

        <th>ID</th>

        <th>Email</th>

        <th>Password</th>

        <th>Action</th>

        <!-- <th>Action</th> -->

    </tr>

    </thead>

    <tbody> 

        <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                    <td><?php echo $row['id']; ?></td>

                    <td><?php echo $row['loginemail']; ?></td>

                    <td><?php echo $row['loginpass']; ?></td>

                    <!-- <td><//?php echo $row['email']; ?></td> -->

                    <td>
                                <a class="button-view" href="updatesignin.php?id=<?php echo $row['id']; ?>">Edit</a>
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
    <footer class="footer">
    <div class="container-footer">
        <div class="row"> 
                <div class="footer-col">
                  <h4>Contact US</h4>
                      <ul>
                        <li>Dear Valued Customers for your Complaints & Suggestions Reach Us at Our <br>Following Contact Details</li>
                        <li>Mobile Number : +92 321 9477568 </li>
                        <li>E-Mail : shifaproeprtiesdhalahore@gmail.com</li>                        
                      </ul>
                </div>     
                <div class="footer-col">
                    <h4>Company</h4>
                    <ul>
                        <li><a href="index.php"target="_blank">Home</a></li>
                        <li><a href="Properties.php"target="_blank">Properties</a></li>
                        <li><a href="About Us.php"target="_blank">About Us</a></li>
                        <li><a href="contactus.php"target="_blank">Contact</a></li>
                        <li><a href="Signin.php"target="_blank">Sign In</a></li>
                        <li><a href="termsandconditions.php"target="_blank">Terms and Conditions</a></li>
                        <li><a href="privacypolicy.php"target="_blank">Privacy Policy</a></li>
                    </ul>
                </div>
                
                <div class="footer-col">
                    <h4>Follow US</h4>
                        <ul>
                            <li><a href="https://www.facebook.com/Shifaproperties?mibextid=ZbWKwL" target="_blank">Facebook</a></li>
                            <li><a href="">Twitter</a></li>
                            <li><a href="https://www.instagram.com/dhalahoreshifa?igsh=dnJ5cWE1eWptazl3" target="_blank">Instagram</a></li>
                            <li><a href="https://www.linkedin.com/in/shifa-properties-94356a27a?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blank">LinkedIn</a></li>
                        </ul>    
                </div>
        </div>
    </div>
    </footer>

</body>

</html>