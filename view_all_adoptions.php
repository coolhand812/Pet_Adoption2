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
					include 'db_connection.php'; 

                    $join = ("SELECT pettable.pet_id
                                     pettable.name
                                     pettable.gender
                                     pettable.intake_date
                                     pet_typetable.pet_type as ptype
                                     adoption.date_of_adoption as date_adopted
                            FROM pettable
                            INNER JOIN adoption on adoption.pet_id = pettable.pet_id
                            INNER JOIN pet_typetable on pet_typetable.pet_type = pettable.type_id");
                            
                    $result = $conn->query($join);

					if ($result->num_rows > 0) {
    					// output data of each row
    					while($row = $result->fetch_assoc()) {
        				echo "id: " . $row["pet_id"]. " - Name: " . $row["name"]. " - Gender: " . $row["gender"]. " - IntakeDate: " . $row["intake_date"]. " - Type: " . $row["pet_type"]. " - Date adopted: " . $row["date_of_adoption"]. "<br>";
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