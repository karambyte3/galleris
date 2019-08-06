<?php

function redirect($url) {
    header('Location:' . SITE_URL . $url);
    exit();
 }

 function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}