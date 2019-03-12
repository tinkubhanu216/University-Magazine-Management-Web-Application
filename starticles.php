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
	<title>Articles</title>
	<style type="text/css">
		.art{
			font-family: sans-serif;
			font-size: 20px;
			font-weight: bold;
			text-align: left;
		}
		input[type=submit]{
			background-color:none;
			color: blue;
			cursor: pointer;
		}

	</style>
	

</head>
<body>
	<div class="title">
		<h1 class="maintitle" align="center">The Student</h1>
		<h6 class="tagline" align="right"><font style="font-size: 25px">- Giving Wings to Your Thoughts</font></h6>
	</div>
	<div style="position: relative;left: 75.2vw;width: 22vw;height: 5vw;border: 0px solid blue;border-radius: 1vw;background-color: grey;margin-bottom: -2.5vw;margin-top: -3vw">
		<h4 style="font-size: 1.3vw;position: relative;top: 0.5vw">&nbsp;&nbsp;Welcome:&nbsp;<font style="color: white;z-index: 1"><?php if(isset($_SESSION['username'])){ echo $_SESSION['username']; } ?></font></h4>		
	</div>
	<div class="header">
		<center><ul class="headlink">
			<li><a class="hh" href="index.php">Home</a></li>
			<li><a class="hh" href="news.php">News</a></li>
			<li><a class="hh" href="editions.php">Editions</a></li>
			<li class="active"><a class="active" href="articles.php">Articles</a></li>
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
	<div class="header1">
		<center><ul class="headlink2">
			<li><a class="hh2" href="articles.php" style="padding: 1vw 3.9vw;">Oncampus Article</a></li>
			<li><a class="hh2" href="garticles.php" style="padding: 1vw 3.9vw;">General Article</a></li>
			<li class="active1"><a class="active1" href="starticles.php" style="padding: 1vw 3.9vw;">Science & Technology</a></li>
			<li><a class="hh2" href="particles.php" style="padding: 1vw 2.9vw;">Poem</a></li>
			<li><a class="hh2" href="sparticles.php" style="padding: 1vw 3.9vw;">Silly Points</a></li>
			<li><a class="hh2" href="tarticles.php" style="padding: 1vw 2.9vw;">Telugu</a></li>
		</ul></center>
	</div>
<?php
  include "loginpopup.php";
?>

<div style="border: 0px solid grey;position: relative;width: 94%;left: 3%;right: 3%;background-color: rgb(224,224,224);top: -20px;margin-bottom: -20px;text-align: justify;text-justify:inter-word">
	<br>

	<form action="sarticles.php" method="post">
		
<?php
	$sql = "select *from articles NATURAL JOIN ranking NATURAL JOIN astatus where contenttype='Science & Technology' and status='accepted' ORDER BY VIEWS DESC";
	$c=1;
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		echo "<ul>";
	    while($row = mysqli_fetch_assoc($result)){
	    	echo "<li class='rcorner".$c."'><font class='art'>";
	    	echo $row["title"];
	    	echo "</font><hr><font style='font-size:14px'>&nbsp;&nbsp;&nbsp;&nbsp;";
	    	echo $row["description"];
	    	echo "</font><hr><label style='font-size:13px;font-weight:bold'>views:".$row["views"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input style='font-size:16px' type='submit' value='Read full article:".$row["artid"]."' name='articleid'/></li>";
	    	$c=$c+1;
	    	if($c==4){
	    		echo "</ul><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
	    		$c=1;
	    	}
	    }
	    if($c!=4 && $c!=1){
	    	echo "</ul><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
	    }
	}
?>
	</form>

	</div>
<?php
  include "footer.php";
  ?>

</body>
</html>