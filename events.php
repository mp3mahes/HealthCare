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
				height: 200px;
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




<div id="banner" class="container"><a href="#" class="image image-full"><img src="images/banner2.jpg" alt="" /></a></div>
<div id="wrapper">
	<div id="welcome" class="container1">
		<h2>Calender <span class="byline"> </span></h2>
		<p>You can view the public health events on the calender below.  </p>

	<div id="calender">
			<iframe src="https://calendar.google.com/calendar/embed?src=7s32ppq1005pn7u5cfrfcr09dk%40group.calendar.google.com&ctz=America/Chicago" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
			<br><br><br>
</div> 


</div>

<tr>
<td colspan="2" width="100%" align="center" valign="top">



			<script>
			function popupEvent(){
				view_window = window.open("https://calendar.google.com/calendar/render?hl=en&tab=Uc&pli=1#main_7", "Google-Calender", "width=600,height=700,menubar=yes,scrollbars=yes,resizable=yes");
			}
			</script>			
			<input style="margin-left:20px;" type="button" onclick="javascript:popupEvent()" value="Add Event">



</td>
</tr>
</div>





<div id="copyright" class="container">
	<p>&copy; All rights reserved || UT Arlington Med-BOOK ||</p>
</div>
		
	</body>
</html>