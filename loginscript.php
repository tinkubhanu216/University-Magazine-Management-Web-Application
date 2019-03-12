<?php
$uid=$passwd="";
if($_SERVER["REQUEST_METHOD"]=="POST" && $_POST["butt"]=="login"){
	$uid=test_input($_POST["uname"]);
	$passwd=test_input($_POST["psw"]);
}
function test_input($data){
	$data=trim($data);
	$data=stripcslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}
if($uid!=""){
	$sql="select *from login1 where userid='$uid'";
	$result=mysqli_query($conn,$sql);
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		if($row["password"]==$passwd){
			$_SESSION["username"]=$row["username"];
			$_SESSION["userid"]=$row["userid"];
			setcookie("username", $row["username"], time() - 1*24*60*60,"/"); // 86400 = 1 day
			setcookie("userid", $row["userid"], time() - 1*24*60*60,"/"); // 86400 = 1 day
		}
		else
		{
			echo "<script>alert('wrong password');</script>";
		}
	}else{
		echo "<script>alert('invalid user');</script>";
	}
}
?>