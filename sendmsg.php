<?php
	session_start();
	
	include_once 'db_conn.php';
	
	//reciving the the msg from newmsg() function in chatbox.php
	$msg=$_POST['msg'];
	
	//inserting the msg into database here flagmsg is 1 by default
	$sql="insert into messages (sender_id,msg,reciver_id) values (".$_SESSION["usr_id"].",'$msg',".$_SESSION["reciver_id"].")";
	
	if(!mysqli_query($conn,$sql))
		echo "Error in sending to database";
	else 
		echo $msg;
?>
