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
				$sql =  "SELECT title, gid, picture, dateAdded FROM Games";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				    while($row = $result->fetch_assoc()) {
				    	if (file_exists($row['picture'])){
				    		$image = $row['picture'];
				    	}else{
				    		$image = "https://www.bailey-parts.co.uk/catalogimages/products/not-found.png?mode=crop&scale=both&quality=80&width=580&height=435";
				    	}

					   echo '<a class="anchor" href="game-details.php?gid='.$row["gid"].'"><div class="container-fluid game-item">
		                    <div class="game-img">
		                        <img class="img-thumbnail" src="'.$image.'" width="150" height="150">                      
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

		function GameImage($gid){ 	//retrieve game image path.
			$conn = $this->connectdb($GLOBALS['host'],$GLOBALS['user'],$GLOBALS['pass'],$GLOBALS['database']);
			$sql =  "SELECT picture FROM Games WHERE gid = '$gid'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0 ) {
				    while($row = $result->fetch_assoc()) {
				    	if (file_exists($row['picture'])){
				    		$image = $row['picture'];
				    	}else{
				    		$image = "https://www.bailey-parts.co.uk/catalogimages/products/not-found.png?mode=crop&scale=both&quality=80&width=580&height=435";
				    	}
					   echo '<img class="image img-fluid" src="'.$image.'" width="350" height="200">' ; 
				    }
				} else {
					echo "No game in the List";    
				}
		}


		function dataselectServices($gid){
			$conn = $this->connectdb($GLOBALS['host'],$GLOBALS['user'],$GLOBALS['pass'],$GLOBALS['database']);
				$sql =  "SELECT serviceName, gid, price, category, details, PaymentMethod 
				         FROM services
				         WHERE gid = '$gid'";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				    while($row = $result->fetch_assoc()) {
					   echo '<div class="serviceItem container-fluid">
			                    <span class="text-primary">'.$row['serviceName'].'</span>
			                    <span class="text-danger">'.$row['price'].'</span>
			                    <span class="text-success">'.$row['category'].'</span>
			                    <span class="text-secondary">'.$row['details'].'</span>
			                    <span class="bg-danger text-danger">'.$row['PaymentMethod'].'</span>
			                </div>' ; 
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

		function insert_services($gid,$title,$price,$category,$details,$method){
			$conn = $this->connectdb($GLOBALS['host'],$GLOBALS['user'],$GLOBALS['pass'],$GLOBALS['database']);
			if($method == "1g"){
				$payment = "Pay via Paypal";
			}else if($method == "2g"){
				$payment = "ContactUs";
			}
			//$sql =  "INSERT INTO services (serviceName,gid,price,category,details) VALUES ('$title','$gid','$price','$category','$details')";
			$sql =  "INSERT INTO services (serviceName,price,category,gid,details,PaymentMethod) VALUES ('$title','$price','$category','$gid','$details','$payment')";
			return $conn->query($sql);
		}



	}

?>
