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
					<h2>Pet Adoption Form</h2>
				</div>
				
				<div id="main">
                
					<!-- Form with no validation -->
	<form action="process_adoption.php" method="post">
		
		<b>Adoption date </b><br>
		<input type="date" name="dateAdopted" value="<?php echo date('Y-m-d'); ?>" />
		<br><br>
		
		<b>Pet ID </b><br>
		<input type="text" name="petID" size="30" maxlength="25" title=" Enter the petID">
		<br><br>
		
		<b>Please enter the new owner's name</b><br>
		<input type="text" name="newOwner" size="30" maxlength="25" title=" Enter new owner name">
		<br><br>
		
		<input type="submit" value="register adoption">
	</form>
	<br><br>	
					
				</div>
				
			</div>
			
			<div id="footer">
				Copyright &copy; 2018 Joe Diaz
			</div>
			
		</div>
		
	</body>
	
</html>