<?php
session_start();
include_once 'dbconnect.php';

if(isset($_SESSION['user'])!="")
{
    header("Location: home.php");
}


/// got to add if statement to see if that the doctor cannot come to home.php




if(isset($_POST['btn-login']))
{
    $email = mysql_real_escape_string($_POST['email']);
    $upass = mysql_real_escape_string($_POST['pass']);
    $user_name = mysql_real_escape_string($_POST['uname']);

    $user_name = trim ($user_name);
    $email = trim($email);
    $upass = trim($upass);
    





    $res=mysql_query("SELECT user_id, user_name, user_pass, user_type FROM users WHERE user_email='$email'");
    $row=mysql_fetch_array($res); 
    $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row

    // to see if the user has already registered the general patient form. 
    $res1 = mysql_query ( " SELECT patient_id FROM patient where patient_id = '$user_name"); 
    $row1 = mysql_fetch_array($res1);
    $count1 = mysql_num_rows($res1);
    
    if($count == 1 && $row['user_pass']==($upass))
    {
        
        //header("Location: home.php");md5
         


         /// I am writing the if statement if the user is doctor or patient.

         if ($row['user_type'] == "doctor"){
            

            $_SESSION['user'] = $row['user_id'];
            header("location: doctor.php");

        }
 

        // I am writing the following if statement to see if the user has already registered the general health information. 

        elseif ($count1 ==1) {
            $_SESSION['user'] = $row['user_id'];
            header("location: display.php");
        }

            // if the user is new and not doctor it loads the home.php page. MAhesh
        else { 
            $_SESSION['user'] = $row['user_id'];
            header ("location: home.php");


        }


        // to check if the user_id is registered in the patient databases, i am checking with if condition.

 /*$user_name = mysql_real_escape_string($_POST['uname']);
 $user_name = trim ($user_name);

 $res1 = mysql_query ( " SELECT patient_id FROM patient where patient_id = '$user_name"); 
 $row1 = mysql_fetch_array($res1);
//echo ("$res1");

 $count = mysql_num_rows($res1);
 if ($count == 0 )
 {
    header ("location: home.php");
 }

else {
    header ("location: display.php");
}

if ($row['user_type'] == "doctor"){

            header("location: doctor.php");

        }

*/
    }
    else
    {
        ?>
        <script>alert('Username / Password Seems Wrong !');</script>
        <?php
    }
    







}
/*// to check if the user_id is registered in the patient databases, i am checking with if condition.
 $user_name = mysql_real_escape_string($_POST['user_name']);
 $user_name = trim ($user_name);

 $res1 = mysql_query ( " SELECT patient_id FROM patient where patient_id = ' $user_name"); 
 $row1 = mysql_fetch_array($res1);

 $count = mysql_num_rows($res1);
 if ($count > 0)
 {
    header ("location: display.php");
 }

else {
    header ("location: home.php");
}
*/





?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Medical-Book Login ! UTA ARLINGTON</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Med-Book</strong> Login!</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Login to our site using your Email</h3>
                            		<p>Enter your Email and Password to log on:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-key"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" method="post" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Email</label>
                                        <input type="text" name="email" placeholder="Enter Your Email" class="form-username form-control" id="form-username">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="pass" placeholder="Password..." class="form-password form-control" id="form-password">
			                        </div>
			                        <button type="submit" name= "btn-login" class="btn">Sign in!</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                    <td><a href="register.php">Sign Up Here</a></td>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                        	<h3>...or login with:</h3>
                        	<div class="social-login-buttons">
	                        	<a class="btn btn-link-1 btn-link-1-facebook" href="#">
	                        		<i class="fa fa-facebook"></i> Facebook
	                        	</a>
	                        	
                        	</div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>