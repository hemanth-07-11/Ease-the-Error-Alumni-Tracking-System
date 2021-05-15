<?php
	include_once 'db_conn.php';
 	
 	$uname=$_POST["uname"];
 	$pwd=$_POST["pass"];
 
 	session_start();

   	$slt="select * from users where username='{$uname}' and pwd='{$pwd}'"; 	  
   	$result=mysqli_query($conn,$slt);
   	#echo mysqli_num_rows($result);
   	
   	if(mysqli_num_rows($result)<1) 
	   echo "roll number or password is not matching";
   	else {
    		$r=mysqli_fetch_array($result,MYSQLI_ASSOC);
		$_SESSION["usr_id"]=$r["user_id"];
		$sql="update users set is_active=1 where user_id=\"".$_SESSION["usr_id"]."\"";
		mysqli_query($conn,$sql);
		header("location:homepage.php");
   	}
 
  	mysqli_close($conn);
  ?>
	  
