<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'enroll';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// For user registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup-submit'])) {
    $user_email = $_POST['user_email'];
    $user_name = $_POST['user_name'];
    $user_pass = password_hash($_POST['user_pass'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (user_name, email, pass) VALUES ('$user_name', '$user_email', '$user_pass')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful, welcome $user_name";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// For user login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login-submit"])) {
    $user_login = $_POST['user_login'];
    $user_password = $_POST['user_password'];

    $sql = "SELECT * FROM user WHERE email='$user_login' OR user_name='$user_login'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($user_password, $row['pass'])) {
            echo "Login successful, welcome " . $row['user_name'];
        } else {
            echo "Wrong password";
        }
    } else {
        echo "User not found";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="login.js"></script>
    <title>Login</title>
</head>
<body>

<div class="form-wrap">
    <div class="tabs">
        <h3 class="signup-tab"><a class="active" href="#signup-tab-content">Sign Up</a></h3>
        <h3 class="login-tab"><a href="#login-tab-content">Login</a></h3>
    </div><!--.tabs-->

    <div class="tabs-content">
        <div id="signup-tab-content" class="active">
            <form class="signup-form" action="" method="post">
                <input type="email" class="input" name="user_email" id="user_email" autocomplete="off" placeholder="Email">
                <input type="text" class="input" name="user_name" id="user_name" autocomplete="off" placeholder="Username">
                <input type="password" class="input" name="user_pass" id="user_pass" autocomplete="off" placeholder="Password">
                <input type="submit" class="button" name="signup-submit" value="Sign Up">
            </form>
            <div class="help-text">
                <p>By signing up, you agree to our</p>
                <p><a href="#">Terms of service</a></p>
            </div><!--.help-text-->
        </div><!--.signup-tab-content-->

        <div id="login-tab-content">
            <form class="login-form" action="" method="post">
                <input type="text" class="input" name="user_login" id="user_login" autocomplete="off" placeholder="Email or Username">
                <input type="password" class="input" name="user_password" id="user_password" autocomplete="off" placeholder="Password">
                <input type="submit" class="button" name="login-submit" value="Login">
            </form>
            <div class="help-text">
                <p><a href="#">Forget your password?</a></p>
            </div><!--.help-text-->
        </div><!--.login-tab-content-->
    </div><!--.tabs-content-->
</div><!--.form-wrap-->
</body>
</html>
