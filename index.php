<?php
    session_start();
    
    // Check if the user is registered
    if (isset($_COOKIE["username"])) {
        // User is logged in: show the navigation bar for logged in users
        include_once 'loggedin_header.php';
        echo '
        <div class="lggedinHome">
            <h1 style="color:white;">Welcome to pairs</h1>
            <a class="homeButton" href="pairs.php" target="_blank">Click here to play</a>
        </div> ';
      } else {
        // User is not logged in: show the navigation bar for non-logged in users
        include_once 'header.php';
        echo '
        <div class="lggedinHome">
            <h1 style="color:white;">You’re not using a registered session?</h1>
            <a class="homeButton" href="registration.php" target="_blank">Register now</a>
        </div> ';
      }
      
    include_once 'footer.php'
?>