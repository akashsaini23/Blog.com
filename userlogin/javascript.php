<?php
require_once('config.php');
require_once('function.php');

$query="SELECT * from `siteinfo`";
$site_data= mysqli_query($dbcon,$query);
$site_res= mysqli_fetch_array($site_data);

$fun= new nav();
$fun->category($site_res['site_title'],$site_res['site_theme']);


$query="SELECT * From `blog_post` where `post_id`=58";
$data=mysqli_query($dbcon,$query);
$res=mysqli_fetch_assoc($data);



?>

<div class="container mt-2">
      <div class="row ">
          <div class="pb-4 col-md-12  border border-primary">
             <div class="card card-info mt-4 border border-primary">
             <div class="card-heading bg-info text-white text-center "><h3><?php  echo $res['post_title']; ?></h3></div>
             <div class="card-body"><?php  echo $res['post_msg']; ?></div>
             <div class="card-footer bg-info ">Category:<?php  echo $res['post_cat'];?></div>
             </div>
           </div>
      </div>
</div>
<?php
require_once('footer.php');
?>