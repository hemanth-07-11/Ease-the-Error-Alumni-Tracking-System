<?php
	include "db_conn.php";
	require	"db_conn.php";
	
	 session_start();

	$sql="select * from post";
	$result = mysqli_query($conn, $sql);

	if ( mysqli_num_rows($result)>=1 ) {
		$data=array();
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
	//close($conn);
?>
