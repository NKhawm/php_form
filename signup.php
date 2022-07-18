<?php
session_start();

include("connection.php");
include("function.php");
$error="";

 if($_SERVER['REQUEST_METHOD'] == "POST")
 //if(isset($_POST['submit']))
{ print_r($_POST);




    //somthing was posted

    $username = $_POST['user_name'];  //trim
    // if(!preg_match("/^[a-zA-Z ]+$/" ,$username))
    // {
    //     $error= "Please enter a valid username.";
    // }
    //  $username=esc($username);

    $email = $_POST['email'];
    if(!preg_match("/^[\w\-]+@[\w\]+.[\w\]+$/" ,$email))
    {
        $error = "Please enter a valid email.";
    }
    else{
        echo "thank you for signing up.";
    }
    $phone_no= $_POST['phone_number'];
    $age= $_POST['age'];
    $password = $_POST['user_password'];
    $confirmpwd = $_POST['confirm_password'];
    // if($error == "")

    $query = "INSERT INTO users (user_name,email_address,phone_no,age,password) 
    VALUES ('$username','$email','$phone_no','$age','$password')";
    echo $query;
    mysqli_query($con,$query);

    //header("Location:login.php");
    //die;

}

//     if(!empty($username) && !empty($email) && !empty($phone_no) && !empty($age) && !empty($password) && !empty($confirmpwd) && !is_numeric($username))
//     {
// //save to database
// $user_id = random_num(8);
//        $query = "INSERT INTO users (user_id,user_name,email_address,phone_no,age,password)
//                  VALUES ('$user_id','$username','$email','$phone_no','$age','$password')";
                 
//                  msqli_query($con,$query);

//                 header("Location=login.php");
//                  die;
        
//     }
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
    <title>Signup</title>
</head>
<body>
    <h1>Signup</h1>
    <div class="box">
        <form action="" method="post">
            <div> <?php
            if(isset($error) && $error != "")
            {
                echo $error;
            } 
            ?> </div>
            <label for="user_name">Username</label><br>
            <input type="text" name="user_name">
<br><br>

            <label for="email">Email</label><br>
            <input type="text" name="email">
<br><br>

            
            <label for="phone number">Phone number</label><br>
            <input type="text" name="phone_number">
<br><br>
            
            <label for="age">Age</label><br>
            <input type="number" name="age">
<br><br>
            
            <label for="password">Password</label><br>
            <input type="password" name="user_password">
<br><br>

            <label for="confirm">Confirm Password</label><br>
            <input type="password" name="confirm_password">
<br><br>
            <input type="submit" value="Signup" name="submit"><br><br>
            <p>If you are already registered, <a href="login.php"> Log in </a>here.</p>

        </form>
    </div>
    
</body>
</html>