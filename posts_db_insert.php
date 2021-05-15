<?php
	include "db_conn.php";
	require	"db_conn.php";
	
	 session_start();
	
	$title = $_POST["title"];
	$msg = $_POST["msg"];
	$user_id=$_SESSION['usr_id'];

	$sql="INSERT INTO post(user_id,post,title) VALUES ($user_id,'$msg','$title')";
	
	$result = mysqli_query($conn, $sql);
	//close($conn);
?>
