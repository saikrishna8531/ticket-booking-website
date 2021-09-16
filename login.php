<?php
    $flag = 0;
    session_start();
    if($_SESSION['is_login'] == false) {

    if(isset($_POST['username']))
    {
        $server = "localhost";
        $usrnm = "root";
        $pswrd = "";

        /* echo "hello" */

        $connection = mysqli_connect($server,$usrnm,$pswrd);

        if(!$connection)
        {
            die("Database Connection Failed" . mysqli_connect_error());
        }
        /* echo "Database Connected Succesfully"; */

        $username = $_POST['username'];
        $password = $_POST['password'];
        $hash = base64_encode($password);
        
        $query = "SELECT password FROM mini_project.login_data WHERE username='$username' and password = '$hash'";
        $result = mysqli_query($connection,$query);
        $count = mysqli_num_rows($result);

        if($count > 0)
        {
            $flag = 1;
            session_start();
            $_SESSION['is_login'] = true;
            $_SESSION['username'] = $username;
            header("Location: home.php");
        }
        
        else
        {
            echo "<p class = 'msg'>Invalid Username or Password</p>";
            echo "<p class = 'msg'>Login Failed</p>";
        }

        $connection->close();
    }
    }

    else
    {
        header("Location: home.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login_styles.css">
</head>

<body>

<div class = "already">
        <a href="index.php">
            <button class="btn">Home</button> 
        </a>
        <a href="registration.php">
            <button class="btn">Registration</button> 
        </a>
    </div>
</body>

<body>
    <div class="login_box">
        <h1>Login Here</h1>
        <form action="login.php" method="post">
            <input type="text" name="username" id="username" placeholder="Enter Your Username">
            <input type="password" name="password" id="password" placeholder="Enter Your Password">
            <button class="btn">Login</button>
        </form>
    </div>
    
</body>
</html>