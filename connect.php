<?php
$host='localhost';
$username = 'DEEPIKA';
$password = 'DEEPIKA';
$dbname='facebook';
$conn=mysqli_connect($host,$username,$password,$dbname);
if($conn)
{
    #echo "Connection Successful.";
}
else{
    die("Connection failed".mysqli_connect_error());
}

?>