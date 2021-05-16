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
            //document.getElementById("displayrad").innerHTML = "Searching based on : "+option;
            //document.getElementById("displaytext").innerHTML = "Searching for: "+text;
            
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
            			$("#search-result").append("<div style=background-color:red><h3>"+parse_data[i].username+"</h3><a href=\"profile_view.php?user_id="+parse_data[i].user_id+"\">profile</a><br><a href=\"chatbox.php?rtno="+parse_data[i].user_id+"\">chat</a></div>");
            		}
            	},
            });
  	}
 </script>
 </head>
 
 <body>
<h2> Perform Search based on </h2>

  <input type="radio" id="username" name="search" value="1">
  <label for="1">NAME</label><br>
  
  <input type="radio" id="dept" name="search" value="2">
  <label for="2">Department</label><br>

  <input type="radio" id="company" name="search" value="3">
  <label for="3">company</label><br>

  <input type="radio" id="rollno" name="search" value="4">
  <label for="4">rollno</label><br>

  <input type="radio" id="interest" name="search" value="5">
  <label for="5">Areas of interest</label><br>

<br>
  <input type="text" id="searching" name="searching">
<br>
  <input type="submit" value="Submit" onclick="search()">


<div id="displayrad"></div>
<p id="displaytext"></p>
<div id="search-result"></div>
 </body>
 </html>
