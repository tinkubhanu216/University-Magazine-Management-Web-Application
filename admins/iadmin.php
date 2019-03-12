<?php
  include "../dbconnect.php";
  session_start();
  ?>
<?php
$type=$_SESSION["admintype"];
?>
<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/mystyle.css">
	<title>admin</title>
	<style type="text/css">

input.ml{
	height: 30px;
    width: 220px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
	font-size:16px;
	border-radius: 8px;
}
input.ll{
	height: 30px;
    width: 50px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
	font-size:16px;
	border-radius: 8px;
}

input.mr{
	height: 30px;
    width: 545px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
	font-size:16px;
	border-radius: 8px;
}
button.sub{
	height: 30px;
    width: 100px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
	font-size:16px;
	border-radius: 8px;
}
	</style>

</head>
<body>
	<div class="title">
		<h1 class="maintitle" align="center">The Student</h1>
		<h6 class="tagline" align="right"><font>- Giving Wings to Your Thoughts</font></h6>
	</div>
	<div style="position: relative;left: 75.2vw;width: 22vw;height: 5vw;border: 0px solid blue;border-radius: 1vw;background-color: grey;margin-bottom: -2.5vw;margin-top: -3vw">
		<h4 style="font-size: 1.3vw;position: relative;top: 0.5vw">&nbsp;&nbsp;Welcome:&nbsp;<font style="color: white;z-index: 1"><?php if(isset($_SESSION['admintype'])){ echo $_SESSION['admintype']; } ?></font></h4>		
	</div>
	<div class="header">
		<center><ul class="headlink">
			<li><a class="hh" href="index.php">Logout</a></li>
			<li class="active1"><a class="active1" href="iadmin.php">Articles</a></li>
			<li><a class="hh" href="request.php">Requests</a></li>
		</ul></center>
	</div>
<div style="border: 0px solid grey;position: relative;width: 94%;left: 3%;right: 3%;background-color: rgb(224,224,224);top: -20px;margin-bottom: -20px;text-align: justify;text-justify:inter-word">
	<br>
	<?php
	echo "	<h1>".$type."</h1>";
	echo "<form action='result.php' method='post'>";
	$sql = "select *from articles NATURAL JOIN ranking NATURAL JOIN astatus where contenttype='$type' and status='accepted' ORDER BY title";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
	    while($row = mysqli_fetch_assoc($result)){
			echo "<div style='width: 1200px;left:20px;height: 30px;border: 0px solid grey;position: relative;background-color: none;z-index: 1'>";
	    	echo "<input class='ll' type='text' value='".$row["artid"]."' readonly>";
	    	echo "<input class='ml' type='text' value='".$row["contenttype"]."' readonly>";
	    	echo "<input class='mr' type='text' value='".$row["title"]."' readonly>";
	    	echo "	<button class='sub' type='submit' value='".$row["artid"]."m' name='but'>modify</button>";
	    	echo "<button class='sub' type='submit' value='".$row["artid"]."d' name='but'>delete</button>";
	    	echo "</div><br>";
	    }
	}
	?>	
</form><br><br>

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