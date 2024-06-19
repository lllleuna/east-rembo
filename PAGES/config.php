<?php
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'east_rembo_citizen_db');
    
    $conn->set_charset("utf8mb4");