<?php
  include "dbconnect.php";
  ?>
<?php
session_start();
if(isset($_COOKIE["username"])) {
	   $_SESSION["username"]=$_COOKIE["username"];
	   $_SESSION["userid"]=$_COOKIE["userid"]; 
	}
if(!isset($_SESSION["username"])){
  	header('location:index.php');
}
?>
<!DOCTYPE html>
<?php
$userid=$username=$yeardept=$usertype=$contenttype=$title=$description=$msg=$fname=$imgname="";
$a=$i=$db=0;
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$username=test_input($_POST["username"]);
	$userid=test_input($_POST["userid"]);
	$yeardept=test_input($_POST["yeardept"]);
	$usertype=test_input($_POST["usertype"]);
	$contenttype=test_input($_POST["contenttype"]);
	$title=test_input($_POST["contenttitle"]);
	$description=test_input($_POST["intro"]);
//	$articletext=test_input($_POST["articletext"]);
}
function test_input($data){
//	$data=trim($data);
//	$data=stripcslashes($data);
//	$data=htmlspecialchars($data);
	return $data;
}
 if(!empty($_FILES['filee']))
 {
    $path = "uploads/";
    $path = $path . basename( $_FILES['filee']['name']);
    $name=basename( $_FILES['filee']['name']);
    $fname=$path;
    if(move_uploaded_file($_FILES['filee']['tmp_name'], $path)) {
   //   echo "The file ".  basename( $_FILES['uploaded_file']['name']). 
   //   " has been uploaded";
    	$a=1;
    } else{
        $msg="There was an error uploading the article, please try again!";
    }
 }
 if(!empty($_FILES['imagee']))
 {
    $path = "upload images/";
    $path = $path . basename( $_FILES['imagee']['name']);
    $imgname=$path;
//    echo "<br>";
    if(move_uploaded_file($_FILES['imagee']['tmp_name'], $path)) {
   //   echo "The file ".  basename( $_FILES['uploaded_file']['name']). 
   //   " has been uploaded";
    	$i=1;
    } else{
    	$msg=$msg."There was an error uploading the image, please try again!";
    }
 }else{
 	$i=2;
 }
 function randomString2($length = 9) {
	$str = "";
	$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
	$max = count($characters) - 1;
	for ($i = 0; $i < $length; $i++) {
		$rand = mt_rand(0, $max);
		$str .= $characters[$rand];
	}
	return $str;
}

function randomString($length = 6) {
	$str = "";
	$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
	$max = count($characters) - 1;
	for ($i = 0; $i < $length; $i++) {
		$rand = mt_rand(0, $max);
		$str .= $characters[$rand];
	}
	return $str;
}

