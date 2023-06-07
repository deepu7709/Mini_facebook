<?php
session_start();
include('connect.php');
if(empty($_SESSION["email"]))
{
  header("Location:facebook.php");
}
$ck=$_SESSION["email"];
$_SESSION["uname"]=mysqli_fetch_array(mysqli_query($conn,"SELECT fname from faces where email='$ck'"))[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
  @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');
  body{
    font-family: 'Montserrat', sans-serif;
  }
  input{
    margin:2%;
  }
  .container{
    display:flex;
    flex-direction:row;
    flex-wrap:wrap;
    margin:1%;
    margin-top:2%;
  }
  .box{
    box-shadow:1 3 18 rgb(0,0,0,0.1);
    border-radius:10px;
    margin:1%;
    padding:20px;
    background-color:#F0F2F5;
  }
  .box1{
    flex:2;
  }
  .box2{
    flex:1;
  }
  .feed{
    display:flex;
    flex-direction:row;
    flex-wrap:wrap;
  }
  .card{
    border-radius:10px;
    margin:2%;
    padding:10px;
    background-color:#FFFFFF;
  }
  #oo{
    margin-bottom:1%;
    margin-left:1%;
  }
  #cd{
    width:200px;
    margin:2%;
    padding:2px;
    margin-left:15%;
  }
  button{
    background-color:#FFFFFF;
    border-collapse:collapse;
    border:1px solid black;
    box-shadow:1px 3px 18px rgb(0,0,0,0.3);
  }
  button:hover{
    cursor:pointer;
  }
  ul {
            list-style-type: none;
            margin:0;
            margin-left:50%;
            margin-top:-5%;
            padding: 0;
            overflow: hidden;
            background-color: #2596be;
            }

            li{
            float: left;
            }
            .main{
              display:flex;
              flex-direction:column;
            }
            .bb{
              flex:1;
              margin:1%;
              padding:20px;
              box-shadow:1px 3px 18px rgb(0,0,0,0.1);
              border-radius:8px;
            }
            li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            }
            li a:hover {
            background-color: #111;}
          </style>
 <body>
 <span><img width="100px" src="logo.png" alt=""></span>
            <span><img width="200px" src="name.png" alt=""></span>
            <ul>
        <li><a class="active" href="profile.php">Home</a></li>
        <li><a href="">Feed</a></li>
        <li><img width="40px" height="40px" src="profile.png" alt=""></li>
        <li><a href="profile.php"><?php echo $_SESSION["uname"];?></a></li>
        <li><a href="logout.php">Logout</a></li>
        </ul>
        <div class="container">
          <div class="box box1">
            <h1 align="center">Your Feed</h1>
            <hr>
            <div class="feed">
              <?php
              $roww=mysqli_query($conn,"SELECT * from images");
              while($row=mysqli_fetch_array($roww))
              {
                $imn=$row["imgno"];
                $file=$row["fname"];
                $em=$row["email"];
                $nm=mysqli_fetch_array(mysqli_query($conn,"SELECT fname from faces WHERE email='$em'"))[0];
              ?>
              <div class="card">
                  <b><span><?php echo $nm;?></span></b>
                  <br>
                  <span><?php echo $file;?></span>
                  <br>
                  <img id="cd" src=<?php echo $file;?> alt="">
                  <?php 
                  $p=mysqli_num_rows(mysqli_query($conn,"SELECT * from like_main where user IS NOT NULL AND file='$file'"));
                  ?>
                  <form id="oo" action="like_in.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $file;?>">
                    <?php
                    $tt=$_SESSION["email"];
                    if(mysqli_num_rows(mysqli_query($conn,"SELECT * from like_main WHERE user='$tt' AND file='$file'"))>0)
                    {
                    ?>
                    <span><button type="submit"><img width="25px" height="25px" src="like.png" alt=""></button></span>
                    <?php
                    }
                    else{
                    ?>
                    <span><button type="submit"><img width="25px" height="25px" src="likebef.png" alt=""></button></span>
                    <?php
                    }
                    ?>
                    <label for=""><?php echo $p;?></label>
                  </form>
                  <span><form style="width:300px;margin-left:20%;margin-top:-10%;" action="comm.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $file;?>">
                    <span><input name="cmt" id="" style="margin-left:10%;" type="text" placeholder="Type your comment"></span>
                    <span><button id="fin" style="background-color:#EEEEEE;" type="submit" name="submit">Post</button></span>
                  </form>
                </span>
                <p>Comments Section:</p>
                <?php
                $rowi=mysqli_query($conn,"SELECT * from comments WHERE file='$file'");
                while($rowu=mysqli_fetch_array($rowi))
                {
                  $km=$rowu["email"];
                  $nm1=mysqli_fetch_array(mysqli_query($conn,"SELECT fname from faces WHERE email='$km'"))[0];
                ?>
                <h4><?php echo $nm1;?></h4>
                <p style="margin-left:5%;"><?php echo $rowu["comm"]?></p>
                <?php
                }
                ?>
              </div>
              <?php
              }
              ?>
            </div>
          </div>
          <div class="box box2">
            <div class="main">
            <div class="bb">
              <h2 align="center">Send Messages</h2>
              <hr>
              <form action="chats.php" method="post">
              <p>Select a person to send message</p>
              <select style="font-family: 'Montserrat', sans-serif;" name="task" id="">
              <?php
              $mis=$_SESSION["email"];
              $chi=mysqli_query($conn,"SELECT * from faces where email!='$mis'");
              while($ri=mysqli_fetch_array($chi))
              {
                $si=$ri["email"];
              ?>
              <option value=<?php echo $si;?> selected><?php echo $si;?></option>
              <?php
              }
              ?>
            </select>
            <input style="margin-left:-1%;width:300px;height:200px;" name="msg" type="text" placeholder="Enter the message to send" required>
            <input type="submit" name="sumbit" value="Send">
            </form>
            </div>
            <div class="bb">
            <h2 align="center">Messages sent</h2>
              <hr>
              <?php
              $ki=mysqli_query($conn,"SELECT * from chat where from_='$mis'");
              while($rt=mysqli_fetch_array($ki))
              {
                $res=$rt["to_"];
                $ms=$rt["msg"];
              ?>
              <h4 align="left"><?php echo $res;?></h4>
              <p style="margin-left:12%;"><?php echo $ms;?></p>
              <?php
              }
              ?>
            </div>
            <div class="bb">
            <h2 align="center">Messages received</h2>
              <hr>
              <?php
              $ki=mysqli_query($conn,"SELECT * from chat where to_='$mis'");
              while($rt=mysqli_fetch_array($ki))
              {
                $res=$rt["from_"];
                $ms=$rt["msg"];
              ?>
              <h4 align="left"><?php echo $res;?></h4>
              <p style="margin-left:12%;"><?php echo $ms;?></p>
              <?php
              }
              ?>
            </div>
            </div>
          </div>
        </div>
</body>
</html>