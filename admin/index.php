<?php
require_once('config.php');
  if(isset($_POST['sign'])){
      extract($_POST);
      $query= "SELECT * FROM `admin` WHERE `admin_email` = '$aid' and `admin_pass` = '$apass'";
      $admin_data= mysqli_query($dbcon,$query);
      $admin_res= mysqli_fetch_array($admin_data);


       if(empty($aid) and empty($apass) ){
           $msg="Please Enter <b>Admin Id & Password</b>";
       }
       else if(empty($aid)){
        $msg="Please Enter <b>Admin Id</b>";
       }
       else if(empty($apass) ){
        $msg="Please Enter <b>Password</b>";
       }
       else{
           if($admin_res['admin_email']==$aid && $admin_res['admin_pass']==$apass)
           {
               $_SESSION['adminEmail']=$admin_res['admin_email'];
                header('location:admin.php');
           }
           else{
               $msg="<b>Email</b> and <b>Password</b> Do Not Match";
           }
       }
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog.Com</title>
    <script src="https://kit.fontawesome.com/7fac20cd86.js" crossorigin="anonymous"></script>
    <style>
        *{
            margin: 0%;
            padding: 0%;
            box-sizing: border-box;
            font-family: cursive;
        }
        body{
            background-image: url("images/img1.jpg");
            background-size: 100% 100vh;
        }
        .main{
            height: 310px;
            width: 30%;
            margin: auto;
            background: rgba(0, 0, 0, 0.4);
            margin-top: 28vh;
            border: 1px solid black;
            border-radius: 10px;
        }
        .main h1{
            text-align: center;
            color: blanchedalmond;
            padding: 2%;
        }
        input{
            display: block;
            margin: auto;
            margin-top: 10px;
        }
        input[type=email]{
            height: 40px;
            width:70%;
        }
        input[type=password]{
            height: 40px;
            width:70%;
        }input[type=submit]{
            height: 40px;
            width:70%;
            font-size: 20px;
          
        }
        .error{
            margin-top: 10px;
            background-color: rgb(248, 124, 124);
            width: 100%;
            height: 40px;
            color:white;
            line-height: 40px;
            text-align: center;
         
        }
    </style>
</head>
<body>
  
    <div class="main">
        <h1>
        <i class="fas fa-user fa-2x"></i>
        </h1>
        <form method="POST">
            <input type="email" name="aid" placeholder="Enter Admin Email" >
            <input type="password" name="apass" placeholder="Enter Admin Password" >
            <input type="submit" name="sign" value="LogIn">
        </form>
        <?php
        if(!empty($msg)){
         echo "<div class='error'>";
         echo @$msg;
        
         echo "</div>";
        }
        ?>
    </div>
</body>
</html>