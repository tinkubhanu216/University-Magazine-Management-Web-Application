<?php
    $android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
    $blackberry = strpos($_SERVER['HTTP_USER_AGENT'],"BB10");
    $blackberry2 = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
    $iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
    $iPad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");

    // DESKTOP
    $windows = strpos($_SERVER['HTTP_USER_AGENT'],"Windows");
    $mac = strpos($_SERVER['HTTP_USER_AGENT'],"Mac");

    // REDIRECTS 
    // MOBILE
    if ($android == true) 
    { 
    header('Location: mobile/index.php');
    } 
    else if ($blackberry == true) 
    { 
    header('Location: mobile/index.php');
    }
    else if ($blackberry2 == true)
    {
    header('Location: mobile/index.php');
    }
    else if ($iphone == true) 
    { 
    header('Location: mobile/index.php');
    }
    else if ($iPad == true) 
    { 
    header('Location: mobile/index.php');
    }

?>
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
	<title>The Student</title>
	<style>
		/*slide show*/
		* {box-sizing: border-box;}
		body {font-family: Verdana, sans-serif;}
		.mySlides {display: none;}
		img {vertical-align: middle;}

		/* Slideshow container */
		.slideshow-container {
		  max-width: 1000px;
		  position: relative;
		  margin: auto;
		  	border: 1px solid blue;
			position: relative;
			width: 80%;
			background-color: grey;
			z-index: 1;

		}

		/* Caption text */
		.text {
		  color: #f2f2f2;
		  font-size: 15px;
		  padding: 8px 12px;
		  position: absolute;
		  bottom: 8px;
		  width: 100%;
		  text-align: center;
		}

		/* Number text (1/3 etc) */
		.numbertext {
		  color: #f2f2f2;
		  font-size: 12px;
		  padding: 8px 12px;
		  position: absolute;
		  top: 0;
		}

		/* The dots/bullets/indicators */
		.dot {
		  height: 15px;
		  width: 15px;
		  position: relative;
		  top: 350px;
		  margin: 0 2px;
		  background-color: #bbb;
		  border-radius: 50%;
		  display: inline-block;
		  transition: background-color 0.6s ease;
		}

		.active {
		  background-color: #717171;
		}

		/* Fading animation */
		.fade {
		  -webkit-animation-name: fade;
		  -webkit-animation-duration: 1.5s;
		  animation-name: fade;
		  animation-duration: 1.5s;
		}

		@-webkit-keyframes fade {
		  from {opacity: .4} 
		  to {opacity: 1}
		}

		@keyframes fade {
		  from {opacity: .4} 
		  to {opacity: 1}
		}

		.art{
			font-family: sans-serif;
			font-size: 20px;
			font-weight: bold;
			text-align: left;
		}


		.rcorner1{
			list-style-type: none;
			border-radius: 35px;
			background:#d4d4d4;
			padding: 10px 10px;
			width: 355px;
			position: relative;
			margin-left: 5px;
			margin-right: 10px;
			margin-top: 10px;
			margin-bottom: 10px;
			height: 250px;
			box-shadow: 1px 1px grey;
			overflow: hidden;
			text-overflow: ellipsis;
		}
		.rcorner2{
			list-style-type: none;
			border-radius: 35px;
			background: #d4d4d4;
			padding: 10px 10px;
			width: 355px;
			height: 250px;
			position: relative;
			margin-left:5px;
			margin-right: 10px;
			margin-top: 10px;
			margin-bottom: 10px;
			box-shadow: 1px 1px grey;
			overflow: hidden;
			text-overflow: ellipsis;
		}
		.rcorner3{
			list-style-type: none;
			border-radius: 35px;
			background: #d4d4d4;
			padding: 10px 10px;
			width: 355px;
			height: 250px;
			position: relative;
			margin-left: 5px;
			margin-right: 10px;
			margin-top: 10px;
			margin-bottom: 10px;
			box-shadow: 1px 1px grey;
			overflow: hidden;
			text-overflow: ellipsis;
		}
		.logicon{
			position: absolute;top: 0.5vw;right: 1vw;background-color: #111111;border: 0
		}
		.imgg{
			width:100%;
			height: auto;
		}
		.bggrey{
			border: 0px solid grey;
			position: relative;
			background-color: rgb(224,224,224);
			width: 90%;
			left: 5%;
			text-align: justify;
			text-justify:inter-word;
			margin-top: -50px;
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
			<li class="active"><a class="active" href="index.php">Home</a></li>
			<li><a class="hh" href="news.php">News</a></li>
			<li><a class="hh" href="editions.php">Editions</a></li>
			<li><a class="hh" href="articles.php">Articles</a></li>
			<li><a class="hh" href="notices.php">Notices</a></li>
			<li><a class="hh" href="editorialteam.php">Editorial Team</a></li>
			<li><a class="hh" href="upload.php">Upload</a></li>
			<li><a class="hh" href="feedback.php">Feedback</a></li>
			<li><a class="hh" href="contact.php">About Us</a></li>
			<li><button onclick="document.getElementById(<?php if(!isset($_SESSION['username'])){
				echo "'modal-wrapper1'";
			}else{
				echo "'modal-wrapper'";	
			}  ?>).style.display='block'" class="logicon"><img src="images/man.png" style="height: 3vw;width: 3vw;"></button>
		</li>
			
		</ul></center>
	</div>
