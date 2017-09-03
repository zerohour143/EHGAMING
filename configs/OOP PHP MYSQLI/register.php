<?php
	include_once 'config.php';

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
//CONNNNNNNNNNNNNNNNECTTTTTTTTTTTTTTTTTTT
	$ops = new functions;

//INSERRRRRRRTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
	if ($ops->insert($fname,$lname) === TRUE) {
	    echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
	    $ops->dataselect();
	} else {
	    echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>');</script>";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
SUCCESS
</body>
</html>