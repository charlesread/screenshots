<?php

/*

NEW.PHP

Allows user to create a new entry in the database

*/



// creates the new record form

// since this form is used multiple times in this file, I have made it a function that is easily reusable

function renderForm( $color, $make, $model, $year, $class, $location, $price, $available)

{

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>

<title>New Record</title>

</head>

<body>

<?php

// if there are any errors, display them



?>



<form action="" method="post">

<div>


<strong>Color: *</strong> <input type="text" name="color" value="<?php echo $color; ?>" /><br/>
<strong>Make: *</strong> <input type="text" name="make" value="<?php echo $make; ?>" /><br/>
<strong>Model: *</strong> <input type="text" name="model" value="<?php echo $model; ?>" /><br/>
<strong>Year: *</strong> <input type="text" name="year" value="<?php echo $year; ?>" /><br/>
<strong>Class: *</strong> <input type="text" name="class" value="<?php echo $class; ?>" /><br/>
<strong>Location: *</strong> <input type="text" name="location" value="<?php echo $location; ?>" /><br/>
<strong>Price: *</strong> <input type="text" name="price" value="<?php echo $price; ?>" /><br/>
<strong>Availability: *</strong> <input type="text" name="available" value="<?php echo $available; ?>" /><br/>




<p>* required</p>

<input type="submit" name="submit" value="Submit">

</div>

</form>

</body>

</html>

<?php

}









// connect to the database

include('connect-db.php');



// check if the form has been submitted. If it has, start to process the form and save it to the database

if (isset($_POST['submit']))

{

// get form data, making sure it is valid

$color = mysqli_real_escape_string($db, htmlspecialchars($_POST['color']));
$make = mysqli_real_escape_string($db, htmlspecialchars($_POST['make']));
$model = mysqli_real_escape_string($db, htmlspecialchars($_POST['model']));
$year = mysqli_real_escape_string($db, htmlspecialchars($_POST['year']));
$class = mysqli_real_escape_string($db, htmlspecialchars($_POST['class']));
$location = mysqli_real_escape_string($db, htmlspecialchars($_POST['location']));
$price = mysqli_real_escape_string($db, htmlspecialchars($_POST['price']));
$available = mysqli_real_escape_string($db, htmlspecialchars($_POST['available']));



// check to make sure both fields are entered

if ( $color == '' || $make == ''|| $model == ''|| $year == ''|| $class == ''|| $location == ''|| $price == ''|| $available == '')

{

// generate error message

$error = 'ERROR: Please fill in all required fields!';



// if either field is blank, display the form again

renderForm( $color, $make, $model, $year, $class, $location, $price, $available);

}
else

{

// save the data to the database

mysqli_query($db, "INSERT cars SET color = '$color', make = '$make', model = '$model', year = '$year', class = '$class', location = '$location', price = '$price', available = '$available'")

or die(mysqli_error($db));



// once saved, redirect back to the view page

header("Location: view.php");

}

}

else

// if the form hasn't been submitted, display the form

{

renderForm('','','','','','','','','');

}

?>
