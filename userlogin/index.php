<?php
require_once ('config.php');
require_once ('header.php');

$query="SELECT * from `blog_post`";
$post_data= mysqli_query($dbcon,$query);
$post_res= mysqli_fetch_array($post_data);

$query="SELECT * from `aside`";
$aside_data= mysqli_query($dbcon,$query);
$aside_res= mysqli_fetch_array($aside_data);


?>

 <div class="container mt-2">
      <div class="row">
          <div class="col-md-9 border border-primary">
          <?php
           while($post_res = mysqli_fetch_array($post_data)){
          ?>
             <div class="card card-info mt-4 border border-primary">
             <div class="card-heading bg-info text-white text-center "><?php  echo $post_res['post_title']; ?></div>
             <div class="card-body"><?php  echo $post_res['post_msg']; ?></div>
             <div class="card-footer bg-info">Category:<?php  echo $post_res['post_cat'];?></div>
             </div>
           
             
          <?php           
               } 
          ?>
          </div>
          <?php
           if($aside_res['aside_id']==1){
          ?>
          <div class="col-md-3 ">    
               <div class=" img-thumbnail img-responsive border-primary text-center mb-2">
               <a href="<?php echo $aside_res['aside_url'] ;?>">
               <img src="<?php echo $aside_res['aside_img'] ;?>" alt="Lights" style="width:100%">
               <div class="caption">
               <p><?php echo $aside_res['aside_title'] ;?></p>
               </div>
               </a>
               </div>
          <?php      
           }
                elseif($aside_res['aside_id']==2){
          ?>
               <div class=" img-thumbnail img-responsive border-primary text-center mb-2">
               <a href="<?php echo $aside_res['aside_img'] ;?>">
               <img src="<?php echo $aside_res['aside_img'] ;?>" alt="Lights" style="width:100%">
               <div class="caption">
               <p>Blog Post-1</p>
               </div>
               </a>
               </div>
           <?php
           }
          ?>
         
      

               <div class=" img-thumbnail img-responsive border-primary text-center mb-2">
               <a href="images/img4.jpg">
               <img src="images/img4.jpg" alt="Lights" style="width:100%">
               <div class="caption">
               <p>Blog Post-2</p>
               </div>
               </a>
               </div>

               <div class=" img-thumbnail img-responsive border-primary text-center mb-2">
               <a href="images/img5.jpg">
               <img src="images/img5.jpg" alt="Lights" style="width:100%">
               <div class="caption">
               <p>Blog Post-3</p>
               </div>
               </a>
               </div>
          </div>
     </div> 
 </div>
 <?php
 require_once ('footer.php');
 ?>