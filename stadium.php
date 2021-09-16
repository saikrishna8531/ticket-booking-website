<?php

    $check = false;

    session_start();
    if($_SESSION['is_login'] == true)
    {
        include("connection.php");
        $username = $_SESSION['username'];

        $stadium_name = $_POST['stadium'];
        $query = "SELECT * FROM mini_project.stadium_data WHERE sname='$stadium_name'";
        $result = mysqli_query($connection,$query);
        $count = mysqli_num_rows($result);

        if($count > 0)
        {
            $data = mysqli_fetch_assoc($result);

            $sname = $data['sname'];
            $cname = $data['cname'];
            $capacity = $data['capacity'];
            $address = $data['address'];
            $pitchtype = $data['pitchtype'];
            $owner = $data['owner'];

            $imagesrc = $data['imagesrc'];

            $check = true;
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
    <title>Stadium Information Page</title>
    <link rel="stylesheet" href="stadium_styles.css">
</head>
<body>
    <form action="stadium.php" method="post">
        <div class="temp">
            <select name="stadium" id="stadium">
                    <option>Select a Stadium</option>
                    <option value="Wankhede">Wankhede - Mumbai</option>
                    <option value="Motera">Motera - Ahmedabad</option>
                    <option value="Chidambaram">Chidambaram - Chennai</option>
                    <option value="MCA">MCA - Pune</option>
                    <option value="Chinnaswamy">Chinnaswamy - Bangalore</option>
            </select>
            <button class="btns">Search</button>
        </div>
    </form>
    <?php echo "<img src=$imagesrc>" ?>
    
</body>

<body>
    <a href="home.php">
        <button class="btn">Go Back</button>
    </a>
    <div class="details"> <?php

        if($check == true)
        {
            echo "<h1>$sname - $cname</h1>";
            echo "<h1>Capacity : $capacity</h1>";
            echo "<h1>Address: $address</h1>";
            echo "<h1>Pitch Type : $pitchtype</h1>";
            echo "<h1>Ground Owner : $owner</h1>";
        }
        ?>
    </div>
</body>
</html>