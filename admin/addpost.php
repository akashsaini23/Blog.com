<?php
require_once('config.php');
require_once 'function.php';
$a_id=$_SESSION['adminEmail'];

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
if($_SESSION['adminEmail']==""){
    header("location:error.php");
}
#################logout#############################
if(@$_GET['pid']=='signout'){
    session_destroy();
    header('location:index.php');
}
$headr=new temp();
$headr->head("Add Post",$admin_res['admin_style']);
$headr->nav();
?>

<style>
        .box{
            height: 450px;
            width: 80%;
            margin: auto;
            margin-top: 3%;
            border: 2px double;
        }
        input{
            display: block;
            margin: auto;
            margin-top: 10px;

        }
        input[type=text]{
            height: 40px;
           width: 70%;
           margin-bottom: 10px;
           margin-top: 30px
        }
        input[type=submit]{
            height: 40px;
            width: 20%;
            font-size:20px;
            background: rgb(250, 80, 80);
            color: white;
        }
        select{
            height: 40px;
           width: 70%;
           margin-bottom: 10px;
           margin-top: 10px
        }
        input[type=submit]:hover{
            background-color: rgb(9, 49, 49);
        }
    </style>

<h1>Add New Post</h1>
    <div class="box">
    <form method="POST">
        <input type="text" name="post_title" placeholder="Blog Tittle">
        <textarea name="post_msg"  cols="82" rows="15"></textarea>
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

