<?php
	include_once 'db_conn.php';
	
	session_start();
		
	//selecting only the new msg 
	$sql = "select * from messages where 
			(CASE
			when sender_id=".$_SESSION["usr_id"]." and sender_flag=1
			then reciver_id=".$_SESSION["reciver_id"]." 
			when sender_id=".$_SESSION["reciver_id"]." and reciver_flag=1
			then reciver_id=".$_SESSION["usr_id"]."
			END) order by time ASC";
	
	//after selecting the new msg flagmsg is updated to 0
	$upsql = "update messages 
			set sender_flag = 0 where
			(CASE
			when sender_id=".$_SESSION["usr_id"]." 
			then reciver_id=".$_SESSION["reciver_id"]."
			END)";
			
	$upslt = "update messages 
			set reciver_flag = 0 where
			(CASE
			when sender_id=".$_SESSION["reciver_id"]."
			then reciver_id=".$_SESSION["usr_id"]."
			END)";
			
	$result = mysqli_query($conn,$sql);
		mysqli_query($conn,$upsql);
		mysqli_query($conn,$upslt);
		
	if ( mysqli_num_rows($result)>=1 ) {
		$data=array();
		array_push($data,$_SESSION["usr_id"]);
		array_push($data,$_SESSION["reciver_id"]);
		while ( $row = mysqli_fetch_object( $result )) {
			array_push( $data,$row );
		}
		
	//converting the array into json 
		echo json_encode($data);
		exit();
	}
	else {
		$myArr = array("");
		$myJSON = json_encode($myArr);
		echo $myJSON;
		exit();
	}
	
?>
		
