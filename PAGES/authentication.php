<?php
// session_start();

if (!isset($_SESSION["admin-login"])) {
    echo
        "<script> alert('ACCESS DENIED!'); 
        window.location.href = 'index.php';
        
        </script>";  
}
