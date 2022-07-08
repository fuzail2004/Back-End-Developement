<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
	<style>
			body{
 text-align:center;
 width:80%;
 margin:0 auto;
 padding:0px;
 font-family:helvetica;
			}
			</style>
	<div class="topnav">
		  <a href="home.php">HOME</a>
		  <a href="addastronaut.php">ADD ASTRONAUT</a>
		  <a href="addtarget.php">ADDT ARGET</a>
		  <a href="addmission.php">ADD MISSION</a>
		  <a href="tableofastronaut.php">LIST OF ASTRONAUT</a>
		  <a href="tableoftarget.php">LIST OF TARGET</a>
		  <a href="tableofmission.php">LIST OF MISSION</a>
		</div>
		<div style="padding-left:16px">
		  <h2>TABLE OF TARGET</h2>
		

		  <?php
		
		$link = mysqli_connect("localhost", "root", "", "esa");
		// Check connection
		if ($link === false) {
			die("Connection failed: ");
		}
		?>
		<hr>
	
<table>

	<tr><th width="400px">TARGET_ID<br><hr></th>
		<th width="400px">TARGET_NAME<br><hr></th>
		<th width="400px">DATE_OF_FIRST_MISSION<br><hr></th>
		<th width="400px">TARGET_TYPE<br><hr></th>
		<th width="400px">NO_OF_MISSION<br><hr></th>
	</tr>
			
		<?php
		$sql = mysqli_query($link, "SELECT TARGET_ID,TARGET_NAME,FIRST_MISSION,TARGET_TYPE,NO_OF_MISSION FROM target");
		while ($row = $sql->fetch_assoc()){
		echo "
		<tr>
			<th>{$row['TARGET_ID']}</th>
			<th>{$row['TARGET_NAME']}</th>
			<th>{$row['FIRST_MISSION']}</th>
			<th>{$row['TARGET_TYPE']}</th>
			<th>{$row['NO_OF_MISSION']}</th>
		</tr>";
		}
		?>
		
</table>
		
		<?php
		$link->close();
		?>
	
<hr>


</body>
</html>