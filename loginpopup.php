<div id="modal-wrapper1" class="modal" style="z-index: 2">
  
  <form class="modal-content animate" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
        
    <div class="imgcontainer">
      <span onclick="document.getElementById('modal-wrapper1').style.display='none'" class="close" title="Close PopUp">&times;</span>
		<img src='images/1.png' class='avatar'>
    	<h1 style='text-align:center'>User Login</h1>
    </div>
    <div class="container">
      <input type="text" placeholder="Enter Username" name="uname">
      <input type="password" placeholder="Enter Password" name="psw">        
      <button class="tinku" type="submit" name="butt" value="login">Login</button><a href="register.php" style="text-decoration: none;"><div style="position: relative;height: 50px;width: 235px;left: 270px;top: -58px;background-color: #ADADAD"><font style="color: white;font-size: 20px;position: relative;top: 13px"><center>Register</center></font></div></a>
    </div>
  </form> 
</div>
<div id="modal-wrapper" class="modal" style="z-index: 2">
       
  <form class="modal-content animate" action="logout.php">
    <div class="imgcontainer">
        <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>

    </div>
    <div class="container">

    	<center><h1><u>Profile</u></h1></center>
    	<div style="width: 90%;height: 500px;border-color: black;border: 2px solid grey;border-radius: 30px;position: relative;left: 15px;border-color: grey">
    		<h4 style="position: relative;left: 30px">
    		<?php
    		$sql="select * from user where id='".$_SESSION["userid"]."'";
    		$result=mysqli_query($conn,$sql);
    		if (mysqli_num_rows($result) > 0) {
				$row = mysqli_fetch_assoc($result);
				echo "<br><br>UserName:&nbsp;&nbsp;";
				echo $row["name"];
				echo "<br><br>UserID:&nbsp;&nbsp;";
				echo $row["id"];
				echo "<br><br>FatherName:&nbsp;&nbsp;";
				echo $row["father name"];
				echo "<br><br>Gender:&nbsp;&nbsp;";
				echo $row["gender"];
				echo "<br><br>Mobile:&nbsp;&nbsp;";
				echo $row["mobile"];
				echo "<br><br>CollegeName:&nbsp;&nbsp;";
				echo $row["college name"];
				echo "<br><br>Email:&nbsp;&nbsp;";
        echo $row["email"];

			}else{
				echo "data not found";
			}

    		?>	
	    	</h4>
	    	 <button>logout</button>
    	</div>
    </div>
  </form> 
</div>
