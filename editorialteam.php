<?php
  include "dbconnect.php";
  ?>
<?php
session_start();
if(isset($_COOKIE["username"])) {
	   $_SESSION["username"]=$_COOKIE["username"]; 
	   $_SESSION["userid"]=$_COOKIE["userid"];
	}
?>
<?php
  include "loginscript.php";
  ?>
  <!DOCTYPE html>


<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">
	<title>editorial team</title>
	<style type="text/css">
		.heading{
			color: blue;
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
			<li><a class="hh" href="news.php">News</a></li>
			<li><a class="hh" href="editions.php">Editions</a></li>
			<li><a class="hh" href="articles.php">Articles</a></li>
			<li><a class="hh" href="notices.php">notices</a></li>
			<li class="active"><a class="active" href="editorialteam.php">Editorial Team</a></li>
			<li><a class="hh" href="upload.php">Upload</a></li>
			<li><a class="hh" href="feedback.php">Feedback</a></li>
			<li><a class="hh" href="contact.php">About Us</a></li>
			<li><button onclick="document.getElementById(<?php if(!isset($_SESSION['username'])){
				echo "'modal-wrapper1'";
			}else{
				echo "'modal-wrapper'";	
			}  ?>).style.display='block'" style="position: absolute;top: 0.5vw;right: 1vw;background-color: #111111;border: 0"><img src="images/man.png" style="height: 3vw;width: 3vw;"></button>
		</li>
			
		</ul></center>
	</div>
<?php
  include "loginpopup.php";
?>
<br><center><h1><u>Editorial Team</u></h1>
	<h2 class="heading">Chief Editor</h2>
	<h3>Mr. Ravi Kumar Thandra <sub style="font-size: 15px">E4-CSE</sub></h3>
	<br>
	<h2 class="heading">Associative Editor</h2>
	<h3 style="left;position: absolute;left: 350px">Mr. Ravi Kumar Thandra <sub style="font-size: 15px">E4-CSE</sub></h3>
	<h3 style="left;position: absolute;right: 300px">Mr. Ravi Kumar Thandra <sub style="font-size: 15px">E4-CSE</sub></h3>
	<br><br><br>
	<h2 class="heading">Associative Editor</h2>
	<h3 style="left;position: absolute;left: 350px">Mr. Ravi Kumar Thandra <sub style="font-size: 15px">E4-CSE</sub></h3>
	<h3 style="left;position: absolute;right: 300px">Mr. Ravi Kumar Thandra <sub style="font-size: 15px">E4-CSE</sub></h3><br><br><br>
	<h3 style="left;position: absolute;left: 350px">Mr. Ravi Kumar Thandra <sub style="font-size: 15px">E4-CSE</sub></h3>
	<h3 style="left;position: absolute;right: 300px">Mr. Ravi Kumar Thandra <sub style="font-size: 15px">E4-CSE</sub></h3>

	<br><br><br>
	<h2 class="heading">Chief Editor</h2>
	<h3>Mr. Ravi Kumar Thandra <sub style="font-size: 15px">E4-CSE</sub></h3>
	<br>
	<h2 class="heading">Chief Editor</h2>
	<h3>Mr. Ravi Kumar Thandra <sub style="font-size: 15px">E4-CSE</sub></h3>
	<br>
	<h2 class="heading">Chief Editor</h2>
	<h3>Mr. Ravi Kumar Thandra <sub style="font-size: 15px">E4-CSE</sub></h3>
	<br>

</center>
<br><br><br><br><br><br><br>
<div class="foot">
	<center><p class="foottext"><u>The Student<font style="font-family: arial;font-size: 20px">-RGUKT Basar</font></u></p></center>
	<div style="left: 20px;position: absolute;"><img src="images/ts_logo.jpg" height="150px">
	</div>
	<div style="color: white;left: 300px;border: 0px solid white;position: absolute;"><br><h3>RGUKT Basar</h3><h4>Basar,Nirmal-504107</h4><h5>thestudent@rgukt.ac.in</h5>
	</div>
	<div style="color: white;right: 500px;border: 0px solid white;position: absolute;"><br><a style="color: white;text-decoration: none;cursor: pointer;" href="articles.php"><label>Articles</label></a><br><br><a style="color: white;text-decoration: none;cursor: pointer;"  href="editions.php"><label>Editions</label></a><br><br><a style="color: white;text-decoration: none;cursor: pointer;" href="news.php"><label>News</label></a><br><br><a style="color: white;text-decoration: none;cursor: pointer;" href="contact.php"><label>Contact Us</label></a>
	</div>
	<div style="color: white;right: 250px;border: 0px solid white;position: absolute;"><br><a style="color: white;text-decoration: none;cursor: pointer;" href="notices.php"><label>notices</label></a><br><br><a style="color: white;text-decoration: none;cursor: pointer;" href="editorialteam.php"><label>Editorial Team</label></a><br><br><a style="color: white;text-decoration: none;cursor: pointer;" href="feedback.php"><label>Feedback</label></a><br><br><a style="color: white;text-decoration: none;cursor: pointer;" href="contact.php"><label>About Us</label></a>
	</div>
</div>

</body>
</html>