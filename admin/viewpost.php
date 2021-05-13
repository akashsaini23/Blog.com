<?php
   if($a_id==""){
       header("location:error.php");
   }
?>
<h1>Welcome to Blog</h1>
<?php 
$query= "SELECT * FROM `blog_post` " ;
$post_data= mysqli_query($dbcon,$query);
$post_res= mysqli_fetch_array($post_data);


  
    // echo $post_res['post_title'];
    // echo "<br>";
    // echo $post_res['post_msg'];

 
// echo "<h1> $post_res[1] </h1>";
// echo "<br>";
// echo "<h3> $post_res[2] </h3>";
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <style>
         .main{
             margin: auto;
             margin-top: 5%;
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
     </style>
 </head>
 <body>
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
            
      <?php           
        }
        mysqli_close($dbcon);
        ?>

     
     
    
    
     </div>
 </body>
 </html>