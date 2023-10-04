<?php
    session_start();
    include_once 'loggedin_header.php';
?>

<div class="gameBackground">
    <div class="timer" id="timer"> Time: 0 </div>
    <div class="score" id="score"></div>
    <div class="cardContainer">
        <div id="cardPos1" class="cardPos1"></div>

        <div id="cardPos2" class="cardPos2"></div>

        <div id="cardPos3" class="cardPos3"></div>

        <div id="cardPos4" class="cardPos4"></div>

        <div id="cardPos5" class="cardPos5"></div>

        <div id="cardPos6" class="cardPos6"></div>

        <div id="cardPos7" class="cardPos7"></div>

        <div id="cardPos8" class="cardPos8"></div>

        <div id="cardPos9" class="cardPos9"></div>

        <div id="cardPos10" class="cardPos10"></div>     
    </div>

    <div id="gameOver" style="display:none;">
        <h1>Game Over</h1>
        <p>Congratulations, you have matched all the cards!</p>

        <div id="playAgain" class="gameOverButton"></div>
        <div id="submitScore" class="gameOverButton"></div>
        <a id="playAgain" class="gameOverButton" href="pairs.php" target="_blank">Play Again</a>
        <form method="post" action="submit_score.php">
            <input type="hidden" name="score" id="scoreInput">
            <a id="submitScore" class="gameOverButton"  onclick="submitScore(); return false;">Submit Score</a>
        </form>


    </div>

</div>

<script src="pairs.js"></script>

<?php include_once 'footer.php' ?>



