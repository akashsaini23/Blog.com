<?php
require_once ('config.php');
require_once ('function.php');
// require_once ('header.php');

$query="SELECT * from `siteinfo`";
$site_data= mysqli_query($dbcon,$query);
$site_res= mysqli_fetch_array($site_data);
//$css=$site_res['site_theme'];
##################################################
##################################################
$fun=new nav();
$fun->category($site_res['site_title'],$site_res['site_theme']);

$query="SELECT * from `blog_post`";
$post_data= mysqli_query($dbcon,$query);
$post_res= mysqli_fetch_array($post_data);

$query="SELECT * from `aside`";
$aside_data= mysqli_query($dbcon,$query);
$aside_res= mysqli_fetch_array($aside_data);

//////////////////Registration///////////////////////////

extract($_REQUEST);
if(isset($_POST['sign'])){
    $msg='';
    
    extract($_POST);
  if(!(preg_match('/^([a-z A-Z]{3})+[a-z A-Z]*$/',$name))){
      $msg.="Please Enter Name <br>";
      $status='alert-danger';
  }
  elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $msg.="Please Enter Valid Email <br>";
      $status='alert-danger';
  }
  elseif(!(preg_match('/[a-z]+/',$psw))){
      $msg.="Atleast One Small Character <br>";
      $status='alert-danger';
  }
  elseif(!(preg_match('/[A-Z]+/',$psw))){
   $msg.="Atleast One Capital Character <br>";
   $status='alert-danger';
  }
  elseif(!(preg_match('/[0-9]+/',$psw))){
   $msg.="Atleast One number in Password <br>";
   $status='alert-danger';
  }
  elseif(!(preg_match('/^([0-9]{11})$/',$mob))){
      $msg.="Please Enter Mobile No.<br>";
      $status='alert-danger';
  }

  if($msg==""){
  if(isset($_POST['sign'])){
   $query="INSERT INTO `student`(`id`,`name`,`email`,`password`,`mobile`,`address`,`course`,`city`)
  VALUES (NULL,'$name','$email','$psw','$mob','$addr','$course','$city')";
   mysqli_query($master[2],$query);
   $msg="<b>Registartion Successful<b>";
   $status='alert-success';
  }
  else{
      $msg="cant Save Contact Admin";
      $status='alert-danger';
  }
}
}
//////////////////login////////////////////////////
if(isset($_POST['login'])){
    $query="SELECT * FROM `student` where `email` = '$uid' and `password` = '$pwd'";
    $data = mysqli_query($master[2],$query);
    $res = mysqli_fetch_assoc($data);
    if(empty($uid)&&($pwd)){
        $msg="Please Enter Valid <b>Email and Password</b> ";
        $status='alert-danger';
    }
    elseif($uid==""){
       $msg="Please Enter Valid <b>Email</b> ";
       $status='alert-danger';
    }
    elseif($pwd==""){
        $msg="Please Enter Valid <b>Password</b> ";
        $status='alert-danger';
    }
    else{
        if($res['email']==$uid && $res['password']==$pwd){
            $_SESSION['email']=$uid;
            $msg="<b>Login Successful<b>";
            $status='alert-success';
            header('location:../admin/index.php');

        }
        else{
           $msg="Please Enter valid <b>Email&Password!<b>";
           $status='alert-danger';
          }
    }
}
?>


 <div class="container ">
 <?php
    if(isset($msg)){
?>
     <div class="alert <?php echo $status;?>  alert-dismissable"><?php echo @$msg;?><a style="cursor: pointer;" data-dismiss="alert" class="close" >&times;</a></div>
<?php
      }
?>



        <!-------------------------------login------------------------------>
        <?php
          if(@$_GET['action']=='login'){
       ?>
   <div class="row border border-primary mt-5  bg-info mr-1">
     <div class="col-md-7 m-auto " >
    
     <form class="mt-5 mb-5 text-white " method="POST">
     <h1>Log In</h1>
        <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="uid" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp"  class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="pwd" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
         <button type="submit" name="login" class="btn btn-primary">Submit</button>
     </form>
     </div>
   </div>
    <?php
     }
    ?>
     
     <!-----------------------------Registration------------------------------>
     <?php  
       if(@$_GET['action']=='reg'){
     ?>
   <div class="row border border-primary mt-5  bg-info mr-1">
         
     <div class="col-md-7 m-auto ">
    
    
      <form class="mt-5 mb-5 text-white " method="POST">
              <h1>Registration</h1>
      <div class="form-group">
           <label for="">Full Name</label>
        <input type="text" class="form-control"  name="name" placeholder="Enter Name">
           <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
           <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
           <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="psw" id="exampleInputPassword1" placeholder="Password">
      </div>
      <div class="form-group">
            <label for="">Mobile Numer</label>
        <input type="text"  class="form-control" name="mob" placeholder="Enter Your Mobile No.">
           <label for="">Address</label>
        <input type="text"  class="form-control" name="addr" placeholder="Enter Address">
           <label for="">Course</label>
        <input type="text"  class="form-control" name="course" placeholder="Enter Your Course">
           <label for="">City</label>
        <input type="text"  class="form-control" name="city" placeholder="Enter City">
       
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
         <button type="submit" name="sign" class="btn btn-primary">Submit</button>
     </form>
     </div>
     </div>
      <?php       
          
        }
           
     ?>
 
</div>



<div class="container mt-2">
      <div class="row">
          <div class="col-md-9 border border-primary pb-4">
          <?php
           while($post_res = mysqli_fetch_array($post_data)){
          ?>
             <div class="card card-info mt-4 border border-primary">
             <div class="card-heading bg-info text-white text-center "><h3><?php  echo $post_res['post_title']; ?></h3></div>
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