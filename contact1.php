<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
  header("Location: index.php");
}
$res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);


?>




<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
    </head>
    
        <style>
      /* NOTE: rgb(30,30,40)The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      @import url(http://fonts.googleapis.com/css?family=Montserrat:400,700);

body { background:#332d2d ;}
form { max-width:420px; margin-top:50px; margin-left: 300px }

.feedback-input {
  color:white;
  font-family: Helvetica, Arial, sans-serif;
  font-weight:500;
  font-size: 18px;
  border-radius: 5px;
  line-height: 22px;
  background-color: transparent;
  border:2px solid #CC6666;
  transition: all 0.3s;
  padding: 13px;
  margin-bottom: 15px;
  width:100%;
  box-sizing: border-box;
  outline:0;
}

.feedback-input:focus { border:2px solid #CC4949; }

textarea {
  height: 150px;
  line-height: 150%;
  resize:vertical;
}

[type="submit"] {
  font-family: 'Montserrat', Arial, Helvetica, sans-serif;
  width: 100%;
  background:#CC6666;
  border-radius:5px;
  border:0;
  cursor:pointer;
  color:white;
  font-size:24px;
  padding-top:10px;
  padding-bottom:10px;
  transition: all 0.3s;
  margin-top:-4px;
  font-weight:700;
}
[type="submit"]:hover { background:#CC4949; }
    </style>

    
        <script src="js/prefixfree.min.js"></script>

    

<body>
<div id="header" class="container">
  <div id="logo">
    <h1><a href="#">Patient Health Monitoring System</a></h1>
  </div>
  <div id="menu">
    <ul>
      <li class="contact-bar"><a href="doctor.php" accesskey="1" title="">Home</a></li>
      <li><a href="contact1.php" accesskey="5" title="">Contact Us</a></li>
      <li><a href="logout.php?logout" accesskey="5" title="">LogOut</a>
    </ul>
  </div>
</div>
  
   <div id="wrapper">
  <div id="welcome" class="container">
    <h2>Drop your Letter, Make us better !<span class="byline"></span></h2>
    <p>Share your experiences with us. Let us know what  should we improve on. Your satisfaction is our motivation. </p>
  
     <body>
     <form action="mail_handler.php" method="post">
       
  <input type="text" name="first_name" class="feedback-input" placeholder="First Name" />   
  <input type="text" name="last_name" class="feedback-input" placeholder="Last Name" />
  <input type="text" name="email" class="feedback-input" placeholder="Email" />
  <textarea rows="5" name="message" cols="30" class="feedback-input" placeholder="Comment"></textarea>
  <input type="submit" name="submit" value="Submit">
</form>
    
      

    
    
    
  </body>
</html>









