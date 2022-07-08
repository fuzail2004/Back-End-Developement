<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
	<style>
body
{
 text-align:center;
 width:80%;
 margin:0 auto;
 padding:0px;
 font-family:helvetica;
}
input[type=text], select {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 4px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=number], select {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 4px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 50%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
add{
	width:50%;
	height:0%;
}
</style>

		<!-- line number 10to17 is the navbar this is the first code for all webpages-->
		<div class="topnav">
		  <a href="home.php">HOME</a>
		  <a href="addastronaut.php">ADD ASTRONAUT</a>
		  <a href="addtarget.php">ADDT TARGET</a>
		  <a href="addmission.php">ADD MISSION</a>
		  <a href="tableofastronaut.php">LIST OF ASTRONAUT</a>
		  <a href="tableoftarget.php">LIST OF TARGET</a>
		  <a href="tableofmission.php">LIST OF MISSION</a>
		</div>

	
		<div class="add"style="padding-left:16px"hight="10px">
		 <h2>Add Astronaut</h2>
		</div><br>


<?php
	//the belows information are for connect data data which are submitt in form they are connecting with database.in this section there are information what is the name of database,username and who is the host of database.
	
	$host="localhost";//this is the host name
	$username="root";//this is username
	$password="";//this is password
	$database_name="esa";//this is the name of database
	
	$link = mysqli_connect($host,$username,$password, $database_name);
	
	//the below if statement is for the data not connects with database.
	if($link===false){
		die("this could not connect please try again");
	}
?>


		<!--this is the form for add astronaut in website.-->
		<!--post method shows the data that's been submitted.-->

		<form method="post" action="addastronaut.php">
			<label for="fname">Astronaut Name</label><br>
			<input id="fname" type="text" name="astronaut_name"><br>
			<label for="lname">No Of Mission</label><br>
			<input id="lname" type="number" name="no_of_mission"><br>
			<input type="submit">
		</form>

   
<?php
	//this code below checks if the data is right, if the condition is correct then astronaut added message will appear if its not added it will show the error.
	//this is done by if statement. if the data is write,the data will be added into database.
	//the name used in the form must be same as used in the php code.

	if(isset($_POST['astronaut_name']) && isset($_POST['no_of_mission'])){
	$astronaut_name=$_POST['astronaut_name'];
	$no_of_mission=$_POST['no_of_mission'];
	$sql="INSERT INTO astronaut (ASTRONAUT_NAME, NO_OF_MISSION) VALUES ('$astronaut_name','$no_of_mission')";
			
	if(mysqli_query($link,$sql)){
		echo"astronaut is added";
	}else{
		echo"sorry try again";
		}
	}
?>


		<div style="padding-left:16px">
		    <h2></h2>
			<p></p>
			</div>


	</body>
</html>