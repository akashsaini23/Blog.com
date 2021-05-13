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
$headr=new temp();
$headr->head($admin_res['admin_name'],$admin_res['admin_style']);
$headr->nav();
?>

    <h1>Welcome</h1>
    <h1>This Is Admin Home Page</h1>

<?php
$headr->footer();
?>    
