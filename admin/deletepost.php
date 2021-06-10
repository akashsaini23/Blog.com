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
$headr=new temp();
$headr->head("Delete Post",$admin_res['admin_style']);
$headr->nav();
###########################################
$query="SELECT * FROM `blog_post`";
$post_data= mysqli_query($dbcon,$query);
$post_res= mysqli_fetch_array($post_data);
#############################################
if(@$_GET['action']=='delete'){
    $del=$_GET['pid'];
    $query="DELETE FROM `blog_post` where `post_id`='$del'";
    mysqli_query($dbcon,$query);
    header('location:deletepost.php');
}
?>

   <h1>Delete Post</h1>
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
            <a class="btn" href="?pid=<?php echo $post_res['post_id'];?>&action=delete">Delete Post</a>
    <?php           
        }
        mysqli_close($dbcon);
    ?>
    </div>

<?php
$headr->footer();
?>    
