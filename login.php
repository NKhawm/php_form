<?php
session_start();
include('connection.php');
include('function.php');
$error="";

 if($_SERVER['REQUEST_METHOD'] == "POST")
 {

$email = $_POST['email'];
    if(!preg_match("/^[\w\-]+@[\w\]+.[\w\]+$/" ,$email))
    {
        $error = "Please enter a valid email.";
    }
    $password = $_POST['user_password'];
    if($error == "")
{
    $query = "SELECT*FROM users (user_name,email_address,phone_no,age,password) 
    VALUES ('$username','$email','$phone_no','$age','$password')";
    mysqli_query($con,$query);

    header("Location:home.php");
    die;
}
}


// if(isset($_POST['submit']))
// {
//     //somthing was posted
//     $username = $_POST['user_name'];
//     $email = $_POST['email'];
//     $phone_no= $_POST['phone_number'];
//     $age= $_POST['age'];
//     $password = $_POST['user_password'];
//     $confirmpwd = $_POST['confirm_password'];

//     if(!empty($username) && !empty($email) && !empty($phone_no) && !empty($age) && !empty($password) && !empty($confirmpwd) && !is_numeric($username))
//     {
// //read from database

//        $query = "SELECT * FROM users WHERE user_name = '$username' limit 1";
//        $result = mysqli_query($con, $query);

//        if($result)
//        {
//            if($result && myqli_num_row($result) > 0)
//            {
//                $user_data= msqli_fetch_assoc($result);

//                if($user_date['password']=== $password)
//                {
//                    $_SESSION['user_id'] = $user_data['user_id'];
//                    header("Location:home.php");
//                    die;
//                }
//             }
//        }
//     }
//     echo "Wrong username or password.";
//     else

//     {
//         echo "Please enter valid information.";
//     }

// }
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