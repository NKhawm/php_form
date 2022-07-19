<?php
session_start();
include('connection.php');
include('function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <div class="box">
        <form action="" method="post">
            <label for="user_name">Username</label><br>
            <input type="text" placeholder="Enter your email address" name="user_name">
<br><br>
            <label for="user_name">Password</label><br>
            <input type="password" placeholder="Enter your password" name="user_password">
<br><br>
            <input type="submit" value="login"><br><br>
            <p>Don't have an account with us?<a href="signup.php"> Signup </a>here.</p>

        </form>
    </div>
    
</body>
</html>