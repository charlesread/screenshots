<?php

/*

DELETE.PHP

Deletes a specific entry from the 'players' table

*/



// connect to the database

include('connect-db.php');



// check if the 'id' variable is set in URL, and check that it is valid



// get id value

$id = $_GET['id'];



// delete the entry

$result = mysqli_query($db, "DELETE FROM cars WHERE CarID=$id")

or die(mysqli_error($db));



// redirect back to the view page

header("Location: view.php");




?>
