<?php
session_start();
  include "dbconnect.php";
  if(isset($_SESSION['username'])){
  	header('location:index.php');
  }
  ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
$username=$userid=$fathername=$college=$collegename=$gender=$mobile=$email=$password=$msg="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$username=test_input($_POST["uname"]);
	$userid=test_input($_POST["uid"]);
	$fathername=test_input($_POST["fname"]);
	$college=test_input($_POST["colleget"]);
	$collegename=test_input($_POST["collegename"]);
	$gender=test_input($_POST["gender"]);
	$mobile=test_input($_POST["mob"]);
	$email=test_input($_POST["mail"]);
	$password=test_input($_POST["passwd"]);
}
function test_input($data){
	$data=trim($data);
	$data=stripcslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}
if($userid!=""){
	$sql="INSERT INTO user VALUES('$username','$userid','$fathername','$college','$collegename','$gender','$mobile','$email')";
	$sql1="INSERT INTO LOGIN1 VALUES('$userid','$password','$username')";
	if (mysqli_query($conn, $sql) and mysqli_query($conn, $sql1)) {
	    $msg="registered successfully";
//	    header('location:index.php');
	} else {
		$msg=mysqli_error($conn);
	}
}
?>
<html>
<head>
	<title>Register</title>
	<style type="text/css">
		input[type=text], input[type=password], input[type=E-mail], input[type=submit]{
		    width: 95%;
		    padding: 12px 20px;
		    margin: 8px 26px;
		    border: 1px solid grey;
		    box-sizing: border-box;
			font-size:16px;
			border-radius: 10px;
		}
		.txt{
			font-size: 25px;
			font-weight: bold;
			color: black;
		}
		div .txt1{
			background-color: none;
			margin-left: 40px;
			margin-top: -5px;
			margin-bottom: -20px;
		}
	</style>
</head>
<body style="background-color: #5d6d7e">
	<br><br><br>
	<center><h1 style="color: white;font-family: Verdana, sans-serif;text-shadow: 3px 0px black;"><u>User Registration</u></h1></center>

	<div style="background-color: #C4C4C4;height: 400px;width: 65%;top: 170px;position: absolute;left: 250px;border-radius: 30px;">
		<br>
		<form name="reg" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
			<div style="border-radius: 10px solid black;width: 400px;height: 400px;position: absolute;background-color: none;">
				<input type="text" placeholder="Username" name="uname" pattern="[a-zA-Z ]+" oninvalid="setCustomValidity('User Name should have Characters only')" onchange="try{setCustomValidity('')}catch(e){}" minlength="5" maxlength="50" required><br/>
				<input type="text" placeholder="UserId" name="uid" pattern="[a-zA-Z0-9@]+"  oninvalid="setCustomValidity('User ID should have Alphanumaric only')" onchange="try{setCustomValidity('')}catch(e){}" maxlength="8" minlength="5" maxlength="50" required><br/>
				<input type="text" placeholder="FatherName" name="fname" pattern="[a-zA-Z ]+"  oninvalid="setCustomValidity('Father Name should have Characters only')" onchange="try{setCustomValidity('')}catch(e){}" required minlength="5" maxlength="50"><br><br>

				<label class="txt">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;College:   </label><input type="radio" name="colleget" value="rgukt" required><label class="txt">RGUKT  </label><input type="radio" name="colleget" value="other" required><label class="txt">OTHER  </label><br><br>
				<input type="text" placeholder="CollegeName" name="collegename" pattern="[a-zA-Z ]+" oninvalid="setCustomValidity('College Name should have Characters only')" onchange="try{setCustomValidity('')}catch(e){}" required minlength="10" maxlength="50"><br><br>
				<label class="txt">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gender:   </label><input type="radio" name="gender" value="male" required><label class="txt">Male  </label><input type="radio" name="gender" value="female" required><label class="txt">Female  </label><br><br>
			</div>
			<div style="border-radius: 10px solid black;width: 400px;height: 400px;position: absolute;background-color: none;right: 30px">
				<input type="text" placeholder="Mobile No" name="mob" pattern="[6789][0-9]{9}" maxlength="10" minlength="10" required><br/>
				<input type="E-Mail" placeholder="E-Mail" name="mail" pattern="[a-zA-Z0-9]+[@][a-zA-Z]+.[a-zA-Z]{2,4}" oninvalid="setCustomValidity('Please enter valid E-mail')" onchange="try{setCustomValidity('')}catch(e){}" required maxlength="40" minlength="5"><br>
				<input type="password" placeholder="Password" name="passwd" pattern="(?=^.{8,15}$)(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" oninvalid="setCustomValidity('Password should be minimun 1 lowercase,1 Uppercase,1 number')" onchange="try{setCustomValidity('')}catch(e){}"  maxlength="15" required><br>
				<h3><?php echo $msg;
				if($msg!=""){
					echo "<a href='index.php'> Goto Home</a>";
				}  ?></h3>
				<input style="background-color: black;color: white;font-weight: bold;" type="submit" value="Register">
			</div>
		</form>		        
	</div>
</body>

</html>
