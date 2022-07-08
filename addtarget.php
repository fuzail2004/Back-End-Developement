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
input[type=date] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  text-align: centre;
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
div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
add{
	width:50%;
	height: auto
}
</style>


        <!--this is the navbar which are created by"a"element and link with href.there are seven webpages in the website.-->
		<div class="topnav">
		  <a href="home.php">HOME</a>
		  <a href="addastronaut.php">ADD ASTRONAUT</a>
		  <a href="addtarget.php">ADDT ARGET</a>
		  <a href="addmission.php">ADD MISSION</a>
		  <a href="tableofastronaut.php">LIST OF ASTRONAUT</a>
		  <a href="tableoftarget.php">LIST OF TARGET</a>
		  <a href="tableofmission.php">LIST OF MISSION</a>
		</div>



<?php
    //the belows veriables are for connect data data which are submitt in form they are connecting with database.in this section there are information what is the name of database,username and who is the host of database.
	
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
 		
		<div style="padding-left:16px">
		<h2>Add Target</h2>
		</div><br>

 <!--this is the form for add target in website.-->
 <!--post method shows the data that's been submitted.-->

        <form method="post" action="addtarget.php">
			<label for="fname">Target Name</label><br>
			<input id="fname"  type="text" name="target_name"><br>
			<label for="fname">First Mission</label><br>
			<input  id="fdate" type="date" name="first_mission"><br>
			<label for="fname">Target Type</label><br>
			<input  id="fname" type="text" name="target_type"><br>
			<label for="fname">No Of Mission</label><br>
			<input  id="fname" type="text" name="no_of_mission"><br>
			<input type="submit">
		</form>


<?php
    //This code below checks if the data is right, if the condition is correct then target added message will appear if its not added it will show the error.
	//this is done by if statement. if the data is write,the data will be added into database.
	//in the post method,the name used in the form must be same as used in the php code.

	if(isset($_POST['target_name']) && isset($_POST['first_mission'])&& isset($_POST['target_type'])&& isset($_POST['no_of_mission'])){
	$target_name=$_POST['target_name'];
	$first_mission=$_POST['first_mission'];
	$target_type=$_POST['target_type'];
	$no_of_mission=$_POST['no_of_mission'];

	$sql="INSERT INTO target (TARGET_NAME, FIRST_MISSION,TARGET_TYPE,NO_OF_MISSION) VALUES ('$target_name','$first_mission','$target_type','$no_of_mission')";
		
	if(mysqli_query($link,$sql)){
			echo"target is added";
		}else{
			echo"sorry try again";
		}
		header('Location: addtarget.php');
	}
?>

		<div style="padding-left:16px">
		<h2></h2>
		<p></p>
		</div>		
	

</body>
</html>