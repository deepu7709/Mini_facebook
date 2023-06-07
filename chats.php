<?php
session_start();
include('connect.php');
$fr=$_SESSION["email"];
$ch=$_POST["task"];
$msg=$_POST["msg"];
mysqli_query($conn,"INSERT into chat(from_,to_,msg) VALUES('$fr','$ch','$msg')");
header("Location:dash.php");
?>