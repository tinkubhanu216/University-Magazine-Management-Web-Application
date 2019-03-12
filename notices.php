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
	<title>notices</title>
	<style type="text/css">
		.art{
			font-family: sans-serif;
			font-size: 20px;
			font-weight: bold;
			text-align: left;
		}

		input[type=submit]{
			color: blue;
			cursor: pointer;
		}
		input.l{
			height: 2vw;
		    width: 5%;
		    display: inline-block;
		    border: 1px solid #ccc;
		    box-sizing: border-box;
			font-size:1vw;
			border-radius: 0.5vw;
			margin: 0px 0px 0px 0px;
		}
		input.ml{
			height: 2vw;
		    width: 71%;
		    display: inline-block;
		    border: 1px solid #ccc;
		    box-sizing: border-box;
			font-size:1vw;
			border-radius: 0.5vw;
			margin: 0px 0px 0px 0px;		}
		button.sub{
			height: 2vw;
		    width: 5%;
		    display: inline-block;
		    border: 1px solid #ccc;
		    box-sizing: border-box;
			font-size:1vw;
			border-radius: 0.5vw;	
			margin: 0px 0px 0px 0px;	}
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
			<li><a class="hh" href="articles.php">Articles</a></li>
			<li class="active"><a class="active" href="notices.php">notices</a></li>
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

<div style="border: 0px solid grey;position: relative;width: 94%;left: 3%;right: 3%;background-color: rgb(224,224,224);margin-bottom: -20px;text-align: justify;text-justify:inter-word">
	<br>
	<?php
	echo "	<center><h1 style='font-size:2vw'>Notices</h1></center>";
	echo "<form action='noticeview.php' method='post'>";
	$sql = "select *from notices ORDER BY noticeno desc";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
	    while($row = mysqli_fetch_assoc($result)){
			echo "<div style='width: 100%;left:1vw;height: 2vw;border: 0px solid grey;position: relative;background-color: none;z-index: 1'>";
	    	echo "<input class='l' type='text' value='".$row["noticeno"]."' readonly>";
	    	echo "<input class='ml' type='text' value='".$row["title"]."' readonly>";
	    	echo "	<button class='sub' type='submit' value='".$row["noticeno"]."' name='but'>view</button>";
	    	echo "</div><br>";
	    }
	}
	?>	
</form><br><br>

</div>
<?php
  include "loginpopup.php";
?>
<?php
  include "footer.php";
  ?>

</body>
</html>