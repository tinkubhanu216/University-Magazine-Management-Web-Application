<?php
  include "../dbconnect.php";
 ?>
<?php
$nno="";
$k=0;
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$nno=test_input($_POST["but"]);
}
function test_input($data){
	$data=trim($data);
	$data=stripcslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}
if($nno!=""){
	$sql="delete from notices where noticeno='$nno'";
	$r1=mysqli_query($conn, $sql);
	if($r1){
		echo "<script>alert('deleted successfully')";
		$k=1;

	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>admin</title>
</head>
<body>
	<?php
	if($k==1){
	echo "<h1>article deleted successfully</h1>";
	echo "<button onclick='history.go(-1);'>Back</button>";
	header('location:deletenotice.php');
}else{
	echo "fuck";
}
	?>

</body>
</html>