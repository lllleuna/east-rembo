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
                        <th>ROLE</th>
                        <th>DATE OF SUBMITTION</th>
                        <th>STATUS</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    $id_seeker = $_SESSION["logged_seeker"]['id'];
                    $rows = mysqli_query($conn, "SELECT * FROM application WHERE  idSeeker='$id_seeker' AND status_of_application='Not Yet Reviewed' OR status_of_application='PENDING'");
                    foreach($rows as $row) :
                    ?>
                    <tr>
                        <td> <?php echo $i++; ?> </td>
                        <td> <?php echo $row["Role"]; ?> </td>
                        <td> <?php echo $row["submitted_at"]; ?> </td>
                        <?php 
                            $idSeeker = $row["idSeeker"]; 
                            $idapply = $row["idapply"];
                        ?>
                        <td> <?php echo $row["status_of_application"]; ?> </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
</body>
</html>