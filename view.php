<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title> View Page </title>
<link rel="stylesheet" type="text/css" href="view-style.css"/>
<link rel="stylesheet" type="text/css" href="foundation/css/foundation.css"/>

</head>

<body>
<?php

//header('Location: http://www.jyntran.ca/app/view.php');

// Create connection
$con = mysqli_connect("localhost","appuser","haxx", "app");

// Check connection
if(mysqli_connect_errno())
{
	echo "Failed to connect to Server: " . mysqli_connect_error();
}

// Code to submit insert data into respective
$sql="SELECT * FROM householditems (HouseholdName, NumberOfPeople, NameOfBuyer, NameOfItem, ItemPrice, QuantityOfItem, Date)
VALUES ('".$_POST['HouseName']."','".$_POST['NumPeople']."','".$_POST['NameOfBuyer']."','".$_POST['NameOfItem']."','".$_POST['ItemPrice']."','".$_POST['QuantityItem']."','".$_POST['Date']."')";


mysqli_query($con, $sql);

$result = mysqli_query($con,"SELECT * FROM householditems");

echo "<table>
<tr>
<th> Household Name </th>
<th> Number of Housemates </th>
<th> Your Name </th>
<th> Item Name </th>
<th> Item Price </th>
<th> Number of Items</th>
<th> Date Purchased </th>
</tr>";

while($row = mysqli_fetch_array($result))
{
	echo "<tr>";
	echo "<td>" . $row['HouseholdName'] . "</td>";
	echo "<td>" . $row['NumberOfPeople'] . "</td>";
	echo "<td>" . $row['NameOfBuyer'] . "</td>";
	echo "<td>" . $row['NameOfItem'] . "</td>";
	echo "<td>" . $row['ItemPrice'] . "</td>";
	echo "<td>" . $row['QuantityOfItem'] . "</td>";
	echo "<td>" . $row['Date'] . "</td>";
	echo "</tr>";	
}

echo "</table>";

mysqli_close($con);
?>

<a href="submit.php"> Back </a>
<a href="Household.html">Add an Item</a>

<script src = "foundation/js/vendor/jquery.js"></script>
<script src = "foundation/js/foundation.min.js"></script>
<script>
	$(document).foundation();
</script>
</body>
</html>