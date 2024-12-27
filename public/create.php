<?php
require '../config/db.php';
require '../lib/crud.php';

$database = new Database();
$db = $database->getConnection();
$crud = new Crud($db);
$crud2 = new Crud($db);

// Data for a new player
$data = [
    'first_name' => 'Ali',
    'last_name' => 'Yara',
    'position' => 'GK',
    'rating' => '92'
];
$data2 = [
    'first_name' => 'Mustafa',
    'last_name' => 'Khalid',
    'position' => 'GK',
    'rating' => '92'
];

// Add player
$crud->addPlayer($data);
$crud2->addPlayer($data2);
?>
