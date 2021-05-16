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
					<div class='mt-8 lg:ml-16  bg-gray-50 border-2 rounded-xl pb-1 pt-1 lg:w-10/12 shadow-lg hover:shadow-xl'>
					<div class='lg:pl-20 flex flex-row '>
						<div class='bg-gray-50 ml-2 lg:-ml-14 w-28 h-28 flex items-center justify-center p-3 border border-gray-300 rounded-lg'>
							<img class='rounded-lg'src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAM1BMVEXk5ueutLfn6eqrsbTp6+zg4uOwtrnJzc/j5earsbW0uby4vcDQ09XGyszU19jd3+G/xMamCvwDAAAFLklEQVR4nO2d2bLbIAxAbYE3sDH//7WFbPfexG4MiCAcnWmnrzkjIRaD2jQMwzAMwzAMwzAMwzAMwzAMwzAMwzAMwzAMwzAMw5wQkHJczewxZh2lhNK/CBOQo1n0JIT74/H/qMV0Z7GU3aCcVPuEE1XDCtVLAhgtpme7H0s1N1U7QjO0L8F7llzGeh1hEG/8Lo7TUmmuSrOfns9xnGXpXxsONPpA/B6OqqstjC6Ax/0ujkNdYQQbKNi2k64qiiEZ+ohi35X+2YcZw/WujmslYewiAliVYrxgJYrdwUmwXsU+RdApUi83oNIE27YvrfB/ZPg8+BJETXnqh9CVzBbTQHgojgiCvtqU9thFJg/CKz3VIMKMEkIXxIWqIpIg2SkjYj+xC816mrJae2aiWGykxRNsW0UwiJghJDljYI5CD8GRiCtIsJxizYUPQ2pzItZy5pcisTRdk/a9m4amtNNfBuQkdVhSaYqfpNTSFGfb9GRIakrE2Pm+GFLaCQPqiu0OpWP+HMPQQcgQMiQprWXNmsVwIjQjYi/ZrhAqNTCgr2gu0Jnz85RSSjso0HkMFZ0YZjKkc26a/jlmh9JiDyDxi9oeorTYAzZkwwoMz19pzj9bnH/GP/+qbchjSGflneWYhtTuKdMOmNKZcJ5TjInQKcYXnESd/jQxy0ENpULTNGOGgxpap/oyw9pbUAqhfx2Dbkhovvfgz4iUzoM9+GlK6/Mh4q29hyC1mwro30hpVVLPF9wYQr71RazOeM5/cw81iBRD+A03aM9/C/obbrKjbYSpCmIVG3qT/Q8oeUo3Rz0IL7vI1tEbCB9pSiu8I/aV8x3Kg/BGWrWp4ZVs0nZfmAoEG4h/61yHYIJiFSl6Q0Vk6tTW1N8kYp8hdOkfHYYMXd2Qft+8CYwqYDSKvqIh+MCF8Wgca2u/cwdgeW3TtuVn6+1oBs3yLo5C2JpK6CvQzGpfUkz9UG/87gCsi5o2LIXolxN0FbwAsjOLEr+YJmXn7iR6N0BCt5p5cMxm7eAsfS+/CACQf4CTpKjzgkvr2cVarVTf96372yut7XLJ1sa7lv6VcfgYrWaxqr3Wlo1S6pvStr22sxOtTNPLzdY3nj20bPP+ejFdJYkLsjGLdtPBEbe/mr2bQKiXWJDroA+vtzc0p9aahuwqHMDYrQEXHEw9jwQl3drMpts9JBU1SdktPe5FBRdJQ6bwXBpa57ib2A8kukQDzMjh++Uo7Fo6Wd02Pkf4fknqoo4HtvAIjsqUcjx6DIPgWCaOML9rKI/oqD9/lgNrn+eF+p7j8tnzHBiR7+kdUGw/+V1Kzkc75mMy6U+FMaxjPibiM1U1uGM+puInHpmALZCgP4pt7i840MV8+0R1zPsRB6UTcqpizncYwZ89syDydfyWCwXB1l8/zRNGWbTG/GHKUm9AkxHMc/EGSk3z2+ArEhPEV5TUBLEvUGFcjEUH80J/jveTGOAJEljJbILWGQT3zRYiwuKsUXN1EEJAzBhRJFll7mBUG7KD8EqPkKekBREaL8hMDZLQSG6AQjtHPYmvTQnX0TtpC1SYCe2YdkkyLP3jj5BSbKiuR585eQhTgoje6yIb0Yb0C+mV6EYvebqw5SDy2WmubogZiF2AVxPC2FpDf8H2Q9QWo6IkjUxTWVEI3WY/wrCeSuqJ+eRWzXR/JXwgVjUMozbCOfoEZiSiKVGepqv5CJ8RyR4D7xBeamqa7z3BJ/z17JxuBPdv93d/a2Ki878MMAzDMAzDMAzDMAzDMF/KP09VUmxBAiI3AAAAAElFTkSuQmCC' alt='' srcset='' />
						</div>

						<div class='bg-gray-50 w-4/6 lg:ml-7 mt-1'>
							<div class='pt-5 pl-5 font-serif capitalize leading-3 tracking-wider text-2xl lg:text-3xl lg:-mt-3'>
							".$list[$i]['username']."
							</div>
							<div class='pt-5 pl-5 lg:pt-4 font-light capitalize leading-3 tracking-wider text-md'>
							".$list[$i]['user_id']."
							</div>
						</div>

						<div class='flex justify-center items-center w-10'>
						 	<div class='bg-gray-400 rounded-full p-2'>
							 
							 </div>
						</div>
						
						
					</div>
					</div>
					</a>";
			}
			else {
				echo "
					<a href=chatbox.php?rtno=".$list[$i]['user_id'].">
					<div class='mt-8 lg:ml-16  bg-gray-50 border-2 rounded-xl pb-1 pt-1 lg:w-10/12 shadow-lg hover:shadow-xl'>
					<div class='lg:pl-20 flex flex-row '>
						<div class='bg-gray-50 ml-2 lg:-ml-14 w-28 h-28 flex items-center justify-center p-3 border border-gray-300 rounded-lg'>
							<img class='rounded-lg'src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAM1BMVEXk5ueutLfn6eqrsbTp6+zg4uOwtrnJzc/j5earsbW0uby4vcDQ09XGyszU19jd3+G/xMamCvwDAAAFLklEQVR4nO2d2bLbIAxAbYE3sDH//7WFbPfexG4MiCAcnWmnrzkjIRaD2jQMwzAMwzAMwzAMwzAMwzAMwzAMwzAMwzAMwzAMw5wQkHJczewxZh2lhNK/CBOQo1n0JIT74/H/qMV0Z7GU3aCcVPuEE1XDCtVLAhgtpme7H0s1N1U7QjO0L8F7llzGeh1hEG/8Lo7TUmmuSrOfns9xnGXpXxsONPpA/B6OqqstjC6Ax/0ujkNdYQQbKNi2k64qiiEZ+ohi35X+2YcZw/WujmslYewiAliVYrxgJYrdwUmwXsU+RdApUi83oNIE27YvrfB/ZPg8+BJETXnqh9CVzBbTQHgojgiCvtqU9thFJg/CKz3VIMKMEkIXxIWqIpIg2SkjYj+xC816mrJae2aiWGykxRNsW0UwiJghJDljYI5CD8GRiCtIsJxizYUPQ2pzItZy5pcisTRdk/a9m4amtNNfBuQkdVhSaYqfpNTSFGfb9GRIakrE2Pm+GFLaCQPqiu0OpWP+HMPQQcgQMiQprWXNmsVwIjQjYi/ZrhAqNTCgr2gu0Jnz85RSSjso0HkMFZ0YZjKkc26a/jlmh9JiDyDxi9oeorTYAzZkwwoMz19pzj9bnH/GP/+qbchjSGflneWYhtTuKdMOmNKZcJ5TjInQKcYXnESd/jQxy0ENpULTNGOGgxpap/oyw9pbUAqhfx2Dbkhovvfgz4iUzoM9+GlK6/Mh4q29hyC1mwro30hpVVLPF9wYQr71RazOeM5/cw81iBRD+A03aM9/C/obbrKjbYSpCmIVG3qT/Q8oeUo3Rz0IL7vI1tEbCB9pSiu8I/aV8x3Kg/BGWrWp4ZVs0nZfmAoEG4h/61yHYIJiFSl6Q0Vk6tTW1N8kYp8hdOkfHYYMXd2Qft+8CYwqYDSKvqIh+MCF8Wgca2u/cwdgeW3TtuVn6+1oBs3yLo5C2JpK6CvQzGpfUkz9UG/87gCsi5o2LIXolxN0FbwAsjOLEr+YJmXn7iR6N0BCt5p5cMxm7eAsfS+/CACQf4CTpKjzgkvr2cVarVTf96372yut7XLJ1sa7lv6VcfgYrWaxqr3Wlo1S6pvStr22sxOtTNPLzdY3nj20bPP+ejFdJYkLsjGLdtPBEbe/mr2bQKiXWJDroA+vtzc0p9aahuwqHMDYrQEXHEw9jwQl3drMpts9JBU1SdktPe5FBRdJQ6bwXBpa57ib2A8kukQDzMjh++Uo7Fo6Wd02Pkf4fknqoo4HtvAIjsqUcjx6DIPgWCaOML9rKI/oqD9/lgNrn+eF+p7j8tnzHBiR7+kdUGw/+V1Kzkc75mMy6U+FMaxjPibiM1U1uGM+puInHpmALZCgP4pt7i840MV8+0R1zPsRB6UTcqpizncYwZ89syDydfyWCwXB1l8/zRNGWbTG/GHKUm9AkxHMc/EGSk3z2+ArEhPEV5TUBLEvUGFcjEUH80J/jveTGOAJEljJbILWGQT3zRYiwuKsUXN1EEJAzBhRJFll7mBUG7KD8EqPkKekBREaL8hMDZLQSG6AQjtHPYmvTQnX0TtpC1SYCe2YdkkyLP3jj5BSbKiuR585eQhTgoje6yIb0Yb0C+mV6EYvebqw5SDy2WmubogZiF2AVxPC2FpDf8H2Q9QWo6IkjUxTWVEI3WY/wrCeSuqJ+eRWzXR/JXwgVjUMozbCOfoEZiSiKVGepqv5CJ8RyR4D7xBeamqa7z3BJ/z17JxuBPdv93d/a2Ki878MMAzDMAzDMAzDMAzDMF/KP09VUmxBAiI3AAAAAElFTkSuQmCC' alt='' srcset='' />
						</div>

						<div class='bg-gray-50 w-4/6 lg:ml-7 mt-1'>
							<div class='pt-5 pl-5 font-serif capitalize leading-3 tracking-wider text-2xl lg:text-3xl lg:-mt-3'>
							".$list[$i]['username']."
							</div>
							<div class='pt-5 pl-5 lg:pt-4 font-light capitalize leading-3 tracking-wider text-md'>
							".$list[$i]['user_id']."
							</div>
						</div>

						<div class='flex justify-center items-center w-10'>
						 	<div class='bg-green-400 rounded-full p-2'>
							 
							 </div>
						</div>
						
						
					</div>
					</div>
					</a>";
			}
		}
	}
	
	mysqli_close($conn);
?>
</div>
</div>
</body>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</html>
