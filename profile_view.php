<html>
<head>
	<title>profile view</title>
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<link rel="stylesheet" href="style/profile_view_style.css">
</head>
<body>

<div class="body">
    <ul class="box-area">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
</div>
<?php
	include_once 'db_conn.php';
	
	 session_start();
	 
	 $usr_id = $_GET["uid"];
	 
	 $sql1 = "select * from users where user_id=".$usr_id;
	 $result = mysqli_query($conn, $sql1);
	 $user = mysqli_fetch_array($result, MYSQLI_ASSOC);	
	 
	 $sql2 = "select * from contact_details where user_id=".$usr_id;
	 $result = mysqli_query($conn, $sql2);
	 $cont = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>
<div class="wrapper">
    <div class="left">
        <?php 
        	echo "<img src=\"profile_imgs/".$user["image_name"]."\" alt=\"user\" width=\"250\" height=\"250\">";
        	echo "<h4>".$user["username"]."</h4>";
	        if( $row["yop"] < date("Y") )
         		echo "<p>Alumni</p>";
         	else
         		echo "<p>Student</p>";
        ?>
    </div>
    <div class="right">
        <div class="info">
            <h3>Information</h3>
            <section class="child">
                <div class="info_data">
                     <div class="data">
                       <h4>Rollnumber</h4>
                       <?php echo "<p>".$user["roll_no"]."</p>" ?>
                  </div>
                </section><section class="child">
                    <div class="info_data">
                  <div class="data">
                    <h4>Email address</h4>
                    <?php echo "<p>".$cont["email_id"]."</p>" ?>
                 </div></div>
                </section><section class="child">
                    <div class="info_data">
                 <div class="data">
                    <h4>Year of passing</h4>
                    <?php echo "<p>".$user["yop"]."</p>" ?>
                 </div></div>
                </section>
                <section class="child">
                    <div class="info_data">
                 <div class="data">
                    <h4>Department</h4>
                    <?php echo "<p>".$user["Department"]."</p>" ?>
                 </div></div>
                </section>
                <section class="child">
                    <div class="info_data">
                 <div class="data">
                    <h4>Birthdate</h4>
                    <?php echo "<p>".$user["dob"]."</p>" ?>
                 </div></div></section>
                 <section class="child">
                     <div class="info_data">
                 <div class="data">
                    <h4>Company</h4>
                    <?php echo "<p>".$user["company"]."</p>" ?>
                 </div>
                 </div></section>
                 <section class="child">
                     <div class="info_data">
                 <div class="data">
                    <h4>Designation</h4>
                    <?php echo "<p>".$user["designation"]."</p>" ?>
                 </div></div></section>
                 <section class="child">
                    <div class="info_data">
                <div class="data">
                   <h4>Area of interest </h4>
                   <?php
                   	$sql = "select interest from interest where user_id=".$usr_id;
                   	$result = mysqli_query($conn, $sql);
                   	while( $row = mysqli_fetch_array($result,MYSQLI_ASSOC) ) 
                   		echo "<p>".$row["interest"]."</p>";
                  ?>
                </div></div></section>
                <section class="child">
                    <div class="info_data">
                <div class="data">
                   <h4>Company address </h4>
                   <?php echo "<p>".$user["location"]."</p>" ?>
                </div></div></section>           </div>
        </div>
        <div class="social_media">
            <ul>
              <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="#"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#"><i class="fab fa-instagram"></i></a></li>
              <li><a href="#"><i class="fab fa-github"></i></a></li>
              <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
              <li><a href="#"><i class="fab fa-hackerrank"></i></i></a></li>
          </ul>
      </div>
      <div class="edit">
          <ul>
              &nbsp;<li><a href="#"><i class="fas fa-comment-dots"></i></a></li>
          </ul>
      </div>
      </div>
    </div>
</div>

</body>
</html>
