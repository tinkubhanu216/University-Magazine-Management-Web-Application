<?php
  include "../dbconnect.php";
  ?>
<?php
$userid=$username=$yeardept=$title=$description=$msg="";
$k=0;
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$artid=test_input($_POST["artid"]);
	$username=test_input($_POST["username"]);
	$userid=test_input($_POST["userid"]);
	$yeardept=test_input($_POST["yeardept"]);
	$title=test_input($_POST["contenttitle"]);
	$description=test_input($_POST["intro"]);
	$articletext=test_input($_POST["articletext"]);
}
function test_input($data){
	$data=trim($data);
	$data=stripcslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}
if($userid!=""){
	$sql="update articles set username='$username', yeardept='$yeardept', title='$title', description='$description' where artid='$artid'";
	$ret=mysqli_query($conn,$sql);
	if($ret){
//		$msg="article modified successfully";
		$sql1 = "SELECT * FROM articles where artid='$artid'";
		$result = mysqli_query($conn, $sql1);
		if (mysqli_num_rows($result) > 0) {
		    $row = mysqli_fetch_assoc($result);
		}
		$path="../".$row["filename"];
		$file=fopen($path,"w") or exit("unable to load file");
		fwrite($file,$articletext);
		fclose($file);
		$k=1;
	}
	else{
		$msg="article not modified";
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
			<li><a class="hh" href="index.php">Logout</a></li>
		</ul></center>
	</div>
</div>
<?php
if($k==1){
	echo "<h1>article modified successfully</h1>";
	echo "<button onclick='history.go(-2);'>Back</button>";
}
elseif($k==2){
	echo "<h1>article not modified</h1>";
	echo "<button onclick='history.go(-1);'>Back</button>";
}

?>
<br><br>
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