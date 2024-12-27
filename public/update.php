<?php
require '../config/db.php';  // Include the database connection file
require '../lib/crud.php';  // Include the CRUD class file

// Step 1: Establish the database connection
$database = new Database();
$db = $database->getConnection();

// Step 2: Instantiate the Crud class with the database connection
$crud = new Crud($db);

// Step 3: Data to update (this could come from a form, here it's hardcoded for simplicity)
$data = [
    'first_name' => 'Leo',
    'last_name' => 'Messi',
    'position' => 'Midfielder',
    'rating' => 9
];

// Step 4: Specify the ID of the player to update
$playerId = 2; // Replace this with the actual ID

// Step 5: Call the updatePlayer method
$crud->updatePlayer($data, $playerId);
?>
