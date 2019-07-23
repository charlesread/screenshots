<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>

<title>View Records</title>

</head>

<body>



<?php

/*

VIEW.PHP

Displays all data from 'players' table

*/



// connect to the database

include('connect-db.php');



// get results from database

$result = mysqli_query($db, "SELECT * FROM cars");




// display data in table

echo "<p><b>View All</b>";



echo "<table border='1' cellpadding='10'>";

echo "<tr> <th>CarID</th> <th>color</th> <th>make</th> <th>model</th> <th>year</th> <th>class</th> <th>location</th> <th>price</th> <th>Available</th> <th></th> <th></th></tr>";



// loop through results of database query, displaying them in the table

while($row = mysqli_fetch_array( $result )) {



// echo out the contents of each row into a table

echo "<tr>";

echo '<td>' . $row['CarID'] . '</td>';

echo '<td>' . $row['color'] . '</td>';

echo '<td>' . $row['make'] . '</td>';

echo '<td>' . $row['model'] . '</td>';

echo '<td>' . $row['year'] . '</td>';

echo '<td>' . $row['class'] . '</td>';

echo '<td>' . $row['location'] . '</td>';

echo '<td>' . $row['price'] . '</td>';

echo '<td>' . $row['available'] . '</td>';


echo '<td><a href="edit.php?id=' . $row['CarID'] . '">Edit</a></td>';

echo '<td><a href="delete.php?id=' . $row['CarID'] . '">Delete</a></td>';

echo "</tr>";

}



// close table>

echo "</table>";

?>

<p><a href="new.php">Add a new record</a></p>
<p><a href="homepage.html">LOGOUT</a></p>
<p><a href="memberview.php">Member Deals</a></p>



</body>

</html>
