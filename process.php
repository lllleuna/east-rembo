<?php
require 'PAGES/config.php';

if(isset($_POST['imageName'])) {

    $imageName = $_POST['imageName'];
    $sql = "DELETE FROM admin_post WHERE filename = '$imageName' LIMIT 1";

    
    // Execute the query
    if(mysqli_query($conn, $sql)) {
        echo "DELETED SUCCESSFULLY!";
    } else {
        echo "Error updating database table: " . mysqli_error($conn);
    }
}
?>
