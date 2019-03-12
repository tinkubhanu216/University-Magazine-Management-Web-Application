<?php
session_start();
if(isset($_COOKIE["username"])) {
	   $_SESSION["username"]=$_COOKIE["username"]; 
	   $_SESSION["userid"]=$_COOKIE["userid"];
	}
  include "dbconnect.php";
  $var=$_POST["articleid"];
  $var=str_replace('Read full article:','',$var);
//  echo $var;
  ?>

<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">
	<title>articles</title>
	<style type="text/css">
		.art{
			font-family: sans-serif;
			font-size: 20px;
			font-weight: bold;
			text-align: left;
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
			<li><a class="hh" href="articles.php">Back</a></li>
			<li><a class="hh" href="index.php">The Student Home</a></li>			
		</ul></center>
	</div>

	<div style="border: 0px solid grey;position: relative;width: 94%;left: 3%;background-color: rgb(224,224,224);margin-bottom: -50px;text-align: justify;text-justify:inter-word;">
		<br><br><h3 style="position: relative;left: 1vw;margin-left: 2vw;margin-right: 3vw;font-size: 1.6vw">
		<?php
			$sql = "SELECT * FROM articles NATURAL JOIN ranking  where artid='$var'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
			    $row = mysqli_fetch_assoc($result);
			    echo $row["title"];
		?></h3>
		<p style="position: relative;left: 1vw;margin-left: 2vw;margin-right: 3vw;font-size: 1.3vw">
			<?php
				$path=$row["filename"];
				$file=fopen($path,"r") or exit("unable to load file");
				echo fgets($file);
				echo fgets($file);
				echo "</p>";
				if($row["imgname"]!="upload images/"){
					echo "<center><img src='".$row["imgname"]."' style='width:60%;height:auto;'/></center><br>";
				}
				echo "<p style='position: relative;left: 1vw;margin-left: 2vw;margin-right: 3vw;font-size:1.3vw'>";
				while(!feof($file)){
					echo "&nbsp;&nbsp;&nbsp;&nbsp;";
					echo fgets($file);
					echo "<br><br>";
				}
				fclose($file);
				} else {
				    echo "<script> alert('article doesn\'t exist')</script>";
				}
			?>
		</p>
		<?php
		echo "<h4 style='position:relative;left:4vw;font-size:1.5vw'>Author Name :&nbsp;&nbsp;<font style='color:blue'>";
		echo $row["username"];
		echo "</font><br><br>Author ID :&nbsp;&nbsp;<font style='color:blue'>";
		echo $row["userid"];
		echo "</font><br><br>Year & Dept :&nbsp;&nbsp;<font style='color:blue'>";
		echo $row["yeardept"];
		echo "</font><br><br>Article Type :&nbsp;&nbsp;<font style='color:blue'>";
		echo $row["contenttype"];
		echo "</font><br><br>Published On :&nbsp;&nbsp;<font style='color:blue'>";
		echo $row["time"];
		echo "</font>";
		?>
		<?php
			$sql2 = "SELECT views FROM ranking  where artid='$var'";
				$result2 = mysqli_query($conn, $sql2);
				if (mysqli_num_rows($result2) > 0) {
				    $row = mysqli_fetch_assoc($result2);
				    $view=$row["views"]+1;
				    $sql3="UPDATE ranking SET views =$view WHERE artid = '$var'";
				    $ret1=mysqli_query($conn,$sql3);
				    if(!$ret1){
				    	echo "error";
				    }
				}
		?>
		<br><br><br><br><br><br><br><br><br><br>
	</div>
<?php
  include "footer.php";
  ?>


</body>
</html>