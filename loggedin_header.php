<!-- Header code including navbar and opening div -->
<?php
// Get the cookie value
$cookieValue = $_COOKIE["userEmoji"];

// Decode the cookie value from JSON into a PHP array
$imageEmoji = json_decode($cookieValue, true);

// Construct the image URLs
$imageSkinUrl = $imageEmoji[0];
$imageMouthUrl = $imageEmoji[1];
$imageEyeUrl = $imageEmoji[2];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Minigame Website</title>
</head>
<body>
    <nav>
        <div class="topnav">
            <a class="active" href="index.php">Home</a>
            <a href="pairs.php" class="split">Play pairs</a>
            <a href="leaderboard.php" class="split">Leaderboard</a>
            <div class="navemoji split">
                <img class="emoji" src='<?php echo $imageSkinUrl?>'>
                <img class="emoji" src='<?php echo $imageMouthUrl?>'>
                <img class="emoji" src='<?php echo $imageEyeUrl?>'>
            </div>
        </div>
    </nav>

    <div class="main">