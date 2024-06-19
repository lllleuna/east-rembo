<?php
    session_start();
    $conn = mysqli_connect('eastdatabase.mysql.database.azure.com', 'leuna', 'Pa$$word1', 'east_rembo_citizen_db');
    
    $conn->set_charset("utf8mb4");