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
$headr->head("Update Post",$admin_res['admin_style']);
$headr->nav();
#################### view post#####################
$query= "SELECT * FROM `blog_post` " ;
$post_data= mysqli_query($dbcon,$query);
$post_res= mysqli_fetch_array($post_data);
#################Update post#######################

if(isset($_POST['update'])){
    extract($_POST);
    $query="UPDATE `blog_post` SET `post_title`='$post_title', `post_msg`='$post_msg', `post_cat`='$post_cat' where `post_id`='$hpostid' ";
    mysqli_query($dbcon,$query);
    header('location:updatepost.php');
}

#################################################

?>
    <style>
     
  
     </style>
     
    <?php
      if(@$_GET['action']=='edit'){
        $vid=$_GET['pid'];        
        $query= "SELECT * FROM `blog_post` where `post_id`='$vid' " ;
        $post_data= mysqli_query($dbcon,$query);
        $post_res= mysqli_fetch_array($post_data);
    ?>
       <h1>Edit Post</h1>
       <div class="box">
       <form method="POST">
       <input type="hidden" name="hpostid" value="<?php echo $post_res['post_id']; ?>" >   
        <input type="text" name="post_title" placeholder="Blog Tittle" value="<?php  echo $post_res['post_title'];?>">
         <textarea name="post_msg"  cols="82" rows="15"  ><?php  echo $post_res['post_msg']; ?></textarea>
         <select name="post_cat"  value="" >
            <option><?php  echo $post_res['post_cat']; ?></option>
            <option>Uncategorized</option>
            <option>Javascript</option>
            <option>PHP</option>
            <option>HTML</option>
            <option>CSS</option>
            <option>Laravel</option>
        </select>
        <input type="submit" name="update" value="Submit Post" style="display: block;">
            <p><?php echo @$msg;?></p>
       </form>
      </div>
    <?php
    }
    else{
        ?>
        <h1>Update Blog</h1>
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
            <form method="POST">
             
            <a class="btn" href="?pid=<?php echo $post_res['post_id'];?>&action=edit ">Edit Post</a>
            
            </form>
       <?php           
        }
        mysqli_close($dbcon);
      ?>
    </div>
    <?php
    }
    ?>   
<?php
$headr->footer();
?> 