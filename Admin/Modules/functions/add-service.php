<?php
	include_once '../../../configs/config.php';

	$gid = $_POST['gid'];
	$title = $_POST['title'];
	$price = $_POST['price'];
	$category = $_POST['category'];
	$details = $_POST['details'];
	$method = $_POST['PaymentMethod'];

	//echo $gid." ".$title." ".$price." ".$category.$details." ".$method;


	$ops = new functions;
	if ($ops->insert_services($gid,$title,$price,$category,$details,$method) === TRUE) {
	    echo '<script type="text/javascript">
	    		window.location.href = "../game-details.php?gid='.$gid.'";
	    	</script>';
	} else {
	    echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>');</script>";
	}
?>