<?php
session_start();
include('connect.php');
$f=$_POST["id"];
$em=$_SESSION["email"];
$cm=$_POST["cmt"];
if($cm=="")
{
    header("Location:dash.php");
}
mysqli_query($conn,"INSERT INTO comments(file,email,comm) VALUES('$f','$em','$cm')");
header("Location:dash.php");
?>
