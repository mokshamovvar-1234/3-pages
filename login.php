<?php
include ('connect.php');
session_start();
   
if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if($password !==$password){
        echo "password do not match";
        exit;
    }

    $query ="SELECT * FROM users WHERE email='$email' AND password ='$password'";
    $result = mysqli_query($conn,$query);
    if(
        mysqli_num_rows($result) == 1 ){
            $_SESSION['username'] = $email;
            header("location: homepage.php");
        exit();
        }else{ 
            echo "error;" .mysqli_error($conn);
        }
        } 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form2">
        <form action="" method="POST">
        <h1>Login Page</h1>
        <div>
            <input type="text"class= "input2" name="email" placeholder="Enter your email or username">
        </div>
        <div>
            <input type="password" class="input2" name="password" placeholder="Enter your password">
        </div>
        <button type="submit" class="button2" name="submit">Login</button>
        <p>Register Now <a href="signup.php"> Sign Up</a></p>
</form>
    </div>

</body>

</html> 
  
  
  
  
  
  

    
