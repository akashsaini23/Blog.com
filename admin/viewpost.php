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
            
            <div id="cati">
                <p>Category-<?php  echo $post_res['post_cat']; ?></p>
            </div>
        
            
    <?php           
        }
        mysqli_close($dbcon);
    ?>
    </div>
<?php
$headr->footer();
?> 