<?php
include 'connect.php';
$patient_id = $_GET["patient_id"];
$fname = $_GET["fname"];
$lname = $_GET["lname"];
$gender = $_GET["gender"];
$age = $_GET["age"];
$blood = $_GET["blood"];
$street = $_GET["street"];
$city = $_GET["city"];
$zipcode = $_GET["zipcode"];
$maritial_status = $_GET["maritial_status"];
$insurance = $_GET["insurance"];
$p_physician = $_GET["p_physician"];
$chief_complain = $_GET["chief_complain"];
$user_name = $_GET["user_name"] ;

//$sql1 = "SELECT patient_id FROM patient WHERE patient_id = $user_name "; 

//$query = "insert into 'test_weather'.'observation'."(observation_id,c_id,city_name,s_id,station_name,wdate,wtime,temperature,cloud_coverage,precipitation)"."values($observation_id,'$c_id','$city_name','$s_id','$station_name',$wdate,'$wtime',$temperature,$cloud_coverage,$precipitation,'$e_id', NOW());"";
$sql = "INSERT INTO patient(patient_id, fname, lname, gender, age, blood, street, city, zipcode, maritial_status, insurance, p_physician, chief_complain)
           VALUES('$patient_id', '$fname','$lname','$gender','$age','$blood','$street','$city','$zipcode','$maritial_status','$insurance','$p_physician', '$chief_complain');";
//$result = mysqli_query($con,$query);





if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    header ("location: display.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}




mysqli_close($conn);
?>