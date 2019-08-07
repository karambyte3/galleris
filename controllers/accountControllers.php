<?php

function upload_image(){

}

// When /login route is accessed
function login() {
    isLogged();

    if (isset($_POST['loginUser'])) {
        $conn = $GLOBALS['conn'];

        $username = test_input($_POST['username']);
        $password = test_input($_POST['password']);
        // if (preg_match('/^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/', $username) == false) { array_push($errors, "Invalid username"); }
        
        
        if (empty($username)) {
            array_push($errors, "Username is required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }
        
        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
            $results = mysqli_query($conn, $query);
            if (mysqli_num_rows($results) == 1) {

            session_start();
                $_SESSION['username'] = $username;
                $_SESSION['authenticated'] = true;
                redirect('profile');
                exit();
                // mysqli_close($conn);
              
            }else {
                array_push($errors, "Wrong username/password combination");
            }
        }
      }

}

// When /register route is acessed
function register() {
    isLogged();

    if (isset($_POST['registerUser'])) {
        $conn = $GLOBALS['conn'];

        $username = test_input($_POST['username']);
        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']);
        $password2 = test_input($_POST['password2']);
        $errors = array();

        // form validation: ensure that the form is correctly filled ...
        // by adding (array_push()) corresponding error unto $errors array
        if (strlen($username) < 3) {
            array_push($errors, "Username is required");
        }
        if (preg_match('/^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/', $username) == false) {
            array_push($errors, "Invalid username");
        }
        if (empty($email)) {
            array_push($errors, "Email is required");
        }
        if (preg_match('/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+/', $email) == false) {
            array_push($errors, "Invalid email");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }
        if (strlen($password) < 5) {
            array_push($errors, "Invalid password");
        }
        if ($password != $password2) {
            array_push($errors, "The two passwords do not match");
        }


    // first check the database to make sure 
    // a user does not already exist with the same username and/or email

    $sql_u = "SELECT * FROM users WHERE username='$username'";
    $sql_e = "SELECT * FROM users WHERE email='$email'";
    $res_u = mysqli_query($conn, $sql_u);
    $res_e = mysqli_query($conn, $sql_e);
    
    if (mysqli_num_rows($res_u) > 0) {
        array_push($errors, "Username already exists");	
    }
      
    if(mysqli_num_rows($res_e) > 0){
    array_push($errors, "Email already exists"); 	
    }

        // Finally, register user if there are no errors in the form
        if (count($errors) == 0) {
            $password = md5($password);//encrypt the password before saving in the database
            $query = "INSERT INTO users(username, email, password) 
                        VALUES('$username', '$email', '$password')";

            if(mysqli_query($conn, $query)) {
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['authenticated'] = true;
                echo 'Welcome ' .$_SESSION['username'];
                redirect('profile');
                mysqli_close($conn);
            }
        }
    }

    return array(
        'errors' => $errors
    );

}

function upload()
{}

 