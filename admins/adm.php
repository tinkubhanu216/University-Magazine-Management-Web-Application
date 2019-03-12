<?php
  include "../dbconnect.php";
  session_start();
  ?>
<?php
$adminid=$password=$msg="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$adminid=test_input($_POST["adminid"]);
	$password=test_input($_POST["password"]);
}
function test_input($data){
	$data=trim($data);
	$data=stripcslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}
$type="";
if($adminid!=""){
	$sql = "select *from admin where adminid='$adminid'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		if($row["adminid"]==$adminid and $row["password"]==$password){
			if($row["admintype"]=="main"){
				$_SESSION["admintype"]="main";
				header('location:admin.php');
			}else{
				$type=$row["admintype"];
				$_SESSION["admintype"]=$type;
				header('location:iadmin.php');
			}	
		}
		else{
			echo "<script> alert('please enter correct password');</script>";
			header('location:index.php');
		}
	}
	else{
		echo "<script> alert('invalid user');</script>";
		header('location:index.php');
	}
}else
{
	if($_SESSION["admintype"]!=""){
		header('location:iadmin.php');
	}
}
?>