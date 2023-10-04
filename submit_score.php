<?php
// Get the username from cookies
$username = $_COOKIE['username'];
  
// Get the score from the form
$score = $_POST['score'];
$score = str_replace('Score: ', '', $score);

// Load the leaderboard data from JSON file
$leaderboard_data = json_decode(file_get_contents('leaderboard.json'), true);
  
// Check if player already has a score in leaderboard
$existing_score = null;
foreach ($leaderboard_data as $entry) {
    if ($entry['username'] === $username) {
        $existing_score = $entry['score'];
        break;
    }
}
  
// Add new score to leaderboard if they dont have score already or if the score they send is higher than the current one they have
if ($existing_score === null || $score > $existing_score) {
    // Remove the players existing score from the leaderboard
    if ($existing_score !== null) {
        foreach ($leaderboard_data as $key => $entry) {
            if ($entry['username'] === $username) {
                unset($leaderboard_data[$key]);
                break;
            }
        }
    }

    // Add the new score to the leaderboard
    $leaderboard_data[] = array(
        'username' => $username,
        'score' => $score
    );
        
    // Save the updated leaderboard to JSON file
    file_put_contents('leaderboard.json', json_encode($leaderboard_data));
}

// Send user back to the game page
header('Location: index.php');
exit();
?>
