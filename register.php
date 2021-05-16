<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="style/regis_style.css">
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
                    <button type='button'onclick='register()'class='toggle-btn'>SIGNUP</button>
                </div>
		 <form id='register' class='input-group-register'  action="success.php" method="post">
		     <input type='text' name="username" id="username" class='input-field'placeholder='Name' required>
		     <input type='text' name="roll_no" id="roll_no" class='input-field'placeholder='Roll number' required>
		     <input type='email'name="email" id="email" class='input-field'placeholder='Email Id' required>
		     <input type='text'name="company" id="company" class='input-field'placeholder='Company' required>
             	 <input type='text'name="Department" id="Department" class='input-field'placeholder='Department' required>
		 
		 <input type='text'name="location" id="location" class='input-field'placeholder='Company Location' required>
		 <input type='text'name="designation" id="designation"class='input-field'placeholder='designation' required>
             <input type='date' name="dob" id="dob" class='input-field'placeholder='Birthdate' required>
             <input type='text' name="yop" name="yop" class='input-field'placeholder='Year of Passing' required>
             <input type="text" name="interest" name="interest" class='input-field'placeholder='Area of interest' required>
		     <input type='password' name="pwd" id="pwd" class='input-field'placeholder='Enter Password' required>
                    <button type='submit'class='submit-btn'>Create</button>
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
		var y=document.getElementById('register');
		var z=document.getElementById('btn');
		function register()
		{
			x.style.left='-400px';
			y.style.left='50px';
			z.style.left='110px';
		}
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
