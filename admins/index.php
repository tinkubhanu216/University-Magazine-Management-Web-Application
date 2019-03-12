<?php
session_start();
$_SESSION["admintype"]="";
?>
<!DOCTYPE html>
<html>
<head>
	<title>admin login</title>
	<style type="text/css">
	input[type=text], input[type=password]{
		    width: 400px;
		    padding: 12px 20px;
		    margin: 8px 26px;
		    border: 1px solid grey;
		    box-sizing: border-box;
			font-size:22px;
			border-radius: 10px;
		}
	input[type=submit]{
		    width: 200px;
		    padding: 12px 20px;
		    margin: 8px 26px;
		    border: 1px solid grey;
		    box-sizing: border-box;
			font-size:25px;
			border-radius: 10px;
		}

	</style>
</head>
<body bgcolor="grey"><center><br><br><br>
	<div style="border: 0px solid grey;height: 500px;width: 1050px;background-color: rgb(224,224,224);top: -20px;border-radius: 35px">
		<br><br>
		<h1>Admin Login</h1>
		<form name="adlogin" method="post" action="adm.php">
			<input type="text" name="adminid" placeholder="Admin ID"><br>
			<input type="password" name="password" placeholder="Password"><br><br>
			<input type="submit" value="Login">
		</form>
	</div></center>

</body>
</html>