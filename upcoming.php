<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Matches</title>
    <link rel="stylesheet" href="upcoming_styles.css">
</head>


<body>
    <a href="home.php">
        <button class="btn">Home</button>
    </a>
    <table>
        <tr>
            <th>Match Id</th>
            <th>Match Date</th>
            <th>Venue</th>
            <th>Team 1</th>
            <th>Team 2</th>
            <th>Match Type</th>
        </tr>
        <?php
            $insert = false;
    
            session_start();
            if($_SESSION['is_login'] == true)
            {
                include("connection.php");
            
                $username = $_SESSION['username'];
            
                $query = "SELECT * FROM mini_project.match_data";
                $data = mysqli_query($connection,$query);
                $total = mysqli_num_rows($data);
                //$result = mysqli_fetch_assoc($data);
            
                if($total > 0)
                {
                    while($result = mysqli_fetch_assoc($data))
                    {
                        $mid = $result['mid'];
                        $mdate = $result['mdate'];
                        $stadium = $result['stadium'];
                        $team1 = $result['team1'];
                        $team2 = $result['team2'];
                        $mtype = $result['mtype'];

                        //echo $tid . " " . $mdate . $bdate . "<br>";
                        echo "<tr><td>" . $mid . "</td><td>" . $mdate . "</td><td>" . $stadium . "</td><td>" . $team1 . "</td><td>" . $team2 . "</td><td>" . $mtype . "</td></tr>";
                        // echo $tid . " " . $username . " " . $mdate . " " . $stadium . " " . $tictype . " " . "$quantity" . " ". $bdate . "<br>";
                    }
                    
                    echo "</table>";
                }

                /* else
                {
                    echo "<h1> NO TICKETS HAVE BEEN BOOKED </h1>";
                } */
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