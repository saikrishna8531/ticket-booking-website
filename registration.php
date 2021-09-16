<?php

$insert = false;

if(empty($_POST['name']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['city']))
{
        echo "<p class = 'msg'>All Fields are Required for Registration</p>";
}

else if(is_numeric($_POST['phone']) == false)
{
        echo "<p class = 'msg'>Enter a Valid Phone Number</p>";
}

else
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

    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];

    $key = base64_encode($password);

    $sql1 = "INSERT INTO `mini_project`.`registration_data` (`name`, `username`, `password`, `email`, `phone`, `city`)
    VALUES ('$name', '$username', '$key', '$email', '$phone', '$city')";

    $sql2 = "INSERT INTO `mini_project`.`login_data` (`username`,`password`)
    VALUES ('$username','$key')";

    // echo $sql;

    if( ($connection->query($sql1) == true) && ($connection->query($sql2) == true) )
    {
        // echo "Successfully Inserted";
        $insert = true;
    }

    else
    {
        echo "ERROR . $sql1 <br> $connection->error";
    }
    
    $connection->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="registration_styles.css"> <!-- linking the reference files -->
</head>

<body>
    <div class = "already">
        <a href="index.php">
            <button class="btn">Home</button> 
        </a>
        <a href="login.php">
            <button class="btn">Login</button> 
        </a>
    </div>
</body>

<body>
    <div class = "container"> <!-- this links to the container class in css-->
        <h1>User Registration Form</h1>
        <?php
            if($insert == true)
            {
                echo "<p class = 'msg'>Your Response has been successfully recorded</p>";
            }
        ?>
        <!-- Creation of a Registration Form -->
        <form action="registration.php" method="post">
            <input type="text"  name="name"    id="name"    placeholder="Enter Your Name">
            <input type="text"  name="username"   id="username"   placeholder="Enter Your Username">
            <input type="password" name="password" id="password" placeholder="Enter Your Password">
            <input type="email" name="email"   id="email"   placeholder="Enter Your Email">
            <input type="phone" name="phone"   id="phone"   placeholder="Enter Your Phone">
            <input type="text"  name="city"    id="city"    placeholder="Enter Your City">
            <button class="btn">Submit</button>
            <!-- <button class="btn">Reset</button> -->
        </form>
    </div>
</body>
</html>






