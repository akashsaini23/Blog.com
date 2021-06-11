<?php session_start();?>
<?php
$dbcon=mysqli_connect("localhost","root","","blog.com");
if(!$dbcon){
    echo "connection not successfull";
}



$dbhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="d_base";
$dbcon2=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);



define("DBHOST","localhost");
define("DBUSER","root");
define("DBPASS","");
define("DBNAME","d_base");
$dbcon3=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

$master=array($dbcon,$dbcon2,$dbcon3);

?>

