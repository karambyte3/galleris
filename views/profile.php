<h1>Profile</h1>

<?php 
$title = 'My profile';
needLogin();

echo $_SESSION['username'];
echo $_SESSION['success'];

// var_dump($_SESSION);
// print('<pre>' . print_r($_SESSION) . '</pre>');


    
?>

<a href="logout">Logout</a>