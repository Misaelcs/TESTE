<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ban_co -</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;700;900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./includes/style.css" />
  </head>
  <body>
    <header>
      <logo class="logo">Ban.<span>CO</span></logo>
      <ul>
        <li><a href="index.php" class="hover-underline-animation">Localidades</a></li>
        <li><a href="administrador.php" class="hover-underline-animation">Administrador</a></li>
      </ul>
    </header>

    <?php

      session_start();
        if(!empty($_SESSION['statusMsg'])){
            echo '<p id="status" style="position: fixed; z-index: 100; top: 1rem; padding: 1rem 1rem; background-color: #fff; border-radius: .2rem; font-size: 1.1rem; opacity: 70%;"><strong>'.$_SESSION['statusMsg'].'</strong></p>';

            unset($_SESSION['statusMsg']);
        }
        
    ?>