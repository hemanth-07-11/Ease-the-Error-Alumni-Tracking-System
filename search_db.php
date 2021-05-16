<?php
	include_once "db_conn.php";
	
	$radio = $_POST["option"];
	$text = $_POST["text"];
	
	switch( $radio ) {
		case '1' :
			$sql = "select user_id,username from users where username=$text'";	
			break;
		case '2': 
			$sql = "select user_id,username from users where Department='$text'";
			break;
		case '3':
			$sql = "select user_id,username from users where company='$text'";
			break;
		case '4':
			$sql = "select user_id,username from users where roll_no=$text";
			break;
		case '5':
			$sql = "select u.user_id,u.username from users u join interest inte where u.user_id = inte.user_id and interest='$text'";
			break;
	}
	
	$result = mysqli_query($conn, $sql);
	if( mysqli_num_rows($result)>0 ) {
		$data = array();
		while( $row = mysqli_fetch_object($result) ) 
			array_push($data, $row);
		echo json_encode($data);
		exit();
	}
	else {
		$result_arr = array("");
		#array_push($result_arr,$sql);
		echo json_encode($result_arr);
		exit();
	}
?>
