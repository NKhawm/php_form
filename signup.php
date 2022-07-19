<?php
session_start();
$_SESSION;

include("connection.php");
 include("function.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
   
</head>
<body>
<style>
       .error {color:red;} 
        </style>
<?php
$nameErr = $emailErr = $phoneErr = $ageErr = $passwordErr = $confirmErr = "";

if ($_SERVER['REQUEST_METHOD'] == "POST")


{ 
    print_r($_POST);
   $username = $_POST['user_name']; 
   if(empty($username))
   {
    $nameErr = "A valid user name is required.";  
   }

   $email = $_POST['email'];
   if(!preg_match("/^[\w\-]+@[\w\]+.[\w\]+$/" ,$email) && empty($email))
   {
       $emailErr = "A valid email is required.";
   }
  
   $phone_no= $_POST['phone_number'];
   if( $phone_no < 11 && empty($phone_no))
   {
       $phoneErr = "Please enter a valid phone number.";
   }
   $age= $_POST['age'];
   if($age < 13 && empty($age))
   {
       $ageErr = "You have to be at least 13 years old to register.";
   }
   $password = $_POST['user_password'];
   if($password < 8 && empty($password))
   {
       $passwordErr = "Password must contain at least 8 charater.";
   }
   if(!preg_match("/[A-Z]/i", $password))
   {
    $passwordErr = "Password must contain at least one capital letter.";
   }
   if(!preg_match("/[0-9]/",$password))
   {
    $passwordErr = "Password must contain at least one number.";
   }
  
  
   $confirmpwd = $_POST['confirm_password'];
   if ($password !== $confirmpwd)
   {
     $confirmErr = "Password must match.";
   }
   
  else{
   
  $user_id = random_num(8);
   $query = "INSERT INTO users (user_id,user_name,email_address,phone_no,age,password) 
   VALUES ('$user_id','$username','$email','$phone_no','$age','$password')";
   echo $query;
   mysqli_query($con,$query);



    header("Location:login.php");
    die;
}

}




?>

    <h1>Signup</h1>
    <div class="box">
        <form action="" method="post">
            
            <label for="user_name">Username</label><br>
            <input type="text" name="user_name"><br>
            <span class="error"><?php echo $nameErr; ?></span>
<br><br>

            <label for="email">Email</label><br>
            <input type="text" name="email"><br>
            <span class="error"><?php echo $emailErr; ?></span>
<br><br>

            
            <label for="phone number">Phone number</label><br>
            <input type="text" name="phone_number"><br>
            <span class="error"><?php echo $phoneErr; ?></span>
<br><br>
            
            <label for="age">Age</label><br>
            <input type="number" name="age"><br>
            <span class="error"><?php echo $ageErr; ?></span>
<br><br>
            
            <label for="password">Password</label><br>
            <input type="password" name="user_password"><br>
            <span class="error"><?php echo $passwordErr; ?></span>
<br><br>

            <label for="confirm">Confirm Password</label><br>
            <input type="password" name="confirm_password"><br>
            <span class="error"><?php echo $confirmErr; ?></span>
<br><br>
            <input type="submit" value="Submit" name="submit"><br><br>
            <p>If you are already registered, <a href="login.php"> Log in </a>here.</p>

        </form>
    </div>
    
</body>
</html>