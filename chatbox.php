<?php 
 session_start();
 ?>
	<!doctype html>
	<html>
	<head>
	<title>chatbox</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./css/build/styles.css">

		<!--includes jquery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script>
		//function for checking and displaying new msg
			function newmsg(){
				$.ajax({
					url: 'ajaxresult.php',
					type: 'POST',
					datatype: 'json',
		//function which executes upon successfull respose by server
					success: function(data){
		//converts json into javascript object
						var dat = JSON.parse( data );
						for( i=2;i<dat.length;i++) {
							if ( dat[i].sender_id == dat[0]) {
							$("#newdata").append("<div class='flex flex-row-reverse m-5 '><div class='bg-blue-500 ml-2 text-lg h-9 w-9 lg:h-12 lg:w-12 flex items-center justify-center p-3 rounded-tl-2xl rounded-bl-2xl font-semibold mt-3'></div><div class='bg-gray-100 w-9/12 lg:w-5/12 pt-1 pl-2 pb-1 rounded-tr-xl rounded-xl mt-3 mb-3'><p class='text-md lg:text-lg'>"+dat[i].msg+"</p><p class='float-right text-sm font-sans mt-2 tracking-wider'>"+dat[i].time+"</p></div></div>");
							}
							if ( dat[i].sender_id == dat[1]) {
							$("#newdata").append("<div class='flex flex-row m-5'><div class='bg-blue-500 mr-2 text-lg h-9 w-9 lg:h-12 lg:w-12 flex items-center justify-center p-3 rounded-tr-2xl rounded-br-2xl font-semibold mt-3'></div><div style='background:#abe0e7;' class='w-9/12 lg:w-5/12 pt-1 pl-2 pb-1 rounded-tl-xl rounded mt-3 mb-3'><p class='text-md lg:text-lg'>"+dat[i].msg+"</p><p class='float-right text-sm font-sans mt-2 tracking-wider'>"+dat[i].time+"</p></div></div>");
							}
						}
					},
		//used for calling the fuction after the pervious request if compelted
		//it executes only after every 5 seconds
					complete:function(data){
						setTimeout(newmsg,5000);
					}
				});
			}
		//calls the function once the whole page is loded
			$(document).ready(function(){
				setTimeout(newmsg,5000);
			});

		//funtion for sending msg 
			function sendmsg() {
				var message = $("#msg").val();
		//datatosend contanis what data has to be sent to sendmsg.php page by post method
				datatosend = 'msg='+message;
				$.ajax({
					url:'sendmsg.php',
					type:'post',
					data:datatosend,
					async:true,
		//display the msg upon successfull response from server
					success:function(data) {
							//document.getElementById("yourmsg").innerHTML=data[0];
						},
				});
			}
		</script>
	</head>
	<body style="background: linear-gradient(to left, #77c9d4, #57bc90);" class="p-20 pt-10 lg:pt-14 lg:px-24">
	

<?php
	include_once 'db_conn.php';
	
//selecting roll number of user from already knowen user name 
//user name is stored in session variable during login
	
	/*$slt="select rollnum from users where uname=\"".$_SESSION["unam"]."\"";
	$result=mysqli_query($conn,$slt);
	$row = mysqli_fetch_array($result,MYSQLI_NUM);
	$_SESSION["sender_roll"]=$row[0];*/
	
	//user_id is sender_id 
	//user_id is present in $_SESSION["usr_id"]
	$_SESSION["reciver_id"]=$_GET['rtno'];
	$sql2 = "select username from users where user_id=".$_SESSION["reciver_id"];
	$result2 = mysqli_query($conn, $sql2);
	$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);


//selecting msg between user1 and user2
//there are two cases 
//one user1 is sender, then user2 becomes reciver
//two  user2 is sender, then user1 becomes reciver
//so using case in query and ordering them in ascending order of time
	
	$msgquery="select * from messages where 
				(CASE
				when sender_id=".$_SESSION["usr_id"]." and sender_flag=0
				then reciver_id=".$_SESSION["reciver_id"]."
				when sender_id=".$_SESSION["reciver_id"]." and reciver_flag=0
				then reciver_id=".$_SESSION["usr_id"]."
				END) order by time ASC";
	$msgresult=mysqli_query($conn,$msgquery);
	
//diplaying the msg based on whether it is sent or recived
	
echo "<div class='font-serif text-2xl lg:text-4xl tracking-wider font-semibold uppercase text-white'>
		<h1>".$row2["username"]."</h1>
	  </div>";
	echo "<div style='height:36rem;' class='bg-white overflow-auto h-96'>";
	
	while($resultrow= mysqli_fetch_array($msgresult,MYSQLI_ASSOC)) {
		if($resultrow["sender_id"]==$_SESSION["usr_id"]) {
			 echo "<div class='flex flex-row-reverse m-5 '>
			 		<div class='bg-blue-500 ml-2 text-lg h-9 w-9 lg:h-12 lg:w-12 flex items-center justify-center p-3 rounded-tl-2xl rounded-bl-2xl font-semibold mt-3'>
					 	
					 </div>
					 <div class='bg-gray-100 w-9/12 lg:w-5/12 pt-1 pl-2 pb-1 rounded-tr-xl rounded-xl mt-3 mb-3'>
					 	<p class='text-md lg:text-lg'>".$resultrow["msg"]."</p>
						 <p class='float-right text-sm font-sans mt-2 tracking-wider'>".$resultrow["time"]."</p>
					 </div>

			 		</div>
			 ";		
			}
		else {
			echo "<div class='flex flex-row m-5'>
			<div class='bg-blue-500 mr-2 text-lg h-9 w-9 lg:h-12 lg:w-12 flex items-center justify-center p-3 rounded-tr-2xl rounded-br-2xl font-semibold mt-3'>
				
			</div>
			<div style='background:#abe0e7;' class=' w-9/12 lg:w-5/12 pt-1 pl-2 pb-1 rounded-tl-xl rounded mt-3 mb-3'>
				<p class='text-md lg:text-lg'>".$resultrow["msg"]."</p>
				<p class='float-right text-sm font-sans mt-2 tracking-wider'>".$resultrow["time"]."</p>
			</div>

			</div>";
		}
	}
	//echo "<div style=float:right;background-color:grey;color:white id=yourmsg></div>";
	
	mysqli_close($conn);
 ?>
 
 <!-- new msg are diaplayed here using the newmsg() function-->
 <p id="newdata"></p>
 </div>
 <div class= "element">


		<div class="flex flex-row fixed inset-x-0 w-full p-20 pt-10 lg:pt-14 lg:px-24 -bottom-16">
			<textarea class="bg-white w-full font-serif px-2 text-grey-400 " name="msg" id="msg" placeholder ="Type your message"></textarea>
			<div class="">
				<button class="bg-blue-500 w-16 h-12 border border-5 py-2 px-6 rounded inline-flex items-center text-white" value="" onclick="sendmsg()">
					<i class="fas fa-arrow-alt-circle-right"></i>
				</button>
			</div>
		</div>
		
 

 </body>
 <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
 </html>
