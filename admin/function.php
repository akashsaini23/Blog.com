<?php
  class temp{
    public function head($admin_name,$css='style.css'){
        if(@$_GET['pid']=='signout'){
            session_destroy();
            header('location:index.php');
        }
        ######################################
        if($_SESSION['adminEmail']==""){
            header("location:error.php");
        }
         echo '<!DOCTYPE html>';
         echo '<html lang="en">';
         echo '<head>';
         echo '<meta charset="UTF-8">';
         echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
         echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
         echo "<title>Admin Panel</title>";
         echo '<script src="https://kit.fontawesome.com/7fac20cd86.js" crossorigin="anonymous"></script>';
         echo "<link rel='stylesheet' href=$css>";
        //  echo "<link rel='stylesheet' href=pstyle.css>";

         echo '</head>';
         echo '<body>';
         echo '<header>';
         echo '<div class="head">';
         echo '<div class="head_left">';
         echo '<a href="admin.php">';
         echo "<h2><i class='fab fa-vaadin'></i>$admin_name</h2></a>";
         echo '</div>';
         echo '<div class="head_right">';
         echo '<ul>';
                     echo "<li><a href='#'>HOME</a></li>
                           <li><a href='#'>PROFILE</a></li>
                           <li><a href='#'>SETTING</a></li>
                           <li><a href='?pid=signout'>SIGNOUT</a></li>";
         echo ' </ul>';
         echo '</div>';
         echo '</div>';
         echo '</header>';
     }
     ###################### left nav#########################
     public function nav()
     {
        
        echo '<div class="main_left">';
        echo '<img src="images/img2.jpg" alt="" >';
        echo '<ul>';
        echo "<li><a href='addpost.php'><i class='fas fa-calendar-plus'></i>Add Post</a></li>
        <li><a href='viewpost.php'><i class='fas fa-eye'></i>View Post</a></li>
        <li><a href='updatepost.php'><i class='fas fa-edit'></i>Update Post</a></li>
        <li><a href='deletepost.php'><i class='fas fa-backspace'></i>Delete Post</a></li>
        <li><a href='suspendpost.php'><i class='fas fa-ban'></i>Suspend Post</a></li>
        <li><a href='sitesetting.php'><i class='fas fa-cogs'></i>Site Setting</a></li>
        <li><a href='newadmin.php'><i class='fas fa-user-plus'></i>Add New Admin</a></li>
        <li><a href='viewuser.php'><i class='fas fa-book-reader'></i>View User</a></li>
        <li><a href='suspenduser.php'><i class='fas fa-user-slash'></i>Suspend User</a></li>
        <li><a href='theme.php'><i class='fas fa-sliders-h'></i>Admin Theme</a></li>";
        echo '</ul>';
        echo '</div>';
        echo '<div class="main_right">';
     }
     public function footer()
     {
         echo '</div>
         </body>
         </html>';
     }
  }



























function page($page_id,$dbcon,$a_id)
{
    if($page_id=='addpost'){
    require_once "{$page_id}.php";
}
else if($page_id=='viewpost'){
    require_once "{$page_id}.php";
}
else if($page_id=='updatepost'){
    require_once "{$page_id}.php";     
}
else if($page_id=='deletepost'){
    require_once "{$page_id}.php";     
}
else if($page_id=='suspendpost'){
    require_once "{$page_id}.php";      
}
else if($page_id=='setting'){
    require_once "{$page_id}.php";      
}
else if($page_id=='newadmin'){
    require_once "{$page_id}.php";
}
else if($page_id=='viewuser'){
    require_once "{$page_id}.php";
}
else if($page_id=='suspenduser'){
    require_once "{$page_id}.php";      
}
else if($page_id=='theme'){
    require_once "{$page_id}.php";      
     
}
else{
   echo ' <h1>Welcome</h1>';
}
   }

?>