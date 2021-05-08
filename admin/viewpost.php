<h1>Welcome to my first Blog</h1>
<?php 
$query= "SELECT * FROM `blog_post` " ;
$post_data= mysqli_query($dbcon,$query);
$post_res= mysqli_fetch_array($post_data);
 
echo $post_res[1];
echo "<br>";
echo $post_res[2];
 ?>