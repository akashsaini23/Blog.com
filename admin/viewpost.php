<?php
   if($a_id==""){
       header("location:error.php");
   }
?>
<h1>Welcome to my first Blog</h1>
<?php 
$query= "SELECT * FROM `blog_post` " ;
$post_data= mysqli_query($dbcon,$query);
$post_res= mysqli_fetch_array($post_data);


  
    echo $post_res['post_title'];
    echo "<br>";
    echo $post_res['post_msg'];

 
// echo "<h1> $post_res[1] </h1>";
// echo "<br>";
// echo "<h3> $post_res[2] </h3>";
 ?>