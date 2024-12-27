<?php
require '../config/db.php';
require '../lib/crud.php';

$database = new Database();
$db = $database->getConnection();

// Step 2: Instantiate the Crud class with the database connection
$crud2 = new Crud($db);

$id = 1;
$crud2->deletePlayer($id);
if($crud2) {
    echo "nice";
}
?>
