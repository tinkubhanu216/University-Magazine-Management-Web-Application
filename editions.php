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
	<title>editions</title>

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
			<li class="active"><a class="active" href="editions.php">Editions</a></li>
			<li><a class="hh" href="articles.php">Articles</a></li>
			<li><a class="hh" href="notices.php">notices</a></li>
			<li><a class="hh" href="editorialteam.php">Editorial Team</a></li>
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
<ul>
	<a href="edview.html"><li style="list-style-type: none;"><img class="ed1" src="images/ed1.JPG" style="width: 20vw;height: auto;"></li></a>
	<a href="edview.html"><li style="list-style-type: none;"><img class="ed2" src="images/ed2.JPG" style="width: 20vw;height: auto;"></li></a>
	<a href="edview.html"><li style="list-style-type: none;"><img class="ed3" src="images/ed3.JPG" style="width: 20vw;height: auto;"></li></a>
	<a href="edview.html"><li style="list-style-type: none;"><img class="ed4" src="images/ed4.JPG" style="width: 20vw;height: auto;"></li></a>
</ul>
<ul>
	<a href="edview.html"><li style="list-style-type: none;"><img class="ed1" src="images/ed1.JPG" style="width: 20vw;height: auto;"></li></a>
	<a href="edview.html"><li style="list-style-type: none;"><img class="ed2" src="images/ed2.JPG" style="width: 20vw;height: auto;"></li></a>
	<a href="edview.html"><li style="list-style-type: none;"><img class="ed3" src="images/ed3.JPG" style="width: 20vw;height: auto;"></li></a>
	<a href="edview.html"><li style="list-style-type: none;"><img class="ed4" src="images/ed4.JPG" style="width: 20vw;height: auto;"></li></a>
</ul>
<br><br>
<ul>
	<a href="edview.html"><li style="list-style-type: none;"><img class="ed1" src="images/ed1.JPG" style="width: 20vw;height: auto;"></li></a>
	<a href="edview.html"><li style="list-style-type: none;"><img class="ed2" src="images/ed2.JPG" style="width: 20vw;height: auto;"></li></a>
</ul>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<br><br><br>

<?php
  include "footer.php";
  ?>

</body>
</html>