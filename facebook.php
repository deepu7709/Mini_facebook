<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
body{
background-color:aliceblue;
background-image: url(fb1.jpeg);
background-repeat: no-repeat;
background-size: cover;   
}
.container{
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    margin-top:-3%;
}
h2,h4{
    font-family: 'Rubik', sans-serif;
    text-align: center;
    margin: 0%;
}
#log{
    font-family: 'Rubik', sans-serif;
    margin: 1%;
}
.box{
flex:1;
}
.box1{
    height: 350px;
    width: 350px;
    padding: 40px;
    margin-left:-42%;
}
.box2{
    margin-top:0%;
    padding:10px;
}
input {
    padding: 10px;
    margin: 10px;
    border-radius: 6px;
    font-size: 18px;
    background-color: whitesmoke;
}
input::placeholder {
    opacity: 0.5;
}
.bn{
    background-color: green;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    width: 60%;
    opacity: 0.9; 
    border-radius: 6px; 
    font-size: 20px; 

}
.card{
    font-family: 'Poppins', sans-serif;
    background-color: #FFFFFF;
    box-shadow: 1px 3px 18px rgb(0,0,0,0.3);
    height: 350px;
    width: 350px;
    border-radius: 10px;
    padding: 40px;
    margin-bottom: 40%;
    margin-top: -10%;
}
.cont{
    display:flex;
    flex-direction:column;
    flex-wrap:wrap;
}
#pos{
    width:200px;
    height:100px;
}
.bx{
    box-shadow:1px 3px 18px rgba(0,0,0,0.2);
    border-radius:10px;
    width:300px;
    margin-left:9%;
    margin:2%;
}
form{
    text-align: center;
}
a{
    font-size: large;
    color:rgb(14, 115, 232)
}
a:hover{
    color: #0e68bd;
}
marquee{
    margin-left:4%;
    height:300px;
}
#fb{
    text-align: center;
    color: white;
    font-family:'Times New Roman', Times, serif;
    font-weight: bolder;
    font-size: 60px;
    margin-bottom: 10%;
    
}
h2:hover{
    text-decoration: underline #4a66a0;
}
tr,td{
    padding:3px;
}
</style>
<script>
    function myFunction() {
  window.location.href="facesignup.php";  
}
    </script>
</head>
<body>
    <h1 id="fb">FACEBOOK</h1>
    <span><p style="text-align:center;margin: 0%;"><img style="aspect-ratio: 13;" src="logo.svg" alt=""></p1></span>
    <div class="container">
        <div class="box box1">
        </div>
        <div class="box box2">
        <div class="card">
            <h1 align="center" id="log">Login</h1>
            <hr>
            <form action="facebook.php" method="post">
            <input class="in" type="email" placeholder="Enter the email " name="email" required><br>
            <input class="in" type="password" placeholder="Enter the password " name="psswd" required><br> 
            <button class="bn" type="submit" name="submit" onclick="window.location.href='profile.php';">LogIn</button><br><br>
            <a href="#">Forget Password?</a>
            <hr>
            <button class="bn" type="button" onclick="window.location.href='facesignup.php';">Create New Account</button><br><br>    
        </form>
        <?php
                    session_start();
                    if($_SERVER["REQUEST_METHOD"]=="POST"){
                    $host='localhost';
                    $email=$_POST["email"];
                    $psswd=$_POST["psswd"];
                    $username = 'DEEPIKA';
                    $password = 'DEEPIKA';
                    $dbname='FACEBOOK';
                    $conn=mysqli_connect($host,$username,$password,$dbname);
                    $rows=mysqli_query($conn,"SELECT * from images");
                    $sql = "select * from faces where email='$email' and psswd='$psswd'";
        $res = mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)>0){
           $_SESSION['email']=$email;
           $_SESSION['psswd']=$psswd;
           header('Location:profile.php');}
else{
  header('location:facesignup.php');
}
                 
                    while($row=mysqli_fetch_array($rows)){
                        $sel=$row["file"];
                        $nmi=$row["fname"];
                        ?>
                    <div class="bx">
                        <table border-collapse="collapse" cell-spacing="0px">
                            <tr>
                        <td><img id="pos" src=<?php echo $sel?> alt=""></td>
                        <td><label for=""><?php echo $nmi?></label></td>
                        </tr>
                        </table>
                    </div>
                    <?php
                    }}
                    ?>
        </div>
    </div>
    </div>

</body>
</html>
