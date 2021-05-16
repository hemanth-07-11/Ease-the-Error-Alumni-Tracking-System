<?php

        include 'db_conn.php';
	$sql="";
	$user_id = (rand(100000,999999));
	$username=$_POST["username"];
	$roll_no=$_POST["roll_no"];
	$pwd=$_POST["pwd"];
	$yop=$_POST["yop"];
	$email=$_POST["email"];
	$company=$_POST["company"];
	$location=$_POST["location"];
	$designation=$_POST["designation"];
	$dob=$_POST["dob"];
        $Department=$_POST["Department"];
	$interest=$_POST["interest"];

	if(empty($roll_no)||empty($email)||empty($pwd))
	{
	 echo "<script type='text/javascript'>alert('fill all the fields');</script>";
	 header("location:index.php");
	}
	if(!empty($pwd))
	{
	$sql="INSERT INTO users(user_id,username,roll_no,pwd,yop,company,designation,location,Department,dob) VALUES ($user_id,'$username',$roll_no,'$pwd',$yop,'$company','$designation','$location','$Department','$dob')";


if(mysqli_query($conn,$sql))
	 {
		echo "Signed Up Succesfully";
	 }
	 else 
		 echo "ERORR : ".mysqli_error($conn);
   }
	else 
	echo "Your password does not macth";
   
    mysqli_close($conn);

?>