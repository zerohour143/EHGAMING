<?php
	include_once '../../../configs/config.php';

	$title = $_POST['title'];
	$details = $_POST['details'];
	$target_dir = "../../../uploads/";
	$target_dir2 = "../../uploads/";
	$filename = basename($_FILES["file"]["name"]);
	$path = $target_dir . $filename;
//CONNNNNNNNNNNNNNNNECTTTTTTTTTTTTTTTTTTT
	$ops = new functions;

//INSERRRRRRRTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
	if ($ops->insert_game($title,$details,$target_dir2 . $filename) === TRUE) {
		move_uploaded_file($_FILES["file"]["tmp_name"], $path);
	    echo '<script type="text/javascript">
						window.location.href = "../game-dash.php";
				</script>';
	} else {
	    echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>');</script>";
	}
?>