if($userid!="" and $a==1){
	while(1){
		$artid=randomString();
		$sql1="select artid from articles where artid='$artid'";
		$result = mysqli_query($conn, $sql1);
		if (mysqli_num_rows($result) == 0) {
			break;
		}
	}
	$sql="INSERT INTO articles(username,userid,yeardept,usertype,contenttype,title,description,filename,imgname,artid) VALUES('$username','$userid','$yeardept','$usertype','$contenttype','$title','$description','$fname','$imgname','$artid')";
	$sql2="INSERT into ranking(artid,views,time) VALUES('$artid',0,now())";
	$sql3="INSERT into astatus(artid) VALUES('$artid')";
	
	$sql4="insert into filename(name)values('$name')";
	if (mysqli_query($conn, $sql) and mysqli_query($conn, $sql2)and mysqli_query($conn, $sql3)and mysqli_query($conn, $sql4)) {
	    $db=1;
	} else {
		$msg=$msg.mysqli_error($conn);
	}
}
?>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">
	<title>upload</title>
	<style type="text/css">
		input[type=text], input[type=password] {
		    width: 90%;
		    padding: 0.5vw 1vw;
		    margin: 0px 0px;
		    display: inline-block;
		    border: 1px solid #ccc;
		    box-sizing: border-box;
			font-size:1.2vw;
		}
		label{
			font-family: sans-serif;
			font-size: 2vw;
		}
		select{
		    width: 90%;
		    padding: 0.5vw 1vw;
		    margin: 0px 0px;
		    display: inline-block;
		    border: 1px solid #ccc;
		    box-sizing: border-box;
			font-size:1.2vw;
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
			<li><a class="hh" href="index.php">Home</a></li>
			<li><a class="hh" href="news.php">News</a></li>
			<li><a class="hh" href="editions.php">Editions</a></li>
			<li><a class="hh" href="articles.php">Articles</a></li>
			<li><a class="hh" href="notices.php">notices</a></li>
			<li><a class="hh" href="editorialteam.php">Editorial Team</a></li>
			<li class="active"><a class="active" href="upload.php">Upload</a></li>
			<li><a class="hh" href="feedback.php">Feedback</a></li>
			<li><a class="hh" href="contact.php">About Us</a></li>
			<li>
		</ul></center>
	</div>
<br><br>

<center>
<div style="height: 850px;width: 80%;background-color: rgb(224,224,224);border-radius: 3vw;box-shadow: 2px 2px 2px grey"><br>
	<h1 style="font-size: 2.5vw"><u>Upload to The Student</u></h1><br>

	<div style="width: 14%;position: absolute;height: 600px;text-align: right;">
		<label>User Name:</label><br><br>
		<label>User ID:</label><br><br>
		<label>Year & Dept.:</label><br><br>
		<label>User Type:</label><br><br>
		<label>Content Type:</label><br><br>
		<label>Title of Content:</label><br><br>
		<label>Description:</label><br><br><br><br><br><br>
		<label>Upload Article:(.txt)</label><br><br>
		<label>Image:(.JPEG)</label><br><br>
	</div>
	<div style="width: 50%;position: absolute;left: 30%;height: 600px;text-align: left;">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" enctype="multipart/form-data">
			<input type="text" name="username" value="<?php echo $_SESSION['username'] ?>" pattern="[a-zA-Z ]+" oninvalid="setCustomValidity('User Name should have Characters only')" onchange="try{setCustomValidity('')}catch(e){}" readonly><br><br>
			<input type="text" name="userid" value="<?php echo $_SESSION['userid'] ?>" pattern="[a-zA-Z0-9@]+"  oninvalid="setCustomValidity('User ID should have Alphanumaric only an minimum length 5 and max 8')" onchange="try{setCustomValidity('')}catch(e){}" maxlength="8" minlength="5" readonly><br><br>
			<input type="text" name="yeardept" pattern="[a-zA-Z0-9- ]+"  oninvalid="setCustomValidity('Please enter EX-Dept format only ex:E3-CSE ')" onchange="try{setCustomValidity('')}catch(e){}" maxlength="8" minlength="5" required><br><br>
			<input type="radio" name="usertype" value="editorialteam" required>Editorial Team<input type="radio" name="usertype" value="Other" required>Other User<br><br>
			<select name="contenttype" required>
				<option value="">Choose type of your content</option>
				<option value="Oncampus Article">Oncampus Article</option>
				<option value="General Article">General Article</option>
				<option value="Science & Technology">Science and Technology</option>
				<option value="Poem">Poem</option>
				<option value="Silly Points">Silly Points</option>
				<option value="Telugu">Telugu</option>
				<option value="News">News</option>
			</select><br><br>
			<input type="text" name="contenttitle" required minlength="20" maxlength="50"><br><br>
			<textarea style="width: 90%;height: 100px" name="intro" minlength="50" maxlength="200" required></textarea><br><br>
			<!textarea rows="35" cols="73" name="articletext" required><!/textarea><br>
			<input type="file" name="filee" accept=".txt" required><br>	<?php
						while(1){
							$name=randomString2();
							$name=$name.".txt";
							$sql1="select name from filename where name='$name'";
							$result = mysqli_query($conn, $sql1);
							if (mysqli_num_rows($result) == 0) {
								break;
							}
						}
						echo "<h4> Suggested file name is:$name</h4>";

					?><br>
			<input type="file" name="imagee" accept=".jpeg"><br><br><br>
			<input type="submit" value="submit" style="width: 100px;height: 30px;font-family: sans-serif;font-size: 17px">
			<input type="reset" value="reset" style="width: 100px;height: 30px;font-family: sans-serif;font-size: 17px">
		</form>
		<h2><?php 
		if($a==1 and $i!=0 and $db==1){
			echo "Successfully uploaded article";
		}
		else{
			echo $msg;
		}
		 ?></h2>
	</div>

</div></center><br>
<?php
  include "footer.php";
  ?>

</body>
</html>