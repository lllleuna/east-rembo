
<?php require '../PAGES/config.php'; ?>

<?php  
 //Get Update id and status  
 if (isset($_GET['id']) && isset($_GET['status'])) {  
      $id=$_GET['id'];  
      $status=$_GET['status'];  
      mysqli_query($conn,"UPDATE Application set status_of_application='$status' where idapply='$id'");  
      header("location:seeker.php");  
      die();  
 }  
 ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/data.css">
    <link rel="stylesheet" href="css.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Seeker</title>
</head>
<body>

<a href="../admin_portal.php"> <button type="button" name="button">Dashboard</button></a>
<hr>
<center><h1 style="color:#1e5892;">JOB SEEKER PROFILE REVIEW</h1></center>
<div class="table-wrapper">
    <table border = 1 class="fl-table">
        <thead>
        <tr>
            <th>#</th>
            <th>NAME</th>
            <th>BIRTHDAY</th>
            <th>PHONE NO.</th>
            <th>EMAIL</th>
            <th>ADDRESS</th>
            <th>ROLE</th>
            <th>RESUME</th>
            <th>TIME SUBMITTED</th>
            <th>STATUS</th>
            <th>ACTION</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $i = 1;
        $rows = mysqli_query($conn, "SELECT * FROM Application");
        foreach($rows as $row) :
        ?>
        <tr>
            <td> <?php echo $i++; ?> </td>
            <td> <?php echo $row["Name"]; ?> </td>
            <td> <?php echo $row["Bday"]; ?> </td>
            <td> <?php echo $row["Phone_no"]; ?> </td>
            <td> <a href=""><?php echo $row["Email"]; ?></a> </td>
            <td> <?php echo $row["Address"]; ?> </td>
            <td> <?php echo $row["Role"]; ?> </td>
            <td> <a href="../RESUME/<?php echo $row["Filename"]; ?>"><?php echo $row["Filename"]; ?></a> </td>
            <td> <?php echo $row["submitted_at"]; ?> </td>
            <td> <?php echo $row["status_of_application"]; ?> </td>
            <td>  
                <select onchange="status_update(this.options[this.selectedIndex].value,'<?php echo $row['idapply'] ?>')">  
                    <option value="">Update Status</option>  
                    <option value="PENDING">Pending</option>  
                    <option value="ACCEPTED">Accept</option>  
                    <option value="REJECTED">Reject</option>  
                </select>  
            </td> 
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <script type="text/javascript">  
        function status_update(value,id){  
            //alert(id);  
            let url = "http://localhost/EAST_REMBO/job/seeker.php";  
            window.location.href= url+"?id="+id+"&status="+value;  
        }  
    </script> 


</div>
</body>
</html>