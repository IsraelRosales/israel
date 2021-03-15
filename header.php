<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Israel Rosales</title>
    <link rel="stylesheet" href="<?php echo PATH;?>/styles/bootstrap.min.css" type="text/css" />
    <link href="<?php echo PATH;?>/styles/fontawesome/css/all.min.css" rel="stylesheet">
    <script type="text/javascript" language="javascript" src="<?php echo PATH;?>/styles/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo PATH;?>/styles/bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo PATH;?>/styles/custom.js"></script>
    <style>
      body {
        margin: 0;
        font-family: "Metropolis", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        font-size: 1rem !important;
        font-weight: 400;
        line-height: 1.5;
        color: #687281 !important;
        text-align: left;
        background-color: #eff3f9 !important;
      }
      .nav-borders .nav-link.active {
          color: #0061f2;
          border-bottom-color: #0061f2;
      }
      .nav-borders .nav-link {
          color: #687281;
          border-bottom-width: 0.125rem;
          border-bottom-style: solid;
          border-bottom-color: transparent;
          padding-top: 0.5rem;
          padding-bottom: 0.5rem;
          padding-left: 0;
          padding-right: 0;
          margin-left: 1rem;
          margin-right: 1rem;
      }
    </style>
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">Israel Rosales</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link <?php if($page == 1){echo "active";}?>" aria-current="page" href="<?php echo PATH;?>/index.php">Archivos de textos</a>
        <a class="nav-link <?php if($page == 2){echo "active";}?>" href="<?php echo PATH;?>/directorios.php">Directorios</a>
      </div>
    </div>
  </div>
</nav>