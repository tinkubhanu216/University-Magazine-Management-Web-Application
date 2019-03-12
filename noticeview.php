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
$nno="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$nno=$_POST["but"];
}

?>
<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">
	<title>notices</title>
	<style type="text/css">
	</style>	

</head>
<body>
	<div class="title">
		<h1 class="maintitle" align="center">The Student</h1>
		<h6 class="tagline" align="right"><font style="font-size: 25px">- Giving Wings to Your Thoughts</font></h6>
	</div>
			<div style="position: absolute;right: 10px;width: 250px;height: 50px;border: 0px solid blue;margin-top: -15px;border-radius: 20px;background-color: grey">
		<h4 style="margin-top: 10px">&nbsp;&nbsp;Welcome:&nbsp;<font style="color: white;z-index: 1"><?php if(isset($_SESSION['username'])){ echo $_SESSION['username']; } ?></font></h4>		
	</div>
<br>
	<div class="header">
		<center><ul class="headlink">
			<li><a class="hh" href="notices.php">Back</a></li>
		</ul></center>
	</div>
<div style="border: 0px solid grey;position: relative;width: 94%;left: 3%;right: 3%;background-color: rgb(224,224,224);top: -20px;margin-bottom: -20px;text-align: justify;text-justify:inter-word">
	<br>
	<?php
	echo "	<center><h1>Notice View</h1></center>";
	echo "<h3 style='position:relative;left:30px;width:1150px'>";
	if($nno!=""){
		$sql="select *from notices where noticeno=$nno";
		$result=mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			echo $row["noticeno"];
			echo "&nbsp;:&nbsp;";
			echo $row["title"];
			echo "</h3><p style='position:relative;left:30px;width:1150px'>&nbsp;&nbsp;&nbsp;&nbsp;";
			echo $row["description"];
			echo "</p>";
		}
	}


	?>	
</form><br><br>

</div>
<?php
  include "footer.php";
  ?>

</body>
</html>