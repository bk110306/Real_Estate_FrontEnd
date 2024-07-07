
<?php 

include "test.php"; 

if (isset($_GET['id'])) {

    $property_id = $_GET['id'];

    $sql = "DELETE FROM `properties` WHERE `id`='$property_id'";

    $result = $conn->query($sql);

    if ($result == TRUE) {
        // echo "Record deleted successfully.";
        // Redirect to view.php after 2 seconds
        header("Refresh: 0; url=viewprop.php");
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }

} 

?>
