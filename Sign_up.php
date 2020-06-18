<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>register</title>
     <link href="Sign_up.css" rel="stylesheet" type="text/css" media="all">
</head>
<body>
<?php
include 'database.php';
if(isset($_POST['submit'])){
		$name = mysqli_real_escape_string($con, $_POST['username']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$password = mysqli_real_escape_string($con, $_POST['password']);
		$Cpassword = mysqli_real_escape_string($con, $_POST['Cpassword']);
		$DOB = mysqli_real_escape_string($con, $_POST['DOB']);
		$Gender = mysqli_real_escape_string($con, $_POST['gender']);
		
		$pass = password_hash($password, PASSWORD_BCRYPT);
		$Cpass = password_hash($Cpassword, PASSWORD_BCRYPT);
		$emailquery = "select * from user where email='$email' ";
		$query = mysqli_query($con,$emailquery);
		
		$emailcount = mysqli_num_rows($query);
		
		if($emailcount>0){
			echo " email already exists";
		}else { 
			if($password === $Cpassword){
				
				$insertquery = "insert into user(Name, E-mail, Password, Cpassword, DOB, Gender) 
				values('$name','$email','$pass','$Cpass','$DOB','$Gender')";
				$iquery = mysqli_query($con, $insertquery);
					if($iquery){
								?>
								<script>
									alert("Inserted Succesfully");
								</script>
							<?php
						}else{
							
						?>	
							<script>
								alert("No Inserted");
							</script>
							<?php
						}
			}else{
						?>	
							<script>
								alert("password are not matching");
							</script>
							<?php
			}
		}
							
			}
?>
   <div class="loginbox">
       <h3>Sign up</h3>
       <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
           <p>Name</p>
           <input type="text" name="username" placeholder="Enter username" required>
            <p>E-mail</p>
           <input type="text" name="email" placeholder="Enter email" required>
           <p>Password</p>
           <input type="password" name="password" placeholder="Enter password" required>
		   <p>Confirm Password</p>
           <input type="password" name="Cpassword" placeholder="Enter Confirm password" required>
           <p>DOB</p>
           <input type="date" name="DOB" placeholder="Enter DOB" required>
		   <p>Gender</p>
		    <input type="radio" required name="gender" value="male">Male

			<input type="radio" required name="gender" value="female">Female<br>
		
         <br>  <input type="Submit" name="submit" value="Submit">  
		  
       </form>
   </div>
   </body>
   </html>
   