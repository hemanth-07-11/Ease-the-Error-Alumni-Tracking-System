<!DOCTYPE html>
<html>
<head>
	<title>Alumni Tracking</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script>
        function search() {
            var radio = document.getElementsByName('search');
            var option;
            for(i = 0; i < radio.length; i++) {
                if(radio[i].checked) {
                	option = radio[i].value;
                }
            }
            var text = document.getElementById("searching").value;
            var datatosend = "text="+text+"&option="+option;
            console.log(datatosend);
            $("#search-result").text("");
            $.ajax({
            	url:'search_db.php',
            	type:'post',
            	data:datatosend,
            	async:true,
            	success: function(data) {
            		var parse_data = JSON.parse(data);
            		console.log(parse_data);
            		for( i=0; i<parse_data.length;i++ ) {
            			$("#search-result").append("<div class='align'><h3>"+parse_data[i].username+"</h3><a href=\"profile_view.php?user_id="+parse_data[i].user_id+"\">profile</a><br><a href=\"chatbox.php?rtno="+parse_data[i].user_id+"\">chat</a></div><br>");
            		}
            	},
            });
  	}
 </script>
 </head> 
<body>
<<<<<<< HEAD
<link rel="stylesheet" href="style/search.css">
=======
<link rel="stylesheet" href="search.css">
>>>>>>> 6a463f6700491b078e6d527a78e3160f89767da1
<div class="container">
  <div class="wrapper">
    <h2> Perform Search based on </h2>
    <div class="text">
    <div class="column">
      <input type="radio" id="username" name="search" value="1">
      <label for="1">Name</label></div>
      
      <div class="column">
      <input type="radio" id="dept" name="search" value="2">
      <label for="2">Department</label></div>

      <div class="column">
      <input type="radio" id="company" name="search" value="3">
      <label for="3">Company</label></div>

      <div class="column">
      <input type="radio" id="rollno" name="search" value="4">
      <label for="4">Rollno</label></div>

      <div class="column">
      <input type="radio" id="interest" name="search" value="5">
      <label for="5">Areas of interest</label></div>
      <input type="text" id="searching"  name="searching"><br>
    </div>
    <div class="btn">
    <input type="submit" value="Submit" class="btn" onclick="search()">
    </div> 
  </div>
  <div id="search-result" ></div>
</div>
</body>
</html>
