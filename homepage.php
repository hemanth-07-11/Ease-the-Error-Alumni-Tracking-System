<?php
	session_start()
?>
<!DOCTYPE html>
<html>
<head>
    <title> HOME PAGE </title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="style/homepage.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {
  box-sizing: border-box;
}

.column {
  float: left;
  width: 33.33%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}
.container {
  position: relative;
  text-align: center;
  color: white;
}
.bottom-left {
  position: absolute;
  bottom: 605px;
  left: 16px;
  color:white;
}
.centered {
  position: absolute;
  top: 380px;
  left: 490px;
  transform: translate(-50%, -50%);
  color:white;
}
.top-right {
  position: absolute;
  top: 370px;
  right: 225px;
  color:white;
}
.content {
  font-size:18px;
  position: relative;
  left:0px;
  background: rgb(0, 0, 0); /* Fallback color */
  background:whitesmoke ; /* Black background with 0.5 opacity */
  color: black;
  padding: 20px;
  opacity: 0.8;
  width:100%
}

.btn{
height:40px;
width:120px;
background-color:red;
border:none;
color:white;
transition:.8s;
cursor:pointer;
position:relative;
overflow:hidden;

}

.btn:hover{
color:#fff;
}
.btn::before{
content:"";
position:absolute;
background:red;
transition:0.8s;
}
.btn:hover::before{
height:100%;}
.but1{
background:#4a8ec4;
left:200px;
float:right;
color:white;
}

