<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="style/index_style.css">
<script type="text/javascript">
function validate()
{
    var username = document.getElementById("uname");
    var password = document.getElementById("pass");
    if(username.value.trim() == " " || password.value.trim() ==" ")
    {
        alert("No Blank values allowed");
    }
    else
    {
        true;
    }
}
</script>
</head>
<body>
    
    <div class="full-page">
        <div class="navbar">
        </div>
        <div class="full-page">
            <ul class="box-area">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
        <div id='login-form'class='login-page'>
            <div class="form-box">
                <div class='button-box'>
                    <div id='btn'></div>
                    
                    <button type='button'onclick='login()'class='toggle-btn'>LOGIN</button>
                </div>
                <form id='login' name="login" class='input-group-login' action="login.php" method="post" onsubmit="return validate()">

                    <input type='text' id="uname" name="uname" class='input-field' placeholder='Username' required >
		    <input type='password'id="pass" name="pass" class='input-field' placeholder='Enter Password' required>
            <a href>Forgot password?</a><br><br><br>
		    <button type='submit'class='submit-btn'>Log in</button><br>
            <button type='submit'class='submit-btn' onclick="location.href = './register.php';">Create a new account</button>
		 </form>
            </div>
            </div>
            
    </div>
    </script>
    <script type="text/javascript" src="vanilla-tilt.js"></script>
<script type="text/javascript">
	VanillaTilt.init(document.querySelector(".form-box"), {
		max: 25,
		speed: 400,
        glare: true,
        "max-glare": 0.2, 
	});
    </script>
    <script>
        var x=document.getElementById('login');
		var z=document.getElementById('btn');

		function login()
		{
			x.style.left='50px';
			y.style.left='450px';
			z.style.left='0px';
		}
	</script>
	<script>
        var modal = document.getElementById('login-form');
        window.onclick = function(event) 
        {
            if (event.target == modal) 
            {
                modal.style.display = "none";
            }
        }
    </script>
  
</body>
</html>
