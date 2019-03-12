<?php
  include "../dbconnect.php";
  ?>
<?php
$artid=$var="";
$k=0;
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$var=test_input($_POST["but"]);
}
function test_input($data){
	$data=trim($data);
	$data=stripcslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}
$c=substr($var, -1);

if($c=='d'){
	$artid=substr($var,0,-1);
	$sql="delete from articles where artid='$artid'";
	$sql1="delete from ranking where artid='$artid'";
	$r1=mysqli_query($conn, $sql);
	$r2=mysqli_query($conn, $sql1);
	if($r1 and $r2){
		header('rr1.php');
		$k=1;
	}
}
elseif($c=='m') {
	$artid=substr($var,0,-1);
	$k=2;
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
		    width: 95%;
		    padding: 5px 15px;
		    margin: 0px 0px;
		    display: inline-block;
		    border: 1px solid #ccc;
		    box-sizing: border-box;
			font-size:16px;
		}
		label{
			font-family: sans-serif;
			font-size: 25px;
		}
		select{
		    width: 90%;
		    padding: 5px 15px;
		    margin: 0px 0px;
		    display: inline-block;
		    border: 1px solid #ccc;
		    box-sizing: border-box;
			font-size:16px;			
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
			<li><a class="hh" href="index.php">Logout</a></li>
		</ul></center>
	</div>
</div>
<?php
if($k==1){
	echo "<h1>article deleted successfully</h1>";
	echo "<button onclick='history.go(-1);'>Back</button>";
}
elseif($k==2){
	$sql = "select *from articles where artid='$artid'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
	    $row = mysqli_fetch_assoc($result)

?><center><br><br>
<div style="height: 1250px;width: 70%;background-color: rgb(224,224,224);border-radius: 30px;box-shadow: 2px 2px 2px grey"><br>
	<h2>Modify Article</h2>

<div style="width: 230px;position: absolute;height: 600px;text-align: right;">
	<label>Article ID:</label><br><br>
	<label>User Name:</label><br><br>
	<label>User ID:</label><br><br>
	<label>Year & Dept.:</label><br><br>
	<label>Title of Content:</label><br><br>
	<label>Description:</label><br><br><br><br><br><br>
	<label>Article text:(.txt)</label><br><br>
</div>
	<div style="width: 50%;position: absolute;left: 450px;height: 600px;text-align: left;">
		<form action="result2.php" method="post" enctype="multipart/form-data">
			<input type="text" value="<?php echo($row['artid']); ?>" name="artid" required><br><br>
			<input type="text" value="<?php echo($row['username']); ?>" name="username" pattern="[a-zA-Z ]+" oninvalid="setCustomValidity('User Name should have Characters only')" onchange="try{setCustomValidity('')}catch(e){}" required><br><br>
			<input type="text" name="userid" value="<?php echo($row['userid']); ?>"  pattern="[a-zA-Z0-9@]+"  oninvalid="setCustomValidity('User ID should have Alphanumaric only an minimum length 5 and max 8')" onchange="try{setCustomValidity('')}catch(e){}" maxlength="8" minlength="5" required><br><br>
			<input type="text" name="yeardept" value="<?php echo($row['yeardept']); ?>"  pattern="[a-zA-Z0-9- ]+"  oninvalid="setCustomValidity('Please enter EX-Dept format only ex:E3-CSE ')" onchange="try{setCustomValidity('')}catch(e){}" maxlength="8" minlength="5" required><br><br>
			<input type="text" name="contenttitle"  value="<?php echo($row['title']); ?>"  required minlength="20" maxlength="50"><br><br>
			<textarea rows="6" cols="73" name="intro" minlength="50" maxlength="200" required><?php echo($row['description']); ?></textarea><br><br>
			<textarea rows="35" cols="73" name="articletext" value="bhanu" required><?php 
				$path="../".$row["filename"];
				$file=fopen($path,"r") or exit("unable to load file");
				while(!feof($file)){
					echo fgets($file);
				}
				fclose($file);
			 ?></textarea><br>
			<!input type="file" name="filee" accept=".txt" required>
			<!input type="file" name="imagee" accept=".jpeg"><br><br><br>
			<input type="submit" value="submit" style="width: 100px;height: 30px;font-family: sans-serif;font-size: 17px">
			<input type="submit" onclick='history.go(-1);' value="Back" style="width: 100px;height: 30px;font-family: sans-serif;font-size: 17px">
		</form>
		<h2><?php 
//		if($a==1 and $i!=0 and $db==1){
//			echo "Successfully uploaded article";
//		}
//		else{
//			echo $msg;
//		}
		 ?></h2>
	</div>

</div></center>
<?php
}
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