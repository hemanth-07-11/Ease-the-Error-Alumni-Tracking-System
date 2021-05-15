<!DOCTYPE html>
<html>
<head>
	<title>Alumni Tracking</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
 
 <body onload="fetch()">
<h2> Post Create </h2>

  Enter Title <br>
  <input type="text" id="title" name="title"> <br>
  Enter Post Message <br>
  <input type="text" id="post" name="post">


<br><br>
  <input type="submit" value="Submit" onclick="posts()">

<div id="post-msgs"></div>

<script>
 function posts() {
            var title = document.getElementById("title").value;
            //document.getElementById("tit").innerHTML = title;
            
            var msg = document.getElementById("post").value;
	    //document.getElementById("msgs").innerHTML = msg;
	    
	    datatosend = "title="+title+"&msg="+msg;
	    $.ajax({
		url:'posts_db_insert.php',
		type:'post',
		data:datatosend,
		async:true,
		//display the msg upon successfull response from server
		success:function(data) {
		//document.getElementById("yourmsg").innerHTML=data[0];
			console.log("data sent");
			$("#post-msgs").prepend("<div style=background-color:red><h3>"+title+"</h3><br><h4>"+msg+"</h4></div>");
		},
	    });
}

 function fetch() {
	    $.ajax({
		url:'posts_db_fetch.php',
		async:true,
		//display the msg upon successfull response from server
		success:function(data) {
		//document.getElementById("yourmsg").innerHTML=data[0];
			var dat = JSON.parse( data );
			//console.log(dat);
			console.log("helo",dat);
			for( i=0;dat.length;i++ ){
				$("#post-msgs").append("<div style=background-color:red><h3>"+dat[i].title+"</h3><br><h4>"+dat[i].post+"</h4></div>");
			}
		},
	    });
 }

</script>
 </body>
 </html>
