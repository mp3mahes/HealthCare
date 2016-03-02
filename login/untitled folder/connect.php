<?php
$host     = "localhost";
$socket   = "";
$user     = "root";
$password = "";
$dbname   = "Hospital";

$conn = mysqli_connect($host, $user, $password, $dbname);
if(!$conn)
{
echo ("db connection failed!");
die ('Could not connect to the database server' . mysqli_connect_error());
}

else {
    echo ("db connection established.");
    echo ("<br/>");
    }
    