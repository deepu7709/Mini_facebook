<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="facesign.css">
        <title>Sign UP HERE</title>
    </head>
    <body>
        <form method="POST" action="facesignup.php">
            <div class="main">
            <h1>Sign UP</h1> 
            <p>It's free so be quick and get ready to explore !!</p>
            <input type="text" name="fname" placeholder=" Enter FirstName" required>
            <input type="text" placeholder=" Enter LastName" name="lname" required><br><br>  
            <input id="ph" type="text" name="email" style="width:89%;margin-left:-0.3%;margin-right:90%;" placeholder=" Enter Email address or Mobile number" required><br><br> 
            <input id="pwd" type="password" name="psswd" style="width:89%;margin-left:-0.3%;margin-right:90%;" placeholder=" Enter New Password" required><br><br> 
            <label>Date of Birth?</label><br><br>
            <input type="date" style="width: 89%;" name="dob" required><br><br>
            <label>Gender?</label><br><br>
            <input type="radio" name="gender" value="female" style="margin-right: 5px;margin-left: 35px;">Female
            <input type="radio" name="gender" value="male"  style="margin-right: 5px;margin-left: 35px;">Male
            <input type="radio" name="gender" value="custom"  style="margin-right: 5px;margin-left: 35px;">Custom<br><br>
            <input type="checkbox" name="check" required> Clicking Sign Up, you agree to our Terms, Privacy Policy and Cookies Policy. 
                You may receive SMS notifications from us and can opt out at any time.<br><br>
            <input class="bn" id="bn" type="submit" name="submit" value="Sign Up">
            </div>
        </form>

    </body>
</html>
<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST["email"];
        $psswd = $_POST["psswd"];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $host = 'localhost';
        $username = 'DEEPIKA';
        $password = 'DEEPIKA';
        $dbname = 'FACEBOOK';

        $conn = mysqli_connect($host, $username, $password, $dbname);

        if ($conn) {
            echo "Connection successful.";
        }
        else{
            echo "Connection Failed.";
            die("Connection Failed:".mysqli_connect_error());
        }
        if(mysqli_num_rows(mysqli_query($conn,"SELECT * from faces where email='$email'"))>0)
        {
            echo "<script>alert('User with this email already exist!');</script>";
            header('refresh:0.1;url=http://localhost/face/facebook.php');
        }
        else{
        $sql="insert into faces values('$fname','$lname','$email','$psswd','$dob','$gender')";
        $res = mysqli_query($conn,$sql);
        if($res){
            echo "<script>alert('Data Inserted');</script>";
           $_SESSION['fname']=$_POST["fname"];
           header('refresh:1;url=http://localhost/face/facebook.php');
        }
        else{
            echo "<script>alert('Invalid Credentials');</script>";
            header('Location:facesignup.php');
        }
    }
}
?>