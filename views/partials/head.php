<?php 
    include '../../config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title;?></title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/cssreset.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

<nav id="navbar">
        <a href="/" id="title">
            <h3> Gallery <sub>by Stefan Kalenderov</sub></h3>
        </a>
        <ul id="menu">
            <li><a href="#">Home</a></li>
            <li><a href="#">Photos</a></li>
            <li><a href="#">About me</a></li>
            <li><a href="#">Contact</a></li>
            <a href="profile.html" class="btn btn-outline-dark d-inline float-right">My profile</a>
        </ul>
    </nav>