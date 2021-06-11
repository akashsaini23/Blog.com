<?php
require_once('config.php');
require_once 'function.php';
$a_id=$_SESSION['adminEmail'];

$query= "SELECT * FROM `admin` where `admin_email` = '$a_id'" ;
$admin_data= mysqli_query($dbcon,$query);
$admin_res= mysqli_fetch_array($admin_data);

if($_SESSION['adminEmail']==""){
    header("location:error.php");
}
if(@$_GET['pid']=='signout'){
    session_destroy();
    header('location:index.php');
}
#################### view post#####################
$query= "SELECT * FROM `blog_post` " ;
$post_data= mysqli_query($dbcon,$query);
$post_res= mysqli_fetch_array($post_data);
##################################################
$headr=new temp();
$headr->head("View Post",$admin_res['admin_style']);
$headr->nav();
########################SUSPEND/active##################
if(@$_GET['action']=='act'){
    $uaid=$_GET['pid'];
    $query="UPDATE `blog_post` set  `post_status`=1 where `post_id`='$uaid' ";
    mysqli_query($dbcon,$query);
    header('location:viewpost.php');
    
}
if(@$_GET['action']=='sus'){
    $usid=$_GET['pid'];
    $query="UPDATE `blog_post` set  `post_status`=0 where `post_id`='$usid' ";
    mysqli_query($dbcon,$query);
    header('location:viewpost.php');
    
}
########################################################
?>
    <style>
      
     </style>
     <h1>Welcome to Blog</h1>
     <div class="main">
     <?php
      while($post_res = mysqli_fetch_array($post_data)){
     ?> 
            <div class="sub">
                <h1><?php  echo $post_res['post_title']; ?></h1>
            </div>

            <div class="cont">
               <p><?php  echo $post_res['post_msg']; ?></p>
            </div>
            
            <div class="sub1">
                <p> <span style="color:#18413e;font-weight:600"> Category:</span><?php  echo $post_res['post_cat'];?></p>
            </div>
            <div class="sub1">
                <ul>
                    <?php
                    if(@$post_res['post_status']==1){
                        echo "<li><a class='s' href='?pid=$post_res[post_id]&action=sus'>Suspend</a></li>";
                    }
                    else if(@$post_res['post_status']==0){
                        echo "<li><a class='a' href='?pid=$post_res[post_id]&action=act'>Active</a></li>";
                    }
                    ?>
                </ul>
            </div>
        
            
    <?php           
        }
        mysqli_close($dbcon);
    ?>
    </div>
<?php
$headr->footer();
?> 