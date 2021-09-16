<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        body
        {
            background: rgb(50, 160, 233);
        }

        h1
        {
            font-size: 2.1rem;
            line-height: 1.4;
            text-align: center;
            color:black;
        }

        .home
        {
            width:65%;
            height:400px;
            position:absolute;
            left:50%;
            top:60%;
            background-image: url(images/melbourne.jpg);
            transform: translate(-50%,-50%);
            background-size: 100% 100%;
            box-shadow: 1px 2px 10px 5px white;
            animation:slider 16s infinite linear;
        }

        @keyframes slider
        {
            0%{background-image: url(images/melbourne.jpg);}
            25%{background-image: url(images/mumbai.jpg);}
            50%{background-image: url(images/bangalore.jpg);}
            75%{background-image: url(images/auckland.jpg);}
        }

        .already
        {
            background-color: rgb(50, 160, 233);
            max-width: 100%;
            text-align:center;
            font-size:25px;
        }

        .btn
        {
            border: 2px solid black;
            font-size: 20px;
            padding: 8px 12px;
            background: white;
            color: black;
            border-radius: 14px;
            cursor: pointer;
            margin:auto 25px;
        }
    </style>
</head>

<body>
    <h1>Welcome to Cricket Stadium Ticket Booking</h1>
    <div class="home"></div>

    <div class="already">
        <a href="index.php">
            <button class="btn">Home</button>
        </a>
        <a href="login.php">
            <button class="btn">Login</button>
        </a>
        <a href="registration.php">
            <button class="btn">Register</button>
        </a>
    </div>
</body>
</html>