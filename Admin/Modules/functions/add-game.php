<?php
	include_once '../../../configs/config.php';

	$title = $_POST['title'];
	$details = $_POST['details'];
	$picture = $_POST['file'];
//CONNNNNNNNNNNNNNNNECTTTTTTTTTTTTTTTTTTT
	$ops = new functions;

//INSERRRRRRRTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
	if ($ops->insert_game($title,$details,$picture) === TRUE) {
	    echo '<script type="text/javascript">
						window.location.href = "../game-dash.php";
				</script>';
	} else {
	    echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>');</script>";
	}
?>