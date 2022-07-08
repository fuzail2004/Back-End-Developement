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
		  <h2>TABLE OF MISSION</h2>
		</div>
		<?php
		
		$link = mysqli_connect("localhost", "root", "", "esa");
		// Check connection
		if ($link === false) {
			die("Connection failed: ");
		}
		?>
		<hr>
	
<table>

	<tr><th width="150px">MISSION_ID<br><hr></th>
		<th width="200px">MISSION_NAME<br><hr></th>
		<th width="200px">LAUNCH_DATE<br><hr></th>
		<th width="200px">END_DATE<br><hr></th>
		<th width="200px">MISSION_TYPE<br><hr></th>
		<th width="200px">CREW_SIZE<br><hr></th>
		<th width="200px">TARGET_ID<br><hr></th>
		<th width="200px">ASTRONAUT_ID<br><hr></th>
	</tr>
			
		<?php
		$sql = mysqli_query($link, "SELECT MISSION_ID,MISSION_NAME,LAUNCH_DATE,END_DATE,MISSION_TYPE,CREW_SIZE,TARGET_ID,ASTRONAUT_ID FROM mission");
		while ($row = $sql->fetch_assoc()){
		echo "
		<tr>
			<th>{$row['MISSION_ID']}</th>
			<th>{$row['MISSION_NAME']}</th>
			<th>{$row['LAUNCH_DATE']}</th>
			<th>{$row['END_DATE']}</th>
			<th>{$row['MISSION_TYPE']}</th>
			<th>{$row['CREW_SIZE']}</th>
			<th>{$row['TARGET_ID']}</th>
			<th>{$row['ASTRONAUT_ID']}</th>
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