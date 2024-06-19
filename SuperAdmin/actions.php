<?php
include '../PAGES/config.php';
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    $rowId = $_POST['rowId'];
    $usern = $_POST['usern'];
    $name = $_POST['name'];
    $status = $_POST['status'];
    $reason = $_POST['reason'];

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($action == 'delete') {
        // Handle delete action
        $sql1 = mysqli_query($connS, "INSERT INTO deleted_admin(UserN, Name) VALUES('$usern', '$name')");
        $sql = mysqli_query($conn, "DELETE FROM admin_account WHERE UserN='$usern'");
    } elseif ($action == 'disable') {
        $sql2 = mysqli_query($conn, "UPDATE adminacc_status SET status='0', description='$reason' WHERE adminID='$rowId'");
    }elseif ($action == 'enable') {
        $sql2 = mysqli_query($conn, "UPDATE adminacc_status SET status='1', description='$reason' WHERE adminID='$rowId'");
    }

    // if ($conn->query($sql) === TRUE) {
    //     echo '<script> alert("Record updated/deleted successfully!!!"); </script>';
    // } else {
    //     echo '<script> alert("NOPE"); </script>';
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    // }

    $conn->close();
}