footer{
  position: relative;
  bottom: 0px;
  width: 100%;
  background: #000;
}
.main-content{
  display: flex;
}
.main-content .box{
  flex-basis: 50%;
  padding: 10px 20px;
}
.box h2{
  font-size:20px;
  font-weight: 200;
  text-transform: uppercase;
  color:white;
}
.box .content{
font-size:15px;
  margin: 20px 0 0 0;
  position: relative;
}
.box .content:before{
  position: absolute;
  content: '';
  top: -10px;
  height: 2px;
  width: 100%;
  background: #1a1a1a;
}
.box .content:after{
  position: absolute;
  content: '';
  height: 2px;
  width: 15%;
  background: #f12020;
  top: -10px;
}
.left .content p{
  text-align: justify;
}
.left .content .social{
  margin: 20px 0 0 0;
}
.left .content .social a{
  padding: 0 2px;
}
.left .content .social a span{
  height: 40px;
  width: 40px;
  background: #1a1a1a;
  line-height: 40px;
  text-align: center;
  font-size: 5px;
  border-radius: 5px;
  transition: 0.3s;
}
.left .content .social a span:hover{
  background: #f12020;
}
.center .content .fas{
  font-size:15px;
  background: #1a1a1a;
  height: 45px;
  width: 45px;
  line-height: 45px;
  text-align: center;
  border-radius: 50%;
  transition: 0.3s;
  cursor: pointer;
}
.center .content .fas:hover{
  background: #f12020;
}
.center .content .text{
  font-size: 15px;
  font-weight: 500;
  padding-left: 10px;
}
.center .content .phone{
  margin: 15px 0;
}
.right form .text{
  font-size: 15px;
  margin-bottom: 2px;
  color: white;
}
.right form .msg{
  margin-top: 10px;
}
.right form input, .right form textarea{
  width: 100%;
  font-size: 15 px;
  background: #151515;
  padding-left: 10px;
  border: 1px solid #222222;
}
.right form input:focus,
.right form textarea:focus{
  outline-color: #3498db;
}
.right form input{
  height: 35px;
}
.right form .btn{
  margin-top: 10px;
}
.right form .btn button{
  height: 40px;
  width: 100%;
  border: none;
  outline: none;
  background: #f12020;
  font-size: 15px;
  font-weight: 500;
  cursor: pointer;
  transition: .3s;
}
.right form .btn button:hover{
  background: #000;
}
.bottom center{
  padding: 5px;
  font-size:10px;
  background: #151515;
}
.bottom center span{
  color: #656565;
}
.bottom center a{
  color: #f12020;
  text-decoration: none;
}
.bottom center a:hover{
  text-decoration: underline;
}
@media screen and (max-width: 900px) {
  footer{
    position: relative;
    bottom: 0px;
  }
  .main-content{
    flex-wrap: wrap;
    flex-direction: column;
  }
  .main-content .box{
    margin: 5px 0;
  }
</style>
</head>
<body>
	 <div class="nav-bar">
	     <div class="nav-logo">
	     		<?php echo "<img src=\"profile_imgs/".$_SESSION["usr_img"]."\">"; ?>
		 </div>
		 <div class="nav-links">
		    <ul>
		    		<a href="delete_account.php"><button class ="but1" type="button"> <li>DELETE ACC</li> </style></button></a>
		    		<a href="logout.php"><button class ="but1" type="button"> <li>LOGOUT</li> </style></button></a>
			        
			        <?php 
			        echo "<a href=\"profile_view.php?uid=".$_SESSION["usr_id"]."\"><li>PROFILE</li></a>";
			        ?>
				<a href="posts.php?"><li>POSTS</li></a>
				<a href="profile.php"><li>CHAT</li></a>
				<a href="search.php"><li>SEARCH <span class="fa fa-search"></span></li></a>
			</ul>
         </div>							
	 </div>
	 <br><br>
	 <div class="banner-title">
	     <h1> <center>NOTABLE ALUMNEES OF MADRAS INSTITUTE OF TECHNOLOGY </center> </h1>
	 </div>	
    <br><br>
	
<div class="row">
  <div class="column">
    <div class="pic">&nbsp
    <img src="image/apj.jpg" alt="Snow" style="width:75%" >
	    
	</div>
  </div>
  <div class="column">&nbsp
    <img src="image/sivan.jpg" alt="Forest" style="width:80%">
	    
  </div>
  <div class="column">
    <img src="image/suja.jpg" alt="Mountains" style="width:101%">
	    
  </div>
</div>
<br>
<div class="content">
<p> <b style= "font-family:Castellar"><center>MIT ALUMNI ASSOCIATION</center></b><br>

<b style= "font-family:Castellar"> YEAR OF INCORPORATION: 1966</b><br>

The MITAA was born in Chennai, in 1966 thanks to the unstinted efforts and foresight of stalwarts like Prof. M.V. Radhakrishnamurthy, Mr. T.A.S. Balagopal (I Batch), Mr.S.Ramaswamy, Mr.B.Venkatraman, Mr. P.Krishnaswamy (late) and others. The first General Body meeting was held on 14/4/1966 and was headed by Mr. V.Gopalan (I Batch) (President), Prof. C.J.G. Chandra (I Batch) (V.P.), Mr.P.S.Subramanian (Late) (6th Batch) (Secretary) and Mr.B.Venkatraman (late) (4th Batch Treasurer). Prof. K.Srinivasan was the Dean of the Institute at that time. </>
</div>
<br><br>
<div class="content">
<p> <b style= "font-family:Castellar"><center>MANDATE OF MIT ALUMNI ASSOCIATION</center></b><br>
<p>1. To maintain contact among the past students of the MIT Chennai.<br>
2. To update and maintain a directory of the Alumni.<br>
3. To acknowledge the achievements of the various alumni in their fields.<br>
4. To acknowledge the services of the various Academics and Entrepreneurs who have been responsible for their contribution in the growth of the MIT.<br>
5. To be a catalyst for the social interaction amongst the alumni.<br>
6. To maintain contact between the Alumni and the Almamater and further the cause of the Institute in its developmental activites and achieve excellence in its goals.<br>
7. To assist the students of the Institute in their career pursuits.<br>
8. To assist the students in achieving excellence in their chosen careers.<br>
9. To form a technical core group and assist members in solving their professional problems.
 </p>
 </p>
</div>
<br>
<br>
<br>
  <footer>
      <div class="main-content">
        <div class="box">
          <h2>About us</h2>
          <div class="content">
            <p>Madras Institute of Technology is an engineering institute located in Chromepet, Chennai, India. It is one of the four autonomous constituent colleges of Anna University. It was established in 1949 by Chinnaswami Rajam as the first self-financing engineering institute in the country and later merged with Anna University. The institute gave India new areas of specialization such as aeronautical engineering, automobile engineering, electronics engineering and instrumentation technology. MIT was the first self-financing institute opened in India.</p>
            <div class="social">
              <a href="https://www.facebook.com/821204144607494"><span class="fab fa-facebook-f"></span></a>
              <a href="http://en.wikipedia.org/wiki/Madras_Institute_of_Technology"><span class="fab fa-wikipedia-w"></span></a>
              <a href="https://in.linkedin.com/company/madras-institute-of-technology-anna-university"><span class="fab fa-linkedin"></span></a>
            </div>
          </div>
        </div>
 
        <div class="center box">
          <h2>Address</h2>
          <div class="content">
            <div class="place">
              <span class="fas fa-map-marker-alt"></span>
              <span class="text">Chromepet, Chennai, Tamil Nadu 600044</span>
            </div>
            <div class="phone">
              <span class="fas fa-phone-alt"></span>
              <span class="text"> 044-2251-6002</span>
            </div>
            
          </div>
        </div>
 
        <div class="right box">
          <h2>Contact us</h2>
          <div class="content">
            <form action="#">
              <div class="email">
                <div class="text">Email *</div>
                <input type="email" required>
              </div>
              <div class="msg">
                <div class="text">Message *</div>
                <textarea rows="2" cols="25" required></textarea>
              </div>
              <div class="btn">
                <button type="submit">Send</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="bottom">
        <center>
     
        <span> 2021 All rights reserved.</span>
        </center>
      </div>
    </footer>
</body>
</html>	 
