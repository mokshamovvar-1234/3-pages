<?php
include 'connect.php';

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    // Check if passwords match
    if ($password !== $confirmpassword) {  
        echo "Passwords do not match";
        exit;
    }

    // Hash password (important)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database
    $sql = "INSERT INTO users (name, email, password)
            VALUES ('$name', '$email', '$hashedPassword')";

    if (mysqli_query($conn, $sql)) {
        header("Location: login.php");
        exit;
    }else{
        echo "Error: " . mysqli_error($conn);
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
    <h1>Sign Up Page</h1>
    <div class="form">
        <form action="" method="post">
            <!-- <div> -->
                <input type="text" name="name" placeholder="Enter your name">
            <!-- </div> -->
            <div>
                <input type="text" name="email" placeholder="Enter your email">
            </div>
            <div>
                <input type="password" name="password" placeholder="Enter your password">
            </div>
            <div>
                <input type="password" name="confirmpassword" placeholder="confirmpassword">
            </div>

            <button type="submit" class="button1" name="submit">Signup Now</button>
            <p>Already have an account <a href="login.php">Login Now</a></p>
        </form>
    </div>
</body>

</html>