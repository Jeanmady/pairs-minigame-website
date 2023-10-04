<?php
    session_start();
    include_once 'loggedin_header.php';
?>

<div class="gameBackground">
<?php
// Read the JSON file and decode data into an array
$leaderboardData = json_decode(file_get_contents('leaderboard.json'));

// Sort array in descending order of scores
usort($leaderboardData, function($a, $b) {
    return intval($b->score) - intval($a->score);
});


// Get how many scores to display
$numScores = min(count($leaderboardData), 10);

// Display leaderboard
echo "<table class='leaderboard'>";
echo '<tr><th>Rank</th><th>Username</th><th>Score</th></tr>';

for ($i = 0; $i < $numScores; $i++) {
    $player = $leaderboardData[$i];
    echo '<tr><td>'.($i+1).'</td><td>'.$player->username.'</td><td>'.$player->score.'</td></tr>';
}

echo '</table>';
?>
</div>
<?php     
    include_once 'footer.php'
?>