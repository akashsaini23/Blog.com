<?php
require_once ('config.php');
require_once ('header.php');

$query="SELECT * from `blog_post`";
$post_data= mysqli_query($dbcon,$query);
$post_res= mysqli_fetch_array($post_data);
?>

<div class="container mt-2">
   <div class="main  border border-dark" style="min-height:500px;width:70%;float:left;">
   <?php
      while($post_res = mysqli_fetch_array($post_data)){
     ?> 
            <div class="sub">
                <h2><?php  echo $post_res['post_title']; ?></h2>
            </div>
            <div class="cont">
                <p><?php  echo $post_res['post_msg']; ?></p>
            </div>
            <div class="sub1">
                <p style="color: rgb(49, 119, 224);line-height:20px;"><span style="color:#18413e;font-weight:600"> Category: </span><?php  echo $post_res['post_cat'];?></p>
            </div>
        
        
            
    <?php           
        }
        mysqli_close($dbcon);
    ?>
  
    </div>
     <div class="aside border border-dark " style="float: right;min-height:500px;width:29%;"></div>
     </div>
 <?php
 require_once ('footer.php');
 ?>