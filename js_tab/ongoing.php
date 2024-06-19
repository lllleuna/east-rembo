<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/data.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="table-wrapper">
                <table border = 1 class="fl-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>YOUR ROLE</th>
                        <th>EMPLOYER NAME</th>
                        <th>CONTACT</th>
                        <th>PLACE</th>
                        <th>DATE</th>
                        <th>TIME</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    $id_seeker = $_SESSION["logged_seeker"]['id'];
                    $rows = mysqli_query($conn, "SELECT * FROM job_details WHERE  idSeeker='$id_seeker' AND hiring_status='ACCEPTED'");
                    foreach($rows as $row) :
                    ?>
                    <tr>
                        <td> <?php echo $i++; ?> </td>
                        <td> <?php echo $row["Role"]; ?> </td>
                        <td> <?php echo $row["employer_name"]; ?> </td>
                        <td> <?php echo $row["contact"]; ?> </td>
                        <td> <?php echo $row["place"]; ?> </td>
                        <td> <?php echo $row["date"]; ?> </td>
                        <td> <?php echo $row["time"]; ?> </td>
                        <?php 
                            $idSeeker = $row["idSeeker"]; 
                            $idapply = $row["idapply"];
                        ?>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
</body>
</html>