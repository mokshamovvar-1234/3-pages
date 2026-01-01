<?php
session_start();

// Protect page: only logged-in users
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Handle logout if button is clicked
if (isset($_POST['logout'])) {
    session_unset();    
    session_destroy();   
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    <link rel ="stylesheet" href="homepage.css">
</head>
<body class="body-home">
<div  class="home-container">

    <div>
        <h1 class="welcome">Welcome!</h1>
    </div>
    <div></div>

    <div >
        <p>Hello, <strong><?= htmlspecialchars($username) ?></strong> 👋  
        <br>This is your homepage.</p>

        <div >
            <!-- Profile button -->
            <form action="profile.php" method="GET" style="display:inline;">
                <button type="submit" class="home-btn">Profile</button>
</form>

            <!-- Logout button -->
            <form method="POST" style="display:inline;">
                <button type="submit" name="logout" class="home-btn">Logout</button>
            </form>
        </div>
    </div>

</div>
</body>
</html>