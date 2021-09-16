<?php
    $insert = false;

    session_start();
    if($_SESSION['is_login'] == true)
    {
        include("connection.php");
        
        $username = $_SESSION['username'];

        if(empty($_POST['mdate']) || empty($_POST['stadium']) || empty($_POST['tictype']) || empty($_POST['quantity']) )
        {
            echo "<p class = 'msg'>All Fields are Required to Book the Ticket</p>";
        }

        else
        {
            $mdate = $_POST['mdate'];
            $stadium = $_POST['stadium'];
            $tictype = $_POST['tictype'];
            $quantity = $_POST['quantity'];
            $bdate = date("Y-m-d");
            
            $checker = "SELECT * FROM mini_project.match_data WHERE mdate='$mdate' AND stadium='$stadium'";
            $runner = mysqli_query($connection,$checker);
            $counter = mysqli_num_rows($runner);

            if($counter > 0)
            {
                $sql = "INSERT INTO mini_project.ticket_data (`username`, `mdate`, `stadium`, `tictype`, `quantity`,`bdate`)
                VALUES ('$username','$mdate','$stadium','$tictype','$quantity','$bdate')";

                $run = mysqli_query($connection,$sql);

                if($run)
                {
                    $insert = true;
                }

                else
                {
                    echo "ERROR . run <br> $connection->error";
                }
            }

            else
            {
                echo "<p class = 'msg'>Select the Date and Venue Accordingly. Check Upcoming Matches</p>";
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
    <title>Booking Page</title>
    <link rel="stylesheet" href="bookticket_styles.css">
</head>

<body>
    <?php 
        if($insert == true)
        {
            echo "<p class = 'msg'>Ticket Successfully Booked</p>";
        }
    ?>

    <div class="place">
        <a href="home.php">
            <button class="btns">Home</button>
        </a>
    </div>
    
    <div class="book_box">
        <h1>Book Your Ticket</h1>
        <form action="bookticket.php" method="post">
            <label>(Select Match Date)</label>
            <input type="date" name="mdate" id="mdate">
            <label>(Select Stadium)</label>
            <select name="stadium" id="stadium">
                <option value="">Select a Stadium</option>
                <option value="chennai">Chennai</option>
                <option value="ahmedabad">Ahmedabad</option>
                <option value="pune">Pune</option>
            </select>
            <label>(Select Type of Ticket)</label>
            <select name="tictype" id="tictype">
                <option value="">Select Ticket Type</option>
                <option value="upper">Upper View</option>
                <option value="lower">Lower View</option>
                <option value="vip">VIP</option>
            </select>
            <label>(Enter Quantity)</label>
            <input type="number" name="quantity" id="quantity" placeholder="Enter the Number of Tickets" min="1" max="6">
            <button class="btn">Book</button>
        </form>
    </div>
</body>
</html>