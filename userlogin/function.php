
<?php

class nav{
    public function  category($site_res,$css='style.css'){

   

   echo '<!doctype html>';
   echo '<html lang="en">';
   echo '<head>';
    //<!-- Required meta tags -->
   echo '<meta charset="utf-8">';
   echo '<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">';
   // <!-- Bootstrap CSS -->
   echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">';
      //<!-- jQuery and Bootstrap Bundle (includes Popper) -->
   echo '<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>';
   echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>';

   echo "<link rel='stylesheet' href=$css>";
   echo "<title>Tech Blog</title>";
   echo '</head>';
   echo '<body>';
   echo '<div class="container-fluid ">';
   echo '<nav class="navbar navbar-expand-lg  navbar-dark bg-primary ">';
   echo "<a class='navbar-brand text-white' href='./'>$site_res</a>";
   echo '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>';
   echo '</button>';
   echo '<div class="collapse navbar-collapse " id="navbarNavDropdown">';
   echo '<ul class="navbar-nav ">';
    echo"  <li class='nav-item active'>
        <a class='nav-link ' href='#'>Home <span class='sr-only '>(current)</span></a>
      </li>
      <li class='nav-item'>
        <a class='nav-link ' href='html.php'>HTML</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link ' href='css.php'>CSS</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link'  href='javascript.php'>JavaScript</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link ' href='php.php'>PHP</a>
      </li>
      <li class='nav-item dropdown'>
        <a class='nav-link dropdown-toggle ' href='#' id='navbarDropdownMenuLink' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
          User Section
        </a>";
    echo "<div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>
        
          <a class='dropdown-item' href='?pid=&action=login'>LogIn</a>
          <a class='dropdown-item' href='?pid=&action=reg'>Registration</a>
          <a class='dropdown-item' href='#'>Something else here</a>
        </div>";
      echo "</li>
      <li class='nav-item'>
        <a class='nav-link ' href='#'></a>
      </li>";
    echo '</ul>';
    echo '</div>';
    echo '</nav> ';
    echo '</div>';

    }
}

?>
