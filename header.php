<!DOCTYPE html>
<?php
  include 'bdd.php';
  session_start();
  if (!isset($_SESSION['logged'])) {
    header('location:log.php');
  }
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Adecco Projects</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/Mystyle.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <script src="js/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="css/sweetalert2.css">
    <script src="js/parallax.js"></script>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <?php
              if (isset($_SESSION['logged'])) {
            ?>
            <a class="navbar-brand" href="projects.php">
              <i class="fa fa-terminal fa-lg" aria-hidden="true"></i>
            </a>
          </div>
          <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <?php
                if (isset($_SESSION['superlogged'])) {
              ?>
              <li>
                <a class="second-color" href="index.php">Projets</a>
              </li>
              <?php
                }
               ?>
              <li>
                <a class="second-color" href="projects.php">Ajout Fiche</a>
              </li>
              <?php
                }
               ?>
            </ul>
          </div>
        </div>
      </nav>
    </header>
