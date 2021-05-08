<?php
session_start();
//////////////////sample login/////////////////
// $res=array("adminid"=>"admin@gmail.com", "adminpass"=>'akash1234');

define("DBHOST","localhost");
define("DBUSER","root");
define("DBPASS","");
define("DBNAME","blog.com");
$dbcon=mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

?>