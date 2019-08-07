<?php 
// Deny access if user is not logged in the website
    function needLogin() {
        if (empty($_SESSION['authenticated'] || $_SESSION['authenticated'] == true)) {
            redirect('');
            exit;
        } 
    }

// If user is logged, ban access to register and login route
    function isLogged() {
        if (isset($_SESSION['username'])) {
            redirect(' ');
            exit();
        }
    }

    function checkNavButtons() {
        if (isset($_SESSION['username'])) {
            echo '
            <li><a href="upload" class="mr-5">Upload</a></li>
            <li><a href="profile">My profile</a></li>
            <li><a href="logout">Logout</a></li>';
        } else {
            echo '<li><a href="login">Login</a>/<a href="register">Register</a></li>';
        }
    }
?>