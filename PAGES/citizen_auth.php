<?php
session_start();

if (!isset($_SESSION["citizen-login"])) {
    echo
        "<script> alert('ACCESS DENIED!'); 
        window.location.href = 'index.php';
        
        </script>";  
}