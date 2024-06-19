<?php
session_start();
include '../REPORT/config.php';
define('HOST', $host);
define('USER', $username);
define('PASSWORD', $password);
define('DATABASE', $database);
require '../REPORT/class/Database.php';
require '../REPORT/class/Users.php';
require '../REPORT/class/Time.php';
require '../REPORT/class/Tickets.php';
require '../REPORT/class/Department.php';
$database = new Database;
$users = new Users;
$time = new Time;
$department = new Department;
$tickets = new Tickets;
?>
