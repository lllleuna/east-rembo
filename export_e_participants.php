
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/data.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="icon" href="Assets/east logo.png" type="image/icon type">
</head>
<body>

    <div class="export-btn">
        <a href="admin_portal.php"> <button type="button" name="button">Dashboard</button></a>
        <a href="export.php"> <button type="button" name="button">Export To Excel</button> </a>
        <hr>
        
<center><h1 style="color:#1e5892;"> EVENT PARTICIPANTS</h1></center>
        <?php require 'data_parti.php'; ?>
    </div>
    
</body>
</html>