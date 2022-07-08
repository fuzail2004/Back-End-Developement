<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
	<style>
body{
width: 80%;
 text-align:center;
 width:80%;
 margin:0 auto;
 padding:0px;
 font-family:helvetica;
}
input[type=text] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 4px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=number] {
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
  width: 50%;
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
select {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 4px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
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
 
    //the belows veriables are for connect data data which are submitt in form they are connecting with database.in this section there are information what is the name of database,username and who is the host of database
	
    $host="localhost";//this is the host name
	$username="root";//this is username
	$password="";//this is password
	$database_name="esa";//this is the name of database
		
    $link = mysqli_connect($host,$username,$password, $database_name);
		
	if($link===false){
		die("this could not connect please try again");
       }
?>


		<div style="padding-left:16px;">
				<h2>Add Mission</h2>
				</div><br>


		<!--this is the form for add mission in website.//post method shows the data that's been submitted.-->

		<form method="post" action="addmission.php">
			<label for="fname">Mission Name</label><br>
			<input id="fname" type="text" name="mission_name"><br>
			<label for="fname">Launch Date</label><br>
			<input id="fname"type="date" name="launch_date"><br>
			<label for="fname">End Date</label><br>
			<input id="fname"type="date" name="end_date"><br>
			<label for="fname">Mission Type</label><br>
			<input id="fname" type="text" name="mission_type"><br>
			<label for="fname">Crew Size</label><br>
			<input id="fname" type="number" name="crew_size"><br>


	<!--line number 123to132 is dropdown section for astronaut id.this is linked with astronaut_id.user will select astronaut name and in the table 
	it will show astronaut id  which named they selected.-->

    <label type="select">Select Astronaut ID</label><br>
	<select name="astronaut_id"><br>

		<?php
			$sql=mysqli_query($link,"SELECT ASTRONAUT_ID, ASTRONAUT_NAME FROM astronaut");
			while($row=$sql->fetch_assoc()){
				echo"<option value='{$row['ASTRONAUT_ID']}'>{$row['ASTRONAUT_NAME']}</option>";
			}
		?>
	</select><br>


	<!--line number 125 is dropdown section for target id.this is linked with target_id in database.user will select target name and in the table 
	it will show target id  which named they selected.-->

	<label >Select Target ID</label><br>
	<select name="target_id"><br>
		
		<?php
		    $sql=mysqli_query($link,"SELECT TARGET_ID, TARGET_NAME FROM target");
		    while($row=$sql->fetch_assoc()){
			   echo"<option value='{$row['TARGET_ID']}'>{$row['TARGET_NAME']}</option>";
		    }
		?>

	</select><br>

    		<input type="submit">
			</form>

<?php

	//This code below checks if the data is right, if the condition is correct then target added message will appear if its not added it will show the error.this is done by if statement. if the data is write,the data will be added into database.in the post method,the name used in the form must be same as used in the php code.

    if(isset($_POST['mission_name']) && isset($_POST['launch_date']) && isset($_POST['end_date']) && isset($_POST['mission_type']) && isset($_POST['crew_size']) && isset($_POST['astronaut_id']) && isset($_POST['target_id'])){
	$mission_name=$_POST['mission_name'];
	$launch_date=$_POST['launch_date'];
	$end_date=$_POST['end_date'];
	$mission_type=$_POST['mission_type'];
	$crew_size=$_POST['crew_size'];
	$astronaut_id = $_POST['astronaut_id'];
	$target_id = $_POST['target_id'];

	$sql="INSERT INTO mission (MISSION_NAME, LAUNCH_DATE,END_DATE,MISSION_TYPE,CREW_SIZE, ASTRONAUT_ID, TARGET_ID) VALUES ('$mission_name','$launch_date','$end_date','$mission_type','$crew_size', '$astronaut_id', '$target_id')";

	if(mysqli_query($link,$sql)){
		echo"mission is added";
	}else{
		echo"sorry try again";
	}
	header('Location: addmission.php');
    }
?>

		<div style="padding-left:16px">
		  <h2></h2>
		  <p></p>
		</div>


	</body>
</html>