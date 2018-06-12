<html>
	<head>
		<title>Joe's Website</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>

	<body>
		<div id="container">
			<div id="header">
				<h1>Joe's Website</h1>
			</div>
			
			<div id="content">
				<div id="nav">
					<h3>Navigation</h3>
					<ul>
						<li><a href="main_menu.html">Main</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="mailto:coolhand812@cityuniversity.edu">Contact</a></li>
					</ul>
				</div>
				
				<div id="header2">
					<h2>Process Pet Adoption</h2>
				</div>
				
				<div id="main">
                
					<?php
						// define variables and set to empty values
						$petIDErr = $newOwnerErr = "";
						$petID = $dateAdopted = $newOwner = "";
					
						if ($_SERVER["REQUEST_METHOD"] == "POST") {
							
							if(isset($_POST["dateAdopted"])){
								$dateAdopted = $_POST["dateAdopted"];
							}

							//petID validate If the pet_id already exists
							include 'db_connection.php';
							
							$sql = "SELECT pet_id FROM adoption WHERE pet_id = $petID";

							if ($conn->query($sql) === false)
							{										 
								// row not found, do stuff...
								echo "<b>pet ID is available</b><br>";
								$petID = $_POST["petID"];
							} else {
									// do other stuff...
								$petIDErr = "Please choose a different pet ID";
							}
							
							$conn->close();
							

							if (empty($_POST["newOwner"])) {
									$newOwnerErr = "Name is required";
					  			} else {
							    	$newOwner = ($_POST["newOwner"]);
								// check if name only contains letters and whitespace
								if (!preg_match("/^[a-zA-Z ]*$/",$newOwner)) {
						  			$petNameErr = "Only letters and white space allowed"; 
								}elseif(isset($_POST["newOwner"])){
									$petName = $_POST["newOwner"];
								}
							}							
						}

						echo "</br></br>";
						CreateMySQLUser($petID, $dateAdopted, $newOwner);
						
						function CreateMySQLUser($petID, $dateAdopted, $newOwner)
						{
							echo "<b>Creating User: <i>$petID $newOwner</i></b><br>";
							// Create connection
							include 'db_connection.php';
							
							$sql = "INSERT INTO adoption (pet_id, date_of_adoption, new_owner)
							VALUES ('$petID', '$dateAdopted', '$newOwner')";
						
							echo "SQL Statement: $sql <br><br>";
							if ($conn->query($sql) === TRUE)
							{
								echo "<b>New record created successfully</b><br>";
							}
							else
							{
								echo "Error: " . $sql . "<br>" . $conn->error;
							}
						
							$conn->close();
						}
					?>	
						</br></br>

				</div>
				
			</div>
			
			<div id="footer">
				Copyright &copy; 2018 Joe Diaz
			</div>
			
		</div>
		
	</body>
	
</html>