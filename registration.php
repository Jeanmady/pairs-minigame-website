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
        
        .container {
            position: absolute;
            right: 0;
            margin: 20px;
            max-width: 300px;
            padding: 16px;
            background-color: white;
        }

        input[type=text], input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus, input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }
    </style>
</head>

<body>
    <div class="topnav">
        <a href="index.php">Home</a>
        <a href="#memory" class="split">Play pairs</a>
        <a href="registration.php" class="active split">Leaderboard</a>
    </div>
    
    <div class="form-box">
        <form id="container">
            <label for="uname">Username:</label><br>
            <input type="text" id="uname" name="uname"><br>
        </form>
    </div>
</body>
</html>