<?php
	include_once '../../../configs/config.php';

	$gid = '3';
	$title = $_POST['title'];
	$details = $_POST['details'];
	$target_dir = "../../uploads/";
	$filename = basename($_FILES["file"]["name"]);
	$path = $target_dir . $filename;
//CONNNNNNNNNNNNNNNNECTTTTTTTTTTTTTTTTTTT
	$ops = new functions;

//INSERRRRRRRTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
	if ($ops->insert_game($title,$details,$path) === TRUE) {
		move_uploaded_file($_FILES["file"]["tmp_name"], '../'.$path);
	    echo '<script type="text/javascript">
						window.location.href = "../game-dash.php";
				</script>';
	} else {
	    echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>');</script>";
	}
?>