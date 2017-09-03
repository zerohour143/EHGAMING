<?php
//ANHI MA VIEW ANG DATA BASE SA ID NGA GI INPUT SA UPDATE
include_once 'config.php';

$id = $_POST['id'];

$ops = new functions;
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="update3.php" method="POST">
		<?php $ops->viewDataToUpdte($id); ?>
		<button value="submit" type="submit">update</button>
	</form>
</body>
</html>