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




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

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
			</li>
		</ul>
	</div>
</div>
<div id="banner" class="container"><a href="#" class="image image-full"><img src="images/pic04.jpg" alt="" /></a></div>
<div id="wrapper">
	<div id="welcome" class="container">
		<h2>Welcome! <?php echo $userRow['user_name']; ?> <span class="byline">.


		</span></h2>
		<!-- <p>This is, a form you fill when you registered for the first time. You can take an appointment with the available doctors and create the event on calender for Email Reminder.  </p>

 <table border="0">
                
                <tbody>
                    
                    	<H3>Details Below </H3> 
              
<form action="display.php" method="post">
Enter the UserName: <input type="text" name="patient_id"><br>
<input type="submit">
</form> -->


<div id="page" class="container">
		<div id="content"> 

<h3 style="color: red" > <u> General details </u>  <br> </h3>
<br>
<?php
include 'connect.php';
$patient_id = $_POST["patient_id"];
$user_name = $userRow['user_name'];
//$query = "insert into 'test_weather'.'observation'."(observation_id,c_id,city_name,s_id,station_name,wdate,wtime,temperature,cloud_coverage,precipitation)"."values($observation_id,'$c_id','$city_name','$s_id','$station_name',$wdate,'$wtime',$temperature,$cloud_coverage,$precipitation,'$e_id', NOW());"";
$sql = "SELECT * FROM patient where patient_id = '$user_name' ";


   // mysql_real_escape_string($patient_id);
//$result = mysqli_query($con,$query);

//if (mysqli_query($conn, $sql)) {
    //echo "New record created successfully";
 $result = ( mysqli_query($conn, $sql) ) ;  

 $rowcount=mysqli_num_rows($result);

 if( $rowcount == 0){

 	echo "<h4>Sorry! We couldn't find you in our records. </h4> ";

echo "<a href='display.php'><h3> Click Me! </h3> </a> <h4> to add your general Information !</h4> ";

 	//echo "<h4> "<a href="home.php">Click here!</a> "to add your information. </h4>";
 } 

else{



 while ($row = $result->fetch_assoc()) {

 foreach ($row as $col => $val) {
            echo  $col.  " : ".$val."<br>";
        }

       // echo $row['fname']."<br>";
        //echo $row['lname']."<br>";
    }



}



mysqli_close($conn);
?>

</div>

<div id="sidebar">


<h3 style="color: red" > <u> Doctor's After checkup report </u> </h3>


<br>



<?php
include 'connect.php';
$patient_id = $_POST["patient_id"];
$user_name = $userRow['user_name'];
//$query = "insert into 'test_weather'.'observation'."(observation_id,c_id,city_name,s_id,station_name,wdate,wtime,temperature,cloud_coverage,precipitation)"."values($observation_id,'$c_id','$city_name','$s_id','$station_name',$wdate,'$wtime',$temperature,$cloud_coverage,$precipitation,'$e_id', NOW());"";
$sql = "SELECT * FROM appointment where patient_id = '$user_name' ";


   // mysql_real_escape_string($patient_id);
//$result = mysqli_query($con,$query);

//if (mysqli_query($conn, $sql)) {
    //echo "New record created successfully";

 $result = ( mysqli_query($conn, $sql) ) ; 
 $rowcount=mysqli_num_rows($result);

 if( $rowcount == 0){
echo "<h4>You do not have any Doctor's Report available! </h4> ";

 } 

else{

 while ($row = $result->fetch_assoc()) {
 foreach ($row as $col => $val) {

            echo  $col.    " : ".$val."<br>" ;
        }

       echo ("*************************************");
     echo  nl2br(" \n ");

        //echo $row['lname']."<br>";
    }

}


mysqli_close($conn);
?>


<br>


	</div>
</div>





<div id="page" class="container">
		<div id="content">
			<h2>You have following doctors available.</h2>
			<p> Please proceed to the next page to take an appointment.
			</p>
			<ul class="style1">
				<li class="first"> <a href="#" class="image image-left"><img src="images/pic01.jpg" alt="" /></a>
					<h3>Dr. Jitendra Thapa</h3>
					<p><a href="#">He is a popular Gynocologyst.</a></p>
				</li>
				<li> <a href="#" class="image image-left"><img src="images/pic02.jpg" alt="" /></a>
					<h3>Dr. Preeza Karmacharya</h3>
					<p><a href="#">She is a family physician.</a></p>
				</li>
				<li> <a href="#" class="image image-left"><img src="images/pic03.jpg" alt="" /></a>
					<h3>Dr. Binita Paneru</h3>
					<p><a href="#">She is a general Physician. She works in Baylor, Irving. </a></p>
				</li>
			</ul>
		</div>
		<div id="sidebar">
			<h2> </h2>
			<br>
			<br>
			<p> List of Doctors we have available in our PHMS.
			</p>
			<ul class="style1">
				<li class="first"> <a href="#" class="image image-left"><img src="images/pic01.jpg" alt="" /></a>
					<h3>Dr. Mahesh Pandeya</h3>
					<p><a href="#">He is a popular Gynocologyst.</a></p>
				</li>
				<li> <a href="#" class="image image-left"><img src="images/pic02.jpg" alt="" /></a>
					<h3>Dr. Padma Dhungana</h3>
					<p><a href="#">She is a family physician.</a></p>
				</li>
				<li> <a href="#" class="image image-left"><img src="images/pic03.jpg" alt="" /></a>
					<h3>Dr. Alexgendra Allen</h3>
					<p><a href="#">She is a general Physician. She works in Baylor, Irving. </a></p>
				</li>
			</ul>
	</div>
</div>
<div id="copyright" class="container">
	<p>&copy; All rights reserved || UT Arlington Med-BOOK ||</p>
</div>
</body>
</html>