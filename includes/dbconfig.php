<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "soregistry";

// Connection
$con = mysqli_connect("$host","$username","$password","$database");

// Check Connection
if(!$con)
{
    header("Location: ../errors/db.php");
    die(mysqli_connect_errno($con));
}

?>