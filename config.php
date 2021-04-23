<?php session_start();?>
<?php
$dbcon1=mysqli_connect("localhost","root","","d_base");
if(!$dbcon1){
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

$master=array($dbcon1,$dbcon2,$dbcon3);

?>

