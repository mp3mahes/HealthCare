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

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="sstyle.css">
	    <style>
			#map2 
			{
				margin-left: 0px;
				width: 500px;
				height: 400px;
			}
		</style>
		<script src="https://maps.googleapis.com/maps/api/js"></script>
		<script src="GmapF.js"></script>
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
	</head>
	<body>
		<div id="header" class="container">
	<div id="logo">
		<h1><a href="#">Patient Health Monitoring System</a></h1>
	</div>
	<div id="menu">
		<ul>
			<li class="current_page_item_map"><a href="index.php" accesskey="1" title="">Home</a></li>
			<li><a href="events.php" accesskey="2" title="">Events</a></li>
			<li><a href="maps.php" accesskey="3" title="">Maps</a></li>
			<li><a href="contact.php" accesskey="5" title="">Contact Us</a></li>
			<li><a href="logout.php?logout" accesskey="5" title="">LogOut</a>
		</ul>
	</div>
</div>
<div id="banner" class="container"><a href="#" class="image image-full"><img src="images/banner1.jpg" alt="" /></a></div>















<div id="wrapper">

	<div id="welcome" class="container1">
		<h2>Welcome! <span class="byline"> </span></h2>
		<p>Once you put the zipcode, it displays the nearby fitness centers. </p>

<br>
		<br>
		<div id="map2">
		</div>
		<br>
		<form>
			<label>Enter the Zipcode: <input type = "text" id="search"/></label>
			<input type = "button" onclick="move();" value = "Search"/>
		</form>
		<p>Map of nearby gyms, parks, trails, etc.</p>





</div>


</div>





<div id="copyright" class="container">
	<p>&copy; All rights reserved || UT Arlington Med-BOOK ||</p>
</div>
		
	</body>
</html>



<!--<div id="calender">
			<iframe src="https://sharing.calendar.live.com/calendar/private/43b758e3-0917-4eb8-a194-2d9b80cb18a7/7d27a51d-7f50-4705-b354-d9331ccb366e/cid-74896c70f4f3e8ce/index.html" style="border: 0" width="1200" height="720" frameborder="0" scrolling="no"></iframe>
			<br><br><br>
</div>  --> 
