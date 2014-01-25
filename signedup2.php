<?php

$con=mysqli_connect("localhost","appuser","haxx","app");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

//Form Elements to Variables
$householdname = $_POST['householdname'];
$password = $_POST['password'];
$numberofpeople = $_POST['numberofpeople'];

if (!$householdname) {
	echo 'Error: house name is blank.';
} else if (!$password) {
	echo 'Error: password is blank.';
} else if (!$numberofpeople) {
	echo 'Error: number of people is blank.';
} else {
	//Variables to Table Columns
	//Insert into main Households table
	$sql="INSERT INTO households (HouseholdName,Password, NumberOfPeople)
	VALUES
	('$_POST[householdname]',SHA1('$_POST[Password]'),'$_POST[numberofpeople]')";

	// Execute query
	if (mysqli_query($con,$sql))
	  {
	  echo "Table for household created successfully";
	  //Location of redirect page
	  header('Location: view.php');
	  }
	else
	  {
	  die('Error: ' . mysqli_error($con));
	  echo "Error creating table: " . mysqli_error($con);
	  }
 
}

mysqli_close($con);
?>