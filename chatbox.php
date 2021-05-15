<?php 
 session_start();
 ?>
	<!doctype html>
	<html>
	<head>
	<title>chatbox</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	.element {
  position: fixed;
  bottom: 0;
  right: 0;
}

	body {
	margin: 0 auto;
	max-width: 800px;
	padding: 0 20px;
	}

	.container {
	border: 2px solid #dedede;
	background-color:white;
	color:black;
	border-radius: 5px;
	padding: 10px;
	margin: 10px 0;
	text-align:left;
	}

	.darker {
	border-color: solid black;
	background-color: green;
	color:white;
	text-align:right;
	}

	.container::after {
	content: "";
	clear: both;
	display: table;
	}
		
	.container img {
	float: left;
	max-width: 60px;
	width: 100%;
	margin-right: 20px;
	border-radius: 50%;
	}
	
	.container img.right {
	float: right;
	margin-left: 20px;
	margin-right:0;
	}	

	.time-right {
	float: right;
	color: #aaa;
	}
	
	.time-left {
	float: left;
	color: #999;
	}
	</style>

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
							$("#newdata").append("<div class='darker container'>"+dat[i].msg+"<br>"+dat[i].time+"</div>");
							}
							if ( dat[i].sender_id == dat[1]) {
							$("#newdata").append("<div class='container'>"+dat[i].msg+"<br>"+dat[i].time+"</div>");
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
	<body>
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
	
	echo "<div style=background-color:red>";
	while($resultrow= mysqli_fetch_array($msgresult,MYSQLI_ASSOC)) {
		if($resultrow["sender_id"]==$_SESSION["usr_id"]) {
			 echo "<div class='darker container'  >".$resultrow["msg"]."<br>".$resultrow["time"]."</div>";
		}
		else {
			echo "<div class='container' >".$resultrow["msg"]."<br>".$resultrow["time"]."</div>";
		}
	}
	//echo "<div style=float:right;background-color:grey;color:white id=yourmsg></div>";
	
	mysqli_close($conn);
 ?>
 
 <!-- new msg are diaplayed here using the newmsg() function-->
 <p id="newdata"></p>
 <div class= "element">
 <div style="">
 <form class="container" method="POST">
		<textarea name="msg" id="msg" placeholder ="Type your message" rows="3" cols="100"></textarea>
		<input type="button" value="send" onclick="sendmsg()"></div></div>
 </form>
 </div>
 </body>
 </html>
