<?php
session_start();
include('connect.php');
$f=$_POST["id"];
$u=$_SESSION["email"];
$ct=mysqli_num_rows(mysqli_query($conn,"SELECT * from like_main where user='$u' AND file='$f'"));
$prev=mysqli_num_rows(mysqli_query($conn,"SELECT * from like_main where user IS NOT NULL AND file='$f'"));
if($ct%2==0)
{
    $prev++;
    mysqli_query($conn,"INSERT INTO like_main(file,likes,user) VALUES('$f','$prev','$u')");
}
else{
    mysqli_query($conn,"DELETE FROM like_main WHERE user='$u' AND file='$f'");
}
header("Location:dash.php");
?>