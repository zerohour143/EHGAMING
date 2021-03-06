<?php
	class functions{
		public $sname, $price, $category, $details, $pmethod;
		

//CONFIGURATIONSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS

		function connectdb($host, $user, $pass, $database){
			$connect = mysqli_connect($host,$user,$pass,$database) or die("cannot connect to db");
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

		function getTitle($id){
			$conn = $this->connectdb($GLOBALS['host'],$GLOBALS['user'],$GLOBALS['pass'],$GLOBALS['database']);
			$sql =  "SELECT title FROM games where gid = '$id'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			    	echo $row['title'];
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


		function getImagePath($gid){ 	//retrieve game image path.
			$conn = $this->connectdb($GLOBALS['host'],$GLOBALS['user'],$GLOBALS['pass'],$GLOBALS['database']);
			$sql =  "SELECT picture FROM Games WHERE gid = '$gid'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0 ) {
				    while($row = $result->fetch_assoc()) {
					   return $row['picture']; 
				    }
				}else {
					echo "Error has occured";    
				}
		}


		function dataselectServices($gid){
			$conn = $this->connectdb($GLOBALS['host'],$GLOBALS['user'],$GLOBALS['pass'],$GLOBALS['database']);
				$sql =  "SELECT serviceName, sid, price, category, details, PaymentMethod 
				         FROM services
				         WHERE gid = '$gid'
				         ORDER BY category";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					 $i=0;
				    while($row = $result->fetch_assoc()) {

			                $sid = $row['sid'];
			                $sname = $row['serviceName'];
			                $price = $row['price'];
			                $category = $row['category'];
			                $details = $row['details'];
			                $pmethod = $row['PaymentMethod'];
 
			                $paypal = " ";
			                $contactus = " ";

			                if($pmethod == 'Paypal'){
			                	$paypal = "selected";
			                }else if ($pmethod == 'ContactUs'){
			                	$contactus = "selected";
			                }

					   echo '<div class="Edit-Service container-fluid modal" id="g2">
						   		 <input id="srvc'.$sname.'" type="checkbox" name="modal" tabindex="2">
						   		 <label for="srvc'.$sname.'" >
						   			<div class="serviceItem container-fluid">
				                      <span class="text-primary">'.$sname.'</span>
					                    <span class="text-danger">'.$price.'</span>
					                    <span class="text-success">'.$category.'</span>
					                    <span class="text-secondary">'.$details.'</span>
					                    <span class="bg-danger text-danger">'.$pmethod.'</span>
				                    </div>
				                </label>


				               <div class="modal__overlay" id="srvc-bigbox">
							      <div id="modal-header" columns="2">
							         <span >'.$sname.'</span>
							         <label  id="closemodal" onclick="disable(\''.$sname.'\')" for="srvc'.$sname.'">&#10006;</label>
							      </div>  
							      <div id="modal-content">
							        <form method="POST" action="functions/editServices.php" enctype="multipart/form-data">
					                    <address> 
					                    	<label for="fileBrowse'.$sname.'" >Image</label>
					                    	 <input disabled id="fileBrowse'.$sname.'" class="imageBrowser" file type="file" name="file" class="form-control-file gamefile" id="myFile" accept=".png, .jpg, .jpeg">
					                    </address>
				                        <div class="input-group input-group-lg addservice_input">
				                          <span class="input-group-addon" id="sizing-addon1">Service Title: </span>
				                          <input disabled id="titlefield'.$sname.'"  required type="text" value="'.$sname.'" name="sname" class="form-control" placeholder="Input service title" aria-describedby="sizing-addon1">
				                        </div>
				                        <div class="input-group input-group-lg addservice_input">
				                          <span class="input-group-addon"  id="sizing-addon1">Price: $</span>
				                          <input disabled id="pricefield'.$sname.'" required type="number" value="'.$price.'" name="price" class="form-control" placeholder="Input Price" aria-describedby="sizing-addon1">
				                        </div>
				                        <div class="input-group input-group-lg addservice_input">
				                          <span class="input-group-addon"  id="sizing-addon1">Category</span>
				                          <select disabled id="categoryfield'.$sname.'" name="category" value="'.$category.'" class="form-control" aria-describedby="sizing-addon1">
				                              <option value="power leveling"'; if($category == "(NORMAL)power leveling"){echo "selected";} echo'>(NORMAL)Power Leveling</option>
				                               <option value="power leveling"'; if($category == "(SPECIAL)power leveling"){echo "selected";} echo'>(SPECIAL)Power Leveling</option>
				                              <option value="farming"'; if($category == "farming"){echo "selected";} echo'>Farming</option>
				                              <option value="contribution points"'; if($category == "contribution points"){echo "selected";} echo'>Contribution Points</option>
				                              <option value="customize"'; if($category == "customize"){echo "selected";} echo'>Customize</option>
				                           </select>
				                        </div>
				                        <div class="input-group input-group-lg addservice_input">
				                          <span class="input-group-addon"  id="sizing-addon1">Details</span>
				                          <input disabled id="detailsfield'.$sname.'" required type="details" value="'.$details.'" name="details" class="form-control" placeholder="Input Details" aria-describedby="sizing-addon1"  rows="2" cols="20">
				                        </div>
				                        <div class="input-group input-group-lg addservice_input">
				                          <span class="input-group-addon"  id="sizing-addon1">Payment Method</span>
				                          <select disabled id="pmethodfield'.$sname.'" name="PaymentMethod" value="'.$pmethod.'" class="form-control" aria-describedby="sizing-addon1">
				                              <option value="1g"'; if($pmethod == "Paypal"){echo "selected";} echo'>Paypal</option>
				                              <option value="2g"'; if($pmethod == "ContactUs"){echo "selected";} echo'>ContactUs</option>
				                           </select>
				                        </div>
				                        <div class="btn-group-lg btngroup" align="center">
				                            <button onclick="enable(\''.$sname.'\')" type="button" class="btn btn-danger editBtns editBtnreset">EDIT</button>
				                            <input disabled id="sbmitBttn'.$sname.'" type="submit" class="btn btn-success editBtns editBtnedit"> 
				                        </div>
				                        <input type="hidden" name="sid" id="hiddenField" value="'.$sid.'"/>
				                        <input type="hidden" name="gid" id="hiddenField" value="'.$gid.'"/>
				                    </form>
							      </div>  
							    </div>
						    </div>' ;
			           //$this->servicesModal($i);				    
			        }
				} else {
				    echo "NO RESULT";
				}
		}


////////////LIVE SITE DISPLAYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY


		function specialPowerLvlLive($gid){
			$conn = $this->connectdb($GLOBALS['host'],$GLOBALS['user'],$GLOBALS['pass'],$GLOBALS['database']);
				$sql =  "SELECT serviceName, sid, price, category, details, PaymentMethod 
				         FROM services
				         WHERE gid = '$gid' AND category='(SPECIAL)power leveling'";
				$result = $conn->query($sql);


				if ($result->num_rows > 0) {
					 $i=0;
				    while($row = $result->fetch_assoc()) {

			                $sid = $row['sid'];
			                $sname = $row['serviceName'];
			                $price = $row['price'];
			                $category = $row['category'];
			                $details = $row['details'];
			                $pmethod = $row['PaymentMethod'];

			                echo '  <tr>
		                              <td style="vertical-align: middle;">'.$sname.'</td>
		                              <td style="vertical-align: middle;">'.$price.'</td>
		                              <td style="vertical-align: middle;">'.$details.'</td>
		                              <td style="vertical-align: middle;"><img class="img-fluid" src="';if($pmethod == "Paypal"){echo 'img/paypal.jpg"';}else if($pmethod == 'ContactUs'){echo 'img/skype.jpg"';} echo' width="120px" height="40px"></td>
		                            </tr>';
			         }
			    }else{
			    	echo "No Result";
			    }
 
		}



		function normalPowerLvlLive($gid){
			$conn = $this->connectdb($GLOBALS['host'],$GLOBALS['user'],$GLOBALS['pass'],$GLOBALS['database']);
				$sql =  "SELECT serviceName, sid, price, category, details, PaymentMethod 
				         FROM services
				         WHERE gid = '$gid' AND category='(NORMAL)power leveling'";
				$result = $conn->query($sql);


				if ($result->num_rows > 0) {
					 $i=0;
				    while($row = $result->fetch_assoc()) {

			                $sid = $row['sid'];
			                $sname = $row['serviceName'];
			                $price = $row['price'];
			                $category = $row['category'];
			                $details = $row['details'];
			                $pmethod = $row['PaymentMethod'];

			                echo '   <tr>
		                              <td style="vertical-align: middle;">'.$sname.'</td>
		                              <td style="vertical-align: middle;">'.$details.'</td>
		                              <td style="vertical-align: middle;">'.$price.'</td>
		                               <td style="vertical-align: middle;"><img class="img-fluid" src="';if($pmethod == "Paypal"){echo 'img/paypal.jpg"';}else if($pmethod == 'ContactUs'){echo 'img/skype.jpg"';} echo' width="120px" height="40px"></td>
		                            </tr>';
			         }
			    }else{
			    	echo "No Result";
			    }
 
		}


		function silverLive($gid){
			$conn = $this->connectdb($GLOBALS['host'],$GLOBALS['user'],$GLOBALS['pass'],$GLOBALS['database']);
				$sql =  "SELECT serviceName, sid, price, category, details, PaymentMethod 
				         FROM services
				         WHERE gid = '$gid' AND category='farming'";
				$result = $conn->query($sql);


				if ($result->num_rows > 0) {
					 $i=0;
				    while($row = $result->fetch_assoc()) {

			                $sid = $row['sid'];
			                $sname = $row['serviceName'];
			                $price = $row['price'];
			                $category = $row['category'];
			                $details = $row['details'];
			                $pmethod = $row['PaymentMethod'];

			                echo '   <tr>
		                              <td style="vertical-align: middle;">'.$sname.'</td>
		                              <td style="vertical-align: middle;">'.$details.'</td>
		                              <td style="vertical-align: middle;">'.$price.'</td>
		                               <td style="vertical-align: middle;"><img class="img-fluid" src="';if($pmethod == "Paypal"){echo 'img/paypal.jpg"';}else if($pmethod == 'ContactUs'){echo 'img/skype.jpg"';} echo' width="120px" height="40px"></td>
		                            </tr>';
			         }
			    }else{
			    	echo "No Result";
			    }
 
		}


		function cntrbtnPtsLive($gid){
			$conn = $this->connectdb($GLOBALS['host'],$GLOBALS['user'],$GLOBALS['pass'],$GLOBALS['database']);
				$sql =  "SELECT serviceName, sid, price, category, details, PaymentMethod 
				         FROM services
				         WHERE gid = '$gid' AND category='contribution points'";
				$result = $conn->query($sql);


				if ($result->num_rows > 0) {
					 $i=0;
				    while($row = $result->fetch_assoc()) {

			                $sid = $row['sid'];
			                $sname = $row['serviceName'];
			                $price = $row['price'];
			                $category = $row['category'];
			                $details = $row['details'];
			                $pmethod = $row['PaymentMethod'];

			                echo '   <tr>
			                              <td style="vertical-align: middle;">'.$sname.'</td>
			                              <td style="vertical-align: middle;">'.$price.'</td>
			                               <td style="vertical-align: middle;"><img class="img-fluid" src="';if($pmethod == "Paypal"){echo 'img/paypal.jpg"';}else if($pmethod == 'ContactUs'){echo 'img/skype.jpg"';} echo' width="120px" height="40px"></td>
		                            </tr>';
			         }
			    }else{
			    	echo "No Result";
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
				$payment = "Paypal";
			}else if($method == "2g"){
				$payment = "ContactUs";
			}
			//$sql =  "INSERT INTO services (serviceName,gid,price,category,details) VALUES ('$title','$gid','$price','$category','$details')";
			$sql =  "INSERT INTO services (serviceName,price,category,gid,details,PaymentMethod) 
			         VALUES ('$title','$price','$category','$gid','$details','$payment')";
			return $conn->query($sql);
		}

		//UPDAAAAAAAAAAAAAAAAATTTTTTTTTTTEEEEEE

		function edit_services($file,$sid,$title,$price,$category,$details,$method){
			$conn = $this->connectdb($GLOBALS['host'],$GLOBALS['user'],$GLOBALS['pass'],$GLOBALS['database']);

			if($method == "1g"){
				$payment = "Paypal";
			}else if($method == "2g"){
				$payment = "ContactUs";
			}

			$sql =  "UPDATE services 
					 SET serviceName='$title', price='$price', category='$category', details='$details', PaymentMethod = '$payment' 
					 WHERE sid='$sid'";
			return $conn->query($sql);

			//echo $file." ".$sid." ".$title." ".$price." ".$category." ".$details." ".$method;
		}



	}

?>
