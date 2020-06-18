<?php

$server = "localhost";
$user = "root";
$password = "";
$db = "database";

$con = mysqli_connect($server,$user,$password,$db);
if($con){
	?>
		<script>
			alert("Connection Succesful");
		</script>
	<?php
}else{
	
?>	
	<script>
		alert("No Connection");
	</script>
	<?php
	
}
?>