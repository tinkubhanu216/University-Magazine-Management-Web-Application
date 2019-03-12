<?php
  include "../dbconnect.php";
 ?>
 <?php 
 $ntext=$ntitle="";
 $k=0;
	 if($_SERVER["REQUEST_METHOD"]=="POST"){
		$ntitle=test_input($_POST["not"]);
		$ntext=test_input($_POST["noticetext"]);
	}
//	echo $ntitle;
	function test_input($data){
		$data=trim($data);
		$data=stripcslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
	if($ntext!=""){
		$sql="insert into notices(title,description,time) values('$ntitle','$ntext',now())";
		$ret=mysqli_query($conn,$sql);
		if($ret){
			$k=1;
		}
		else{
			$k=2;
		}
	}

?>

<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/mystyle.css">
	<title>admin</title>
	<style type="text/css">
		input[type=text]{
		    width: 60%;
		    padding: 5px 15px;
		    margin: 0px 0px;
		    display: inline-block;
		    border: 1px solid #ccc;
		    box-sizing: border-box;
			font-size:16px;
			border-radius: 10px;
		}
		.txt1{
		    width: 60%;
		    padding: 5px 15px;
		    margin: 0px 0px;
		    display: inline-block;
		    border: 1px solid #ccc;
		    box-sizing: border-box;
			font-size:16px;
			border-radius: 10px;
		}
		input[type=submit]{
		    padding: 5px 15px;
		    margin: 0px 0px;
		    display: inline-block;
		    border: 1px solid #ccc;
		    box-sizing: border-box;
			font-size:16px;
			border-radius: 10px;
			background-color: #aaaaaa;
		}
		.bha{
		    width: 60%;
		    padding: 5px 15px;
		    margin: 0px 0px;
		    display: inline-block;
		    border: 1px solid #ccc;
		    box-sizing: border-box;
			font-size:16px;
			border-radius: 10px;
		}

	</style>

</head>
<body>
	<div class="title">
		<h1 class="maintitle" align="center">The Student</h1>
		<h6 class="tagline" align="right"><font>- Giving Wings to Your Thoughts</font></h6>
	</div>
	<div style="position: relative;left: 75.2vw;width: 22vw;height: 5vw;border: 0px solid blue;border-radius: 1vw;background-color: grey;margin-bottom: -2.5vw;margin-top: -3vw">
		<h4 style="font-size: 1.3vw;position: relative;top: 0.5vw">&nbsp;&nbsp;Welcome:&nbsp;<font style="color: white;z-index: 1"><?php if(isset($_SESSION['username'])){ echo $_SESSION['username']; } ?></font></h4>		
	</div>
	<div class="header">
		<center><ul class="headlink">
			<li><a class="hh" href="index.php">Home</a></li>
			<li><a href="admin.php">Update Admins</a></li>
			<li  class="active" ><a class="active"  href="addnotice.php">Add Notice</a></li>
			<li><a class="hh" href="deletenotice.php">Delete Notice</a></li>
		</ul></center>
	</div>
<div style="border: 0px solid grey;position: relative;width: 94%;left: 3%;right: 3%;background-color: rgb(224,224,224);margin-bottom: -20px;text-align: justify;text-justify:inter-word">
	<br>
<div style="position: relative;width: 100%;left: 80px">
	<h1 style="font-size: 2vw">Add Notice :</h1>	
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
		<input type="text" name="not" placeholder="notice title"  pattern="[a-zA-Z0-9.,?! ]+" oninvalid="setCustomValidity('text should have Characters only')" onchange="try{setCustomValidity('')}catch(e){}" required><br><br>
		<textarea class="txt1" rows="20" name="noticetext"  pattern="[a-zA-Z0-9.,?! ]+" oninvalid="setCustomValidity('text should have Characters only')" onchange="try{setCustomValidity('')}catch(e){}" required></textarea><br><br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="add notice">
	</form>
<br><?php if ($k==1){
	echo "<h1>Success</h1>";
} elseif ($k==2) {
	echo "<h1>Failed</h1>";
} ?><br><br>
</div>

</div>
<div class="foot">
	<center><p class="foottext"><u>The Student<font style="font-family: arial;font-size: 20px">-RGUKT Basar</font></u></p></center>
	<div style="left: 20px;position: absolute;"><img src="images/ts_logo.jpg" height="150px">
	</div>
	<div style="color: white;left: 300px;border: 0px solid white;position: absolute;"><br><h3>RGUKT Basar</h3><h4>Basar,Nirmal-504107</h4><h5>thestudent@rgukt.ac.in</h5>
	</div>
	<div style="color: white;right: 500px;border: 0px solid white;position: absolute;"><br><label>Articles</label><br><br><label>Editions</label><br><br><label>News</label><br><br><label>Contact Us</label>
	</div>
	<div style="color: white;right: 250px;border: 0px solid white;position: absolute;"><br><label>notices</label><br><br><label>Editorial Team</label><br><br><label>Feedback</label><br><br><label>About Us</label>
	</div>
</div>

</body>
</html>