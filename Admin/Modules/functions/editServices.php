<?php
	include_once '../../../configs/config.php';
	$ops = new functions;

	$sid = $_POST['sid'];
	$gid = $_POST['gid'];
	$title = $_POST['sname'];
	$price = $_POST['price'];
	$category = $_POST['category'];
	$details = $_POST['details'];
	$method = $_POST['PaymentMethod'];

	if(!isset($_POST['file'])){
		$image = $ops->getImagePath($gid);
	}else{
		$image = $_POST['file'];
	}
	//$file = $_POST['file'];

	//echo $gid." ".$title." ".$price." ".$category.$details." ".$method;


	$ops = new functions;
	if ($ops->edit_services($image,$sid,$title,$price,$category,$details,$method) === TRUE) {
	    echo '<script type="text/javascript">
	    		window.location.href = "../game-details.php?gid='.$gid.'#gameTitle";
	    	</script>';
	}else {
	    echo "<script type= 'text/javascript'>alert('Error: ".$sql."<br>');</script>";
	}
?>