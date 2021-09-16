<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking History</title>
    <link rel="stylesheet" href="history_styles.css">
</head>


<body>
    <a href="home.php">
        <button class="btn">Home</button>
    </a>
    <table>
        <tr>
            <th>Ticket Id</th>
            <th>Username</th>
            <th>Match Date</th>
            <th>Stadium</th>
            <th>Ticket Type</th>
            <th>Quantity</th>
            <th>Date of Booking</th>
        </tr>
        <?php
            $insert = false;
    
            session_start();
            if($_SESSION['is_login'] == true)
            {
                include("connection.php");
            
                $username = $_SESSION['username'];
            
                $query = "SELECT * FROM mini_project.ticket_data WHERE username = '$username'";
                $data = mysqli_query($connection,$query);
                $total = mysqli_num_rows($data);
                //$result = mysqli_fetch_assoc($data);
            
                if($total > 0)
                {
                    while($result = mysqli_fetch_assoc($data))
                    {
                        $tid = $result['tid'];
                        $mdate = $result['mdate'];
                        $stadium = $result['stadium'];
                        $tictype = $result['tictype'];
                        $quantity = $result['quantity'];
                        $bdate = $result['bdate'];

                        //echo $tid . " " . $mdate . $bdate . "<br>";
                        echo "<tr><td>" . $tid . "</td><td>" . $username . "</td><td>" . $mdate . "</td><td>" . $stadium . "</td><td>" . $tictype . "</td><td>" . $quantity . "</td><td>" . $bdate . "</td></tr>";
                        // echo $tid . " " . $username . " " . $mdate . " " . $stadium . " " . $tictype . " " . "$quantity" . " ". $bdate . "<br>";
                    }
                    
                    echo "</table>";
                }

                else
                {
                    echo "<h1> NO TICKETS HAVE BEEN BOOKED </h1>";
                }
            }

            else
            {
                echo "Database Connection Failed";
                echo "<br>";
                echo "Please Login and Try Again";
            }

            $connection->close();
        ?>
    </table>
</body>
</html>