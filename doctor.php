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
			<li class="current_page_item_map"><a href="doctor.php" accesskey="1" title="">Home</a></li>
			<li><a href="contact1.php" accesskey="5" title="">Contact Us</a></li>
			<li><a href="logout.php?logout" accesskey="5" title="">LogOut</a>

			</li>
		</ul>
	</div>
</div>
<div id="banner" class="container"><a href="#" class="image image-full"><img src="images/doc.png" alt="" /></a></div>
<div id="wrapper">
	<div id="welcome" class="container">
		<h2>Welcome Doctor! <?php echo $userRow['user_name']; ?><span class="byline">
		</span></h2>		
<br>
<br>
<div id="page" class="container">
		<div id="content">
 <table border="0">            
                <tbody>
                    	<H3>Find the Details of your patients below using their UserName</H3> 

<form action="doctor.php" method="post">
	<br>
Enter the Patient's UserName: <input type="text" name="patient_id">
<br>
<input type="submit">

 <br>
 <br>
 
<?php
include 'connect.php';
$patient_id = $_POST["patient_id"];
//$user_name = $userRow['user_name'];
//$query = "insert into 'test_weather'.'observation'."(observation_id,c_id,city_name,s_id,station_name,wdate,wtime,temperature,cloud_coverage,precipitation)"."values($observation_id,'$c_id','$city_name','$s_id','$station_name',$wdate,'$wtime',$temperature,$cloud_coverage,$precipitation,'$e_id', NOW());"";
$sql = "SELECT * FROM patient where patient_id = '$patient_id' ";


   // mysql_real_escape_string($patient_id);
//$result = mysqli_query($con,$query);

//if (mysqli_query($conn, $sql)) {
    //echo "New record created successfully";
 $result = ( mysqli_query($conn, $sql) ) ;   
 while ($row = $result->fetch_assoc()) {
 foreach ($row as $col => $val) {
            echo $col. " : ".$val."<br>";

        }

       // echo $row['fname']."<br>";
        //echo $row['lname']."<br>";
    }

mysqli_close($conn);
?>





</tbody>
</table>
</form>
</div>

<div id="sidebar">

<form name= "noteform "  action="insert-doctornote.php" method="$_POST">
<table border="0">
                
                <tbody>
                    
                        <H3> Please fill the 'After check up details' Below </H3> 
                        <tr>
                        <td > <font color="red"> * </font> Patient ID : </td>
                        <td> <input type="text" name="patient_id" value="" size="25" /></td>
                    </tr>
                    


<tr>
                        <td ><font color="red"> * </font>Doctor ID: </td>
                        <td><input type="text" name="doctorid" value="" size="25" /></td>
             
                   </tr>

                   </tr>
                   <tr>
                        <td ><font color="red"> * </font> Prescription </td>
                        <td><input type="text" name="prescription" value="" size="50" /></td>
                        
                   </tr>

                   <tr>
                        <td ><font color="red"> * </font>Doctor's Note: </td>
                        <td><input type="text" name="doctor_note" value="" size="50" />


                        </td>

<tr>
                        <td ><font color="red"> * </font>Visited Date: </td>
  						<td><input type="text" name="date_visited" id="from">
  						</td>
  					</tr>

  					<tr>
                        <td ><font color="red"> * </font>Next Visit Date: </td>
  						<td> <input type="text" name="next_visit_date" id="to">
  						</td>
  					</tr>
                            
                 
<script>

$(function(){
        $("#to").datepicker({ dateFormat: 'yy-mm-dd' });
        $("#from").datepicker({ dateFormat: 'yy-mm-dd' }).bind("change",function(){
            var minValue = $(this).val();
            minValue = $.datepicker.parseDate("yy-mm-dd", minValue);
            minValue.setDate(minValue.getDate()+1);
            $("#to").datepicker( "option", "minDate", minValue );
        })
    });
    
    </script>





</tbody>
</table>
			<input type="reset" value="Clear" name="clear" />
            <input type="submit" value="Submit" name="submit" />
</form>



	</div>
</div>

</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

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
