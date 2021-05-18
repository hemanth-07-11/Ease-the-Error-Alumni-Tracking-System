<?php
 session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="./css/build/styles.css">

</head>
<body style="background: linear-gradient(to left, #77c9d4, #57bc90);" > 
<!--<div class="bg-gray-400" style="float:right"><form action="logout.php" method="post"><input type="submit" value="logout"></form></div><br><br>-->


<nav class="">
	<div class="max-w-6xl mx-auto ">
		<div class="flex justify-between">
			<div class="flex space-x-4">
				<div class="">
					<a href="" class="flex items-center py-5 px-2 text-gray-700 hover:text-gray-900">
					<svg class="h-9 w-9 mr-1 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
						</svg>
					<span style="font-color:#4a8dc4;" class="ml-3 font-semibold text-lg">Frequently chated</span>
					</a>
				</div>

			</div>
			
			<div class="flex items-center space-x-1">
				<a href="search.php" class="py-5 px-3">Search</a>
				<a style="background-color:white;font-color:#4a8dc4;" href="homepage.php" class="py-2 px-3 rounded">Home</a>
			</div>
		</div>
	</div>
</nav>
<!-- to display contacts-->
<div class="p-12 lg:px-72">
	<div style="" class=" p-9 lg:px-12 items-center">

<?php
	include_once 'db_conn.php';
	
	$sql = "select user_id,username,is_active,image_name from users where user_id in (select distinct reciver_id as user_id from messages where sender_id={$_SESSION["usr_id"]} union select distinct sender_id as user_id from messages where reciver_id={$_SESSION["usr_id"]});";
	
	$result = mysqli_query($conn, $sql);
	if( mysqli_num_rows($result)<1 )
		echo "start a chat by searching people";
	else {
		$list = mysqli_fetch_all($result, MYSQLI_ASSOC);
		for($i=0;$i<mysqli_num_rows($result);$i++) {
			echo "<a href=chatbox.php?rtno=".$list[$i]['user_id'].">
					<div class='mt-8 lg:ml-16  bg-gray-50 border-2 rounded-xl pb-1 pt-1 lg:w-10/12 shadow-lg hover:shadow-xl'>
					<div class='lg:pl-20 flex flex-row '>
						<div class='bg-gray-50 ml-2 lg:-ml-14 w-28 h-28 flex items-center justify-center p-3 border border-gray-300 rounded-lg'>
							<img class='rounded-lg'src='profile_imgs/".$list[$i]['image_name']."' alt='' srcset='' />
						</div>

						<div class='bg-gray-50 w-4/6 lg:ml-7 mt-1'>
							<div class='pt-5 pl-5 font-serif capitalize leading-3 tracking-wider text-2xl lg:text-3xl lg:-mt-3'>
							".$list[$i]['username']."
							</div>
							<div class='pt-5 pl-5 lg:pt-4 font-light capitalize leading-3 tracking-wider text-md'>
							".$list[$i]['user_id']."
							</div>
						</div>
						<div class='flex justify-center items-center w-10'>";
						
			if($list[$i]['is_active']==1) {
				echo "<div class='bg-gray-400 rounded-full p-2'>";
			}
			else {
				echo "<div class='bg-green-400 rounded-full p-2'>";
			}	
			echo "</div>
				</div></div>
				</div>
				</a>";
		}
	}
	
	mysqli_close($conn);
?>
</div>
</div>
</body>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</html>
