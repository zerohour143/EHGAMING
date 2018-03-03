<?php
	include_once '../../../configs/config.php';

	$sid = $_POST['sid'];
	$gid = $_POST['gid'];
	$title = $_POST['sname'];
	$price = $_POST['price'];
	$category = $_POST['category'];
	$details = $_POST['details'];
	$method = $_POST['PaymentMethod'];

	//echo $gid." ".$title." ".$price." ".$category.$details." ".$method;


	$ops = new functions;
	if ($ops->edit_services($sid,$title,$price,$category,$details,$method) === TRUE) {
	    echo '<script type="text/javascript">
	    		window.location.href = "../game-details.php?gid='.$gid.'#gameTitle";
	    	</script>';
	}else {
	    echo "<script type= 'text/javascript'>alert('Error: ".$sql."<br>');</script>";
	}
?>