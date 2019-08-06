<?php 
define('SITE_URL', 'http://localhost/galleris/');

$servername = "localhost";
$username = "root";
$password = "";
$db = 'gallery_db';
// Create connection

$conn = mysqli_connect($servername, $username, $password, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