<div class="slideshow-container">
		<div class="mySlides fade">
		  <div class="numbertext">1 / 3</div>
		  <img src="images/slide.png" class="imgg">
		  <div class="text">Cimage 1</div>
		</div>
		<div class="mySlides fade">
		  <div class="numbertext">2 / 3</div>
		  <img src="images/slide.png" class="imgg">
		  <div class="text">image 2</div>
		</div>
		<div class="mySlides fade">
		  <div class="numbertext">3 / 3</div>
		  <img src="images/slide.png" class="imgg">
		  <div class="text">image 3</div>
		</div>
	</div>
	<div style="text-align:center">
	  <span class="dot"></span> 
	  <span class="dot"></span> 
	  <span class="dot"></span> 
	</div>
	<div class="bggrey"><br><br>
		<h2 class="aheading">&nbspLatest News:</h2>
		<ul><form action="snews.php" method="POST">
		<?php
			$sql = "SELECT * FROM articles NATURAL JOIN ranking NATURAL JOIN astatus where contenttype='news' and status='accepted' order by time desc limit 3";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				$c=1;
				while($row = mysqli_fetch_assoc($result)){
				    echo "<li class='rcorner".$c."'><font class='art'>";
				    echo $row["title"];
				    echo "</font><hr><font>&nbsp;&nbsp;&nbsp;&nbsp;";
				    echo $row["description"];
			    	echo "</font><hr><label style='font-size:13px;font-weight:bold'>views:".$row["views"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input style='font-size:16px;color:blue;cursor:pointer' type='submit' value='Read full article:".$row["artid"]."' name='articleid'/></li>";
				    $c=$c+1;
				}
			}
		?></form>
		</ul><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<h3 align="right" style="color:#0066ff"><a style="text-decoration: none" href="news.php">For more news &nbsp;&nbsp;&nbsp;&nbsp;</a></h3>
		<h2 class="aheading">&nbspLatest Articles:</h2>
		<ul><form action="sarticles.php" method="POST">
		<?php
			$sql = "SELECT * FROM articles NATURAL JOIN ranking NATURAL JOIN astatus where contenttype<>'news' and status='accepted' order by time desc limit 4";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				$c=1;
				while($row = mysqli_fetch_assoc($result)){
				    echo "<li class='artl".$c."'><font style='font-weight: bold;'>";
				    echo $row["title"];
				    echo "</font><hr><font>&nbsp;&nbsp;&nbsp;&nbsp;";
				    echo $row["description"];
			    	echo "</font><hr><label style='font-size:13px;font-weight:bold'>views:".$row["views"]."&nbsp;&nbsp;</label><input style='font-size:14px;color:blue;cursor:pointer' type='submit' value='Read full article:".$row["artid"]."' name='articleid'/></li>";
				    $c=$c+1;
				}
			}
		?></form>
		</ul><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<h3 align="right" style="color:#0066ff"><a style="text-decoration: none;" href="articles.php">For more Articles &nbsp;&nbsp;&nbsp;&nbsp;</a></h3>
		<h2 class="aheading">&nbspLatest Editions:</h2>
		<ul>
			<a href="edview.html"><li style="list-style-type: none;"><img class="ed1" src="images/ed1.jpg" width="250px"></li></a>
			<a href="edview.html"><li style="list-style-type: none;"><img class="ed2" src="images/ed2.jpg" width="250px"></li></a>
			<a href="edview.html"><li style="list-style-type: none;"><img class="ed3" src="images/ed3.jpg" width="250px"></li></a>
			<a href="edview.html"><li style="list-style-type: none;"><img class="ed4" src="images/ed4.jpg" width="250px"></li></a>
		</ul>
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		<h3 align="right" style="color:#0066ff"><a style="text-decoration: none;" href="editions.php">For more Editions &nbsp;&nbsp;&nbsp;&nbsp;</a></h3>
		<br><br><br>
	</div>


<?php
  include "loginpopup.php";
?>
	
<?php
  include "footer.php";
  ?>
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
var modal = document.getElementById('modal-wrapper');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
var modal = document.getElementById('modal-wrapper1');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>
</html>