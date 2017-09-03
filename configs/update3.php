<?php 
//ANHI HIMOUN ANG UPDATE 
include_once 'config.php';
 $id = $_POST['id'];
 $fname = $_POST['fname'];
 $lname = $_POST['lname'];

 $ops = new functions;

 $ops
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<?php 
			$ops->updateData($id,$fname,$lname); 
			$ops->dataselect();
		?>
</body>
</html>