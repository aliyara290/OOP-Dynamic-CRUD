<?php
require '../config/db.php';  // Include the database connection file
require '../lib/crud.php';  // Include the CRUD class file

$database = new Database();
$db = $database->getConnection();
$crud = new Crud($db);

// for read a specifc player

$player = $crud->getPlayer('joueurs', 3);

// Step 4: Display the player's information
if ($player) {
    echo 'First Name: ' . $player['first_name'] . '<br>';
    echo 'Last Name: ' . $player['last_name'] . '<br>';
    echo 'Position: ' . $player['position'] . '<br>';
    echo 'Rating: ' . $player['rating'] . '<br>';
} else {
    echo 'Player not found.';
}
echo '<hr>';
echo '<hr>';
echo '<hr>';
// for read all the players in the db
$players = $crud->getAllPlayers();
if ($players) {
    foreach ($players as $player) {
        echo 'ID: ' . $player['joueurs_id'] . '<br>';
        echo 'First Name: ' . $player['first_name'] . '<br>';
        echo 'Last Name: ' . $player['last_name'] . '<br>';
        echo 'Position: ' . $player['position'] . '<br>';
        echo 'Rating: ' . $player['rating'] . '<br>';
        echo '<hr>';
    }
} else {
    echo 'No players found.<br>';
}
?>
