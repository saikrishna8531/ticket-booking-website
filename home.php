<?php
    session_start();
    if($_SESSION['is_login'] == true)
    {
        $username = $_SESSION['username'];
    }

    else
    {
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="home_styles.css">
</head>

<body>
    <h1>Welcome <?php echo $username ?></h1>
    <div class="home"></div>

    <div class="already">
        <a href="home.php">
            <button class="btn">Home</button>
        </a>

        <a href="stadium.php">
            <button class="btn">Stadium Information</button>
        </a>

        <a href="profile.php">
            <button class="btn">Update Profile</button>
        </a>
        
        <a href="upcoming.php">
            <button class="btn">Upcoming Matches</button>
        </a>

        <a href="bookticket.php">
            <button class="btn">Book A Ticket</button>
        </a>
        
        <a href="history.php">
            <button class="btn">Booking History</button>
        </a>
        
        <a href="logout.php">
            <button class="btn">Logout</button>
        </a>
    </div>
</body>
</html>