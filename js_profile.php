<?php require 'PAGES/config.php'; 
if (!isset($_SESSION["seeker-login"])) {
    echo
        "<script> alert('ACCESS DENIED!'); 
        window.location.href = 'index.php';
        
        </script>";  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>