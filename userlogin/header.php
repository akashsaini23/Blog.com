<?php
require_once ('config.php');


$query="SELECT * from `siteinfo`";
$site_data= mysqli_query($dbcon,$query);
$site_res= mysqli_fetch_array($site_data);
$css=$site_res['site_theme'];
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
      <!-- jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="<?php echo $css; ?>">
    <title>Tech Blog</title>
  </head>
  <body>
      <div class="container-fluid ">
  <nav class="navbar navbar-expand-lg  navbar-dark bg-primary ">
  <a class="navbar-brand text-white" href="#"><?php echo $site_res['site_title'];?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarNavDropdown">
    <ul class="navbar-nav ">
      <li class="nav-item active">
        <a class="nav-link " href="#">Home <span class="sr-only ">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#">HTML</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#">CSS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#">JavaScript</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#">PHP</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          User Section
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">LogIn</a>
          <a class="dropdown-item" href="#">Registration</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#"></a>
      </li>
    </ul>
  </div>
</nav> 
</div>
   
