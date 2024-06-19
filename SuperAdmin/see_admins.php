<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="sa.css">
    <link rel="stylesheet" href="see_admins.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include '../PAGES/config.php';
        include 'nav.php';
    ?>

    <div class="title1">
        <h2>Registered Admins</h2>
    </div>

<table id="dataTable" class="see-admin">
        <thead class="see-admin">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Name</th>
                <th>Department</th>
                <th>Date Created</th>
            </tr>
        </thead>
        <tbody class="see-admin">
        <?php
            $i = 1;
            $rows = mysqli_query($conn, "SELECT * FROM admin_account");
            foreach($rows as $row) :
        ?>
            <?php
                $id = $row["idAdmin_Account"];
                $status = mysqli_query($conn, "SELECT * FROM adminacc_status WHERE adminID=$id");
                $stat =  mysqli_fetch_assoc($status);
                $dbstat = $stat["status"];
            ?>
            <tr data-id="<?php echo $id ?>" 
            data-usern='<?php echo $usern = $row["UserN"]; ?>'
            data-name='<?php echo $name = $row["Name"]; ?>'
            data-stat='<?php echo $dbstat; ?>'>
                <td><?php echo $id; ?></td>
                <td><?php echo $usern; ?></td>
                <td class="format"><?php echo $name; ?></td>
                <td><?php echo $row["Department"]; ?></td>
                <td><?php echo $row["created_at"]; ?></td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>

    <div id="contextMenu" class="context-menu">
        <ul>
            <li onclick="enable()">Enable Account</li>
            <li onclick="resetPass()">Reset Password</li>
            <li onclick="disable()">Disable Account</li>
            <li onclick="deleteRow()">Delete</li>
        </ul>
    </div>

    
    <script> console.log("Hello"); </script>
    <script src="see_admins.js"></script>
</body>
</html>