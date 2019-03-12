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
  <?php
  $name=$text=$msg="";
  if($_SERVER["REQUEST_METHOD"]=="POST"){
	$name=test_input($_POST["name"]);
	$text=test_input($_POST["text"]);
}

if($name!=""){
	$sql="insert into feedback values('$name','$text')";
	$ret=mysqli_query($conn,$sql);
	if($ret){
		$msg="success";
	}
	else{
		$msg=mysqli_error($conn);
	}

}



  ?>
  <!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">
	<title>feedback</title>
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
			<li><a class="hh" href="editorialteam.php">Editorial Team</a></li>
			<li><a class="hh" href="upload.php">Upload</a></li>
			<li class="active"><a class="active" href="feedback.php">Feedback</a></li>
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
<br>
<center>
	<h1>Feedback</h1>
</center>
<br>
<h1><?php echo $msg;  ?></h1>
<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
	<input type="text" name="name" placeholder="Enter Your Name"><br>
	<textarea style="position: relative;left: 40px;width: 85%;height: 150px" name="text"></textarea><br><br>
	<input style="position: relative;left: 50px" type="submit" value="submit" name="butt">
</form>
<br><br>
<?php
  include "footer.php";
  ?>

</body>
</html>