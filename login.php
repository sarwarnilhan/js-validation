<?php
  include 'config.php';
?>


<html>
<head>
<title>login</title>
<h2 align="center" >Welcome to LOGIN</h2>
</head>
<body>
<center>
<div>

<center><form action="login.php" method="POST">

<b><label>Username</label>
<input name="uname" type="uname" id="form" >
</input>
<b><label>Password</label>
<input name="pwd" type="password" id="form" >
</input>



<input name="login" type="submit" id="button" value="LOGIN">
</input>
<a href="reg.php"><input name="reg" type="button" id="button" value="REGISTER">
</input>


</form></center>

</center>



<?php

    if(isset($_POST['login'])){
		
		$uname= $_POST['uname'];
		$pass=$_POST['pwd'];
		
		$check = "select*from users where uname='$uname' AND password ='$pass'";
		$check_work= mysqli_query($con,$check);
		
		if($check_work){
			if(mysqli_num_rows($check_work) > 0 ){
				
				echo"
				<script>
				alert('You are Successfully  Logged in');
				window.location.href='login.php';
				</script>
				";
				
			}else{
				
				echo"
				<script>
				alert('Password or uname not Found ');
				window.location.href('reg.php');
				</script>
				";
			}
			
			
		}else{
			
			
				echo"
				<script>
				alert('Database Error  ');
				window.location.href('reg.php');
				</script>
				";
		}
		
		
		
	}else{
		
		
	}





?>










</div>
</body>

</html>