<?php
require_once('config.php');
require_once 'function.php';

if($_SESSION['adminEmail']==""){
    header('location:index.php');
}
if(@$_GET['pid']=='signout'){
    session_destroy();
    header('location:index.php');
}
$stl="style.css";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <script src="https://kit.fontawesome.com/7fac20cd86.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="<?php echo $stl?>">
</head>
<body>
    <header>
        <div class="head">
            <div class="head_left">
                <a href="#">
                <h2><i class="fab fa-vaadin"></i><?php echo $res['adminid'];?></h2></a>
            </div>
            <div class="head_right">
                <ul>
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">PROFILE</a></li>
                    <li><a href="#">SETTING</a></li>
                    <li><a href="?pid=signout">SIGNOUT</a></li>
                </ul>
            </div>
        </div>
    </header>
    <div class="main_left">
        <img src="images/img2.jpg" alt="" >
        <ul>
            <li><a href="?id=addpost"><i class="fas fa-calendar-plus"></i>Add Post</a></li>
            <li><a href="?id=viewpost"><i class="fas fa-eye"></i>View Post</a></li>
            <li><a href="?id=updatepost"><i class="fas fa-edit"></i>Update Post</a></li>
            <li><a href="?id=deletepost"><i class="fas fa-backspace"></i>Delete Post</a></li>
            <li><a href="?id=suspendpost"><i class="fas fa-ban"></i>Suspend Post</a></li>
            <li><a href="?id=setting"><i class="fas fa-cogs"></i>Site Setting</a></li>
            <li><a href="?id=newadmin"><i class="fas fa-user-plus"></i>Add New Admin</a></li>
            <li><a href="?id=viewuser"><i class="fas fa-book-reader"></i>View User</a></li>
            <li><a href="?id=suspenduser"><i class="fas fa-user-slash"></i>Suspend User</a></li>
            <li><a href="?id=theme"><i class="fas fa-sliders-h"></i>Admin Theme</a></li>
        </ul>
    </div>
    <div class="main_right">
      <?php
      $page_id=@$_GET['id'];
       
      page($page_id);
     
      
      ?>
    </div>
</body>
</html>