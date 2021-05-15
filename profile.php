<?php
 session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
<style>

body {
  font-family: Arial;
  color: white;
  padding:50px;
  margin-bottom:50px;
}

.split {
  height:100%;
  position: fixed;
  z-index: 1;
  top: 0;
  overflow-x: hidden;
  padding-top: 20px;
  overflow-y:auto;

}

.left {
  left: 0;
   width: 30%;
}

.right {
  right: 0;
   width: 70%;
   height:90%;
  background-color: white;
}

a {
	text-decoration:none;
}
.wrapper {
	 width:98%;
	 height:12%;
	 display:grid;
	 grid-template-columns: 2% 98%;
	 grid-gap:0px;
	 border:2px solid #747d8c;
	 grid-template-areas:
		"box1 box2"
	}
 .wrapper .element1 { grid-area:box1;animation-delay:0;}
 .wrapper .element2 { grid-area:box2;animation-delay:0;background:#f1f2f6;}
 
 
 
 <!--for chat msg-->
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
</head>
<body>
<div style="float:right"><form action="logout.php" method="post"><input type="submit" value="logout"></form></div><br><br>


<!-- to display contacts-->
<?php
	include_once 'db_conn.php';
	
	$sql = "select user_id,username,is_active from users where user_id in (select distinct reciver_id as user_id from messages where sender_id={$_SESSION["usr_id"]} union select distinct sender_id as user_id from messages where reciver_id={$_SESSION["usr_id"]});";
	
	$result = mysqli_query($conn, $sql);
	if( mysqli_num_rows($result)<1 )
		echo "start a chat by searching people";
	else {
		$list = mysqli_fetch_all($result, MYSQLI_ASSOC);
		for($i=0;$i<mysqli_num_rows($result);$i++) {
			if($list[$i]['is_active']==1) {
				echo "				
					<a href=chatbox.php?rtno=".$list[$i]['user_id'].">
					<div class=wrapper>
						<div class=element1 grid-box style=background-color:green;>
						</div>
						<div class=element2 grid-box>
								<p>".$list[$i]['username']."</p>
								<p>".$list[$i]['user_id']."</p>	
						</div>
					</div></a>";
			}
			else {
				echo "
					<a href=chatbox.php?rtno=".$list[$i]['user_id'].">
					<div class=wrapper>
						<div class=element1 grid-box style=background:blue;>
						</div>
						<div class=element2 grid-box>
									<p>".$list[$i]['username']."<br>
									".$list[$i]['user_id']."</p>
														
						</div>
					</div></a>";
			}
		}
	}
	
	mysqli_close($conn);
?>
</div>
</body>
</html>
