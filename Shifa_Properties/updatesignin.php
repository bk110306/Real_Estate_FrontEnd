<?php 

include "test.php";

    if (isset($_POST['update'])) {

        $id= $_POST['id'];

        $loginemail = $_POST['loginemail'];

        $loginpass = $_POST['loginpass'];

        $sql = "UPDATE `signin` SET `loginemail`='$loginemail',`loginpass`='$loginpass' WHERE `id`='$id'"; 

        $result = $conn->query($sql); 

        if ($result == TRUE) {
             echo "Record updated successfully.";
             header("Location: viewsigin.php");
            exit();
            
        }else{

            echo "Error:" . $sql . "<br>" . $conn->error;

        }

    } 

if (isset($_GET['id'])) {

    $id = $_GET['id']; 

    $sql = "SELECT * FROM `signin` WHERE `id`='$id'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {


        $loginemail = $row['loginemail'];

        $loginpass = $row['loginpass'];

        $id= $row['id'];


        } 

    ?>

        <h2>User Update Form</h2>

        <form action="" method="post">

          <fieldset>

            <legend>Personal information:</legend>

            Email:<br>

            <input type="text" name="loginemail" value="<?php echo $loginemail; ?>">

            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <br>

            Passwrod:<br>

            <input type="text" name="loginpass" value="<?php echo $loginpass; ?>">

            <br><br>

            <input type="submit" value="Update" name="update">

          </fieldset>

        </form> 

        </body>

        </html> 

    <?php

    } else{ 

        header('Location: view.php');

    } 

}

?>