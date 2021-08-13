



<?php
include 'config.php';

// Variable declaration

$validatefname="";
$frstname="";
$lastname="";
$validatelname="";
$validatedob="";
$dob="";
$validateemail="";
$email="";
$username="";
$validateuname="";
$password="";
$validatepwd="";
$validateradio="";
$religion="";
$validatereligion="";





if($_SERVER["REQUEST_METHOD"]=="POST"){


// firstname validation

$frstname=$_REQUEST["fname"];

if(empty($_REQUEST["fname"])) 
{
    $validatefname= "*field is required";

}
else
{
    $frstname=$_REQUEST["fname"];

}



//lastName validation


$lastname=$_REQUEST["lname"];

if(empty($_REQUEST["lname"])) 
{
    $validatelname= "*field is required";

}
else
{
    $lastname=$_REQUEST["lname"];

}


// Gender Validation

  if(isset($_REQUEST["gender"]))
{
    $validateradio= $_REQUEST["gender"];
}
else{
    $validateradio= "*field is required";
}



//date of birth validation

$dob=$_REQUEST["dob"];

if(empty($_REQUEST["dob"]))
{
    $validatedob= "*field is required";

}
else
{
    $dob=$_REQUEST["dob"];

}


// Religion Validation

    $religion=$_REQUEST["religion"];

if(empty($_REQUEST["religion"]))
{
    $validatereligion= "*field is required";

}
else
{
     $religion=$_REQUEST["religion"];



}




// Email validation

$email=$_REQUEST["email"];

if(empty($_REQUEST["email"]))
{
    $validateemail= "*field is required";

}
else
{
    $email=$_REQUEST["email"];

}



// username validation

$username=$_REQUEST["uname"];

if(empty($_REQUEST["uname"])) 
{
    $validateuname= "*field is required";

}
else
{
    $username=$_REQUEST["uname"];

}




// Password validation

$password=$_REQUEST["pwd"];

if(empty($_REQUEST["pwd"]))
{
    $validatepwd= "*field is required";

}
else
{
    $password=$_REQUEST["pwd"];

}















}
?>



<!DOCTYPE html>
<html>
<head>
	<title> registration page</title>
	
</head>
<body>
	<h1 align="center"> Registration Form</h1>
	<form action="" method="post" enctype="multipart/form-data">
     





		 <fieldset>
		 	<legend>Basic information:</legend>
		
		<table>
			<tr><td>First Name :</td>
				<td> <input type="text" name="fname"> <br><?php echo $validatefname; ?>
				</td>
			
			</tr>
			<tr>
				<td> Last Name :</td>
				<td> <input type="text" name="lname"> <br><?php echo $validatelname; ?>
				</td>
			</tr>
			
			
			
			<tr> <td> Gender :
			 <input type="radio" id="male" name="gender" value="male"> Male
			 <input type="radio" id="female" name="gender" value="female"> Female
			 <input type="radio" id="other" name="gender" value="other" > Other
			 <br><?php echo $validateradio; ?>
			</td> 

				
			</tr>
			<tr>
				<td> Date of birth :</td>
				<td><input type="date" name="dob"> <br><?php echo $validatedob; ?>
				</td>


			</tr>
						<tr>
				<td>Religion :
					<select name = "religion"> 
						<option value "">select</option>
						<option value="islam"> Islam</option>

						<option value="Hindu"> Hindu</option>

						<option value="Buddhist"> Buddha</option>

						<option value="others"> others</option>



					 </select> <br><?php echo $validatereligion; ?>
					  </td>
					</tr>
				


			
				


			
		</table>
		</fieldset>

		<fieldset>
			<legend>Contact Information</legend>
			<table>
			<tr> <td> Email :</td>
				<td> <input type="email" name="email"><br><?php echo $validateemail; ?>
				</td>

			</tr>

			<tr> <td> Phone :</td>
				<td> <input type="tel" name="number"></td>

			</tr>
			<tr> <td> Permanent Address :</td>
				<td> <textarea name="paddrss" rows="3" cols="20"></textarea></td>

			</tr>
			<tr> <td> Present Address :</td>
				<td> <textarea name="preadrs" rows="3" cols="20"></textarea></td>

			</tr>
			<tr> <td> Personal website link :</td>
				<td> <input type="url" name="pwl"></td>

			</tr>





			</table>


		</fieldset>


		<fieldset>
			<legend>Account Information</legend>
			<table>
			<tr> <td> Username :</td>
				<td> <input type="text" name="uname"> <br><?php echo $validateuname; ?>
				</td>

			</tr>

			<tr> <td> Password :</td>
				<td> <input type="password" name="pwd"> <br><?php echo $validatepwd; ?>
				</td>

			</tr>
			





			</table>


		</fieldset>


		<table>

		


			<tr> <td><input type="submit" name="submit">
			</td></tr>
			</table>


		
	</form>
	if(isset($_POST['submit'])){
	
	$uname = $_POST['uname'];
	
	$pass = $_POST['pwd'];
	
	
	
	
	if($pass==$pass){
		
		$query= "select*from users where uname='$uname'";
		$query_run= mysqli_query($con,$query);
		if($query_run){
			
			if(mysqli_num_rows($query_run) >0){
				
				echo "
		<script>
		alert('User ALready Registered ');
		window.location.href='login.php';
		</script>
		";
				
				
			}else{
				
	$insertion= "insert into users values('$uname','$pass')";
	
	           
				$insertion_run = mysqli_query($con,$insertion);
				
				if($insertion_run ){
					
					echo "
		<script>
		alert('Registration Successful ');
		window.location.href='login.php';
		</script>
		";
					
				}else{
					
						echo "
		<script>
		alert('Registration Failed  ');
		window.location.href='reg.php';
		</script>
		";
				}
				
				
			}
			
			
			
		}else{
			echo "
		<script>
		alert('Database Problem');
		window.location.href='reg.php';
		</script>
		";
			
		}
		
		
	}
	else{
		echo "
		<script>
		alert('Password  match');
		window.location.href='reg.php';
		</script>
		";
	}
	
	
}
else{
	
	
}






?>

</body>
</html>