<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            margin: 0;
            font: Verdana;
        }

        .topnav {
            overflow: hidden;
            background-color: #0047AB;
        }

        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 12px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a.active {
            background-color: #89CFF0;
            color: white;
        }

        /* Creates a split to divide nav-bar */
        .topnav a.split {
            float: right;
        }

        body {
            background-image: url('background-img.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }

        main {
            color: #f2f2f2;
        }

        h1 {text-align: center;}
    </style>
</head>

<body>
    <div class="topnav">
        <a class="active" href="#home">Home</a>
        <a href="#memory" class="split">Play pairs</a>
        <a href="registration.php" class="split">Leaderboard</a>
    </div>

    <div class="main">
        <h1 style="color:white;">Welcome to pairs</h1>
        <p>Some content..</p>
    </div>
</body>
</html>