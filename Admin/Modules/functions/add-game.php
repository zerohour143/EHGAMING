<?php
	include_once '../../../configs/config.php';

	$title = $_POST['title'];
	$details = $_POST['details'];
	$filename = basename($_FILES['file']["name"]);
	$target_dir = "../../uploads/";
	$path = $target_dir . $filename;
//CONNNNNNNNNNNNNNNNECTTTTTTTTTTTTTTTTTTT
	$ops = new functions;

//INSERRRRRRRTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
	if ($ops->insert_game($title,$details,$path) === TRUE) {
		move_uploaded_file($_FILES["file"]["tmp_name"], $path);
	    echo '<script type="text/javascript">
						window.location.href = "../game-dash.php";
				</script>';
	} else {
	    echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>');</script>";
	}
?>