<?php
	include_once 'db_conn.php';
	
	$sql="";

	$rnum=$_POST["rn"];
	$uname=$_POST["uname"];
	$email=$_POST["email"];
	$pwd=$_POST["pwd"];
	$rpwd=$_POST["rpwd"];
	$pno=$_POST["pno"];
	$insta=$_POST["insta"];
	$fb=$_POST["fb"];
	$code=$_POST["code"];
	$yoji=$_POST["yoj"];
	
	if(empty($rnum)||empty($email)||empty($pwd)) {
		echo "<script type='text/javascript'>alert('fill all the fields');</script>";
	 	header("location:index.php");
	}
	$snum=substr($rnum,-4);
	
	if($pwd==$rpwd) {
		$sql="INSERT INTO users(rollnum,uname,pwd,series_num,yoa,email,phnum,insta,fb) VALUES ($rnum,'$uname','$pwd',$snum,$yoji,'$email',$pno,'$insta','$fb')";
     		if(mysqli_query($conn,$sql))
			echo "Signed Up Succesfully";
		else
		 	echo "ERORR : ".mysqli_error($conn);
   	}
	else 
		echo "Your password does not macth";
   
    mysqli_close($conn);
    header("location:index.php");
?>
