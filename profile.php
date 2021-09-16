<?php
    $insert = false;

    session_start();
    if($_SESSION['is_login'] == true)
    {
        include("connection.php");
        
        $username = $_SESSION['username'];

        /* $query = "SELECT * FROM mini_project.registration_data WHERE username = '$uname'";
        $data = mysqli_query($connection,$query);
        $total = mysqli_num_rows($data);
        //$result = mysqli_fetch_assoc($data);

        if($total > 0)
        {
            $result = mysqli_fetch_assoc($data);

            $name = $result['name'];
            $username = $result['username'];
            $email = $result['email'];
            $phone = $result['phone'];
            $city = $result['city'];
        } */

        if(empty($_POST['name']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['city']))
        {
            echo "<p class = 'msg'>All Fields are Required for Updation</p>";
        }

        else if(is_numeric($_POST['phone']) == false)
        {
            echo "<p class = 'msg'>Enter a Valid Phone Number</p>";
        }
    
        else
        {
            $name = $_POST['name'];
            $password = $_POST['password'];
            $key = base64_encode($password);
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $city = $_POST['city'];
        
            $query = "UPDATE mini_project.registration_data SET name = '$name', password = '$key', email = '$email', phone = '$phone', city = '$city' WHERE username = '$username'";    
            $run = mysqli_query($connection,$query);

            if($run)
            {
                 $query = "UPDATE mini_project.login_data SET password = '$key' WHERE username = '$username'";
                 $run1 = mysqli_query($connection,$query);

                 if($run1)
                 {
                     $insert = true;
                 }

                 else
                 {
                    echo "ERROR . $run <br> $connection->error";     
                 }
            }

            else
            {
                echo "ERROR . $run1 <br> $connection->error";
            }
    
        }
    }
    
    else
    {
        echo "Database Connection Failed";
        echo "<br>";
        echo "Please Login and Try Again";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile Page</title>
    <link rel="stylesheet" href="registration_styles.css"> <!-- linking the reference files -->
</head>

<body>
    <div class = "container"> <!-- this links to the container class in css-->
        <h1>Hello <?php echo "($username)"?> Update Your Profile</h1>
        <h3>(If you want to change, Enter new data, else enter old data)</h3>
        <?php
            if($insert == true)
            {
                echo "<p class = 'msg'>Updation Successful. Go Back</p>";
            }
        ?>
        <!-- Creation of a Registration Form -->
        <form action="profile.php" method="post">
            <input type="text"  name="name"    id="name"    placeholder="Update Name">
            <input type="password"  name="password"   id="password"   placeholder="Update Password">
            <input type="email" name="email"   id="email"   placeholder="Update Email">
            <input type="phone" name="phone"   id="phone"   placeholder="Update Phone">
            <input type="text"  name="city"    id="city"    placeholder="Update City">
            <a href="profile.php">
                <button class="btn">Update</button>
            </a>    
        </form>
        <a href="home.php">
                <button class="btn">Go Back</button>
        </a>
    </div>
</body>
</html>