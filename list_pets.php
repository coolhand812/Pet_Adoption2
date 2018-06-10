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
					<h2>Available Pet List</h2>
				</div>
				
				<div id="main">
				<br><br>
				<?php
					//generate db query and get a table
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "pet_adoption2";

					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);
					// Check connection
					if ($conn->connect_error) {
    					die("Connection failed: " . $conn->connect_error);
					} 

					$sql = "SELECT pet_id, name, gender, age, type_id, notes, intake_date FROM pettable";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
    					// output data of each row
    					while($row = $result->fetch_assoc()) {
        				echo "id: " . $row["pet_id"]. " - Name: " . $row["name"]. " - Gender: " . $row["gender"]. " - Age: " . $row["age"]. " - Type: " . $row["type_id"]. " - Notes: " . $row["notes"]. " - Intake Date: " . $row["intake_date"]. "<br>";
    					}
					} else {
    					echo "0 results";
					}
					$conn->close();
				?>	
				</br></br>
				<a href="main_menu.html">Go back to the main page</a>	
				</div>
				
			</div>
			
			<div id="footer">
				Copyright &copy; 2018 Joe Diaz
			</div>
			
		</div>
		
	</body>
	
</html>