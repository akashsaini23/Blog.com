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

###################################################

##################################################
##################################################
##################################################
$headr=new temp();
$headr->head("Update Post",$admin_res['admin_style']);
$headr->nav();
?>
    <style>
         .main{
             margin: auto;
             margin-top: 3%;
             height: 1200px;
             width: 90%;
             border: 2px solid  ;
         }
         .sub{
             height: 40px;
             text-align: center;
             width: 80%;
             margin: auto;
             margin-top: 3%;
             border: 1px solid #18413e;
             color:#18413e;
         }
         .cont{
             height: 300px;
             width: 80%;
             margin: auto;
             text-align: center;
             border: 1px solid #18413e;
         }
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
             width: 16%;
             margin-top:10px ;
             border-radius: 10px;
             display: inline;
             border: 2px solid rgb(248, 143, 143);
             font-size: 20px;
             background-color: rgb(8, 65, 65);
             color: #fff;
         }
         input[type=submit]:hover{
             background-color: rgb(33, 172, 190);
             box-shadow: 1px 3px 4px rgb(36, 35, 35);
         }
        select{
            height: 40px;
           width: 70%;
           margin-bottom: 10px;
           margin-top: 10px
        }
     
       
     </style>
     
    <?php
      if(isset($_POST['edit'])){
     
        extract($_POST);
       $query= "SELECT * FROM `blog_post` " ;
       $post_data= mysqli_query($dbcon,$query);
      $post_res= mysqli_fetch_array($post_data);
    ?>

       <h1>Edit Post</h1>
       <div class="box">
       <form method="POST">
       <input name="hid" type="hidden" value="<?php echo $post_res['post_id'];?>">      
         <input type="text" name="post_title" placeholder="Blog Tittle" value="<?php  echo $post_res['post_title']; ?>">
         <textarea name="post_msg"  cols="82" rows="15"></textarea>
         <select name="post_cat" >
            <option>Uncategorized</option>
            <option>Javascript</option>
            <option>PHP</option>
            <option>HTML</option>
            <option>CSS</option>
            <option>Laravel</option>
        </select>
        <input type="submit" name="post" value="Submit Post" style="display: block;">
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
            <input type="submit" name="edit" value="Edit Post" value="">

            <input type="submit" name="update" value="Update Post">
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