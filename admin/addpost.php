<?php
require_once('config.php');
require_once 'function.php';
$a_id=$_SESSION['adminEmail'];
########################################################
$query= "SELECT * FROM `admin` where `admin_email` = '$a_id'" ;
$admin_data= mysqli_query($dbcon,$query);
$admin_res= mysqli_fetch_array($admin_data);
############ add post ##################################
if(isset($_POST['post'])){
    extract($_POST);
    if(empty($post_title)){
      $msg="Please Enter Tittle";
    }
    else if(empty($post_msg)){
      $msg="Please Enter Message";
    }
    else if(empty($post_cat)){
       $msg="Please Select the category";
    }
    else if(empty($msg)){ 
      $query="INSERT INTO `blog_post` (`post_id`, `post_title`, `post_msg`, `post_cat`) VALUES (NULL, '$post_title', '$post_msg', '$post_cat')";
       mysqli_query($dbcon,$query);
       $msg="<b>Saved Succesful</b>";
    }
    else{
        $msg="Please contact admin";
    }
}
####################################################

#################logout#############################

$headr=new temp();
$headr->head("Add Post",$admin_res['admin_style']);
$headr->nav();
?>
<h1>Add New Post</h1>
    <div class="box">
    <form method="POST">
        <input type="text" name="post_title" placeholder="Blog Tittle">
        <textarea name="post_msg"  cols="77" rows="15"></textarea>
        <select name="post_cat" >
            <option>Uncategorized</option>
            <option>Javascript</option>
            <option>PHP</option>
            <option>HTML</option>
            <option>CSS</option>
            <option>Laravel</option>
        </select>
        <input type="submit" name="post" value="Submit Post">
        <p><?php echo @$msg;?></p>
    </form>
    </div>
<?php
$headr->footer();
?>

