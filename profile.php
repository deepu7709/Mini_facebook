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
  form{
    margin:0;
    margin-top:3%;
  }
        .cont2{
            display:flex;
            flex-direction:row;
            flex-wrap:wrap;
        }
        .bx{
            width:300px;
            border-radius:10px;
            margin:2%;
            padding:10px;
            background-color:#FFFFFF;
        }
        .container{
            display:flex;
            flex-direction:row;
            flex-wrap:wrap;
            margin:2%;
        }
        .box{
            padding:20px;
            margin:1%;
            background-color:#F0F2F5;
            min-height:80vh;
            border-radius:7px;
        }
        .box1{
            flex:1;
        }
        .box2{
            flex:2;
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

            li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            }
            #ip{
                width:200px;
                margin:1%;
                margin-left:15%;
            }
            li a:hover {
            background-color: #111;
            }
            #show{
                margin:2%;
                width:300px;
            }
            #lab{
                font-size:15px;
            }
    </style>
</head>
<body>
            <span><img width="100px" src="logo.png" alt=""></span>
            <span><img width="200px" src="name.png" alt=""></span>
            <ul>
        <li><a class="active" href="#">Home</a></li>
        <li><a href="dash.php">Feed</a></li>
        <li><img width="40px" height="40px" src="profile.png" alt=""></li>
        <li><a href="profile.php"><?php echo $_SESSION["uname"];?></a></li>
        <li><a href="logout.php">Logout</a></li>
        </ul>
        <div class="container">
            <div class="box box1">
            <h2 align="center">Upload here!</h2>
            <hr>
            Browse for the image to upload:
            <form action="" method="post" enctype="multipart/form-data">
  
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>
<br> 
        <?php
        if(isset($_POST['submit'])){
$target_dir = "posts/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    #echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    $email=$_SESSION["email"];
    $name=$_SESSION["uname"];
    $file="posts/".$_FILES["fileToUpload"]["name"];
    $imgno=count(glob("posts/*"));
    $upload=mysqli_query($conn,"INSERT INTO images(imgno,fname,email) VALUES('$imgno','$file','$email')");
    $st=0;
    $var1=mysqli_query($conn,"INSERT into like_main(file,likes,imageno) VALUES('$file','$st','$imgno')");
    if($upload)
    {
        echo "<p id='lab' style='margin-top:2%;'>".$file."</p>";
        echo "<img id='show' src=".$file." alt='ok'>";
    }
    else{
        echo "Error occured";
    }
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}}?>
            </div>
            <div class="box box2">
            <h2 align="center">Your Posts</h2>
                    <hr>
                <div class="cont2">
                    <?php
                    $roww=mysqli_query($conn,"SELECT * from images WHERE email='$ck'");
                    while($row=mysqli_fetch_array($roww))
                    {
                        $file=$row["fname"];
                        $fno=$row["imgno"];
                    ?>
                    <div class="bx">
                        <span><p id="lab"><?php echo "$fno".')'."$file";?></p></span>
                        <img id="ip" src=<?php echo "$file";?> alt="other">
                        <form action=""></form>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
</body>
</html>