<?php
include 'connect.php';

$doctorid = $_GET["doctorid"];
$patient_id = $_GET["patient_id"];
$doctor_note = $_GET["doctor_note"];
$prescription = $_GET["prescription"];
$date_visited = $_GET["date_visited"];
$next_visit_date =$_GET["next_visit_date"];


//$sql1 = "SELECT patient_id FROM patient WHERE patient_id = $user_name "    $date_visited = $_GET[date ("date_visited")];; 

//$query = "insert into 'test_weather'.'observation'."(observation_id,c_id,city_name,s_id,station_name,wdate,wtime,temperature,cloud_coverage,precipitation)"."values($observation_id,'$c_id','$city_name','$s_id','$station_name',$wdate,'$wtime',$temperature,$cloud_coverage,$precipitation,'$e_id', NOW());"";
$sql = "INSERT INTO appointment(doctorid, patient_id,  doctor_note, prescription, date_visited,next_visit_date )
           VALUES('$doctorid', '$patient_id', '$doctor_note', '$prescription', $date_visited , $next_visit_date );";


//$result = mysqli_query($con,$query);

if (mysqli_query($conn, $sql)) {
    echo "Note has been posted sucessfully Doctor.";
    header ("location: doctor.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);
?>

