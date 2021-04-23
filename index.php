<?php
require_once('config.php');
$stl='style.css';
 extract($_REQUEST);
 //////////////////login////////////////////////////
 if(isset($_POST['login'])){
     $query="SELECT * FROM `student` where `email` = '$uid' and `password` = '$pwd'";
     $data = mysqli_query($master[0],$query);
     $res = mysqli_fetch_assoc($data);
     if(empty($uid)&&($pwd)){
         $msg="Please Enter Valid <b>Email and Password</b> ";
     }
     elseif($uid==""){
        $msg="Please Enter Valid <b>Email</b> ";
     }
     elseif($pwd==""){
         $msg="Please Enter Valid <bPassword</b> ";
     }
     else{
         if($res['email']==$uid && $res['password']==$pwd){
             $_SESSION['email']=$uid;
 
         }
         else{
            $msg="Please Enter valid <b>Email&Password!<b>";
           }
     }
 }
 //////////////registration///////////////////////////////
       $query="SELECT * FROM `student`  ";
       $data = mysqli_query($master[0], $query);
       $res=mysqli_fetch_assoc($data);

       extract($_REQUEST);
       if(isset($_POST['sign'])){
        $query="INSERT INTO `student`(`id`,`name`,`email`,`password`,`mobile`,`course`,`city`)
       VALUES (NULL,'$name','$email','$psw','$mob','$course','$city')";
        mysqli_query($master[0],$query);
 }
 if(@$_GET['pid']=='signout'){
     session_destroy();
     header('location:index.php');
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog.com</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo $stl;?>">
    <script>
  
      $(document).ready(function(){
            $("#log").click(function(){
                $('.sub').show();
                $('.sub1').hide();
            })
            $("#reg").click(function(){
                $('.sub1').show();
                $('.sub').hide();
            })
        });
     
    </script>
   </head>
<body>
   
    <div class="nav">
        <h1>Blog.com</h1>
        <ul>
            <?php
            if(@$_SESSION['email']==""){
           echo '<li id="log">Login</li>
                 <li id="reg">Registration</li>';
                }
           else{
           echo '
                 <li id="aa">Home</li>
                 <li id="ab">Profile</li>
                 <li id="ac"><a style="text-decoration: none; color:#fff;" href="?pid=signout">SignOut</a></li>';
              }
            ?>
         
           
        </ul>

    </div>
    <div class="main">
        <!-------------------------------login------------------------------>
        <div class="sub">
        <h1>User Login</h1>
              <form method="POST">
            <p><input type="email" name="uid" placeholder="Enter your email" class="txt"></p>
            <p><input type="password" name="pwd" placeholder="Enter your password" class="txt"></p>
            <p><input type="submit" name="login" value="login" class="btn" id="login"></p>
            <p><?php echo @$msg;?></p>
            
        </form>
    </div>
    <!-----------------------------Registration------------------------------>
    <div class="sub1">
        <h1>SIGN UP!</h1>
        <form method="POST">
            <p><input type="text" name="name" placeholder="Fullname"class="txt"></p>
            <p><input type="email" name="email" placeholder="Email address.." class="txt"></p>
            <p><input type="password" name="psw" placeholder=" Password" class="txt"></p>
            <p><input type="text" name="course" placeholder="course"  class="txt"></p>
            <p><input type="text" name="city" placeholder="city"  class="txt"></p>
            <p><input type="tel" name="mob" placeholder="Mobile Number" class="txt"></p>         
            <p><input type="submit" name="sign" value="Submit" class="btn"></p>
            <p><?php echo @$msg;?></p>
            </div>
    </div>
   </body>
</html>