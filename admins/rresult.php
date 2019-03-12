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
		echo "<script>alert('deleted successfully')";
		header('location:request.php');
	}
}
elseif($c=='a') {
	$artid=substr($var,0,-1);
	$sql="update astatus set status='accepted' where artid='$artid'";
	$ret=mysqli_query($conn,$sql);

	if($ret){
		echo "<script>alert('accepted successfully')";
		header('location:request.php');
	}else{
		echo "error";
	}
}
?>