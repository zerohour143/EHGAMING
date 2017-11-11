<?php

	class functions{

		function connectdb($host, $user, $pass, $database){
			$connect = mysqli_connect($host,$user,$pass,$database) or die("cannot connect to db");
			/*if (!$connect) {
			    echo "Error: Unable to connect to MySQL." . PHP_EOL;
			    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
			    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
			    exit;
			}

			echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
			echo "Host information: " . mysqli_get_host_info($connect) . PHP_EOL;*/
			return $connect;
		}

		function query($sql){
			return mysqli_query($this->connectdb($host,$user,$pass,$database),$sql) or die(mysqli_error($database));
		}

//INSEEEEEEEEEEEEEERRRRRRRRRRRRRRRRRTTTTTTTTTTTTTTT
		function insert($fname,$lname){
			$conn = $this->connectdb($GLOBALS['host'],$GLOBALS['user'],$GLOBALS['pass'],$GLOBALS['database']);
			$sql =  "INSERT INTO list (firstname,lastname) VALUES ('$fname','$lname')";
			return $conn->query($sql);
		}

//REAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADDDDDDDDDDDDDDDDD
		function dataselect(){
			$conn = $this->connectdb($GLOBALS['host'],$GLOBALS['user'],$GLOBALS['pass'],$GLOBALS['database']);
			$sql =  "SELECT id, firstname, lastname FROM list";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . "LastName: " .$row["lastname"]. "<br>";
			    }
			} else {
			    echo "NO RESULT";
			}
		}

		function viewDataToUpdte($id){
			$conn = $this->connectdb($GLOBALS['host'],$GLOBALS['user'],$GLOBALS['pass'],$GLOBALS['database']);
			$sql =  "SELECT * FROM list where id = '$id'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			    	echo '<label>id: </label><span>'.$row["id"].'</span> <input type="text" value="'.$row["id"].'" name="id" hidden>
				          <label>fname: </label> <input type="text" value="'.$row["firstname"].'" name="fname">
				          <label>lname: </label> <input type="text" value="'.$row["lastname"].'" name="lname">';
			    }
			} else {
			    echo "NO RESULT";
			}
		}

//UPDAAAAATE NA THISsssssssssSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS!!!
		function updateData($id,$fname, $lname){
			$conn = $this->connectdb($GLOBALS['host'],$GLOBALS['user'],$GLOBALS['pass'],$GLOBALS['database']);
			$sql =  "UPDATE list SET firstname = '$fname', lastname = '$lname' WHERE id = '$id'";
			return $conn->query($sql);
		}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//LOGINNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN

		function login($uname,$password){
			$conn = $this->connectdb($GLOBALS['host'],$GLOBALS['user'],$GLOBALS['pass'],$GLOBALS['database']);
			$sql =  "SELECT * FROM users WHERE uname = '$uname' AND pass = '$password'";
			$result = $conn->query($sql);
			if (!$result) {
			    printf("Error: %s\n", mysqli_error($conn));
			    exit();
			}
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			if(empty($row)){
				echo '<script type="text/javascript">
						alert("Username or Password is incorrect");
						window.location.href = "../admin/login.html";
					  </script>';
			}else{
				header('Location: ../admin/modules/dashboard.php');
			}
		}

		//GAMEEEE REAAAD DATAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA
		function dataselectgame(){
				$conn = $this->connectdb($GLOBALS['host'],$GLOBALS['user'],$GLOBALS['pass'],$GLOBALS['database']);
				$sql =  "SELECT title, picture, dateAdded FROM Games";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				    while($row = $result->fetch_assoc()) {
					   echo '<a class="anchor" href="game-details.php"><div class="container-fluid game-item">
		                    <div class="game-img">
		                        <img class="img-thumbnail" src="'.$row["picture"].'" width="150" height="150">                      
		                    </div>
		                    <div class="game-title">
		                        <span>'.$row["title"].'</span>
		                    </div>
		                    <div class="game-details">
		                        <span >Date Added: '.$row["dateAdded"].'</span>
		                    </div>
		                </div></a>' ; 
				    }
				} else {
				    echo "NO RESULT";
				}
		}

		//INSEEEEEEEEEEEEEERRRRRRRRRRRRRRRRRTTTTTTTTTTTTTTT
		function insert_game($title,$details,$path){
			$conn = $this->connectdb($GLOBALS['host'],$GLOBALS['user'],$GLOBALS['pass'],$GLOBALS['database']);
			$sql =  "INSERT INTO Games (title,details,picture) VALUES ('$title','$details','$path')";
			return $conn->query($sql);
		}

		function insert_services($gid,$title,$price,$category,$details){
			$conn = $this->connectdb($GLOBALS['host'],$GLOBALS['user'],$GLOBALS['pass'],$GLOBALS['database']);
			$sql =  "INSERT INTO services (gid,serviceName,price,category,details) VALUES ('$gid','$title','$price','$category','$details')";
			 echo("Error description: " . mysqli_error($conn));
			return $conn->query($sql);
		}



	}

?>
