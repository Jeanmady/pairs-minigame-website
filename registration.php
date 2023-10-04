<?php
    // Start a session to store the username in acookie
    session_start();
    
    include_once 'header.php';

    // Check if the user submitted the form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get username
    $username = $_POST["username"];

    // Set image URLs
    $imageSkin = $_POST["finalSkin"];
    $imageMouth = $_POST["finalMouth"];
    $imageEye = $_POST["finalEye"];
  
    // Check if the username contains invalid characters
    if (preg_match('/[!@#%&*()+^\{\}\[\]\—;:“’<>?\/]/', $username)) {
        $error_message = "Invalid username. Please enter a new username without any of the following characters: ! @ # % & * ( ) + = ˆ { } [ ] — ; : “ ’ < > ? /";
    } else {
        // Set cookie with the username
        setcookie("username", $username, time() + (86400 * 50)); // Expires in 50 days

        // Combine URLs into aan array
        $imageEmoji = array($imageSkin, $imageMouth, $imageEye);

        // Encode array as JSON
        $imageEmojiJson = json_encode($imageEmoji);

        // Set cookie which expires in 50 days
        setcookie("userEmoji", $imageEmojiJson, time() + (86400 * 50), "/");
    
        // Redirect to home page
        header("Location: index.php");
        exit();
    }
  }
  
?>
    
    <section class="username-login">
        <form class="container" method="post"> 
            <h1>Register</h1>

            <label for="usrn"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>
            <div id="emoji" class="emojioutput">
                <div class= youremoji> <h2>Your Emoji</h2> </div>
                <img id="skin-image" class="emoji-image" src="emoji assets/skin/yellow.png">
                <img id="mouth-image" class="emoji-image" src="emoji assets/mouth/straight.png">
                <img id="eye-image" class="emoji-image" src="emoji assets/eyes/normal.png">
            </div>
            <input type="hidden" name="finalSkin" value="emoji assets/skin/yellow.png">
            <input type="hidden" name="finalMouth" value="emoji assets/mouth/straight.png">
            <input type="hidden" name="finalEye" value="emoji assets/eyes/normal.png">
            <div class="errorMess"> <?php if(isset($error_message)) { echo "<p>$error_message</p>"; } ?> </div>
            <button type="submit" class="btn">Register</button>
        </form>

        <div class="tab">
            <button class="tablinks" onclick="openFeature(event, 'eyes')">Eyes</button>
            <button class="tablinks" onclick="openFeature(event, 'mouth')">Mouth</button>
            <button class="tablinks" onclick="openFeature(event, 'skin')">Skin</button>
        </div>

        <div id="eyes" class="tabcontent">
            <img id="closed" class="eyeimages" src='emoji assets/eyes/closed.png' onclick="displayEmojiEye('emoji assets/eyes/closed.png')">
            <img id="laugh" class="eyeimages" src='emoji assets/eyes/laughing.png' onclick="displayEmojiEye('emoji assets/eyes/laughing.png')"> 
            <img id="long" class="eyeimages" src='emoji assets/eyes/long.png' onclick="displayEmojiEye('emoji assets/eyes/long.png')"> 
            <img id="normal" class="eyeimages" src='emoji assets/eyes/normal.png' onclick="displayEmojiEye('emoji assets/eyes/normal.png')"> 
            <img id="rolling" class="eyeimages" src='emoji assets/eyes/rolling.png' onclick="displayEmojiEye('emoji assets/eyes/rolling.png')"> 
            <img id="winking" class="eyeimages" src='emoji assets/eyes/winking.png' onclick="displayEmojiEye('emoji assets/eyes/winking.png')"> 
        </div>

        <div id="mouth" class="tabcontent">
            <img id="open" class="mouthimages" src='emoji assets/mouth/open.png' onclick="displayEmojiMouth('emoji assets/mouth/open.png')">
            <img id="sad" class="mouthimages" src='emoji assets/mouth/sad.png' onclick="displayEmojiMouth('emoji assets/mouth/sad.png')">
            <img id="smiling" class="mouthimages" src='emoji assets/mouth/smiling.png' onclick="displayEmojiMouth('emoji assets/mouth/smiling.png')" >
            <img id="straight" class="mouthimages" src='emoji assets/mouth/straight.png' onclick="displayEmojiMouth('emoji assets/mouth/straight.png')">
            <img id="surprise" class="mouthimages" src='emoji assets/mouth/surprise.png' onclick="displayEmojiMouth('emoji assets/mouth/surprise.png')">
            <img id="teeth" class="mouthimages" src='emoji assets/mouth/teeth.png' onclick="displayEmojiMouth('emoji assets/mouth/teeth.png')">
        </div>

        <div id="skin" class="tabcontent">
            <img id="green" class="skinimages" src='emoji assets/skin/green.png' onclick="displayEmojiSkin('emoji assets/skin/green.png')">
            <img id="red" class="skinimages" src='emoji assets/skin/red.png' onclick="displayEmojiSkin('emoji assets/skin/red.png')">
            <img id="yellow" class="skinimages" src='emoji assets/skin/yellow.png' onclick="displayEmojiSkin('emoji assets/skin/yellow.png')">
        </div>
     

        <script src="emoji_selection.js"></script>
</section>

<?php
    include_once 'footer.php'
?>